<?php

namespace App\Http\Livewire;

use App\Imports\Import;
use App\Models\AccessRecord;
use App\Models\Department;
use App\Models\Employee;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Route;
use PDF ;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class EmployeController extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $departments, $selected_id, $first_name, $last_name, $employee_document,  $employee, $accessEmployee;
    public $action = 1, $pagination = 5, $url, $edit = 1;
    public $dateFromFilter, $dateToFilter, $dateFromFilterEmployee, $dateToFilterEmployee, $importFile, $count, $search;  
    public $idFilter = 'Choose',$department = 'Choose', $departmentFilter = 'Choose', $status = 'Active';    
          
    
    public function mount(){

        $this->departments  =  Department::get();
        $this->url          =  Route::current()->getName();
     
    }

    public function render()
    {
        $employees = Employee::HandleEmployee();
        // $b = $this->handleFilter($employees)->orderBy('id','asc')->paginate($this->pagination);
        // dd($b);
        return view('livewire.employee.component',[

            'employees' =>   $this->handleFilter($employees)->orderBy('id','asc')->paginate($this->pagination),
        ]);
    }

    
    public function handleAction($action)
    {
        $this->handleReset($action);
    }

    public function updatingSearch(){
        $this->gotoPage(1);
    }

    public function StoreOrUpdate($action)
    {
        $this->validate([
            'first_name'                => 'bail|required|min:3|max:10|string',
            'last_name'                 => 'bail|required|string|min:3|max:20',
            'employee_document'         => 'bail|required|numeric|digits_between:7,12|unique:employees,employee_document,'.$this->selected_id,
            'department'                => 'bail|required|not_in:Choose',
        ]
      );

      $id = [
        'id'  => $this->selected_id,
      ];

    $data = [
        'first_name'            => $this->first_name,
        'last_name'             => $this->last_name,
        'employee_document'     => $this->employee_document,
        'department_id'         => $this->department,
    ];


    $employee = Employee::updateOrCreate($id, $data);

    $this->selected_id ? $message = 'update' : $message = 'created';
    
    $this->handleReset($action);
    $this->emit('modalsClosed');
    $this->emit('msgok','Employee '.$employee->first_name.', to '.$message);

    }

 
    protected $listeners = ['handleState','deleteEmployee'];

    public function handleState(Employee $employe, $status, $action ){
        $employe->status = $status;
        $employe->save();
        $this->handleReset($action);
    }

    public function deleteEmployee(Employee $employe, $action ){
        $employe->delete();
        $this->handleReset($action);
    }



    public function accessEmployee($action){
        if ($this->employee_document) {
            $employee = Employee::employeeDocument($this->employee_document)->first();
            if ($employee) {
                if ($employee->status == 'Active') {
                    $data = [
                        'employee_id'   => $employee->id,
                        'access'       => 'YES',
                    ];
                    $this->emit('msgok','Access Successful');
                }else{
                    $data = [
                        'employee_id'   => $employee->id,
                    ];
                    $this->emit('msg-error','Employee are Inactive');
                }

            }else{
                $data = [
                    'employee_document'   => $this->employee_document,
                ];
                $this->emit('msg-error','Employee does not exist');
            }
            AccessRecord::create($data);
            $this->emit('modalsClosed');
            $this->handleReset($action);
        }else{
            $this->emit('msg-error','document number required');
        }

    }


    public function handleReset($action)
    {
        $this->first_name        = '';
        $this->last_name         = '';
        $this->employee_document = '';
        $this->department        = '';
        $this->search            = '';
        $this->dateFromFilter       = '';
        $this->dateToFilter         = '';
        $this->dateFromFilterShow   = '';
        $this->dateToFilterShow     = '';
        $this->accessEmployee       = '';
        $this->importFile           = '';
        $this->count                = 1;
        $this->edit                 = 1;
        $this->action               = $action;
        $this->selected_id          = null;
        $this->department           = 'Choose';
        $this->departmentFilter     = 'Choose';
        $this->status               = 'Active';
    }


    public function edit(Employee $employee, $action)
    {
    	$this->employee             = $employee;
    	$this->selected_id          = $employee->id;
    	$this->first_name           = $employee->first_name;
    	$this->last_name            = $employee->last_name;
    	$this->employee_document    = $employee->employee_document;
    	$this->department           = $employee->department_id;
        $this->accessEmployee       = $employee->accessRecord;
    	$this->action               = $action;
    	$this->edit                 = 2;
    }


    public function exportPDF()
    {
        $access = AccessRecord::all();
        $date   = Carbon::now()->format('y-m-d - h:i:s');
        $pdf    = PDF::loadView('historyPDF',compact('access', 'date'));
        return $pdf->stream("access-history-{$date}.pdf");
    }


    public function createEmployeeCSV($action){
        if ($this->importFile) {
            if ($this->importFile->extension() == 'xlsx' || $this->importFile->extension() == 'csv') {
               (new Import)->import($this->importFile);
        
                $this->emit('msgok','Successfull File csv');
                $this->emit('modalsClosed');
                $this->handleReset($action);
            }else{
                $this->emit('msg-error','Unsupported file');
            }
        }else{
            $this->emit('msg-error','File csv not exist');
        }
    }


    public function handleFilter($employee){
        if ($this->search) {
            $employee->search($this->search);
        }
        if ($this->departmentFilter != 'Choose') {
            $employee->department($this->departmentFilter);
        }

        if ($this->dateFromFilter && $this->dateToFilter ) {
            $employee->dateAccess($this->dateFromFilter, $this->dateToFilter);
        }else{
            if ($this->dateFromFilter) {
                $employee->uniqueDateAccess($this->dateFromFilter);
            }
            if ($this->dateToFilter) {
                $employee->uniqueDateAccess($this->dateToFilter);
            }
        }

        return $employee;
    }


    public function AccessDateEmployee($action){
        $access = AccessRecord::getAccesEmployye($this->selected_id);

        if ($this->dateFromFilterEmployee && $this->dateToFilterEmployee ) {
            $access->dateAccess($this->dateFromFilterEmployee, $this->dateToFilterEmployee);
        }else{
            if ($this->dateFromFilterEmployee) {
                $access->uniqueDateAccess($this->dateFromFilterEmployee);
            }
            if ($this->dateToFilterEmployee) {
                $access->uniqueDateAccess($this->dateToFilterEmployee);
            }
        }
        $this->accessEmployee   = $access->get();
        $this->action           = $action;
    }

}
