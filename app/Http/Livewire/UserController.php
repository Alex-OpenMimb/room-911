<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Route;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;

class UserController extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'bootstrap';


    public $pagination;
    public $roles, $url,$action = 1, $edit;
    public $name,$user_name,$password,$role = 'Choose',$status = 'Choose', $selected_id, $email;


    public function mount(){

        $this->roles  =  Role::get();
        $this->url    =  Route::current()->getName();
     
    }


    public function render()
    {
        $users = User::handleUser();
        return view('livewire.user.component',[
                'users' => $users->orderBy('id','asc')->paginate($this->pagination)
        ]);
    }

    public function updatingSearch(){
        $this->gotoPage(1);
    }

    public function StoreOrUpdate($action)
    {
        $this->validate([
                'name'                => 'bail|required|min:3|max:20|string',
                'email'               => 'bail|required|email|min:3|max:100',
                'password'            => 'bail|required|string',
                'user_name'           => 'bail|required|string|min:3|max:50|unique:users,user_name,'.$this->selected_id,
                'role'                => 'bail|required|not_in:Choose',
                'status'              => 'bail|required|not_in:Choose',
        ]
      );

      $id = [
        'id'  => $this->selected_id,
      ];

      $data = [
        'name'            => $this->name,
        'email'           => $this->email,
        'user_name'       => $this->user_name,
        'role_id'         => $this->role,
        'status'          => $this->status,
    ];;


    
    if ($this->selected_id) {
        $message = 'update';
    }else{
        $message            = 'created';
        $data['password']   = Hash::make($this->password);
    }
    $user = User::updateOrCreate($id, $data);
    
    $this->handleReset($action);
    $this->emit('modalsClosed');
    $this->emit('msgok','User '.$user->name.', to '.$message);

    }

    public function handleAction($action)
    {
        $this->handleReset($action);
    }

    public function handleReset($action)
    {
        $this->name        = '';
        $this->user_name   = '';
        $this->password    = '';
        $this->status      = 'Choose';
        $this->role        = 'Choose';
        $this->email        = '';
        $this->action        = $action;
      
    }

    public function edit(User $user, $action)
    {
    	$this->user            = $user;
    	$this->name            = $user->name;
    	$this->user_name       = $user->user_name ;
        $this->password        = $user->password;
    	$this->status          = $user->status ;
    	$this->role            = $user->role_id;
    	$this->email           = $user->email ;
    	$this->selected_id     = $user->id;
    	$this->action          = $action;
    	$this->edit            = 2;
        
    }
}
