<div class="row layout-top-spacing">
    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
        @if($action == 1)
            <div class="widget-content-area br-4">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 text-center">

                            <h5><b>ACCESS CONTROL</b></h5>

                        </div>
                    </div>
                </div>
                @include('common.search')
                @include('livewire.employee.filter')
                @include('common.alerts')
                @if ($employees->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped mb-4">
                            <thead >
                                <tr >
                                    <th class="text-center color-text-primary border">Id</th>
                                    <th class="text-center border">Document Number</th>
                                    <th class="text-center border">Firts Name</th>
                                    <th class="text-center border">Last Name</th>
                                    <th class="text-center border">Department</th>
                                    <th class="text-center border">Status</th>
                                    <th class="text-center border">Last Access</th>
                                    <th class="text-center border">Total Access</th>
                                    <th class="text-center border">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employees as $employee)
                                    <tr>
                                        <td class="text-center border">{{$employee->id}}</td>
                                        <td class="text-center border">{{$employee->employee_document}}</td>
                                        <td class="text-center border">{{$employee->first_name}}</td>
                                        <td class="text-center border">{{$employee->last_name}}</td>
                                        <td class="text-center border">{{$employee->department->name}}</td>
                                        <td class="text-center border">{{$employee->status}}</td>
                                        <td class="text-center border">{{$employee->Last_access}}</td>
                                        <td class="text-center border">{{$employee->Last_access_total}}</td>
                                                                 
                                       <td class="text-center border" style="width: 30%">

                                        <ul class="table-controls ">
                                            <li>
                                                <button type="button" title="update" class="btn btn-primary"  wire:click="edit({{$employee->id}}, 1)" data-toggle="modal" data-target="#createEmployeeModal">
                                                    <i class="la la-edit la-lg"></i>
                                                </button>
                                            </li>
                                        
                                               
                                                <li>
                                                    <button type="button" title="delete" class="btn btn-danger" onclick="deleteEmployee({{$employee->id}}, 1)">
                                                        <i class="la la-trash la-lg"></i>
                                                    </button>
                                                </li>
                                         
                                          
                                                <li>
                                                    <button type="button" title="history" class="btn btn-info" wire:click="edit({{$employee->id}}, 2)">
                                                        <i class="la la-file la-lg"></i>
                                                    </button>
                                                </li>
                                         
                                         </ul>



                                       </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$employees->links()}}
                    </div>
                @else
                    <h5 class="text-center mb-4">No Records...Please regiter new employee</h5>
                @endif
            </div>

        @elseif($action == 2)
            @include('livewire.employee.show')
        @endif
    </div>
    @include('livewire.employee.modals')
</div>

<script type="text/javascript" src="{{ asset('js/employees/employee.js') }}"></script>





