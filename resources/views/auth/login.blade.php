@extends('layouts.app')

@section('title', 'Вход в аккаунт')

@push('styles')
    <style>
        /* Фоновая секция авторизации */
        .auth-page-area {
            background-image: url('{{ asset("img/banner/burger_bg_1.png") }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 150px 0 100px; /* Отступ сверху для шапки */
        }

        .auth-page-area::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(10, 10, 10, 0.7); /* Темный оверлей */
            z-index: 1;
        }

        /* Эффект матового стекла для карточки */
        .auth-card {
            position: relative;
            z-index: 2;
            background: rgba(25, 25, 25, 0.65);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 50px 40px;
            color: #fff;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
            transition: all 0.4s ease;
        }

        .auth-card:hover {
            box-shadow: 0 20px 60px rgba(240, 84, 44, 0.15);
            border-color: rgba(240, 84, 44, 0.3);
        }

        .auth-title {
            font-family: "Paytone One", sans-serif;
            color: #fff;
            font-size: 36px;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .auth-subtitle {
            font-family: "Raleway", sans-serif;
            color: #cccccc;
            font-size: 15px;
            margin-bottom: 35px;
            line-height: 1.5;
        }

        /* Стили полей ввода */
        .input-group-custom {
            position: relative;
            margin-bottom: 25px;
            text-align: left;
        }

        .input-group-custom label {
            font-family: "Montserrat", sans-serif;
            font-weight: 600;
            color: #F2C64D; /* Золотой цвет как на сайте */
            margin-bottom: 8px;
            display: block;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .input-group-custom input {
            width: 100%;
            background: rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: #fff;
            padding: 16px 20px;
            padding-right: 50px; /* Отступ для иконки глаза */
            border-radius: 10px;
            font-family: "Raleway", sans-serif;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        .input-group-custom input:focus {
            border-color: #F0542C;
            outline: none;
            background: rgba(0, 0, 0, 0.6);
            box-shadow: 0 0 15px rgba(240, 84, 44, 0.2);
        }

        /* Иконка переключения пароля */
        .toggle-password {
            position: absolute;
            right: 18px;
            top: 40px;
            color: #888;
            font-size: 18px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .toggle-password:hover {
            color: #F0542C;
            transform: scale(1.1);
        }

        /* Пользовательский чекбокс */
        .custom-checkbox-wrap {
            display: flex;
            align-items: center;
            position: relative;
            cursor: pointer;
            user-select: none;
            padding-left: 32px;
            font-family: "Raleway", sans-serif;
            color: #bbb;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .custom-checkbox-wrap:hover {
            color: #fff;
        }

        .custom-checkbox-wrap input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        .checkmark {
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            height: 22px;
            width: 22px;
            background-color: rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .custom-checkbox-wrap:hover input ~ .checkmark {
            border-color: #F2C64D;
        }

        .custom-checkbox-wrap input:checked ~ .checkmark {
            background-color: #F0542C;
            border-color: #F0542C;
        }

        .checkmark:after {
            content: "\f00c"; /* FontAwesome check icon */
            font-family: "FontAwesome";
            position: absolute;
            display: none;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 12px;
        }

        .custom-checkbox-wrap input:checked ~ .checkmark:after {
            display: block;
            animation: popIn 0.3s ease forwards;
        }

        @keyframes popIn {
            0% { transform: translate(-50%, -50%) scale(0); }
            80% { transform: translate(-50%, -50%) scale(1.2); }
            100% { transform: translate(-50%, -50%) scale(1); }
        }

        /* Кнопка */
        .auth-btn {
            background: #F0542C;
            color: #fff;
            padding: 16px;
            width: 100%;
            border: 1px solid #F0542C;
            border-radius: 30px;
            font-family: "Paytone One", sans-serif;
            font-size: 16px;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.4s ease;
            cursor: pointer;
            margin-top: 15px;
        }

        .auth-btn:hover {
            background: transparent;
            color: #F0542C;
            box-shadow: 0 10px 20px rgba(240, 84, 44, 0.3);
        }

        .auth-link {
            color: #F2C64D;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }

        .auth-link:hover {
            color: #F0542C;
        }
    </style>
@endpush

@section('content')
    <div class="auth-page-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10">
                    <div class="auth-card text-center">
                        <h2 class="auth-title">С возвращением!</h2>
                        <p class="auth-subtitle">Войдите, чтобы оформлять заказы быстрее и получать персональные скидки.</p>

                        <form action="{{ route('login') }}" method="POST">
                            @csrf

                            <div class="input-group-custom">
                                <label for="email">Электронная почта</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="example@gmail.com" required>
                                @error('email')
                                <span class="text-danger small d-block mt-2" style="font-family: 'Raleway', sans-serif;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="input-group-custom">
                                <label for="password">Пароль</label>
                                <input type="password" name="password" id="password" placeholder="Введите ваш пароль" required>
                                <i class="fa fa-eye toggle-password" data-target="#password"></i>
                                @error('password')
                                <span class="text-danger small d-block mt-2" style="font-family: 'Raleway', sans-serif;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4 mt-2">
                                <label class="custom-checkbox-wrap"> Запомнить меня
                                    <input type="checkbox" name="remember" id="remember">
                                    <span class="checkmark"></span>
                                </label>
                            </div>

                            <button type="submit" class="auth-btn">Войти</button>

                            <div class="mt-4" style="font-family: 'Raleway', sans-serif; color: #aaa; font-size: 15px;">
                                Нет аккаунта? <a href="{{ route('register') }}" class="auth-link">Создайте сейчас</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Скрипт для плавной смены иконки и показа пароля
        document.querySelectorAll('.toggle-password').forEach(function(icon) {
            icon.addEventListener('click', function() {
                let targetId = this.getAttribute('data-target');
                let input = document.querySelector(targetId);

                if (input.type === 'password') {
                    input.type = 'text';
                    // Смена иконки
                    this.classList.remove('fa-eye');
                    this.classList.add('fa-eye-slash');
                    this.style.color = '#F0542C';
                } else {
                    input.type = 'password';
                    // Возврат иконки
                    this.classList.remove('fa-eye-slash');
                    this.classList.add('fa-eye');
                    this.style.color = '#888';
                }
            });
        });
    </script>
@endpush
