<ul class="table-controls ">
    <li>
        <button type="button" title="update" class="btn btn-dark"  wire:click="edit({{$employee->id}}, 1)" data-toggle="modal" data-target="#createEmployeeModal">
            <i class="la la-edit la-lg"></i>
        </button>
    </li>

       
        <li>
            <button type="button" title="delete" class="btn btn-dark" onclick="deleteEmployee({{$employee->id}}, 1)">
                <i class="la la-trash la-lg"></i>
            </button>
        </li>
 
  
        <li>
            <button type="button" title="history" class="btn btn-dark" wire:click="edit({{$employee->id}}, 2)">
                <i class="la la-history la-lg"></i>
            </button>
        </li>
 
</ul>
