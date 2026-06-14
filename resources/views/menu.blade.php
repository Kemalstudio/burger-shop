@extends('layouts.app')

@section('title', 'Menu')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/menu.css') }}">
@endpush
@push('scripts')
<script src="{{ asset('js/menu.js') }}" defer></script>
@endpush

@section('content')

<!-- bradcam_area_start -->
<div class="bradcam_area breadcam_bg overlay">
    <h3>Меню</h3>
</div>
<!-- bradcam_area_end -->

<div class="menu-page-container">
    <div class="container menu-layout-wrapper">
        <!-- ================================== -->
        <!-- БОКОВАЯ ПАНЕЛЬ НАВИГАЦИИ (ASIDE) -->
        <!-- ================================== -->
        <aside class="menu-sidebar">
            <ul class="sidebar-category-list">
                <li><a href="#" class="sidebar-category-item active" data-filter="all"><img src="https://img.icons8.com/ios-filled/50/FA5252/star.png" alt="Популярное" /><span>Популярное</span></a></li>
                <li><a href="#" class="sidebar-category-item" data-filter="new"><img src="https://img.icons8.com/ios-filled/50/FA5252/new.png" alt="Новинки" /><span>Новинки</span></a></li>
                <li><a href="#" class="sidebar-category-item" data-filter="parent-2"><img src="https://img.icons8.com/ios-filled/50/FA5252/hamburger.png" alt="Бургеры" /><span>Бургеры</span></a></li>
                <li><a href="#" class="sidebar-category-item" data-filter="parent-3"><img src="https://img.icons8.com/ios-filled/50/FA5252/wrap.png" alt="Роллы" /><span>Роллы</span></a></li>
                <li><a href="#" class="sidebar-category-item" data-filter="parent-4"><img src="https://img.icons8.com/ios-filled/50/FA5252/french-fries.png" alt="Картофель" /><span>Картофель</span></a></li>
                <li><a href="#" class="sidebar-category-item" data-filter="parent-5"><img src="https://img.icons8.com/ios-filled/50/FA5252/soda-cup.png" alt="Напитки" /><span>Напитки</span></a></li>
                <li><a href="#" class="sidebar-category-item" data-filter="parent-6"><img src="https://img.icons8.com/ios-filled/50/FA5252/ice-cream-cone.png" alt="Десерты" /><span>Десерты</span></a></li>
                <li><a href="#" class="sidebar-category-item" data-filter="parent-7"><img src="https://img.icons8.com/ios-filled/50/FA5252/sauce.png" alt="Соусы" /><span>Соусы</span></a></li>
            </ul>
        </aside>

        <main class="product-grid-area">
            <div class="product-grid">
                @if($products->isEmpty())
                <p>В этой категории пока нет товаров.</p>
                @else
                @foreach($products as $product)
                 <div class="menu-product-card"
                     data-product-id="{{ $product->id }}"
                     data-parent-category="parent-{{ $product->category_id }}"
                     data-is-popular="{{ $product->is_popular ? 'true' : 'false' }}"
                     data-is-new="{{ $product->is_new ? 'true' : 'false' }}"
                     data-name="{{ $product->name }}"
                     data-image="{{ $product->image }}"
                     data-description="{{ $product->description }}"
                     data-base-price="{{ $product->price }}"
                     data-weight="{{ $product->weight }}"
                     data-default-ingredients="{{ $product->default_ingredients }}"
                     data-additives='@json($product->additives)'>

                    <div class="card-image-wrapper">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}">
                        @if($product->is_popular)
                        <div class="product-badge">Хит</div>
                        @elseif($product->is_new)
                        <div class="product-badge new">Новинка</div>
                        @endif
                    </div>

                    <div class="card-content-wrapper">
                        <div class="card-text-content">
                            <h4>{{ $product->name }}</h4>
                            <p>{{ \Illuminate\Support\Str::limit($product->description, 50) }}</p>
                        </div>
                        <footer class="menu-product-footer">
                            <span class="menu-product-price">{{ number_format($product->price, 2) }} TMT</span>
                            <div class="product-actions">
                                <button type="button" class="favorite-toggle-btn" data-product-id="{{ $product->id }}">❤</button>
                                <button type="button" class="menu-product-select-btn">Выбрать</button>
                            </div>
                        </footer>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </main>
    </div>
</div>

<!-- ======================================== -->
<!-- МОДАЛЬНОЕ ОКНО (POP-UP) - СТАРЫЙ ДИЗАЙН -->
<!-- ======================================== -->
<div class="modal-overlay hidden"></div>
<div class="product-modal hidden">
    <button type="button" class="modal-close-button">&times;</button>
    <div class="modal-content-wrapper">
        <div class="modal-image-container">
            <img id="modal-product-image" src="" alt="Изображение продукта">
        </div>
        <div class="modal-details-container">
            <div class="modal-details-header">
                <h1 id="modal-product-name">Название продукта</h1>
                <span id="modal-product-weight">114 г</span>
            </div>
            <p id="modal-product-description">Загрузка...</p>

            <div id="modal-removable-ingredients-section" class="modal-ingredients-section">
                <h4>Убрать ингредиенты</h4>
                <div id="modal-removable-ingredients" class="ingredients-chips-container">
                    <!-- Ингредиенты для удаления будут добавлены сюда с помощью JS -->
                </div>
            </div>

            <div id="modal-additives-section" class="modal-additives-section">
                <h4>Добавить по вкусу</h4>
                <div id="modal-additives-grid" class="additives-grid">
                    <!-- Добавки будут динамически вставлены сюда с помощью JS -->
                </div>
            </div>

            <div class="modal-footer">
                <div class="quantity-selector">
                    <button class="quantity-btn" id="quantity-decrease">-</button>
                    <span id="quantity-value">1</span>
                    <button class="quantity-btn" id="quantity-increase">+</button>
                </div>
                <button type="button" class="modal-add-to-cart-btn">
                    Добавить в корзину за <span id="modal-total-price">0.00</span> TMT
                </button>
            </div>
        </div>
    </div>
</div>

@endsection