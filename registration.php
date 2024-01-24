<?php
session_start();
error_reporting(0);
ini_set('display_errors', 0);
if ($_SESSION['user']) {
    header('Location:  /');
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
    <script defer type="module" src="/script/scriptPHP.js?<?echo time();?>"></script>
    <title>Семейный центр</title>
</head>
<body id="element">
<div class="wrapper container-fluid">
    <header class="header">
        <div class="container__header">
            <div  tabindex="0" class="header__menu">
                <div tabindex="0"  lass="header_logo"  aria-haspopup="logo">
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
                        <ul class="dropdown-menu"  aria-label="открыть меню">
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
                <div   tabindex="0" class="header__profile" alt="переход в профиль или регистрация" aria-label="переход в профиль или регистрация">
                    <button class="profile">
                        <a aria-label="переход в профиль или регистрация" href="http://project/entrance.php"><img class="profile_img" src="./img/profile.svg"></a>
                    </button>

                </div>
            </div>
        </div>
    </header>

    <main class="main">
        <!--форма авторизации-->
        <div class="main_container registration_content_form" aria-label="форма для регистрации">
            <form class="form"  action="vend/signUP.php" method="post" enctype="multipart/form-data">
                <div tabindex="0" class="entrance">РЕГИСТРАЦИЯ</div>
                <div class="login_password">
                    <div class="registration_content">
                    <input type="text" class="login" name="name" placeholder="Введите свое фио" pattern="([А-ЯЁ][а-яё]+[\-\s]?){3,}" required>
                    <span class="form__error">поле должно содержать буквы</span>
                    <input type="text" class="login" name="login" placeholder="Введите логин" pattern="^[a-zA-Z]+$">
                    <span class="form__error">поле должно содержать латинские буквы</span>
                    <input type="email" class="email" name="email" placeholder="Введите почту" pattern="/\A[^@]+@([^@\.]+\.)+[^@\.]+\z/" required>
                    <span class="form__error">поле должно содержать латинские буквы</span>
                    <input type="password" class="password" name="password" placeholder="Введите пароль не более 8 символов" pattern="^[a-zA-Z0-9]{1,8}$" required>
                    <span class="form__error">поле должно содержать не более 8 символов и латинские буквы</span>
                    <label class="p_text">подтверждение пароля</label>
                    <input type="password" class="password_two" name="passwordConfirm" placeholder="Подтвердите пароль"  pattern="^[a-zA-Z0-9]{1,8}$" required>
                    <span class="form__error">поле должно содержать не более 8 символов и латинские буквы</span>
                    <label for="form-file" class="imgInput">
                        <div tabindex="0" class="text_Img_Input">выберете файл</div>
                    <input tabindex="0" type="file" id="form-file" class="img" name="img" accept=".jpg, .jpeg, .png" required >
                    </label>
                        <span  tabindex="0" class="form__error_Img">ИЗОБРАЖЕНИЕ НЕ ДОЛЖНО ПРЕВЫШАТЬ РАЗМЕР 1МБ</span>
                    </div>
                    <div class="verific">
                        <?php
                        session_start();
                        $string = "";
                        for ($i = 0; $i < 5; $i++)
                            $string .= chr(rand(97, 122));

                        $_SESSION['rand_code'] = $string;

                        ?>
                        <div class="form-img-preview">
                            <img class="img-image">
                        </div>
                        <div class="fieldTitle">
                            <img tabindex="0" aria-label = "<?php echo $_SESSION['rand_code'];?>" class="captchaImg" src="captcha.php" />
                            <input  tabindex="0" class="captchaInput" type="text" name="kapcha"/>
                        </div>
                        <button class="btn_form" type="submit">отправить</button>
                        <p tabindex="0" class="p_text">есть аккаунт? - <a href="/entrance.php">войдите</a></p>
                    </div>
                </div>
                <p tabindex="0" class="message_text">
                <?php if (isset($_SESSION['message'])) {
                    echo `<p class="msg"> ` . $_SESSION['message'] . ` </p>`;
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
                <p tabindex="0" class="footer_text">
                    Государственное бюджетное стационарное учреждение социального обслуживания Московской области
                    «Семейный центр имени А.И. Мещерякова».
                </p>
            </div>
        </div>
    </footer>
</body>
</html>