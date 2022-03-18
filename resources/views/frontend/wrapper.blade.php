<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
    <meta name="author" content="themefisher.com">

    <title>1C:Бухгалтерия</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/frontend/images/favicon.ico" />

    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="/frontend/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Icon Font Css -->
    <link rel="stylesheet" href="/frontend/plugins/icofont/icofont.min.css">
    <!-- Slick Slider  CSS -->
    <link rel="stylesheet" href="/frontend/plugins/slick-carousel/slick/slick.css">
    <link rel="stylesheet" href="/frontend/plugins/slick-carousel/slick/slick-theme.css">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="/frontend/css/style.css">

</head>


<body id="top">

    <header>
        <div class="header-top-bar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <ul class="top-bar-info list-inline-item pl-0 mb-0">
                            <li class="list-inline-item"><a href="mailto:{{$about->email}}"><i class="icofont-support-faq mr-2"></i>{{$about->email}}</a></li>
                            <li class="list-inline-item"><i class="icofont-location-pin mr-2"></i>Address {{$about->address}} </li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-lg-right top-right-bar mt-2 mt-lg-0">
                            <a href="tel:{{$about->phone}}">
                                <span class="h6">Позвони сейчас :</span>
                                <span class="h6">{{$about->phone}}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navigation" id="navbar">
            <div class="container">
                <a class="navbar-brand" href="{{ route('index')}}">
                    <img src="/frontend/images/logo.png" alt="" class="img-fluid">
                </a>

                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icofont-navigation-menu"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarmain">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('index')}}">Главная</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('about-page')}}">насчет нас</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('service-page')}}">Услуги</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('doctor-page')}}" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Doctors <i class="icofont-thin-down"></i></a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown03">
                                <li><a class="dropdown-item" href="{{ route('doctor-page')}}">Doctors</a></li>
                                <li><a class="dropdown-item" href="{{ route('doctor-single-page')}}">Doctor Single</a></li>
                                <li><a class="dropdown-item" href="{{ route('department-page')}}">Appoinment</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('contact-page')}}">Контакт</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>




    @yield('content')









    <!-- footer Start -->
    <footer class="footer section gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mr-auto col-sm-6">
                    <div class="widget mb-5 mb-lg-0">
                        <div class="logo mb-4">
                            <img src="/frontend/images/logo.png" alt="" class="img-fluid">
                        </div>
                        <p>
                            {{$about->title}}
                        </p>

                        <ul class="list-inline footer-socials mt-4">
                            @foreach($contacts as $contact)
                            <li class="list-inline-item"><a href="{{$contact->url}}" style="padding-top: 0;">
                                    <div class="testimonial-thumb">
                                        <img src="{{$contact->image}}" alt="" class="img-fluid" style="border-radius: 50%; ">
                                    </div>
                                </a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="widget mb-5 mb-lg-0">
                        <h4 class="text-capitalize">Меню</h4>
                        <div class="divider"></div>

                        <ul class="list-unstyled footer-menu lh-35">
                            <li> <a href="{{route('index')}}">Главная</a></li>
                            <!-- <li><a href="{{ route('about-page')}}">Насчет нас</a></li> -->
                            <li><a href="#">Товар</a></li>
                            <li><a href="#">Услуга</a></li>
                            <li><a href="#">Блог</a></li>
                            <li><a href="#">Контакт</a></li>
                        </ul>
                    </div>
                </div>



                <div class="col-lg-5 col-md-6 col-sm-6">
                    <div class="widget widget-contact  mb-lg-0">
                        <h4 class="text-capitalize ">Cвязаться с нами</h4>
                        <div class="divider mb-4"></div>

                        <div class="footer-contact-block mb-4">
                            <div class="icon d-flex align-items-center">
                                <i class="icofont-email mr-3"></i>
                                <span class="h6 mb-0">Поддержка доступна 24/7</span>
                            </div>
                            <h4 class="mt-2"><a href="tel:{{$about->email}}">{{$about->email}}</a></h4>
                        </div>

                        <div class="footer-contact-block">
                            <div class="icon d-flex align-items-center">
                                <i class="icofont-support mr-3"></i>
                                <span class="h6 mb-0">Пн-Пт: 08:30 - 18:00</span>
                            </div>
                            <h4 class="mt-2"><a href="tel:{{$about->phone}}">{{$about->phone}}</a></h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <a class="backtop js-scroll-trigger" href="#top">
                            <i class="icofont-long-arrow-up"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- 
    Essential Scripts
    =====================================-->


    <!-- Main jQuery -->
    <script src="/frontend/plugins/jquery/jquery.js"></script>
    <!-- Bootstrap 4.3.2 -->
    <script src="/frontend/plugins/bootstrap/js/popper.js"></script>
    <script src="/frontend/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/frontend/plugins/counterup/jquery.easing.js"></script>
    <!-- Slick Slider -->
    <script src="/frontend/plugins/slick-carousel/slick/slick.min.js"></script>
    <!-- Counterup -->
    <script src="/frontend/plugins/counterup/jquery.waypoints.min.js"></script>

    <script src="/frontend/plugins/shuffle/shuffle.min.js"></script>
    <script src="/frontend/plugins/counterup/jquery.counterup.min.js"></script>
    <!-- Google Map -->
    <script src="/frontend/plugins/google-map/map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>

    <script src="/frontend/js/script.js"></script>
    <script src="/frontend/js/contact.js"></script>

</body>

</html>