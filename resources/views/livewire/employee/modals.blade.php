 <!-- Modal -->
 <div wire:ignore.self class="modal fade" id="createEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Register employee</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="widget-one">
                <form>
                    <div class="mb-2">
                        <span class="text-danger">Fields with * are required</span>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-4 col-md-4 col-sm-12">
                            <label >First Name*</label>
                            <input wire:model.lazy="first_name" type="text" class="form-control" >
                        </div>
                
                        <div class="form-group col-lg-4 col-md-4 col-sm-12">
                            <label >Last Name*</label>
                            <input wire:model.lazy="last_name" type="text" class="form-control" >
                        </div>
                        <div class="form-group col-lg-4 col-md-4 col-sm-12">
                            <label >Document Number*</label>
                            <input wire:model.lazy="employee_document" type="number" class="form-control" >
                        </div>
                        <div class="form-group col-lg-4 col-md-4 col-sm-12">
                            <label >Department*</label>
                            <select wire:model="department"  class="form-control">
                                <option value="Elegir">Choose</option>
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}" >
                                        {{ $department->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mt-2">
                      @include('common.messages')
                  </div>
            </form>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-dismiss="modal">Exit</button>
          <button type="button" wire:click="StoreOrUpdate(1)" class="btn btn-primary" >SAVE</button>
        </div>
      </div>
    </div>
</div>


{{-- access employees --}}

 <!-- Modal -->
 <div wire:ignore.self class="modal fade" id="modalAccessEmployee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Access employee</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="widget-one">
                <form >
                    <div class="mb-2">
                        <span class="text-danger">Fields with * are required</span>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-10 col-md-10 col-sm-12">
                            <label >Document Number*</label>
                            <input wire:model.lazy="document_number" type="number" class="form-control" >
                        </div>
                    </div>
                <div class="mt-2">
                    @include('common.messages')
                </div>
            </form>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-dismiss="modal">Exit</button>
          <button type="button" wire:click="accessEmployee(1)" class="btn btn-primary" >Access</button>
        </div>
      </div>
    </div>
</div>

{{-- create employees CVS --}}

 <!-- Modal -->
 <div wire:ignore.self class="modal fade" id="modalEmployeeCSV" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create employee</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="widget-one">
                <form >
                    <div class="mb-2">
                        <span class="text-danger">Fields with * are required</span>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-10 col-md-10 col-sm-12">
                            <label >Attach csv file*</label>
                            <input wire:model.lazy="csvFile" type="file" class="form-control" >
                        </div>
                    </div>
                <div class="mt-2">
                    @include('common.messages')
                </div>
            </form>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-dismiss="modal">Exit</button>
          <button type="button" wire:click="createEmployeeCSV(1)" class="btn btn-primary" >Access</button>
        </div>
      </div>
    </div>
</div>

