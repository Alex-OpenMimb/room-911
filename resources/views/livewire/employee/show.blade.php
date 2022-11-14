<div class="widget-content-area ">
    <div class="widget-header">
        <div class="row">
            <div class="col-xl-12 text-center">
                <h5 class="color-text-primary"><b>Employee Information</b></h5>
            </div>
        </div>
    </div>
 <div class="d-flex justify-content-around">

     <div class="widget-one w-50">
 
         <div class="row">
             <div class="form-group col-lg-4 col-md-4 col-sm-12">
                 <label >Full Name</label>
                 <h6 class=""><b>{{$employee->full_name}}</b></h6>
             </div>
 
             <div class="form-group col-lg-4 col-md-4 col-sm-12">
                 <label >Document Number</label>
                 <h6 class=""><b>{{$employee->employee_document}}</b></h6>
             </div>         
 
         </div>
         <div class="row">
             <div class="form-group col-lg-4 col-md-4 col-sm-12">
                 <label >Status Access</label>
                 <h6 class=""><b>{{$employee->status}}</b></h6>
             </div>
     
             <div class="form-group col-lg-4 col-md-4 col-sm-12">
                 <label >Department</label>
                 <h6 class=""><b>{{$employee->department->name}}</b></h6>
             </div>
 
         </div>
 
         <div class="row">
 
             <div class="form-group col-lg-4 col-md-4 col-sm-12">
                 <label >Last Access</label>
                 <h6 class=""><b>{{$employee->last_access}}</b></h6>
             </div>
             <div class="form-group col-lg-4 col-md-4 col-sm-12">
                 <label >Total Access</label>
                 <h6 class=""><b>{{$employee->last_access_total}}</b></h6>
             </div>
 
         </div>
         
     </div>

     <div class="d-flex justify-content-center">
    
         <div>
    
             <div class="widget-header">
                 <div class="row">
                     <div class="col-xl-12 text-center">
                         <h5><b>Access Filter</b></h5>
                     </div>
                 </div>
             </div>
     
             <div class="row justify-content-start mb-4 mt-3">
                 <div class="col-lg-6 col-md-2 col-sm-8">
                     <label >Initial access date</label>
                     <input wire:model="dateFromFilterEmployee" wire:change="AccessDateEmployee(2)"  type="date" class="form-control">
                 </div>
                 <div class="col-lg-6 col-md-2 col-sm-8">
                     <label >Final access date</label>
                     <input wire:model="dateToFilterEmployee" wire:change="AccessDateEmployee(2)" type="date" class="form-control">
                 </div>
             </div>
             @if ($accessEmployee->count())
                 @foreach ($accessEmployee as $access)
                     <div class="widget-one">
                         <div class="row">
                             <div class="form-group col-lg-6 col-md-4 col-sm-12">
                                 <label >Access</label>
                                 <h6 class=""><b>{{$access->access_attempt}}</b></h6>
                             </div>
                             <div class="form-group col-lg-6 col-md-4 col-sm-12">
                                 <label >Success</label>
                                 <h6 class=""><b>{{$access->access}}</b></h6>
                             </div>
                         </div>
                     </div>
                 @endforeach
             @else
                 <div class="widget-header">
                     <div class="row">
                         <div class="col-xl-12 text-center">
                             <h6><b>No register...</b></h6>
                         </div>
                     </div>
                 </div>
             @endif
         </div>
    
     </div>

 </div>
    
    
 

   
    



    <div class="row ">
        <div class="col-lg-5 mt-2  text-left">
            <button type="button" wire:click="handleAction(1)" class="btn btn-blue mr-1">
                <i class="mbri-left"></i> Back
            </button>
        </div>
    </div>
</div>
