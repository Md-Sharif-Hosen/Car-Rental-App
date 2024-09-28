<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta Tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="images/favicon.ico">

    <!--	Fonts
 ========================================================-->
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!--	Css Link
        ========================================================-->
        <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/style-dark.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/style-demo.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/plugins/font-awesome.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/bootstrap-slider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/jquery-ui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/layerslider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/color.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/flaticon/flaticon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/style.css') }}">

    <title>Car Rent App</title>
</head>

<body>
    <div id="page-wrapper">
        <div class="row">
            <header id="header" class="transparent-header-modern fixed-header-bg-white w-100">

                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg navbar-light bg-light w-100">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Car Rental
                            <img class="nav-logo"
                            src="{{ asset('assets/frontend/image/carlogo.png') }}" alt="">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <!-- Left-aligned menu items -->
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#home">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#about">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Rentals</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#contact">Contact</a>
                                </li>
                            </ul>

                            <!-- Right-aligned Login/Signup or Profile -->
                            <ul class="navbar-nav ms-auto">
                                @if(session('userEmail'))
                                <div class="float-right h-auto d-flex">
                                    <div class="user-dropdown">
                                        <img class="icon-nav-img" src="{{ asset('assets/admin/images/user.webp') }}" alt="" />
                                        <div class="user-dropdown-content ">
                                            <div class="mt-4 text-center">
                                                <img class="icon-nav-img" src="{{ asset('assets/admin/images/user.webp') }}" alt="" />
                                                <h6>{{ session('userEmail') }}</h6>
                                                <hr class="user-dropdown-divider  p-0" />
                                            </div>
                                            <a href="{{ url('/profilePage') }}" class="side-bar-item">
                                                <span class="side-bar-item-caption">Profile</span>
                                            </a>
                                            <a href="{{ route('customer_logout') }}" class="side-bar-item">
                                                <span class="side-bar-item-caption">Logout</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ ('/userLogin') }}">Login</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
