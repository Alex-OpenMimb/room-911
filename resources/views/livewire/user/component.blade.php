<div class="row layout-top-spacing">
    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
       
            <div class="widget-content-area br-4">

    
                <div class="widget-header d-flex justify-content-between mb-3 px-3">

                    <div class="row">
                        <div class="col-xl-12 text-center">

                            <h5><b>Users</b></h5>

                        </div>
                    </div>

                    <button type="button" title="created employee"  wire:click="handleAction(1)" class="btn btn-dark" data-toggle="modal" data-target="#createUserModal">
                        Insert User
                    </button>
                </div>            

                @include('common.alerts')
                @if ($users->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">User Name</th>
                                    <th class="text-center">Role</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td class="text-center">{{$user->id}}</td>
                                        <td class="text-center">{{$user->name}}</td>
                                        <td class="text-center">{{$user->email}}</td>
                                        <td class="text-center">{{$user->user_name}}</td>
                                        <td class="text-center">{{$user->role->name}}</td>
                                        <td class="text-center">{{$user->status}}</td>
                                        <td class="text-center" style="width: 30%">
                                            <ul class="table-controls ">
                                                <li>
                                                    <button type="button" title="update" class="btn btn-dark"  wire:click="edit({{$user->id}}, 2)" data-toggle="modal" data-target="#createUserModal">
                                                        <i class="la la-edit la-lg"></i>
                                                    </button>
                                                </li>
                            

                                                    <li>
                                                        <button type="button" title="delete" class="btn btn-dark" onclick="">
                                                            <i class="la la-trash la-lg"></i>
                                                        </button>
                                                    </li>
                                            
                                              
                                                    <li>
                                                        <button type="button" title="changed passwor" class="btn btn-dark" wire:click="" data-toggle="modal" data-target="#modalChangedPassword">
                                                            <i class="la la-history la-lg"></i>
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
       
    </div>

    
    @include('livewire.user.modal')
</div>
<script type="text/javascript" src="{{ asset('js/users/user.js') }}"></script>
