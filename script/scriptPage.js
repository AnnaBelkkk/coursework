//импорт функций, переменных и json объектов
import {pageStandart, pageSlider, pageImgText, url, urlId, urlAdres} from './scriptPageTransition.js'
import baseBlocks from "../db_baseBlocks.json";
import blockslinks from "../blocks.json";

//глобальные переменные
let text;
let img;
let main_blocks = document.querySelector('.main__block')
let arrayValue = baseBlocks.baseBlocks[urlId]
let content_block = document.getElementById('content_block')
let createTitle = document.createElement('h2')
createTitle.tabIndex = 0;
let array;
let count = 1;
let blocks = blockslinks.blockslinks
let blocksTwo;
export {main_blocks, arrayValue, content_block, createTitle, array, count, blocks, text, img}
//условия для которых выбирается какие объекты будут использоваться
if (['base', 'structure', 'documents', 'educations', 'educationStandart', 'teacher', 'security', 'scholarship', 'available', 'international'].includes(urlId)) {
    blocksTwo = blockslinks.blockslinks[urlId][0]
    array = blocksTwo;
} else if(urlId === "%D0%9F%D0%B5%D1%80%D0%B5%D1%87%D0%B5%D0%BD%D1%8C"){
    console.log('распределение id недоступно')
}
else {
    array = arrayValue[0];
}
//условие для заполнения картинкой или текстом для переменных
if (array.block !== undefined) {
    text = array.block.textContent;
    img = array.block.images
} else if (array === undefined) {
    console.log('недоступно')
}

//условия для вызова определенных функций, под разные значения объектов и перемдача переменных как параметров
if (urlId === 'news') {
    pageStandart(arrayValue, array, main_blocks)
} else if (['intelligence', 'organization', 'social', 'education', 'help', 'schedule', 'service', 'medical', 'contacts', 'base', 'structure', 'documents', 'educations', 'educationStandart', 'teacher', 'security', 'scholarship', 'international'].includes(urlId)) {
    pageImgText(main_blocks, arrayValue, content_block, createTitle, array, count, blocks, text, img)

} else if (['spiritual', 'thank', 'available'].includes(urlId)) {
    pageSlider(main_blocks, arrayValue, content_block, createTitle, array, count, blocks, text, img)
}

