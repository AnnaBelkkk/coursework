<?php
session_start();
error_reporting(0);

ini_set('display_errors', 0);
if ($_SESSION['user']){
    header('Location:  http://project/profile.php');
} if($_SESSION['user']['role'] == 'admin'){
    header('Location:  http://project/admin.php');
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
    <link rel="stylesheet" type="text/css" href="/style/styleTwo.css?<?echo time();?>">
    <link rel="stylesheet" type="text/css" href="/style/adaptiv.css?<?echo time();?>">
    <link rel="stylesheet" type="text/css" href="/style/adaptivPHP.css?<?echo time();?>">
    <script defer src="/script/bootstrap.bundle.min.js"></script>
    <script defer src="/script/script.js"></script>
    <script defer type="module" src="/script/scriptPHP.js?<?echo time();?>"></script>
    <title>Семейный центр</title>
</head>
<body id="element">
<div class="wrapper container-fluid">
    <header class="header">
        <div class="container__header">
            <div class="header__menu">
                <div tabindex='0'  class="header_logo" aria-haspopup="logo">
                    <button class="logo" aria-label="перейти на главную">
                        <a aria-label="вернуться на главную" href="http://localhost:5173/index.html">
                        <img class="header_img" src="./img/logo.png"  alt="Логотип">
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
                    <button class="profile" tabindex='0'  alt="переход в профиль или регистрация" aria-label="переход в профиль или регистрация">
                        <a href="http://project/entrance.php"><img class="profile_img" src="./img/profile.svg"></a>
                    </button>

                </div>
            </div>
        </div>
    </header>

    <main class="main">
        <div class="main_container entrance__container">
            <!--форма авторизации-->
            <form class="form" action="vend/signIN.php" method="post" enctype="multipart/form-data" aria-label="форма для авторизации">
                <div class="registration">
                    <div tabindex='0'  class="entrance">ВХОД</div>
                    <div class="login_content">
                        <input type="text" class="login" name="login" placeholder="Введите логин" pattern="^[a-zA-Z]+$" required>
                        <span class="form__error">поле должно содержать латинские буквы</span>
                        <input type="password" class="password" id="password" name="password" placeholder="Введите пароль"  pattern="^[a-zA-Z0-9]{1,8}$" required>
                        <span class="form__error">поле должно содержать не более 8 символов и латинские буквы</span>
                    </div>
                    <div class="form_code_entrance">
                        <p tabindex='0'  class="p_text">проверочный код</p>
                        <div class="code">
                            <?php
                            session_start();
                            $string = "";
                            for ($i = 0; $i < 5; $i++)
                                $string .= chr(rand(97, 122));

                            $_SESSION['rand_code'] = $string;

                            ?>
                            <div class="fieldTitle">
                                <img tabindex="0" aria-label = "проверочный код <?php echo $_SESSION['rand_code'];?>" class="captchaImg" src="captcha.php" />
                                <input  class="captchaInput" type="text" name="kapcha"/>
                                <button class="btn_form" type="submit">отправить</button>
                            </div>
                        </div>
                    </div>
                </div>

                <p tabindex='0'  class="p_text">нет аккаунта? - <a href="/registration.php">зарегистрируйтесь</a></p>
                <p  tabindex='0'  class="message_text">
                    <?php if (isset($_SESSION['message'])) {
                    echo `<p class="msg"> ` . $_SESSION['message'] . ` </p>`;
                } else{
                     echo `<p class="msg"></p>`;
                }

                unset($_SESSION['message']);
                ?>
                </p>

            </form>
        </div>
    </main>
    <footer class="footer">
        <div class="footer__container" aria-label="дополнительная информация">
            <div class="block_item footer__content">
                <p tabindex='0'  class="footer_text">
                    Государственное бюджетное стационарное учреждение социального обслуживания Московской области
                    «Семейный центр имени А.И. Мещерякова».
                </p>
            </div>
        </div>
    </footer>
</body>
</html>