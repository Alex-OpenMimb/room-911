<div class="row layout-top-spacing">
    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
        @if($action == 1)
            <div class="widget-content-area br-4">

    
                <div class="widget-header d-flex justify-content-between mb-3 px-3">

                    <div class="row">
                        <div class="col-xl-12 text-center">

                            <h5><b>Users</b></h5>

                        </div>
                    </div>

                    <button type="button" title="created employee"  wire:click="handleAction(1)" class="btn btn-menu" data-toggle="modal" data-target="#createUserModal">
                        Insert User
                    </button>
                </div>            

                @include('common.alerts')
                @if ($users->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                            <thead>
                                <tr>
                                    <th class="text-center border">ID</th>
                                    <th class="text-center border">Name</th>
                                    <th class="text-center border">Email</th>
                                    <th class="text-center border">User Name</th>
                                    <th class="text-center border">Role</th>
                                    <th class="text-center border">Status</th>
                                    <th class="text-center border">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td class="text-center border">{{$user->id}}</td>
                                        <td class="text-center border">{{$user->name}}</td>
                                        <td class="text-center border">{{$user->email}}</td>
                                        <td class="text-center border">{{$user->user_name}}</td>
                                        <td class="text-center border">{{$user->role->name}}</td>
                                        <td class="text-center border">{{$user->status}}</td>
                                        <td class="text-center border" style="width: 30%">
                                            <ul class="table-controls ">
                                                <li>
                                                    <button type="button" title="update" class="btn btn-primary"  wire:click="edit({{$user->id}}, 1)" data-toggle="modal" data-target="#createUserModal">
                                                        <i class="la la-edit la-lg"></i>
                                                    </button>
                                                </li>
                            
                                                    <li>
                                                        <button type="button" title="delete" class="btn btn-danger" onclick="deleteUser({{$user->id}}, 1)">
                                                            <i class="la la-trash la-lg"></i>
                                                        </button>
                                                    </li>
                                            
                                              
                                                    <li>
                                                        <button type="button" title="changed passwor" class="btn btn-info" wire:click="edit({{$user->id}}, 2)" data-toggle="modal" data-target="">
                                                            <i class="la la-file la-lg"></i>
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button type="button" title="changed passwor" class="btn btn-primary" wire:click="edit({{$user->id}}, 1)" data-toggle="modal" data-target="#modalChangedPassword">
                                                            <i class="la icon-key la-lg text-with"></i>
                                                        </button>
                                                    </li>
                                             
                                            </ul>                                          
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$users->links()}}
                    </div>
                @else
                    <h5 class="text-center mb-4">No Register...</h5>
                @endif

            </div>

            @elseif($action == 2)

            @include('livewire.user.show')
        @endif
    </div>

    
    @include('livewire.user.modal')
</div>
<script type="text/javascript" src="{{ asset('js/users/user.js') }}"></script>
