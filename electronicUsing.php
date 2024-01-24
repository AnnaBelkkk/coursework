<?php
session_start();
error_reporting(0);
ini_set('display_errors', 0);
?>
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="mailru-domain" content="jbz9Jarqxyx5jwRk"/>
    <link rel="icon" type="image/png" sizes="32x32" href="img/bear.svg">
    <link rel="stylesheet" type="text/css" href="/style/bootstrap.min.css?<?echo time();?>">
    <link rel="stylesheet" type="text/css" href="/style/style.css?<?echo time();?>">
    <link rel="stylesheet" type="text/css" href="/style/styleTwo.css?<?echo time();?>">
    <link rel="stylesheet" type="text/css" href="/style/stylePage.css?<?echo time();?>">
    <link rel="stylesheet" type="text/css" href="/style/adaptiv.css?<?echo time();?>">
    <link rel="stylesheet" type="text/css" href="/style/adaptivPHP.css?<?echo time();?>">
    <script defer src="/script/bootstrap.bundle.min.js"></script>
    <script defer type="module" src="/script/scriptPHP.js?<?echo time();?>"></script>
    <title>Семейный центр</title>
</head>
<body  id="element">
<div class="wrapper container-fluid">
    <div id="modal" class="modal">
        <div class="modalcontent">
            <div class="closemodal">×</div>
            <p id="contenttext"> </p>
        </div>
    </div>
    <header class="header">
        <div class="container__header">
            <div  class="header__menu">
                <div class="header_logo" aria-haspopup="logo" tabindex='0' aria-label="логотип">
                    <button class="logo">
                        <a aria-label="вернуться на главную" href="http://localhost:5173/">
                            <img class="header_img" src="./img/logo.png">
                        </a>
                    </button>
                </div>
                <div class="header__select">
                    <li class="header__select_item">
                        <a class="title_nav" id="select_home" href="http://localhost:5173/index.html" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false"> Главная </a> <img class="select_img" src="./img/arrowMenu.png">
                        <ul class="dropdown-menu">
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
                    <button class="profile" tabindex='0' aria-label="переход в профиль или регистрация, авторизация">
                        <a href="http://project/entrance.php"><img class="profile_img" src="./img/profile.svg"></a>
                    </button>

                </div>
            </div>
        </div>
    </header>

    <main class="main" >
        <div class="main_container_two">
            <form class="form_mes" action="vend/send.php" method="POST" enctype="multipart/form-data">
                <div tabindex='0' class="entrance">ЭЛЕКТРОННАЯ ПРИЕМНАЯ</div>
                <div class="message_block">
                    <div class="message_blocks_content">
                        <div class="entrance_message">
                            <input type="text" class="FullName" name="Fullname" placeholder="Фамилия, Имя, Отчество заявителя" pattern="([А-ЯЁ][а-яё]+[\-\s]?){3,}" required>
                            <span class="form__error">поле должно содержать буквы</span>
                            <input type="email" class="emailMes" name="emailMes" placeholder="Электронный адрес для отправления ответа" pattern="/\A[^@]+@([^@\.]+\.)+[^@\.]+\z/" required>
                            <span class="form__error">поле должно содержать латинские буквы</span>
                            <input type="text" class="adres" name="adres" placeholder="Почтовый адрес для отправления ответа">
                        </div>
                        <div class="message">
                            <textarea rows="10" maxlength = "300"class="description" cols="45" name="description" style ="padding:60px 40px;"  placeholder="текст вашего сообщения" pattern="/[^<>]+/" required></textarea>
                            <span tabindex="0" class="form__error">поле не должно содержать символы "<>"</span>
                            <label tabindex="0" class="p_text">Укажите ваш запрос. Мы рассмотрим его и свяжемся с вами.</label>
                        </div>
                    </div>
                    <?php
                    session_start();
                    $string = "";
                    for ($i = 0; $i < 5; $i++)
                        $string .= chr(rand(97, 122));

                    $_SESSION['rand_code'] = $string;

                    ?>
                    <div class="verific">
                        <label class="p_text">проверочный код</label>
                        <div class="fieldTitle">
                            <img tabindex="0" aria-label = "код для ввода <?php echo $_SESSION['rand_code'];?>" class="captchaImg" src="captcha.php" />
                            <input  class="captchaInput" type="text" name="kapcha"/>
                        </div>
                        <p tabindex='0'  class="message_text">
                        <?php if (isset($_SESSION['message'])) {
                            echo `<p class="msg"> ` . $_SESSION['message'] . ` </p>`;
                        }
                        unset($_SESSION['message']);
                        ?>
                        </p>
                    <label tabindex="0" class="p_text_content">Отправляя эту форму, вы подтверждаенете, что прочитали и согласны с политикой в отношении обработки персональных данных.
                            (Ссылка на описание политики обработки персональных данных)</label>
                        <button type="submit" class="btn_form">отправить</button>
                    </div>
                </div>

            </form>
        </div>
    </main>
    <footer  class="footer" style="height: 50px">
        <div class="footer__container">
            <div class="block_item footer__content" tabindex="0">
                <p class="footer_text">
                    Государственное бюджетное стационарное учреждение социального обслуживания Московской области
                    «Семейный центр имени А.И. Мещерякова».
                </p>
            </div>
        </div>
    </footer>
</body>
</html>