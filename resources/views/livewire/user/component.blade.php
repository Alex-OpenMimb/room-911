<div class="row layout-top-spacing">
    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
        {{-- @if($action == 1) --}}
            <div class="widget-content-area br-4">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 text-center">

                            <h5><b>Users</b></h5>

                        </div>
                    </div>
                </div>
                @include('common.search')
                @include('common.alerts')
                {{-- @if ($info->count() > 0) --}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">User Name</th>
                                    <th class="text-center">Role</th>
                                    <th class="text-center">Last Access</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach($info as $elemen)
                                    <tr>
                                        <td class="text-center">{{$elemen->id}}</td>
                                        <td class="text-center">{{$elemen->name}}</td>
                                        <td class="text-center">{{$elemen->email}}</td>
                                        <td class="text-center">{{$elemen->user_name}}</td>
                                        <td class="text-center">{{$elemen->role->name}}</td>
                                        <td class="text-center">{{$elemen->last_access ? $elemen->last_access:'Not access...' }}</td>
                                        <td class="text-center">{{$elemen->status}}</td>
                                        <td class="text-center" style="width: 30%">
                                            @include('common.actions')
                                        </td>
                                    </tr>
                                @endforeach --}}
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
    @include('livewire.user.modal')
</div>
<script type="text/javascript" src="{{ asset('js/users/user.js') }}"></script>
