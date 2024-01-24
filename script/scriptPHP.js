//импорт необходимых функций и переменных
import {change} from '/script/scriptPageTransition.js'
// import {darkLightmode, def} from '/script/scriptFunctional.js'
change()
//глобальные переменные
let currentPage = localStorage.getItem('currentPage') || 1;
let blocksPerPage = 5;
let blocks = document.querySelectorAll('.admin_title_content');
let totalPages = Math.ceil(blocks.length / blocksPerPage);
let prevBtn = document.getElementById('prevBtn');
let nextBtn = document.getElementById('nextBtn');
let currentPageElement = document.getElementById('currentPage');



let admin_data = document.querySelector('.admin_data')

if (admin_data != null) {
    window.addEventListener('DOMContentLoaded', () => {
        admin_data.style.display = 'flex';
    })
}


//пагинация
function showBlocks(page) {
    let startIndex = (page - 1) * blocksPerPage;
    let endIndex = startIndex + blocksPerPage;

    for (let i = 0; i < blocks.length; i++) {
        if (i >= startIndex && i < endIndex) {
            blocks[i].style.display = 'flex';
        } else {
            blocks[i].style.display = 'none';
        }
    }
}
let totalPagesElement = document.getElementById('totalPages')
function updatePagination() {
    if (currentPageElement != null) {
        currentPageElement.textContent = currentPage;
        totalPagesElement.textContent = totalPages; // обновляем отображение общего количества страниц
        prevBtn.disabled = currentPage === 1;
        nextBtn.disabled = currentPage === totalPages;
    }
}
//функция для левой кнопки(назад)
if (prevBtn != null) {
    prevBtn.addEventListener('click', function () {
        if (currentPage > 1) {
            currentPage--;
            showBlocks(currentPage);
            updatePagination();
            localStorage.setItem('currentPage', currentPage);
        }
    });
}
//функция для правой кнопки(вперед)
if (nextBtn != null) {
    nextBtn.addEventListener('click', function () {
        if (currentPage < totalPages) {
            currentPage++;
            showBlocks(currentPage);
            updatePagination();
            localStorage.setItem('currentPage', currentPage);
        }
    });
}
showBlocks(currentPage);
updatePagination();



let form_file = document.getElementById('form-file')
if (form_file != null){
    let btn_form = document.querySelector('.btn_form')
    btn_form.addEventListener('click', function (e){
        let form__error_Img = document.querySelector('.form__error_Img')
        form__error_Img.textContent = 'загрузите файл'
        form__error_Img.style.color = 'red'
        e.preventDefault()
    })

}

//let imgSize = atob(base64String)
let addform = document.querySelector('.form')
let formimgpreview = document.querySelector('.form-img-preview')
if (formimgpreview != null) {
    let file = document.querySelector('#form-file')
    let preview = document.querySelector('.img-image')
    let SaveButton = document.querySelector('.btn_form')
    let form__error_Img = document.querySelector('.form__error_Img')
    preview.style.display = 'none';
    imageFile(addform, formimgpreview, file, preview, SaveButton, form__error_Img)

    function imageFile(addform, formimgpreview, file, preview, SaveButton, form__error_Img) {
        file.addEventListener('change', async () => {
            if (file.files.length > 0) {
                const src = URL.createObjectURL(file.files[0])
                preview.src = src;
                console.log(src)
                const result = await toBASE(file.files[0])
                let resFILE = file.files[0]
                if (resFILE.size >= 1048576) {
                    form__error_Img.style.color = 'red'
                    form__error_Img.style.marginTop = '10px'
                    console.log('ошибка')
                    preview.style.display = 'none';
                } else {
                    preview.style.display = 'flex';
                    addform.style.height = '858px'
                    form__error_Img.style.color = 'transparent'
                    console.log('все нормально')
                }
                console.log(resFILE)

                console.log(result)

            }
        })
        const toBASE = file => new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.addEventListener('loadend', (e) => {
                resolve(reader.result)
                let img_image = document.querySelector('.img-image')
                console.log(e.target.result)
                img_image.id = e.target.result
            })
            reader.addEventListener('error', err => {
                reject(err)
            })

            reader.readAsDataURL(file);
        })
    }
}

