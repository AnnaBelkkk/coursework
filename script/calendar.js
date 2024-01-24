let date_array = [];

let xhr = new XMLHttpRequest();
xhr.open('GET', 'vend/data.php', true);
xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
        let response = xhr.responseText;
        let users = JSON.parse(response);
        date_array.push(users.map(obj => obj.date));
    }
};
xhr.send();


let selectedDates = date_array;
console.log()





function onRenderCell({date, cellType}) {
    let disabledDatesss = selectedDates.map(function (subArray) {
        return subArray.filter(function (value) {
            return value !== "unceration";
        }).map(function (value) {
            return new Date(value);
        });
    });
    let isDay = cellType === 'day';
    let day = date.getDay();
    let currentDate = new Date();

    let isDisabled = isDay && ((day === 0) || (day === 6)) || (date < currentDate || disabledDatesss[0].some(disabledDate =>
        date.getFullYear() === disabledDate.getFullYear() &&
        date.getMonth() === disabledDate.getMonth() &&
        date.getDate() === disabledDate.getDate()
    ));

    return {
        disabled: isDisabled
    };
}

new AirDatepicker('#airdatepicker', {
    isMobile: true,
    buttons: ['clear'],
    locale: {
        days: ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'],
        daysShort: ['Вос', 'Пон', 'Вто', 'Сре', 'Чет', 'Пят', 'Суб'],
        daysMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
        months: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
        monthsShort: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн', 'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек']
    },
    onRenderCell: onRenderCell
});

let btn_send_satus = document.getElementById('btn_send_satus')
let send = document.getElementById('send')
let cancel = document.getElementById('cancel')
let date_time = document.querySelector('.date_time')


btn_send_satus.addEventListener('click', function () {
    date_time.style.display = 'flex'
    //btn_send_satus.style.display = 'none'
    send.style.display = 'flex'
    btn_send_satus.style.display = 'none'
})
send.addEventListener('click', function (e) {
    let dateField = document.getElementById("airdatepicker");
    let timeField = document.getElementById("time_select");
    let btn_error= document.getElementById('error');
    console.log(dateField.value, timeField.value)
    if (dateField.value && timeField.value) {
        btn_error.innerHTML = ''
        btn_send_satus.style.display = 'none'
        cancel.style.display = 'flex'
        send.style.display = 'none'
    } else {
       e.preventDefault()
        btn_error.innerHTML = 'заполните поля даты и времени'
        // return
    }
})
cancel.addEventListener('click', function () {
    btn_send_satus.style.display = 'flex'
    date_time.style.display = 'none'
    send.style.display = 'none'
    cancel.style.display = 'none'
})
let appointment_date = document.querySelector('.appointment_date')
let cabinet = document.querySelector('.cabinet_info')
console.log(appointment_date.textContent.length)
if (appointment_date.textContent.length <= 118) {
    appointment_date.style.display = 'none'
    btn_send_satus.style.display = 'flex'
    send.style.display = 'none'
    date_time.style.display = 'none'
    cancel.style.display = 'none'
} else {
    appointment_date.style.display = 'flex'
    cancel.style.display = 'none'
    btn_send_satus.style.display = 'none'
    cancel.style.display = 'flex'
    cabinet.style.display = 'flex';
}

//
//функция для отправки статуса
//функция переделана под получение данных с сервера
if (btn_send_satus != null) {
    btn_send_satus.addEventListener('click', async function () {
        // Отправляем AJAX-запрос на сервер для обновления значения столбца status
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'vend/status.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log('Статус успешно обновлен');
            }
        };
        xhr.send();
    });
    setInterval(updateStatus, 2000)
} else {
    console.log('здесь эта функция недоступна')
}

//функция для обновления статуса
async function updateStatus(){
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let cabinet = this.responseText;
                document.querySelector(".cabinet_info").innerHTML = `кабинет: ${cabinet}`;

        }
    };
    xhttp.open("GET", "vend/updateStatus.php", true); // замените "update_status.php" на путь к вашему обработчику запросов на сервере
    xhttp.send();
    updateBtn()
}
// //смена блока и его содержимого в зависимости от статуса

function updateBtn() {
    let btn_send_satus = document.getElementById('btn_send_satus')
    let User_status = document.querySelector('.cabinet').textContent

    if (btn_send_satus == null || User_status ==null ) {
        console.log('статус пользователя здесь недоступен')
        clearInterval()
    } else {
        setInterval( function (){
        }, 2000)}
}
