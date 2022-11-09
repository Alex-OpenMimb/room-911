<!-- Modal -->
<div wire:ignore.self class="modal fade" id="modalEmployee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> user</h5>
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
                            <label >Name*</label>
                            <input wire:model.lazy="name" type="text" class="form-control" >
                        </div>
                        <div class="form-group col-lg-4 col-md-4 col-sm-12">
                            <label >Email</label>
                            <input wire:model.lazy="email" type="text" class="form-control" >
                        </div>
                        <div class="form-group col-lg-4 col-md-4 col-sm-12">
                            <label >User Name*</label>
                            <input wire:model.lazy="user_name" type="text" class="form-control" >
                        </div>
                        {{-- @if ($edit == 1) --}}
                            <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                <label >Password</label>
                                <input wire:model.lazy="password" type="password" class="form-control" >
                            </div>
                        {{-- @endif --}}
                        @if (Auth::user()->role->name == "Admin room 911")
                            <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                <label >Role*</label>
                                <select wire:model="role"  class="form-control">
                                    <option value="Elegir">Elegir</option>
                                    {{-- @foreach($roles as $role)
                                        <option value="{{ $role->id }}" >
                                            {{ $role->name}}
                                        </option>
                                    @endforeach --}}
                                </select>
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                <label >Estado*</label>
                                <select wire:model="status" class="form-control">
                                    <option value="ACTIVE">ACTIVE</option>
                                    <option value="DISABLED">DISABLED</option>
                                </select>
                            </div>
                        @endif
                    </div>
                <div class="mt-2">
                    @include('common.messages')
                </div>
            </form>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-dismiss="modal">Exit</button>
          <button type="button" wire:click="StoreOrUpdate(1)" class="btn btn-primary" > </button>
        </div>
      </div>
    </div>
</div>


{{-- changed password--}}

 <!-- Modal -->
 <div wire:ignore.self class="modal fade" id="modalChangedPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Changed password to user</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group col-lg-8 col-md-8 col-sm-12">
                <label>New password*</label>
                <input wire:model.lazy="newPassword" type="password" class="form-control"  placeholder="contraseña">
            </div>
            <div class="form-group col-lg-8 col-md-8 col-sm-12">
                <label>Repeat password*</label>
                <input wire:model.lazy="repeatNewPassword" type="password" class="form-control"  placeholder="contraseña">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" wire:click="handleAction(1)" data-dismiss="modal">Exit</button>
          <button type="button" class="btn btn-primary" wire:click="" >Save</button>
        </div>
      </div>
    </div>
</div>

