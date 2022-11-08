<div class="row layout-top-spacing">
    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
        {{-- @if($action == 1) --}}
            <div class="widget-content-area br-4">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 text-center">

                            <h5><b>Access ROOM_911</b></h5>

                        </div>
                    </div>
                </div>
                @include('common.search')
                @include('livewire.employee.filter')
                @include('common.alerts')
                {{-- @if ($info->count() > 0) --}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Department</th>
                                    <th class="text-center">Last Name</th>
                                    <th class="text-center">Middle Name</th>
                                    <th class="text-center">Firts Name</th>
                                    <th class="text-center">Document Number</th>
                                    <th class="text-center">Status Access</th>
                                    <th class="text-center">Last Access</th>
                                    <th class="text-center">Total Access</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach($info as $elemen) --}}
                                    <tr>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>

                                        <td class="text-center" style="width: 30%">
                                            @include('common.actions')
                                        </td>
                                    </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                        {{-- {{$info->links()}} --}}
                    </div>
                {{-- @else
                    <h5 class="text-center mb-4">No Records...</h5>
                @endif --}}
            </div>

        {{-- @elseif($action == 2)
            @include('livewire.employees.show')
        @endif --}}
    </div>
    @include('livewire.employee.modals')
</div>

<script type="text/javascript" src="{{ asset('js/employees/employee.js') }}"></script>





