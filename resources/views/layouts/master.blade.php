<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

        <title> @yield('title') </title>

        <script src="{{ asset('assets/js/libs/jquery-3.1.1.min.js') }}"></script>

        {{-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> --}}

        {{-- para selects multiples --}}
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

        <link rel="icon" href="{{ asset('image/logo.png') }}" />
        <link href="{{ asset('assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('assets/js/loader.js') }}"></script>

        <!-- STYLES GENERALES -->
        <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
        <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/dashboard/dash_2.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset('fonts/line-awesome/css/line-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/toastr.css') }}">
        <link href="{{ asset('assets/css/toastr.min.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}">
        <link href="{{ asset('assets/css/tables/table-basic.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/elements/infobox.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('plugins/notification/snackbar/snackbar.min.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/switches.css') }}">
        <link href="{{ asset('plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('plugins/flatpickr/material_red.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/elements/color_library.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/utility.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset('assets/fontello.css') }}">



        {{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> --}}
        <script>
            var url_home = "{{ url('/') }}";
        </script>
        <!-- SECCIÓN PARA INCLUÍR ESTILOS PERSONALIZADOS EN LOS MÓDULOS DEL SISTEMA -->
        @YIELD('STYLES')

        <!-- LIVEWIRE -->
        @livewireStyles

    </head>

    <body class="alt-menu sidebar-noneoverflow  bg-light">
        <!-- BEGIN LOADER -->
        <div id="load_screen">
            <div class="loader">
                <div class="loader-content">
                    <div class="spinner-grow align-self-center"></div>
                </div>
            </div>
        </div>
        <!-- END LOADER -->

        <!-- BEGIN NAVBAR -->
        <div class="header-container">
            <header class="header navbar navbar-expand-sm d-flex justify-content-between mx-0 bg-blue " style="height: 4rem">
               

                <div class="nav-logo align-self-center d-flex mt-3">
                    <a class="navbar-brand" href="">
                        <span class="navbar-brand-name color-text-primary">ROOM 911 </span>
                        <h6> <b>Last access</b>  {{ Auth::user()->last_access }}</h6>
                    </a>

                    <nav class="d-flex mt-2">
                        <ul><a class="btn-menu" href="{{ route('users') }}">Users</a></ul>
                        <ul><a class="btn-menu" href="{{ route('accessroom') }}">Access Room</a></ul>
                    </nav>
                </div>

              


                <ul class="navbar-item flex-row nav-dropdowns">


                    <li class="nav-item dropdown user-profile-dropdown order-lg-0 order-1">
                        <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="user-profile-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="media">
                                <img src="images/avatar_teem.png" class="img-fluid" alt="">
                                <div class="media-body align-self-center">
                                    <h6> <b>Hello!</b> {{ Auth::user()->name }}</h6>
                                </div>
                            </div>

                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-chevron-down">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </a>

                        <div class="dropdown-menu position-absolute animated fadeInUp"
                            aria-labelledby="user-profile-dropdown">
                            <div class="">
                                {{-- <div class="dropdown-item">
                                    <a class="" href="{{ route('users') }}"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-user">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>Users</a>
                                </div> --}}
                                {{-- <div class="dropdown-item">
                                    <a class="" href="{{ route('accessroom') }}"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-user">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>Access Room</a>
                                </div> --}}
                                <div class="dropdown-item">
                                    <form id="form1" class="form-horizontal" method="POST" action="{{ route('logout') }}">
                                        {{ csrf_field() }}
                                    </form>

                                    <a class="" onclick="document.getElementById('form1').submit();"
                                        href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-log-out">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12"></line>
                                        </svg>Logout
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </header>
        </div>
        <!-- END NAVBAR -->

        <!-- BEGIN MAIN CONTAINER -->
        <div class="main-container  bg-light" id="container">
            <div class="overlay"></div>
            <div class="search-overlay"></div>

            <!-- BEGIN CONTENT PART -->
            <div id="content  bg-light" class="main-content">
                <div class="layout-px-spacing">
                    @yield('content')
                </div>

              
            </div>
            <!-- END CONTENT PART -->
        </div>
        <!-- END MAIN CONTAINER -->

        <!-- SCRIPTS GENERALES -->

        <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
        <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('assets/js/app.js') }}"></script>

        <script>
            $(document).ready(function() {
                App.init();

                $(".flatpickr").flatpickr({
                    enableTime: false,
                    dateFormat: "d-m-Y",
                    'locale': 'es'
                });
            });
        </script>

        <script src="{{ asset('assets/js/custom.js') }}"></script>
        <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
        <script src="{{ asset('plugins/notification/snackbar/snackbar.min.js') }}"></script>
        <script src="{{ asset('plugins/flatpickr/flatpickr.js') }}"></script>
        <script src="{{ asset('plugins/flatpickr/flatpickr_es.js') }}"></script>

        <!-- SECCIÓN PARA INCLUÍR SCRIPTS PERSONALIZADOS EN LOS MÓDULOS DEL SISTEMA -->
        @yield('scripts')

        <!-- SCRIPTS PARA LOS MENSAJES Y NOTIFICACIONES -->
        {{-- <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script src="{{ asset('js/js/toast.js') }}"></script>

        {{-- script utiles --}}
        <script src="{{ asset('js/util.js') }}"></script>


        <!-- NECESARIO PARA EL FUNCIONAMIENTO DE LIVEWIRE -->
        @livewireScripts

        <script>
            // let url = location.host;

            window.livewire.on('msgok', msgOK => {
                toastr.success(msgOK, "info");
            });

            window.livewire.on('msg-error', msgError => {
                toastr.error(msgError, "error");
            });

            window.livewire.on('modalsClosed', () => {
                $('#createEmployeeModal').modal('hide');
                $('#AccessEmployee').modal('hide');
                $('#EmployeeCSV').modal('hide');
                $('#modalChangedPassword').modal('hide');
                $('#createUserModal').modal('hide');
            });

        </script>
    </body>
</html>
