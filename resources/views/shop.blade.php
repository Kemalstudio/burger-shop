@extends('layouts.app')

@section('title', 'Shop')

@php
// Данные о товарах. В будущем они будут приходить из базы данных.
$products = [
    [
        'name' => 'Классический Чизбургер',
        'price' => '85 TMT',
        'image' => 'img/burger/1.png',
    ],
    [
        'name' => 'Двойной Бифбургер',
        'price' => '120 TMT',
        'image' => 'img/burger/2.png',
    ],
    [
        'name' => 'Куриный Бургер',
        'price' => '75 TMT',
        'image' => 'img/burger/3.png',
    ],
    [
        'name' => 'Картофель Фри',
        'price' => '35 TMT',
        'image' => 'img/burger/fries.png', // Вам нужно будет добавить это изображение
    ],
    [
        'name' => 'Острые Крылышки',
        'price' => '65 TMT',
        'image' => 'img/burger/wings.png', // Вам нужно будет добавить это изображение
    ],
    [
        'name' => 'Кока-Кола',
        'price' => '15 TMT',
        'image' => 'img/burger/coke.png', // Вам нужно будет добавить это изображение
    ],
];
@endphp

@section('content')

    <!-- bradcam_area_start -->
    <div class="bradcam_area breadcam_bg_2 overlay">
        <h3>Магазин</h3>
    </div>
    <!-- bradcam_area_end -->

    <!-- Shop Area Start -->
    <div class="shop_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center mb-80">
                        <span>Наше Меню</span>
                        <h3>Выберите то, что вам по вкусу</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($products as $product)
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="product-card">
                        <div class="product-image-container">
                            <img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}">
                            <div class="product-actions">
                                <a href="#" title="Добавить в избранное"><i class="fa fa-heart-o"></i></a>
                                <a href="#" title="Сравнить"><i class="fa fa-exchange"></i></a>
                            </div>
                        </div>
                        <div class="product-details">
                            <h3>{{ $product['name'] }}</h3>
                            <p class="product-price">{{ $product['price'] }}</p>
                            <a href="#" class="add-to-cart-btn">Добавить в корзину</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Shop Area End -->

@endsection