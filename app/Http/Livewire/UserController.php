<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Route;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class UserController extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'bootstrap';


    public $pagination;


    public function mount(){

        $this->Roles  =  Role::get();
        $this->url          =  Route::current()->getName();
     
    }
    public function render()
    {
        $users = User::handleUser();
        return view('livewire.user.component',[
                'users' => $users->orderBy('id','asc')->paginate($this->pagination)
        ]);
    }
}
