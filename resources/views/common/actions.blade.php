<ul class="table-controls ">
    <li>
        <button type="button" title="update" class="btn btn-dark"  wire:click="edit({{$employee->id}}, 1)" data-toggle="modal" data-target="#createEmployeeModal">
            <i class="la la-edit la-lg"></i>
        </button>
    </li>

    {{-- @if (Auth::user()->role->name == "Admin ROOM_911") --}}
        <li>
            <button type="button" title="Enable/Disabled Acccess" class="btn btn-dark" onclick="handleState({{$employee->id}}, '{{$employee->status}}', 1)">
                <i class="la la-exchange la-lg"></i>
            </button>
        </li>
        <li>
            <button type="button" title="delete" class="btn btn-dark" onclick="deleteEmployee({{$employee->id}}, 1)">
                <i class="la la-trash la-lg"></i>
            </button>
        </li>
    {{-- @endif --}}
    {{-- @if ($url == "home") --}}
        <li>
            <button type="button" title="history" class="btn btn-dark" wire:click="">
                <i class="la la-history la-lg"></i>
            </button>
        </li>
    {{-- @endif --}}
    {{-- @if ($url == "users") --}}
        <li>
            <button type="button" title="changed passwor" class="btn btn-dark" wire:click="" data-toggle="modal" data-target="#modalChangedPassword">
                <i class="la la-history la-lg"></i>
            </button>
        </li>
    {{-- @endif --}}
</ul>
