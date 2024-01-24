
//эта функция убирает скрол на сайте и более плавно и красиво делает переход между блоками на главной странице
// import {pageImgText} from './scriptPageTransition.js'
import contentSearch from "../contentSearch.json";
import {url, urlAdres, urlId} from "./scriptPageTransition.js";
//функция для прокрутки на сайте
function Scrolling() {
    const blocksContainer = document.querySelector('.main__blocks');
    const blocks = document.querySelectorAll('.block_item');

    let currentBlockIndex = 0;
if (blocksContainer != null) {
    blocksContainer.addEventListener('wheel', (e) => {
        e.preventDefault();

        const delta = e.deltaY;

        if (delta > 0 && currentBlockIndex < blocks.length - 1) {
            currentBlockIndex++;
        } else if (delta < 0 && currentBlockIndex > 0) {
            currentBlockIndex--;
        }

        blocks[currentBlockIndex].scrollIntoView({behavior: 'smooth'});
    });
}else {
    console.log('функция скролла здесь недоступна')
}
}
//эта функция меняет содержание айди и тескта в выпадающем меню
export function changingTextValueTheDrop_DawnMenu() {
    let menuItems = document.querySelectorAll('.dropdown-item');
    let titleNav = document.querySelector('#select_home');
    let titleNav2 = document.querySelector('#select_home');
    menuItems.forEach(function (item) {
        item.addEventListener('click', function (event) {
            // Отменяем стандартное действие ссылки
            event.preventDefault();
            let menuItemText = item.textContent;
            titleNav.textContent = menuItemText;
            titleNav.id = item.id;
        });
    })
}

Scrolling()
changingTextValueTheDrop_DawnMenu()

 let searchData;
searchData = contentSearch.contentSearch


if (contentSearch != null) {
    document.getElementById('search_form').addEventListener('submit', function (event) {
        event.preventDefault(); // Предотвращаем отправку формы для обновления страницы
        let content_block = document.createElement('div')
        content_block.classList.add('content_block')
        const searchTerm = this.querySelector('.input_search').value;
        let main__blocks = document.querySelector('.main_container')
        let main__blocks_hrefSearch = document.createElement('div')
        main__blocks_hrefSearch.classList.add('main__blocks_hrefSearch')
        let pSearcText = document.createElement('p')
        pSearcText.textContent = 'вернутся на главную'
        pSearcText.setAttribute('tabindex', '0')
        pSearcText.classList.add('pSearcText')
        function searchContent(searchTerm, contentArray) {
            console.log(url)
            let results = [];
            contentArray.forEach((item, index) => {
                if (item && searchTerm !== "" && searchTerm !== " " && searchTerm !== "   " && searchTerm !== "  " && item.textContent && item.textContent.includes(searchTerm)) {
                    results.push({index, item});
                }
            });
            let title_href = document.createElement('h2')
            title_href.textContent = 'Результат поиска:'
            title_href.classList.add('title_href')
            title_href.setAttribute('tabindex', '0')
            let arrowImgBtn = document.createElement('button')
            arrowImgBtn.classList.add('arrow_back_Two')
            let arrowImg = document.createElement('img')
            arrowImgBtn.append(arrowImg,pSearcText)
            arrowImg.src = '../img/arrowBack.png'
            arrowImg.classList.add('imgArrowBack')
            if (results.length > 0) {
                if (main__blocks === null) {
                    main__blocks = document.querySelector('.main__block')
                }
                main__blocks.innerHTML = '';
                main__blocks_hrefSearch.innerHTML = '';
                main__blocks_hrefSearch.append(arrowImgBtn)
                main__blocks_hrefSearch.append(title_href)
                for (let i in results) {
                    let main = document.querySelector('.main')
                    main.style.display = 'flex'
                    main__blocks_hrefSearch.innerHTML += `
                    <a class="search_href" target="_blank" href="http://localhost:5173/pageTransition/index.html?=${results[i].item.id}">${results[i].item.title}</a>`
                }
                console.log(main__blocks_hrefSearch.style.height)
                main__blocks.style.paddingBottom = '100px'
                main__blocks.style.height = '100%'
                main__blocks.style.backgroundColor = '#69755F'
                main__blocks.append(main__blocks_hrefSearch)

                let main = document.querySelector('.main')
                if (['news','intelligence','organization','spiritual','service','medical','education','social','thank','contacts','help','schedule','base', 'structure', 'documents', 'educations', 'educationStandart', 'teacher', 'security', 'scholarship', 'available', 'international'].includes(urlId) || urlId === false ){
                    main.style.removeProperty('height')

                    if (results.length < 15){
                        main.style.height = '100%'
                    }
                    main__blocks.style.paddingBottom = '100px'
                } else {
                    main.style.height = '100%'
                    main__blocks.style.paddingBottom = '100px'
                }

            } else {
                if (main__blocks === null) {
                    main__blocks = document.querySelector('.main__block')
                }
                main__blocks.innerHTML = '';
                main__blocks_hrefSearch.innerHTML = '';
                let main = document.querySelector('.main')
                main.style.height = '100%'
                main__blocks.style.paddingBottom = '100px'
                main__blocks.style.height = '100%'
                main__blocks.style.backgroundColor = '#69755F'
                main__blocks_hrefSearch.innerHTML += `
                <button class="arrow_back_Two">
                <img src="../img/arrowBack.png" class="imgArrowBack">
                <p class="pSearcText">вернутся на главную</p></button>
            <h2 tabindex="0" class="title_href">Ничего не найдено :(</h2>
                   `
                main__blocks.append(main__blocks_hrefSearch)
                let arrowImgBtn = document.querySelector('.arrow_back_Two')

            }
            let arrowImgBtn2 = document.querySelector('.arrow_back_Two')
            arrowImgBtn2.addEventListener('click', e => {
                window.location.href = 'http://localhost:5173/index.html'
            })
        }

        // Вызываем функцию для поиска и отображения результата
        searchContent(searchTerm, searchData);
    });
} else {
    console.log('поиск недоступен')
}