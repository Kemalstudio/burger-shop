@extends('layouts.app')

@section('title', 'About')

@section('content')
    <!-- bradcam_area_start -->
    <div class="bradcam_area breadcam_bg_1 overlay">
        <h3 style="font-family: 'Pacifico', cursive;">ABOUT</h3>
    </div>
    <!-- bradcam_area_end -->

    <!-- about_area_start -->
    <div class="about_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="about_thumb2">
                        <div class="img_1">
                            <img src="{{ asset('img/about/1.png') }}" alt="">
                        </div>
                        <div class="img_2">
                            <img src="{{ asset('img/about/2.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 offset-lg-1 col-md-6">
                    <div class="about_info">
                        <div class="section_title mb-20px">
                            <span>О нас</span>
                            <h3>Лучший бургер <br>
                                в вашем городе</h3>
                        </div>
                        <p>Эпические чизбургеры бывают в самых разных проявлениях, но мы хотим, чтобы они были у нас во рту, несмотря ни на что. Засуньте эти размятые котлеты с нежно карамелизированным мясным жиром между поджаренной булочкой бриошь и передайте ее по наследству. Вы влюбляетесь в сам чизбургер, но и поездка к нему не так уж плоха. Они - друзья детства, которые знают ваши самые высокие и самые низкие достижения. Они были с вами и в горе, и в радости, и они лучше всех умеют хранить секреты. Неважно, нарядные они или неформальные, чизбургеры прикроют вашу спину. Иногда мы теряем из виду то, что действительно важно в жизни. Есть что-то, что можно сказать об изысканном бургере с бри и трюфелем в сочетании с пармезаном, но не позволяйте себе забыть о старом добром чизбургере с американским чеддером и сдобной булочкой.</p>
                        <div class="img_thumb">
                            <img src="{{ asset('img/jessica-signature.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about_area_end -->

    <!-- gallery_start -->
    <div class="gallery_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title mb-70 text-center">
                        <span>Галерея изображений</span>
                        <h3>Наша галерея</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_gallery big_img">
            <a class="popup-image" href="{{ asset('img/gallery/1.png') }}">
                <i class="ti-plus"></i>
            </a>
            <img src="{{ asset('img/gallery/1.png') }}" alt="">
        </div>
        <div class="single_gallery small_img">
            <a class="popup-image" href="{{ asset('img/gallery/2.png') }}">
                <i class="ti-plus"></i>
            </a>
            <img src="{{ asset('img/gallery/2.png') }}" alt="">
        </div>
        <div class="single_gallery small_img">
            <a class="popup-image" href="{{ asset('img/gallery/3.png') }}">
                <i class="ti-plus"></i>
            </a>
            <img src="{{ asset('img/gallery/3.png') }}" alt="">
        </div>

        <div class="single_gallery small_img">
            <a class="popup-image" href="{{ asset('img/gallery/4.png') }}">
                <i class="ti-plus"></i>
            </a>
            <img src="{{ asset('img/gallery/4.png') }}" alt="">
        </div>
        <div class="single_gallery small_img">
            <a class="popup-image" href="{{ asset('img/gallery/5.png') }}">
                <i class="ti-plus"></i>
            </a>
            <img src="{{ asset('img/gallery/5.png') }}" alt="">
        </div>
        <div class="single_gallery big_img">
            <a class="popup-image" href="{{ asset('img/gallery/6.png') }}">
                <i class="ti-plus"></i>
            </a>
            <img src="{{ asset('img/gallery/6.png') }}" alt="">
        </div>
    </div>

    <!-- testimonial_area_start  -->
    <div class="testimonial_area ">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title mb-60 text-center">
                        <span>Отзывы</span>
                        <h3>Счастливые клиенты</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="testmonial_active owl-carousel">
                        <div class="single_carousel">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="single_testmonial text-center">
                                        <p>Эпические чизбургеры бывают в самых разных проявлениях, но мы хотим, чтобы они были у нас во рту, несмотря ни на что. Засуньте эти размятые котлеты с нежно карамелизированным мясным жиром между поджаренной булочкой бриошь и передайте ее по наследству. Вы влюбляетесь в сам чизбургер, но и поездка к нему не так уж плоха.</p>
                                        <div class="testmonial_author">
                                            <div class="thumb">
                                                <img src="{{ asset('img/testmonial/1.png') }}" alt="">
                                            </div>
                                            <h4>Atayew Kemal</h4>
                                            <div class="stars">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_carousel">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="single_testmonial text-center">
                                        <p>Эпические чизбургеры бывают в самых разных проявлениях, но мы хотим, чтобы они были у нас во рту, несмотря ни на что. Засуньте эти размятые котлеты с нежно карамелизированным мясным жиром между поджаренной булочкой бриошь и передайте ее по наследству. Вы влюбляетесь в сам чизбургер, но и поездка к нему не так уж плоха.</p>
                                        <div class="testmonial_author">
                                            <div class="thumb">
                                                <img src="{{ asset('img/testmonial/2.png') }}" alt="">
                                            </div>
                                            <h4>Atayew Kemal</h4>
                                            <div class="stars">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_carousel">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="single_testmonial text-center">
                                        <p>Эпические чизбургеры бывают в самых разных проявлениях, но мы хотим, чтобы они были у нас во рту, несмотря ни на что. Засуньте эти размятые котлеты с нежно карамелизированным мясным жиром между поджаренной булочкой бриошь и передайте ее по наследству. Вы влюбляетесь в сам чизбургер, но и поездка к нему не так уж плоха.</p>
                                        <div class="testmonial_author">
                                            <div class="thumb">
                                                <img src="{{ asset('img/testmonial/3.png') }}" alt="">
                                            </div>
                                            <h4>A.K Orazovich</h4>
                                            <div class="stars">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonial_area_ned  -->

    <!-- instragram_area_start -->
    <div class="instragram_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="single_instagram">
                        <img src="{{ asset('img/instragram/1.png') }}" alt="">
                        <div class="ovrelay">
                            <a href="#">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single_instagram">
                        <img src="{{ asset('img/instragram/2.png') }}" alt="">
                        <div class="ovrelay">
                            <a href="#">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single_instagram">
                        <img src="{{ asset('img/instragram/3.png') }}" alt="">
                        <div class="ovrelay">
                            <a href="#">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single_instagram">
                        <img src="{{ asset('img/instragram/4.png') }}" alt="">
                        <div class="ovrelay">
                            <a href="#">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- instragram_area_end -->
@endsection