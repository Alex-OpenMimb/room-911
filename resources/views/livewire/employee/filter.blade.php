<div class="row justify-content-start mb-4 mt-3">
	<div class="col-lg-2 col-md-2 col-sm-8">
        <label >Department</label>
        <select wire:model="departmentFilter"  class="form-control">
            <option value="Elegir">Elegir</option>
            {{-- @foreach($departments as $department)
                <option value="{{ $department->id }}" >
                    {{ $department->name}}
                </option>
            @endforeach --}}
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
