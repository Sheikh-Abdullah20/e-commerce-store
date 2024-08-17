<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Nest - @yield('title')</title>
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta property="og:title" content="" />
        <meta property="og:type" content="" />
        <meta property="og:url" content="" />
        <meta property="og:image" content="" />
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets2/imgs/theme/favicon.svg') }}" />
        <!-- Template CSS -->
        <script src="{{ asset('assets2/js/vendors/color-modes.js') }}"></script>
        <link href="{{ asset('assets2/css/main.css?v=6.0') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    </head>

    <body>
        <div class="screen-overlay"></div>
        <aside class="navbar-aside" id="offcanvas_aside">
            <div class="aside-top">
                <a href="index.html" class="brand-wrap">
                    <img src="{{ asset('assets2/imgs/theme/logo.svg') }}" class="logo" alt="Nest Dashboard" />
                </a>
                <div>
                    <button class="btn btn-icon btn-aside-minimize"><i class="text-muted material-icons md-menu_open"></i></button>
                </div>
            </div>
            <nav>
                <ul class="menu-aside">
                    <li class="menu-item {{ Request()->is('admin') ? 'active' : '' }}">
                        <a class="menu-link" href="{{ route('admin') }}">
                            <i class="icon material-icons md-home"></i>
                            <span class="text">Dashboard</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="{{ route('products.index') }}">
                            <i class="icon material-icons md-shopping_bag"></i>
                            <span class="text">Products</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="{{ route('categories.index') }}">
                            <i class="icon material-icons md-store"></i>
                            <span class="text">Categories</span>
                        </a>

                        {{-- <div class="submenu">
                           @foreach ($categories as $category )
                           <a href="{{ route('categories.index') }}">{{ $category->category_name }}</a>
                           @endforeach
                        </div> --}}
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="{{ route('products.create') }}">
                            <i class="icon material-icons md-add_box"></i>
                            <span class="text">Add product</span>
                        </a>
                    </li>
                    <li class="menu-item {{ Request()->is('users.index') ? 'active' : '' }}">
                        <a class="menu-link" href="{{ route('users.index') }}">
                            <i class="icon material-icons md-person"></i>
                            <span class="text">Users</span>
                        </a>
                    </li>

                  
                </ul>    
            </nav>
        </aside>
        <main class="main-wrap">
            <header class="main-header navbar">
                <div class="col-search">
                   {{-- search bar --}}
                </div>
                <div class="col-nav">
                    <button class="btn btn-icon btn-mobile me-auto" data-trigger="#offcanvas_aside"><i class="material-icons md-apps"></i></button>
                    <ul class="nav">
                        
                        <li class="nav-item">
                            <a class="nav-link btn-icon darkmode" href="#"> <i class="material-icons md-nights_stay"></i> </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="requestfullscreen nav-link btn-icon"><i class="material-icons md-cast"></i></a>
                        </li>
                        <li class="dropdown nav-item">
                            <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownAccount" aria-expanded="false"> 
                          @php
                              $user = Auth::user();
                          @endphp      
                                @isset($user->profile)
                                <img class="img-xs rounded-circle" src="{{ asset('storage/' . $user->profile) }}" alt="User" />
                                @else
                                <img class="img-xs rounded-circle" src="assets2/imgs/people/avatar-2.png" alt="User" />
                                @endisset
                            
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownAccount">
                                <a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="material-icons md-perm_identity"></i>Edit Profile</a>                        
                                <div class="dropdown-divider"></div>
                                <form action="{{route('logout')}}" method="POST">
                                    @csrf
                                    <button  type="submit" class="dropdown-item text-danger"><i class="material-icons md-exit_to_app"></i>Logout</button>

                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </header>
            {{-- Main Content --}}
            @yield('content')
            {{-- Main Content End --}}
          
        </main>
        <script src="{{ asset('assets2/js/vendors/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('assets2/js/vendors/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets2/js/vendors/select2.min.js') }}"></script>
        <script src="{{ asset('assets2/js/vendors/perfect-scrollbar.js') }}"></script>
        <script src="{{ asset('assets2/js/vendors/jquery.fullscreen.min.js') }}"></script>
        <script src="{{ asset('assets2/js/vendors/chart.js') }}"></script>
        <!-- Main Script -->
        <script src="{{ asset('assets2/js/main.js?v=6.0') }}" type="text/javascript"></script>
        <script src="{{ asset('assets2/js/custom-chart.js') }}" type="text/javascript"></script>
        {{-- <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script> --}}
        @yield('scripts')
    </body>
</html>
