
    document.addEventListener('DOMContentLoaded', function() {
    const root = document.documentElement;
    const colors = ['#D0FFCA', '#FFF7CA', '#FFCACA', '#CAFFFF', '#CAD1FF'];
    let currentIndex = 0;

    function changeColors() {
    // Сдвигаем цвета
    const temp = colors[0];
    for (let i = 0; i < colors.length - 1; i++) {
    colors[i] = colors[i + 1];
}
    colors[colors.length - 1] = temp;

    // Обновляем CSS переменные
    root.style.setProperty('--color-1', colors[0]);
    root.style.setProperty('--color-2', colors[1]);
    root.style.setProperty('--color-3', colors[2]);
    root.style.setProperty('--color-4', colors[3]);
    root.style.setProperty('--color-5', colors[4]);
}

    changeColors();
    setInterval(changeColors, 3000);
});






    document.addEventListener('DOMContentLoaded', function() {
        const dropdownButton = document.querySelector('.dropdown-button');

        dropdownButton.addEventListener('click', function(e) {
            // Если кликнули по dropdown-item, обрабатываем отдельно
            if (e.target.classList.contains('dropdown-item')) {
                e.stopPropagation(); // Останавливаем всплытие
                alert('Вы выбрали: ' + e.target.textContent);
                return;
            }

            // Переключаем состояние при клике на основную кнопку
            this.classList.toggle('active');
        });





        function validateUserId(userId) {
            if (!userId) return false;
            if (userId.length < 3) return false;
            const validPattern = /^[a-zA-Z0-9_-]+$/;
            return validPattern.test(userId);
        }

        function showError(message) {
            // Удаляем старую ошибку если есть
            const oldError = document.querySelector('.error-message');
            if (oldError) {
                oldError.remove();
            }

            // Создаем элемент для сообщения об ошибке
            const errorElement = document.createElement('div');
            errorElement.className = 'error-message';
            errorElement.style.cssText = `
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        color: #ff606f;
        font-size: 11px;
        margin-top: 3px;
        padding: 8px 8px;
        border-radius: 4px;
        z-index: 1000;
    `;
            errorElement.textContent = message;

            // Добавляем сообщение об ошибке после контейнера формы
            const formContainer = document.querySelector('.form-container');
            formContainer.style.position = 'relative'; // Делаем контейнер относительным для абсолютного позиционирования ошибки
            formContainer.appendChild(errorElement);

            // Автоматическое удаление через 5 секунд
            setTimeout(() => {
                errorElement.remove();
            }, 115000);
        }

        document.getElementById('userIdForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const userId = this.user_id.value.trim();

            if (validateUserId(userId)) {
                this.submit();
            } else {
                showError('Пожалуйста, введите корректный ID (минимум 3 символа, только латинские буквы)');
            }
        });


        // Дополнительные обработчики для подпунктов (на всякий случай)
        // const dropdownItems = document.querySelectorAll('.dropdown-item');
        // dropdownItems.forEach(item => {
        //     item.addEventListener('click', function(e) {
        //         e.stopPropagation();
        //         // Ваша логика для каждого подпункта
        //         console.log('Выбран пункт:', this.textContent);
        //     });
        // });
    });


