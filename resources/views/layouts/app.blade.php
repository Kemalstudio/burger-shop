<!doctype html>
<html class="no-js" lang="ru">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Burger Shop - @yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link class="shortcut-icon" rel="shortcut icon" type="image/x-icon" href="{{ asset('img/burger svg 4k 4k 4k 4k 4k 4k 4k 4k 4k 4k 4k 4k 4k 4k 4k 4k 4k.png') }}">
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <style>
        .login_link {
            color: #ffffff;
            font-size: 14px;
            font-weight: 500;
            text-transform: uppercase;
            text-decoration: none;
            transition: 0.3s;
        }
        .login_link:hover {
            color: #FF6347 !important;
            text-decoration: none;
        }
        .user_menu_dropdown .dropdown-toggle {
            color: #FF6347;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 14px;
            text-decoration: none;
            cursor: pointer;
        }
        .user_menu_dropdown .dropdown-menu {
            background-color: #121212;
            border: 1px solid #333;
            margin-top: 10px;
            border-radius: 4px;
        }
        .user_menu_dropdown .dropdown-item {
            color: #ffffff;
            font-size: 14px;
            padding: 10px 20px;
            transition: background-color 0.3s ease;
        }
        .user_menu_dropdown .dropdown-item:hover {
            background-color: #FF6347 !important;
            color: #ffffff !important;
        }
    </style>
    @stack('styles')
</head>

<body>
    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="row align-items-center no-gutters">
                        <div class="col-xl-5 col-lg-5">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li>
                                            <a class="{{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">home</a></li>
                                        <li>
                                            <a class="{{ request()->is('menu') ? 'active' : '' }}" href="{{ url('/menu') }}">Menu</a></li>
                                        <li>
                                            <a class="{{ request()->is('about') ? 'active' : '' }}" href="{{ url('/about') }}">About</a></li>
                                        <!-- <li><a class="{{ request()->is('shop') ? 'active' : '' }}" href="{{ url('/shop') }}">Shop</a></li> -->
                                        <li><a class="{{ request()->is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo-img">
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset('img/logo.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 d-none d-lg-block">
                            <div class="book_room">
                                <div class="socail_links">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-google-plus"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="book_btn d-none d-xl-block">
                                    @guest
                                        <!-- Элементы для гостей -->
                                        <a href="{{ route('login') }}" class="login_link mr-3">Войти</a>
                                        <a href="{{ route('register') }}" class="boxed-btn3" style="padding: 10px 20px; font-size: 12px; text-transform: uppercase; border-radius: 4px;">Регистрация</a>
                                    @else
                                        <!-- Выпадающий список для авторизованных пользователей -->
                                        <div class="dropdown d-inline-block user_menu_dropdown">
                                            <a class="dropdown-toggle" href="#" role="button" id="userMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-user"></i> {{ Auth::user()->name }}
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userMenuLink">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    Выйти
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    @endguest
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    <main>
        @yield('content')
    </main>

    <!-- footer start -->
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget text-center ">
                            <h3 class="footer_title pos_margin">
                                Ashgabat
                            </h3>
                            <p>тг.ц Berkarar. 2эт, 55магазин, Burger Shop <br>
                                ул.Ataturk, 1заезд <br>
                                <a href="#">info@burger.com</a>
                            </p>
                            <a class="number" href="#">+993 64 00 53 74</a>

                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget text-center ">
                            <h3 class="footer_title pos_margin">
                                Turkmenistan
                            </h3>
                            <p>тг.ц Gulzemin. 3эт, 185магазин, Burger Shop <br>
                                ул.Ataturk, 1заезд <br>
                                <a href="#">info@burger.com</a>
                            </p>
                            <a class="number" href="#">+993 63 30 95 53</a>

                        </div>
                    </div>
                    <div class="col-xl-4 col-md-12 col-lg-4">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Оставайтесь на связи
                            </h3>
                            <form action="#" class="newsletter_form">
                                <input type="text" placeholder="Введите почту...">
                                <button type="submit">Зарегистрироваться</button>
                            </form>
                            <p class="newsletter_text">Оставайтесь с нами, чтобы получить эксклюзивное предложение!</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="socail_links text-center">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="ti-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ti-twitter-alt"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ti-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> Все права защищены
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end -->

    <!-- JS here -->
    <script src="{{ asset('js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/ajax-form.js') }}"></script>
    <script src="{{ asset('js/waypoints.min.js') }}"></script>
    <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/scrollIt.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/nice-select.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>

    <!--contact js-->
    <script src="{{ asset('js/contact.js') }}"></script>
    <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('js/jquery.form.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/mail-script.js') }}"></script>

    <script src="{{ asset('js/main.js') }}"></script>
    @stack('scripts')
</body>

</html>