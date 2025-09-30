
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

        // Дополнительные обработчики для подпунктов (на всякий случай)
        const dropdownItems = document.querySelectorAll('.dropdown-item');
        dropdownItems.forEach(item => {
            item.addEventListener('click', function(e) {
                e.stopPropagation();
                // Ваша логика для каждого подпункта
                console.log('Выбран пункт:', this.textContent);
            });
        });
    });
