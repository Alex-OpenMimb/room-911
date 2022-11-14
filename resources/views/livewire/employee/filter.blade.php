<div class="row justify-content-start mb-4 mt-3">

    <div class="col-lg-4 col-md-4 col-sm-8">
        <label >Name or ID</label>
        <div class="input-group ">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></span>
            </div>
            <input type="text" wire:model="search" class="form-control" placeholder="Search by name or ID" aria-label="notification" aria-describedby="basic-addon1">
        </div>
    </div>
  
	<div class="col-lg-2 col-md-2 col-sm-8">
        <label >Department</label>
        <select wire:model="departmentFilter"  class="form-control">
            <option value="Choose">Choose</option>
            @foreach($departments as $department)
                <option value="{{ $department->id }}" >
                    {{ $department->name}}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-lg-3 col-md-2 col-sm-8">
        <label >Initial access date</label>
        <input wire:model.lazy="dateFromFilter" type="date" class="form-control">
    </div>
    <div class="col-lg-3 col-md-2 col-sm-8">
        <label >Final access date</label>
        <input wire:model.lazy="dateToFilter" type="date" class="form-control">
    </div>
</div>
