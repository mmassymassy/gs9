<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href=" {{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}">
</head>

<body>
    <div id="app">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-dollar-sign fa-fw"></i>
                        <!-- Counter - Alerts -->   Mes ventes
                    </a>
                    <!-- Dropdown - Alerts -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header">
                            Mes ventes
                        </h6>
                        <a class="dropdown-item d-flex align-items-center" href="/sells/create">
                            <div class="mr-3">
                                <div class="icon-circle bg-success">
                                    <i class="fas fa-plus text-white"></i>
                                </div>
                            </div>
                            <div>
                                <span class="font-weight-bold">Nouvel vente</span>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="/sells">
                            <div class="mr-3">
                                <div class="icon-circle bg-primary">
                                    <i class="fas fa-file-alt text-white"></i>
                                </div>
                            </div>
                            <div>
                                <span class="font-weight-bold">List des Ventes</span>
                            </div>
                        </a>

                        <a class="dropdown-item d-flex align-items-center" href="/sells/deleted">
                            <div class="mr-3">
                                <div class="icon-circle bg-warning">
                                    <i class="fas fa-trash text-white"></i>
                                </div>
                            </div>
                            <div>
                                <span class="font-weight-bold">Ventes supprimés</span>
                            </div>
                        </a>
                    </div>
                </li>

                <!-- Nav Item - Alerts -->
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-box fa-fw"></i>
                        <!-- Counter - Alerts -->  Produits
                    </a>
                    <!-- Dropdown - Alerts -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header">
                            Produits
                        </h6>
                        <a class="dropdown-item d-flex align-items-center" href="/products">
                            <div class="mr-3">
                                <div class="icon-circle bg-primary">
                                    <i class="fas fa-file-alt text-white"></i>
                                </div>
                            </div>
                            <div>
                                <span class="font-weight-bold">List des Produits</span>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="/products/create">
                            <div class="mr-3">
                                <div class="icon-circle bg-success">
                                    <i class="fas fa-user-plus text-white"></i>
                                </div>
                            </div>
                            <div>
                                <span class="font-weight-bold">Nouveau Produit</span>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="/products/alert">
                            <div class="mr-3">
                                <div class="icon-circle bg-warning">
                                    <i class="fas fa-exclamation-triangle text-white"></i>
                                </div>
                            </div>
                            <div>
                                <span class="font-weight-bold">Produits en alerte</span>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="/products/deleted">
                            <div class="mr-3">
                                <div class="icon-circle bg-warning">
                                    <i class="fas fa-trash text-white"></i>
                                </div>
                            </div>
                            <div>
                                <span class="font-weight-bold">Produits supprimés</span>
                            </div>
                        </a>
                    </div>
                </li>

                <!-- Nav Item - Alerts -->
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-users fa-fw"></i>
                        <!-- Counter - Alerts -->  Clients
                    </a>
                    <!-- Dropdown - Alerts -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header">
                            Clients
                        </h6>
                        <a class="dropdown-item d-flex align-items-center" href="/clients">
                            <div class="mr-3">
                                <div class="icon-circle bg-primary">
                                    <i class="fas fa-file-alt text-white"></i>
                                </div>
                            </div>
                            <div>
                                <span class="font-weight-bold">List des clients</span>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="/clients/create">
                            <div class="mr-3">
                                <div class="icon-circle bg-success">
                                    <i class="fas fa-user-plus text-white"></i>
                                </div>
                            </div>
                            <div>
                                <span class="font-weight-bold">Nouveau client</span>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="/clients/debts">
                            <div class="mr-3">
                                <div class="icon-circle bg-warning">
                                    <i class="fas fa-exclamation-triangle text-white"></i>
                                </div>
                            </div>
                            <div>
                                <span class="font-weight-bold">Clients avec dettes élevées</span>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="/clients/deleted">
                            <div class="mr-3">
                                <div class="icon-circle bg-warning">
                                    <i class="fas fa-trash text-white"></i>
                                </div>
                            </div>
                            <div>
                                <span class="font-weight-bold">Clients supprimés</span>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-boxes fa-fw"></i>
                        <!-- Counter - Alerts -->   Mes achats
                    </a>
                    <!-- Dropdown - Alerts -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header">
                            Mes achats
                        </h6>
                        <a class="dropdown-item d-flex align-items-center" href="/shops">
                            <div class="mr-3">
                                <div class="icon-circle bg-primary">
                                    <i class="fas fa-file-alt text-white"></i>
                                </div>
                            </div>
                            <div>
                                <span class="font-weight-bold">List des Achats</span>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="/shops/create">
                            <div class="mr-3">
                                <div class="icon-circle bg-success">
                                    <i class="fas fa-plus text-white"></i>
                                </div>
                            </div>
                            <div>
                                <span class="font-weight-bold">Nouvel achat</span>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="/shops/alert">
                            <div class="mr-3">
                                <div class="icon-circle bg-warning">
                                    <i class="fas fa-exclamation-triangle text-white"></i>
                                </div>
                            </div>
                            <div>
                                <span class="font-weight-bold">Produits en alerte</span>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="/shops/deleted">
                            <div class="mr-3">
                                <div class="icon-circle bg-warning">
                                    <i class="fas fa-trash text-white"></i>
                                </div>
                            </div>
                            <div>
                                <span class="font-weight-bold">Achats supprimés</span>
                            </div>
                        </a>
                    </div>
                </li>
                <!-- Nav Item - Alerts -->
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-truck fa-fw"></i>
                        <!-- Counter - Alerts -->  Fournisseurs
                    </a>
                    <!-- Dropdown - Alerts -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header">
                            Fournisseurs
                        </h6>
                        <a class="dropdown-item d-flex align-items-center" href="/providers">
                            <div class="mr-3">
                                <div class="icon-circle bg-primary">
                                    <i class="fas fa-file-alt text-white"></i>
                                </div>
                            </div>
                            <div>
                                <span class="font-weight-bold">List des fournisseurs</span>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="/providers/create">
                            <div class="mr-3">
                                <div class="icon-circle bg-success">
                                    <i class="fas fa-user-plus text-white"></i>
                                </div>
                            </div>
                            <div>
                                <span class="font-weight-bold">Nouveau fournisseur</span>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="/providers/debts">
                            <div class="mr-3">
                                <div class="icon-circle bg-warning">
                                    <i class="fas fa-exclamation-triangle text-white"></i>
                                </div>
                            </div>
                            <div>
                                <span class="font-weight-bold">Dettes fournisseurs</span>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="/providers/deleted">
                            <div class="mr-3">
                                <div class="icon-circle bg-warning">
                                    <i class="fas fa-trash text-white"></i>
                                </div>
                            </div>
                            <div>
                                <span class="font-weight-bold">Fournisseurs supprimés</span>
                            </div>
                        </a>
                    </div>
                </li>

                <!-- Nav Item - Messages -->
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-envelope fa-fw"></i>
                        <!-- Counter - Messages -->
                        <span class="badge badge-danger badge-counter">7</span>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="messagesDropdown">
                        <h6 class="dropdown-header">
                            Message Center
                        </h6>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="...">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="font-weight-bold">
                                <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                    problem I've been having.</div>
                                <div class="small text-gray-500">Emily Fowler · 58m</div>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/undraw_profile_2.svg" alt="...">
                                <div class="status-indicator"></div>
                            </div>
                            <div>
                                <div class="text-truncate">I have the photos that you ordered last month, how
                                    would you like them sent to you?</div>
                                <div class="small text-gray-500">Jae Chun · 1d</div>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/undraw_profile_3.svg" alt="...">
                                <div class="status-indicator bg-warning"></div>
                            </div>
                            <div>
                                <div class="text-truncate">Last month's report looks great, I am very happy with
                                    the progress so far, keep up the good work!</div>
                                <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                    alt="...">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div>
                                <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                    told me that people say this to all dogs, even if they aren't good...</div>
                                <div class="small text-gray-500">Chicken the Dog · 2w</div>
                            </div>
                        </a>
                        <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                    </div>
                </li>

                <div class="topbar-divider d-none d-sm-block"></div>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                        document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>


            </ul>

        </nav>
        <!-- End of Topbar -->

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
 <!-- Bootstrap core JavaScript-->
 <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
 <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

 <!-- Core plugin JavaScript-->
 <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

 <!-- Custom scripts for all pages-->
 <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

 <!-- Page level plugins -->
 <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

 <!-- Page level custom scripts -->
 <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
</html>
