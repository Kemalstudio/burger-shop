document.addEventListener('DOMContentLoaded', function () {
    // =================================================================
    // ОБРАБОТКА ФИЛЬТРАЦИИ ПО КАТЕГОРИЯМ
    // =================================================================
    const categoryLinks = document.querySelectorAll('.sidebar-category-item');
    const productCards = document.querySelectorAll('.menu-product-card');

    categoryLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            categoryLinks.forEach(l => l.classList.remove('active'));
            this.classList.add('active');

            const filter = this.dataset.filter;

            productCards.forEach(card => {
                const isPopular = card.dataset.isPopular === 'true';
                const isNew = card.dataset.isNew === 'true';
                const parentCategory = card.dataset.parentCategory;

                let show = false;
                if (filter === 'all' && isPopular) {
                    show = true;
                } else if (filter === 'new' && isNew) {
                    show = true;
                } else if (filter === parentCategory) {
                    show = true;
                }

                card.style.display = show ? 'flex' : 'none';
            });
        });
         // Trigger click on 'popular' by default
         if (link.dataset.filter === 'all') {
            link.click();
        }
    });


    // =================================================================
    // ПЕРЕМЕННЫЕ ДЛЯ РАБОТЫ С МОДАЛЬНЫМ ОКНОМ
    // =================================================================
    const modal = document.querySelector('.product-modal');
    const overlay = document.querySelector('.modal-overlay');
    const closeModalBtn = document.querySelector('.modal-close-button');

    // Элементы внутри модального окна
    const modalImage = document.getElementById('modal-product-image');
    const modalName = document.getElementById('modal-product-name');
    const modalWeight = document.getElementById('modal-product-weight');
    const modalDescription = document.getElementById('modal-product-description');
    
    const removableIngredientsSection = document.getElementById('modal-removable-ingredients-section');
    const removableIngredientsContainer = document.getElementById('modal-removable-ingredients');

    const additivesSection = document.getElementById('modal-additives-section');
    const additivesContainer = document.getElementById('modal-additives-grid');

    const modalTotalPriceSpan = document.getElementById('modal-total-price');

    // Элементы управления количеством
    const quantityDecreaseBtn = document.getElementById('quantity-decrease');
    const quantityIncreaseBtn = document.getElementById('quantity-increase');
    const quantityValueSpan = document.getElementById('quantity-value');

    // Переменные для расчетов
    let currentBasePrice = 0;
    let currentAdditivesPrice = 0;
    let currentQuantity = 1;

    // =================================================================
    // ФУНКЦИИ ДЛЯ УПРАВЛЕНИЯ МОДАЛЬНЫМ ОКНОМ
    // =================================================================
    function openModal() {
        modal.classList.remove('hidden');
        overlay.classList.remove('hidden');
    }

    function closeModal() {
        modal.classList.add('hidden');
        overlay.classList.add('hidden');
    }

    function updateTotalPrice() {
        const total = (currentBasePrice + currentAdditivesPrice) * currentQuantity;
        modalTotalPriceSpan.textContent = total.toFixed(2);
    }

    // =================================================================
    // ГЛАВНАЯ ФУНКЦИЯ: ЗАПОЛНЕНИЕ МОДАЛЬНОГО ОКНА ДАННЫМИ
    // =================================================================
    function populateModal(productCard) {
        currentBasePrice = parseFloat(productCard.dataset.basePrice);
        currentAdditivesPrice = 0;
        currentQuantity = 1;
        quantityValueSpan.textContent = currentQuantity;

        modalName.textContent = productCard.dataset.name;
        modalImage.src = productCard.dataset.image;
        modalDescription.textContent = productCard.dataset.description;
        modalWeight.textContent = `${productCard.dataset.weight} г`;

        removableIngredientsContainer.innerHTML = '';
        additivesContainer.innerHTML = '';

        const defaultIngredients = productCard.dataset.defaultIngredients;
        if (defaultIngredients && defaultIngredients.trim() !== '') {
            removableIngredientsSection.classList.remove('hidden');
            defaultIngredients.split(',').forEach(ingredientName => {
                const chip = document.createElement('div');
                chip.className = 'ingredient-chip';
                chip.textContent = ingredientName.trim();
                const toggleIcon = document.createElement('span');
                toggleIcon.className = 'toggle-icon';
                toggleIcon.innerHTML = '&ndash;';
                chip.appendChild(toggleIcon);
                chip.addEventListener('click', () => {
                    chip.classList.toggle('removed');
                    toggleIcon.innerHTML = chip.classList.contains('removed') ? '&#43;' : '&ndash;';
                });
                removableIngredientsContainer.appendChild(chip);
            });
        } else {
            removableIngredientsSection.classList.add('hidden');
        }

        const additives = JSON.parse(productCard.dataset.additives);
        if (additives && additives.length > 0) {
            additivesSection.classList.remove('hidden');
            additives.forEach(additive => {
                const additiveCard = document.createElement('div');
                additiveCard.className = 'additive-card';
                additiveCard.dataset.price = additive.price;
                additiveCard.innerHTML = `
                    <img src="/${additive.image}" alt="${additive.name}" class="additive-image">
                    <div class="additive-info">
                        <h5 class="additive-name">${additive.name}</h5>
                        <span class="additive-price">+ ${parseFloat(additive.price).toFixed(2)} TMT</span>
                    </div>
                    <button class="additive-toggle-btn">+</button>
                `;
                additiveCard.addEventListener('click', () => {
                    const price = parseFloat(additiveCard.dataset.price);
                    const toggleBtn = additiveCard.querySelector('.additive-toggle-btn');
                    additiveCard.classList.toggle('selected');
                    if (additiveCard.classList.contains('selected')) {
                        currentAdditivesPrice += price;
                        toggleBtn.textContent = '✓';
                    } else {
                        currentAdditivesPrice -= price;
                        toggleBtn.textContent = '+';
                    }
                    updateTotalPrice();
                });
                additivesContainer.appendChild(additiveCard);
            });
        } else {
            additivesSection.classList.add('hidden');
        }

        updateTotalPrice();
        openModal();
    }

    // =================================================================
    // НАЗНАЧЕНИЕ ОБРАБОТЧИКОВ СОБЫТИЙ
    // =================================================================
    productCards.forEach(card => {
        card.addEventListener('click', (event) => {
            // Открываем модальное окно только если клик не был по кнопке (чтобы избежать двойного срабатывания)
            if (!event.target.closest('.menu-product-select-btn')) {
                populateModal(card);
            }
        });
    });

    // Отдельный обработчик для кнопок
    document.querySelectorAll('.menu-product-select-btn').forEach(btn => {
        btn.addEventListener('click', (event) => {
            event.stopPropagation(); // Предотвращаем "всплытие" события до карточки
            const productCard = btn.closest('.menu-product-card');
            populateModal(productCard);
        });
    });

    closeModalBtn.addEventListener('click', closeModal);
    overlay.addEventListener('click', (event) => {
        if (event.target === overlay) {
            closeModal();
        }
    });

    quantityIncreaseBtn.addEventListener('click', () => {
        currentQuantity++;
        quantityValueSpan.textContent = currentQuantity;
        updateTotalPrice();
    });

    quantityDecreaseBtn.addEventListener('click', () => {
        if (currentQuantity > 1) {
            currentQuantity--;
            quantityValueSpan.textContent = currentQuantity;
            updateTotalPrice();
        }
    });
});