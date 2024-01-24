<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}

?>
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/svg" sizes="32x32" href="img/bear.svg">
    <link rel="stylesheet" type="text/css" href="/style/bootstrap.min.css?<?echo time();?>">
    <link rel="stylesheet" type="text/css" href="/style/style.css?<?echo time();?>">

    <link href="airdatepicker/air-datepicker.css?<?echo time();?>" rel="stylesheet" type="text/css">
    <script src="airdatepicker/air-datepicker.js?<?echo time();?>"></script>
    <script defer src="/script/bootstrap.bundle.min.js"></script>
    <script defer type="module" src="/script/scriptPHP.js?<?echo time();?>"></script>
    <script defer type="module" src="/script/calendar.js?<?echo time();?>"></script>
    <link rel="stylesheet" type="text/css" href="/style/styleTwo.css?<?echo time();?>">
    <link rel="stylesheet" type="text/css" href="/style/styleThree.css?<?echo time();?>">
    <link rel="stylesheet" type="text/css" href="/style/stylePage.css?<?echo time();?>">
    <link rel="stylesheet" type="text/css" href="/style/adaptiv.css?<?echo time();?>">
    <link rel="stylesheet" type="text/css" href="/style/adaptivPHP.css?<?echo time();?>">
    <title>Семейный центр</title>
</head>
<body id="element">
<div class="wrapper container-fluid">
    <header class="header">
        <div class="container__header">
            <div class="header__menu">
                <div tabindex='0' class="header_logo" aria-haspopup="logo">
                    <button class="logo" aria-label="перейти на главную">
                        <a href="http://localhost:5173/index.html">
                        <img class="header_img" src="./img/logo.png" alt="Логотип">
                        </a>
                    </button>
                </div>
                <div class="header__select">
                    <li class="header__select_item">
                        <a class="title_nav" id="select_home" href="http://localhost:5173/index.html" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false"> Главная </a> <img class="select_img" src="./img/arrowMenu.png">
                        <ul class="dropdown-menu" aria-label="открыть меню">
                            <li><a class="dropdown-item" id="home" href="http://localhost:5173/index.html">Главная</a></li>
                            <li><a class="dropdown-item" id="news" href="http://localhost:5173/pageTransition/index.html?=news">Новости</a></li>
                            <li><a class="dropdown-item" id="intelligence" href="http://localhost:5173/pageTransition/index.html?=intelligence">Сведения об организации социального
                                    обслуживания</a></li>
                            <li><a class="dropdown-item" id="organization" href="http://localhost:5173/pageTransition/index.html?=organization">Организация питания в
                                    образовательной организации</a></li>
                            <li><a class="dropdown-item" id="spiritual" href="http://localhost:5173/pageTransition/index.html?=spiritual">Духовное воспитание</a></li>
                            <li><a class="dropdown-item" id="service" href="http://localhost:5173/pageTransition/index.html?=service">Служба сопровождения замещающих семей</a>
                            </li>
                            <li><a class="dropdown-item" id="opposition" href="http://localhost:5173/pageTransition/index.html?=opposition">Противодействие коррупции</a></li>
                            <li><a class="dropdown-item" id="medical" href="http://localhost:5173/pageTransition/index.html?=medical">Медицинское обслуживание</a></li>
                            <li><a class="dropdown-item" id="education" href="http://localhost:5173/pageTransition/index.html?=educational">Образовательные программы</a></li>
                            <li><a class="dropdown-item" id="social" href="http://localhost:5173/pageTransition/index.html?=social">Социальные услуги</a></li>
                            <li><a class="dropdown-item" id="thank" href="http://localhost:5173/pageTransition/index.html?=thank">Благодарности</a></li>
                            <li><a class="dropdown-item" id="contacts" href="http://localhost:5173/pageTransition/index.html?=contacts">Контакты</a></li>
                            <li><a class="dropdown-item" id="help" href="http://localhost:5173/pageTransition/index.html?=help">Помощь</a></li>
                            <li><a class="dropdown-item" id="schedule" href="http://localhost:5173/pageTransition/index.html?=schedule">График посещения учреждения</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" id="electronic" href="http://project/electronicUsing.php">Электронная приемная</a></li>
                            <li><a class="dropdown-item" id="recording" href="http://project/entrance.php">Записаться в приемную комиссию</a></li>
                        </ul>
                    </li>
                </div>
                <div class="header__profile">
                    <button class="profile">
                        <a href="http://project/entrance.php"><img class="profile_img" src="./img/profile.svg"></a>
                    </button>

                </div>
            </div>
        </div>
    </header>

    <main class="main" >
        <!-- Профиль -->
        <div class="main_container">
            <div class="prof form_profile" tabindex='0'  aria-label="форма профиля">
                <div tabindex='0' class="entrance">ЛИЧНЫЙ КАБИНЕТ</div>
                <div class="profile_data">
                    <div class="img_profile_exit">
                        <img class="data_user_img" src="<?php echo $_SESSION['user']['img'] ?>" alt="">
                        <button tabindex='0' class="logout"><a  style="color: white" href="vend/loguot.php">Выход</a></button>
                    </div>
                    <div class="profile_content">
                        <div class="profile_content_user">
                        <p tabindex='0' aria-label="ваше имя" class="data_user_profile"><?php echo $_SESSION['user']['name'] ?></p>
                        <p tabindex='0'aria-label="ваша почта" class="data_user_profile"><?php echo $_SESSION['user']['email'] ?></p>
                    </div>
                        <a tabindex='0' href="./documentAdmissions/doc1.pdf" target="_blank"<button class="btn_form_data">Ознакомиться с переченью необходимых документов</button></a>
                        <button  name="sendStatus" id="btn_send_satus" class="btn_form_data">Записаться в приемную комиссию</button>
                        <div class="date_record">
                            <form class="calendar" action="vend/dateAndeTime.php" method="post" enctype="multipart/form-data">
                                <div class="date_time">
                                    <input tabindex='0' type="text"  placeholder="Выберите дату:" name="date" id="airdatepicker" class="form-control">
                                    <select tabindex='0' name="time" id="time_select" class="time_select">
                                        <option tabindex='0' value="">Выберите время</option>
                                        <option tabindex='0' value="18:00">18:00</option>
                                        <option tabindex='0' value="19:00">19:00</option>
                                    </select>
                                </div>
                                <div class="form_btn_send">
                                <button  tabindex='0' name="update_status_button_1" id="send" class="btn_form_data_send_and_cancel">Отправить</button>
                                    <div class="appointment_date">
                                        <?php if (isset($_SESSION['messagedate'])) {
                                            echo `<p class="msgdate">` . $_SESSION['messagedate'];` </p>`;
                                        }
                                        ?>
                                        <p tabindex="0" aria-label="ваш статус" class="cabinet_info"></p>
                                    </div>
                                    <button tabindex='0' name="update_status_button_0" id="cancel" class="btn_form_data_send_and_cancel">Отменить запись</button>
                                </div>
                                <span  tabindex='0' class="error_btn_warning" id="error"></span>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
    <footer class="footer">
        <div class="footer__container" aria-label="дополнительная информация">
            <div class="block_item footer__content">
                <p tabindex='0' class="footer_text">
                    Государственное бюджетное стационарное учреждение социального обслуживания Московской области
                    «Семейный центр имени А.И. Мещерякова».
                </p>
            </div>
        </div>
    </footer>
</body>
</html>