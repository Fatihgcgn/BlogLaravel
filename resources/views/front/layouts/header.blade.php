<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title','Blog Sitesi')</title>
        <link rel="icon" type="image/x-icon" href="https://icon-library.com/images/icon-favicon/icon-favicon-6.jpg" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('front/dist/css/styles.css')}}" rel="stylesheet" />
        <style> .lazyloaded{
            width: 620px;
            height: 350px;
        } </style>
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="{{route('homepage')}}">Fatih Blog Sitesi</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">

                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('homepage')}}">Anasayfam</a></li>

                        @foreach ($pages as $page )
                        <li class="nav-item">
                            <a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('page',$page->slug)}}">{{$page->title}}</a>
                        </li>
                        @endforeach
                        <li class="nav-item">
                            <a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('contact')}}">İletişim</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('@yield('bg',asset('front/dist/assets/img/home-bg.jpg'))')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-12 col-xl-7">
                        <div class="site-heading">
                            <h2>@yield('title')</h2>
                            <span class="subheading"></span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
