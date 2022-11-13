<div class="widget-content-area ">
    <div class="widget-header">
        <div class="row">
            <div class="col-xl-12 text-center">
                <h5><b>User Information</b></h5>
            </div>
        </div>
    </div>
    <div class="widget-one">
        <div class="row">
            <div class="form-group col-lg-4 col-md-4 col-sm-12">
                <label > Name</label>
                <h6 class=""><b>{{$user->name}}</b></h6>
            </div>

            <div class="form-group col-lg-4 col-md-4 col-sm-12">
                <label >User Number</label>
                <h6 class=""><b>{{$user->user_name}}</b></h6>
            </div>
            <div class="form-group col-lg-4 col-md-4 col-sm-12">
                <label >Email</label>
                <h6 class=""><b>{{$user->email}}</b></h6>
            </div>
            <div class="form-group col-lg-4 col-md-4 col-sm-12">
                <label >Status Access</label>
                <h6 class=""><b>{{$user->status}}</b></h6>
            </div>

        </div>
    </div>
    
    <div class="row ">
        <div class="col-lg-5 mt-2  text-left">
            <button type="button" wire:click="handleAction(1)" class="btn btn-dark mr-1">
                <i class="mbri-left"></i> Back
            </button>
        </div>
    </div>
</div>
