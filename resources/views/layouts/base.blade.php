<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">



    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100..900&display=swap" rel="stylesheet">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Admin-Panel</title>
    <style>
        * {
            font-family: "Noto Kufi Arabic", sans-serif;

        }
    </style>
</head>

<body>



    <Header>
        <!-- Navbar -->
        <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Navbar brand -->
                <a class="navbar-brand" href="#"> {{ Auth::user()->name }}</a>

                <!-- Icons -->
                <ul class="navbar-nav d-flex flex-row me-1">
                    <li class="nav-item me-3 me-lg-0">
                        <a class="nav-link text-dark " href="#"><i class="fas fa-envelope mx-1 text-dark"></i>
                            ايميل</a>
                    </li>
                    <li class="nav-item me-3 me-lg-0">
                        <a class="nav-link text-dark" href="#"><i class="fas fa-cog mx-1 text-dark"></i>
                            الاعدات</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false"> <i class="fas fa-user mx-1 text-dark"></i> اهلا بك
                            !
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
    </Header>

    <main>

        <div class="row">




            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0  bg-white shadow-sm">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-dark min-vh-100">
                    <a href="/"
                        class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline text-dark bold ">تحكم في المنتجات</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="menu">
                        <li class="nav-item">

                            <a href="{{ route('index') }}" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house text-dark"></i> <span
                                    class="ms-1 d-none d-sm-inline text-dark">الصفحه الرئيسه </span>
                            </a>


                        </li>
                        <li>
                            <a href="{{ route('Product') }}" class="nav-link px-0 align-middle text-dark">
                                <i class="text-dark fs-4 bi bi-box-seam"></i>
                                <span class="ms-1 d-none d-sm-inline text-dark">المنتجات</span>
                            </a>

                        </li>
                        <li>
                            <a href="{{ route('Product_Deatals') }}" class="nav-link px-0 align-middle">
                                <i class="text-dark fs-4 bi bi-files-alt"></i> <span
                                    class="ms-1 d-none d-sm-inline text-dark">تفصيل المنتجات</span></a>
                        </li>
                        <li>
                            <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                                <i class="fs-4 bi bi-cart3 text-dark"></i><span
                                    class="ms-1 d-none d-sm-inline text-dark">سله</span></a>

                        </li>
                        <li>
                            <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="text-dark fs-4 bi-grid"></i> <span
                                    class="ms-1 d-none d-sm-inline text-dark">فواتير</span> </a>

                        </li>
                        <li>
                            <a href="#" class="nav-link px-0 align-middle">
                                <i class="text-dark fs-4 bi-people"></i> <span
                                    class="ms-1 d-none d-sm-inline text-dark">العملاء</span> </a>
                        </li>
                    </ul>
                    <hr>
                    {{-- <div class="dropdown pb-4">
                        <a href="#"
                            class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                            id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30"
                                class="rounded-circle">
                            <span class="d-none d-sm-inline mx-1">loser</span>
                        </a>

                    </div> --}}

                </div>

            </div>


            <div class="col-sm-8">
                @yield('content')
            </div>


        </div>
    </main>

    <footer>

    </footer>

</body>

</html>
