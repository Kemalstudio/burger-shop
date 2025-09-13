@extends('layouts.app')

@section('title', 'Contact')

@section('content')
    <div class="bradcam_area breadcam_bg_2">
        <h3 style="font-family: 'Pacifico', cursive;">CONTACT</h3>
    </div>

    <!-- ================ contact section start ================= -->
    <section class="contact-section">
        <div class="container">
            <div class="d-none d-sm-block mb-5 pb-4">
                {{-- Встроенная карта Google Maps. Не требует изменений --}}
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3148.578534050728!2d58.367659745641085!3d37.893538061649615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f6fff3427146ccd%3A0xf0be1bb1a04b7c4a!2sBurger%20Zone!5e0!3m2!1sen!2s!4v1728888987060!5m2!1sen!2s"
                    width="1110" height="650" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Свяжитесь с нами</h2>
                </div>
                <div class="col-lg-8">

                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="form-contact contact_form" action="{{ route('contact.send') }}" method="post" id="contactForm" novalidate="novalidate">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Введите сообщение'"
                                        placeholder="Введите сообщение"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="name" id="name" type="text"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Введите ваше имя'"
                                        placeholder="Введите ваше имя">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="email" id="email" type="email"
                                        onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Введите адрес электронной почты'"
                                        placeholder="Электронная почта">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="subject" id="subject" type="text"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Введите тему'"
                                        placeholder="Введите тему">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="button button-contactForm boxed-btn">Отправить</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>тг.ц Berkarar. 2эт, 55магазин, Burger Shop.</h3>
                            <p>ул.Ataturk, 1заезд</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <div class="media-body">
                            <h3>+993 64 00 53 74</h3>
                            <p>С пн по пт с 9 утра до 6 вечера</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3>support@burger.com</h3>
                            <p>Присылайте нам свои запросы в любое время!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection