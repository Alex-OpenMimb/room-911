<div class="row justify-content-start mb-4 mt-3">
 
    <div class="col-md-6 col-lg-6 col-sm-12 mt-2 mb-2  mr-2">

            
            <button type="button" title="created employee"  wire:click="handleAction(1)" class="btn-menu" data-toggle="modal" data-target="#createEmployeeModal">
                Insert Employe
            </button>
         
            <button type="button" title="created CSV" class="btn-menu">
            
                <a href="{{route('exportpdf')}}" target="blank" class="">
                    History PDF
                </a>
            </button>
            
            <button type="button" title="created CSV" wire:click="handleAction(1)"  class="btn-menu" data-toggle="modal" data-target="#EmployeeCSV">
               Create CSV or EXCEL
            </button>

      
            
            <button type="button" title="access employees" wire:click="handleAction(1)" class="btn-menu" data-toggle="modal" data-target="#AccessEmployee">
                Access
            </button>

    </div>

</div>
