import {open} from "./scriptPageTransition.js";

let url = window.location.href.toString();
let urlId = open(url);

//функция для дополнительных ссылок
export async function linksPdf(urlId) {
    let undefined = document.querySelectorAll('#undefined')
    if (undefined === undefined) {
        let count = 1;
        let text_itemtext = document.querySelectorAll('.itemtext')
        console.log(text_itemtext)
        for (let element of text_itemtext) {
            if (element.textContent.includes('●')) {
                if (['documents', 'educations', 'educationStandart', 'teacher', 'security', 'organization', 'education', 'social'].includes(urlId)) {
                    let elem = element.parentNode;
                    elem.style.textDecoration = 'underline'
                    elem.style.color = 'white'
                    elem.setAttribute('target', '_blank');
                    elem.href = `../pdf/${urlId}/${urlId}${count}.pdf`
                    count++
                }
            } else {
                console.log('нет ссылки')
            }
        }
    }
}
linksPdf(urlId)