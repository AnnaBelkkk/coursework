
const editButtons = document.querySelectorAll('#edit');

// Добавляем обработчик события клика на каждую кнопку "edit"
editButtons.forEach(function(button) {
    button.addEventListener('click', changeData);
});

// Функция для изменения данных блока
function changeData(event) {
    // Получаем кнопку "edit", на которую было нажато
    const editButton = event.target;

    // Получаем родительский блок
    const adminBlock = editButton.closest('.admin_title_content');

    // Получаем данные из нужных полей
    const fullname = adminBlock.querySelector('.fullname').textContent;
    const status = adminBlock.querySelector('.status').textContent;
    const date = adminBlock.querySelector('.date').textContent;
    const cabinet  = adminBlock.querySelector('.cabinet').textContent;
    // Меняем данные у другого блока
    const otherBlock = document.querySelector('.content_users');


    otherBlock.querySelector('.user_name_admin').value = fullname;
    otherBlock.querySelector('.user_status_admin').value = status;
    otherBlock.querySelector('.user_date_admin').value = date;
    otherBlock.querySelector('.user_cabinet_admin').value = cabinet;
    openmodal()
}


let modal = document.getElementById("modal");

let closemodal = document.getElementsByClassName("closemodal")[0];

function openmodal() {
    modal.style.display = "block";
}

closemodal.onclick = function () {
    modal.style.display = "none";
    document.location.reload();
}
window.onclick = function (event) {
    if (event.target === modal) {
        modal.style.display = "none";
        document.location.reload();
    }
}