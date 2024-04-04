<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">



    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100..900&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        * {
            font-family: "Noto Kufi Arabic", sans-serif;

        }
    </style>
</head>

<body dir="{{ session()->get('locale') == 'ar' ? 'rtl' : 'ltr' }}">

    <div id="app">

        <!-- Navbar -->
        <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <!-- Container wrapper -->
            <div class="container">
                <!-- Navbar brand -->
                <a class="navbar-brand" href="#"> </a>

                <!-- Icons -->

                <ul class="navbar-nav d-flex flex-row me-1">
                    <li class="nav-item me-3 me-lg-0">
                        <div class="dropdown">
                            <a class=" nav-link text-dark" href="#" role="button" id="dropdownMenuLink"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                @if (session()->get('locale') == 'ar')
                                    <p>AR</p>
                                @else
                                    <p>EN</p>
                                @endif
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                <li><a class="dropdown-item" href="{{ url('language/ar') }}">AR</a></li>

                                <li><a class="dropdown-item" href="{{ url('language/en') }}">EN</a></li>

                            </ul>
                        </div>
                    </li>

                    <li class="nav-item me-3 me-lg-0">
                        <a class="nav-link text-dark " href="#"><i class="fas fa-envelope mx-1 text-dark"></i>
                            {{ __('msg.Email') }}</a>
                    </li>

                    <li class="nav-item me-3 me-lg-0">
                        <a class="nav-link text-dark " href="{{ route('Show_cart') }}">
                            <i class="fa-solid  fa-cart-shopping mx-1 text-dark"></i>
                            <span class="position-absolute translate-middle badge rounded-circle bg-primary pt-2">
                                {{ Session::get('cont') }}
                            </span>
                        </a>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false"> <i class="fas fa-user mx-1 text-dark"></i>
                            {{ __('msg.Welcome') }}
                        </a>
                        <!-- Dropdown menu -->
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="#">حسابك</a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}">تسجيل الخروج</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
        <!-- Navbar -->




        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
