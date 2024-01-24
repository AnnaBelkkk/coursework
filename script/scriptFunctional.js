'use strict';
//импорт адреса url
import {url, urlId, urlAdres} from './scriptPageTransition.js'

//функция для смены url адреса
async function a() {
    let menuItems = document.querySelectorAll('.dropdown-item');
// Получаем элемент с классом "title_nav"
    let titleNav = document.querySelector('#select_home');
// Добавляем обработчик события клика на каждый пункт меню
    menuItems.forEach(function (item) {
        item.addEventListener('click', async function (event) {
            // Отменяем стандартное действие ссылки
            event.preventDefault();
            window.location.href = item.href
            // Получаем текст выбранного пункта меню
            let menuItemText = item.textContent;
            titleNav = item.id;

        });
    })

}
a()

