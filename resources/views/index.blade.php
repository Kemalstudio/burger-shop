@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <!-- Modal start -->
    <div id="promoModal" class="modals">
        <div class="modals-content">
            <span class="close" id="closeModal">&times;</span>
            <img src="{{ asset('img/burger/burger dox.jpg') }}" alt="Бургер" class="modal-image">
            <h2 class="burger__text-modal" style="color: #FF6347;">🍔 Торопитесь!</h2>
            <p style="font-size: 1.2em; line-height: 1.5;">Не упустите шанс насладиться нашими бургерами по специальной
                цене! Эта акция только для вас.</p>

            <div class="price-info"
                style="background-color: #f8f8f8; padding: 15px; border-radius: 8px; margin: 15px 0;">
                <p><strong style="color: #FF6347;">Обычная цена:</strong> <span
                        style="text-decoration: line-through;">200TMT</span></p>

                <p><strong style="color: #FF6347;">Скидка:</strong> <span
                        style="font-size: 1.5em; color: #28a745;">150TMT</span></p>

                <p><strong style="color: #c40404;">Доставка:</strong> <span
                        style="font-size: 1.5em; color: #151515;">5TMT</span></p>
            </div>

            <button class="cta-button"
                style="background-color: #FF6347; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Узнать
                больше</button>
        </div>
    </div>
    <!-- Modal end -->

    <!-- slider start -->
    <div class="slider_area">
        <div class="slider_active owl-carousel">
            <div class="single_slider  d-flex align-items-center slider_bg_1 overlay">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-xl-9 col-md-9 col-md-12">
                            <div class="slider_text text-center">
                                <div class="deal_text">
                                    <span>Большая сделка</span>
                                </div>
                                <h3 class="typing-text">Burger <br>
                                    Bachelor</h3>
                                <h4 class="animated-text">Максикан</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider  d-flex align-items-center slider_bg_2 overlay">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-xl-9 col-md-9 col-md-12">
                            <div class="slider_text text-center">
                                <div class="deal_text">
                                    <span>Большая сделка</span>
                                </div>
                                <h3 class="typing-text">Burger <br>
                                    Bachelor</h3>
                                <h4 class="animated-text">Максикан</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider end -->

    <!-- best burgers start  -->
    <div class="best_burgers_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center mb-80">
                        <span>Меню бургера</span>
                        <h3>Лучшие бургеры</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-md-6 col-lg-6">
                    <div class="single_delicious d-flex align-items-center">
                        <div class="thumb">
                            <img src="{{ asset('img/burger/1.png') }}" alt="">
                        </div>
                        <div class="info">
                            <h3>Beefy Burgers</h3>
                            <p>Отличный способ вызвать доверие к своему бизнесу и сделать его актуальным.</p>
                            <span>100TMT</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="single_delicious d-flex align-items-center">
                        <div class="thumb">
                            <img src="{{ asset('img/burger/2.png') }}" alt="">
                        </div>
                        <div class="info">
                            <h3>Burger Boys</h3>
                            <p>Отличный способ вызвать доверие к своему бизнесу и сделать его актуальным.</p>
                            <span>85TMT</span>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single_delicious d-flex align-items-center">
                        <div class="thumb">
                            <img src="{{ asset('img/burger/3.png') }}" alt="">
                        </div>
                        <div class="info">
                            <h3>Burger Bizz</h3>
                            <p>Отличный способ вызвать доверие к своему бизнесу и сделать его актуальным.</p>
                            <span>55TMT</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-lg-6">
                    <div class="single_delicious d-flex align-items-center">
                        <div class="thumb">
                            <img src="{{ asset('img/burger/4.png') }}" alt="">
                        </div>
                        <div class="info">
                            <h3>Crackles Burger</h3>
                            <p>Отличный способ вызвать доверие к своему бизнесу и сделать его актуальным.</p>
                            <span>75TMT</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single_delicious d-flex align-items-center">
                        <div class="thumb">
                            <img src="{{ asset('img/burger/5.png') }}" alt="">
                        </div>
                        <div class="info">
                            <h3>Bull Burgers</h3>
                            <p>Отличный способ вызвать доверие к своему бизнесу и сделать его актуальным.</p>
                            <span>55TMT</span>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single_delicious d-flex align-items-center">
                        <div class="thumb">
                            <img src="{{ asset('img/burger/6.png') }}" alt="">
                        </div>
                        <div class="info">
                            <h3>Rocket Burgers</h3>
                            <p>Отличный способ вызвать доверие к своему бизнесу и сделать его актуальным.</p>
                            <span>120TMT</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single_delicious d-flex align-items-center">
                        <div class="thumb">
                            <img src="{{ asset('img/burger/7.png') }}" alt="">
                        </div>
                        <div class="info">
                            <h3>Smokin Burger</h3>
                            <p>Отличный способ вызвать доверие к своему бизнесу и сделать его актуальным.</p>
                            <span>100TMT</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single_delicious d-flex align-items-center">
                        <div class="thumb">
                            <img src="{{ asset('img/burger/8.png') }}" alt="">
                        </div>
                        <div class="info">
                            <h3>Delish Burger</h3>
                            <p>Отличный способ вызвать доверие к своему бизнесу и сделать его актуальным.</p>
                            <span>100TMT</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="iteam_links">
                        <a class="boxed-btn5" href="{{ url('/menu') }}">Заказать</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- best burgers end  -->

    <!-- features start -->
    <div class="Burger_President_area">
        <div class="Burger_President_here">
            <div class="single_Burger_President">
                <div class="room_thumb">
                    <img src="{{ asset('img/burgers/1.png') }}" alt="">
                    <div class="room_heading d-flex justify-content-between align-items-center">
                        <div class="room_heading_inner">
                            <span>200 TMT</span>
                            <h3>Президент бургера</h3>
                            <p>Отличный способ создать видимость доверия к вашему бизнесу <br> и актуальным.</p>
                            <a href="#" class="boxed-btn3" id="orderNowButton1">Заказать сейчас</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="single_Burger_President">
                <div class="room_thumb">
                    <img src="{{ asset('img/burgers/2.png') }}" alt="">
                    <div class="room_heading d-flex justify-content-between align-items-center">
                        <div class="room_heading_inner">
                            <span>200 TMT</span>
                            <h3>Президент бургера</h3>
                            <p>Отличный способ создать видимость доверия к вашему бизнесу <br> и актуальным.</p>
                            <a href="#" class="boxed-btn3" id="orderNowButton2">Заказать сейчас</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- features end -->

    <!-- Модальное окно -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeButton">&times;</span>
            <h2>Хотите заказать Президент Бургер?</h2>
            <div class="cart-icon">
                <img class="img__burger" src="{{ asset('img/burger/burger dox.jpg') }}" alt="Корзина" />
            </div>
            <h3>Заказать прямо сейчас</h3>
            <p>Введите ваши данные для заказа:</p>

            <!-- Форма для ввода данных -->
            <form id="orderForm">
                <label for="name">Имя:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" placeholder="email@gmail.com" name="email" required>

                <label for="phone">Телефон:</label>
                <input type="tel" id="phone" placeholder="+993 __ __ __ __" name="phone" required>

                <div id="region">
                    <img id="flag" src="" alt="Флаг" style="display: none;">
                    <span>Регион: </span>
                </div>

                <button type="submit" class="submit-btn">Заказать</button>
            </form>

            <div class="price-container">
                <h4>Цена: <span class="price">165 TMT</span></h4>
            </div>
        </div>
    </div>
    <!-- Модальное окно end -->

    <!-- about start -->
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
                        <p>Эпические чизбургеры бывают в самых разных проявлениях, но мы хотим, чтобы они были у нас во
                            рту, несмотря ни на что. Засуньте эти размятые котлеты с нежно карамелизированным мясным
                            жиром между поджаренной булочкой бриошь и передайте ее по наследству. Вы влюбляетесь в сам
                            чизбургер, но и поездка к нему не так уж плоха.
                            Они - друзья детства, которые знают ваши самые высокие и самые низкие достижения. Они были с
                            вами и в горе, и в радости, и они лучше всех умеют хранить секреты. Неважно, нарядные они
                            или неформальные, чизбургеры прикроют вашу спину.
                            Иногда мы теряем из виду то, что действительно важно в жизни. Есть что-то, что можно сказать
                            об изысканном бургере с бри и трюфелем в сочетании с пармезаном, но не позволяйте себе
                            забыть о старом добром чизбургере с американским чеддером и сдобной булочкой.</p>
                        <div class="img_thumb">
                            <img src="{{ asset('img/jessica-signature.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about end -->

    <!-- video start -->
    <div class="video_area video_bg overlay">
        <div class="video_area_inner text-center">
            <h3>Burger <br>
                Bachelor</h3>
            <span>Как мы готовим вкусный бургер</span>
            <div class="video_payer">
                <a href="{{ asset('img/burger/cnava-videos-animation-2_aRCHs8gH.mp4') }}" class="video_btn popup-video">
                    <i class="fa fa-play"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- video end -->

    <!-- testimonial start  -->
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
                                        <p>Существует множество вариантов отрывков Lorem Ipsum, но большинство из них
                                            в той или иной форме подверглись изменениям: в них добавлен юмор или
                                            случайные слова, которые не выглядят
                                            даже слегка неправдоподобными.</p>
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
                                        <p>Существует множество вариантов отрывков Lorem Ipsum, но большинство из них
                                            в той или иной форме подверглись изменениям: в них добавлен юмор или
                                            случайные слова, которые не выглядят
                                            даже слегка неправдоподобными.</p>
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
                                        <p>Существует множество вариантов отрывков Lorem Ipsum, но большинство из них
                                            в той или иной форме подверглись изменениям: в них добавлен юмор или
                                            случайные слова, которые не выглядят
                                            даже слегка неправдоподобными.</p>
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
    <!-- testimonial end  -->

    <!-- instragram start -->
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
    <!-- instragram end -->

@endsection