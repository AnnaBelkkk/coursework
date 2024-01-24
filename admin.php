<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Location: admin.php');
}
?>
<!doctype html>
<html lang="ru">
<head>
    <!doctype html>
    <html lang="en" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" type="image/svg" sizes="32x32" href="img/bear.svg">
        <link rel="stylesheet" type="text/css" href="/style/bootstrap.min.css?<? echo time(); ?>">
        <link rel="stylesheet" type="text/css" href="/style/style.css?<? echo time(); ?>">
        <link rel="stylesheet" type="text/css" href="/style/styleTwo.css?<? echo time(); ?>">
        <link rel="stylesheet" type="text/css" href="/style/adaptiv.css?<? echo time(); ?>">
        <link rel="stylesheet" type="text/css" href="/style/styleThree.css?<? echo time(); ?>">
        <link rel="stylesheet" type="text/css" href="/style/adaptivPHP.css?<? echo time(); ?>">
        <script defer src="/script/bootstrap.bundle.min.js"></script>
        <script defer type="module" src="/script/scriptPHP.js?<? echo time(); ?>"></script>
        <script defer type="module" src="/script/data.js?<? echo time(); ?>"></script>
        <title>Семейный центр</title>
    </head>
</head>
<body>
<body id="element">
<div class="wrapper container-fluid">
    <header  tabindex='0' class="header">
        <div class="container__header">
            <div tabindex="0" class="header__menu">
                <div tabindex="0"class="header_logo" aria-haspopup="logo">
                    <button class="logo" aria-label="перейти на главную">
                        <a aria-label="перейти на главную" href="http://localhost:5173/index.html">
                            <img class="header_img" src="./img/logo.png" alt="Логотип">
                        </a>
                    </button>
                </div>
                <div class="header__select">
                    <li class="header__select_item">
                        <a class="title_nav" id="select_home" href="http://localhost:5173/index.html" role="button"
                           data-bs-toggle="dropdown"
                           aria-expanded="false"> Главная </a> <img class="select_img" src="./img/arrowMenu.png">
                        <ul class="dropdown-menu" aria-label="открыть меню">
                            <li><a class="dropdown-item" id="home" href="http://localhost:5173/index.html">Главная</a>
                            </li>
                            <li><a class="dropdown-item" id="news"
                                   href="http://localhost:5173/pageTransition/index.html?=news">Новости</a></li>
                            <li><a class="dropdown-item" id="intelligence"
                                   href="http://localhost:5173/pageTransition/index.html?=intelligence">Сведения об
                                    организации социального
                                    обслуживания</a></li>
                            <li><a class="dropdown-item" id="organization"
                                   href="http://localhost:5173/pageTransition/index.html?=organization">Организация
                                    питания в
                                    образовательной организации</a></li>
                            <li><a class="dropdown-item" id="spiritual"
                                   href="http://localhost:5173/pageTransition/index.html?=spiritual">Духовное
                                    воспитание</a></li>
                            <li><a class="dropdown-item" id="service"
                                   href="http://localhost:5173/pageTransition/index.html?=service">Служба сопровождения
                                    замещающих семей</a>
                            </li>
                            <li><a class="dropdown-item" id="opposition"
                                   href="http://localhost:5173/pageTransition/index.html?=opposition">Противодействие
                                    коррупции</a></li>
                            <li><a class="dropdown-item" id="medical"
                                   href="http://localhost:5173/pageTransition/index.html?=medical">Медицинское
                                    обслуживание</a></li>
                            <li><a class="dropdown-item" id="educational"
                                   href="http://localhost:5173/pageTransition/index.html?=educational">Образовательные
                                    программы</a></li>
                            <li><a class="dropdown-item" id="social"
                                   href="http://localhost:5173/pageTransition/index.html?=social">Социальные услуги</a>
                            </li>
                            <li><a class="dropdown-item" id="thank"
                                   href="http://localhost:5173/pageTransition/index.html?=thank">Благодарности</a></li>
                            <li><a class="dropdown-item" id="contacts"
                                   href="http://localhost:5173/pageTransition/index.html?=contacts">Контакты</a></li>
                            <li><a class="dropdown-item" id="help"
                                   href="http://localhost:5173/pageTransition/index.html?=help">Помощь</a></li>
                            <li><a class="dropdown-item" id="schedule"
                                   href="http://localhost:5173/pageTransition/index.html?=schedule">График посещения
                                    учреждения</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" id="electronic" href="http://project/electronicUsing.php">Электронная
                                    приемная</a></li>
                            <li><a class="dropdown-item" id="recording" href="http://project/entrance.php">Записаться в
                                    приемную комиссию</a></li>
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
    <main class="main">
        <div tabindex="0" class="main_container" aria-label="панель админа">
            <div class="profile_admin">
                <div class="panel_admin">
                    <div tabindex="0" class="entrance">АДМИНИСТРАТОР</div>
                    <div tabindex='0' class="logout"><a href="vend/loguot.php">Выход</a></div>
                </div>
                <div class="admin_data">
                    <div class="table_users">
                        <?php
                        $connect = mysqli_connect('localhost', 'annabelk', '201500Anna', 'testCoursework');
                        if (!$connect) {
                            die('error connect to database');
                        }
                        // Количество записей на странице
                        $limit = 5;

                        // Получаем текущую страницу
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;

                        // Вычисляем начальную позицию для запроса
                        $start = ($page - 1) * $limit;

                        // Запрос для получения данных с учетом пагинации
                        $tableUse = mysqli_query($connect, "SELECT * FROM `usersCoursework` LIMIT $start, $limit");

                        // Запрос для получения общего количества записей
                        $totalRows = mysqli_query($connect, "SELECT COUNT(*) as count FROM `usersCoursework`");
                        $totalRows = mysqli_fetch_assoc($totalRows)['count'];

                        // Вычисляем общее количество страниц
                        $totalPages = ceil($totalRows / $limit);

                        if (isset($_POST["name"])) {
                            //Если это запрос на обновление, то обновляем
                            if (isset($_GET['red_id'])) {
                                $tableUse = mysqli_query($connect, "UPDATE `usersCoursework` SET `name` = '{$_POST['name']}',`status` = '{$_POST['status']}', `date` = '{$_POST['date']}',  `cabinet` = '{$_POST['cabinet']}' WHERE `id`= {$_GET['red_id']}");
                            } else {
                                //Иначе вставляем данные, подставляя их в запрос
                                $tableUse = mysqli_query($connect, "INSERT INTO `usersCoursework` (`name`, `status`,`date`, `cabinet`) VALUES ('{$_POST['name']}', '{$_POST['status']}','{$_POST['date']}', '{$_POST['cabinet']}')");
                            }

                            //Если вставка прошла успешно
                            if ($tableUse) {
                                echo "<p tabindex='0' class='p_text_title'>Успешно! </p>";
                            } else {
                                echo '<p>Произошла ошибка: ' . mysqli_error($connect) . '</p>';
                            }
                        }

                        if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
                            //удаляем строку из таблицы
                            $tableUse = mysqli_query($connect, "DELETE FROM `usersCoursework` WHERE `id` = {$_GET['del_id']}");
                            if ($connect) {
                                echo "<p class='p_text_title'>пользователь удален.</p>";
                            } else {
                                echo '<p>Произошла ошибка: ' . mysqli_error($connect) . '</p>';
                            }
                        }

                        //Если передана переменная red_id, то надо обновлять данные. Для начала достанем их из БД
                        if (isset($_GET['red_id'])) {
                            $tableUse = mysqli_query($connect, "SELECT `id`, `name`, `status`,`date`, `cabinet` FROM `usersCoursework` WHERE `id` = {$_GET['red_id']}");
                            $dataUsers = mysqli_fetch_array($tableUse);
                        }
                        ?>
                        <div class="users_options">
                            <div class="admin_title_content_base">
                                <div tabindex='0' class='users_text id'>id</div>
                                <div tabindex='0' class='users_text fullname'>фио</div>
                                <div tabindex='0' class='users_text status'>статус</div>
                                <div tabindex='0' class='users_text date'>дата</div>
                                <div tabindex='0' class='users_text cabinet'>кабинет</div>
                                <div tabindex='0' aria-label="удалить"  class='users_text del'></div>
                                <div tabindex='0'  aria-label="редактировать" class='users_text edi'></div>
                            </div>
                        </div>
                        <div class="data_users">
                            <div class="row_users">
                                <div class="nameCell"></div>
                                <div class="ageCell"></div>
                            </div>
                        </div>
                        <?php
                        $tableUse = mysqli_query($connect, "SELECT `id`, `name`, `status`, `date`, `cabinet` FROM `usersCoursework` ORDER BY status=1 DESC, status=2 DESC, status=3 DESC, status=0 DESC;");
//                        $tableUse = mysqli_query($connect, "SELECT `id`, `name`, `status`, `date`, `cabinet` FROM `usersCoursework`");
                        while ($result = mysqli_fetch_array($tableUse)) {
                            echo '<div class="admin_title_content">' .
                                "<div tabindex='0' class='p_text_td id'>{$result['id']}</div>" .
                                "<div  tabindex='0' class='p_text_td fullname'>{$result['name']}</div>" .
                                "<div tabindex='0' class='p_text_td status'>{$result['status']}</div>" .
                                "<div tabindex='0' class='p_text_td date'>{$result['date']}</div>" .
                                "<div tabindex='0' class='p_text_td cabinet'>{$result['cabinet']}</div>" .
                                "<div tabindex='0' class='p_text_td del'><a href='?del_id={$result['id']}'><img  class='img_admin'  src='img/krestDel.png'></a></div>" .
                                "<div tabindex='0' class='p_text_td edi'><a id='edit' href='#' onclick='changeUrl({$result['id']}); return false;'><img  class='img_admin' src='img/penEdi.png'></a></div>" .
                                '</div>';
                        }
                        ?>
                        <script>
                            function changeUrl(id) {
                                // Получаем текущий URL
                                const currentUrl = window.location.href;
                                // Формируем новый URL с параметром red_id
                                const newUrl = currentUrl.split('?')[0] + '?red_id=' + id;
                                // Меняем URL без перезагрузки страницы
                                history.pushState(null, null, newUrl);
                            }
                        </script>
                        <div class="pagination" aria-label="пагинация">
                            <button id="prevBtn"><img class="pagination_arrow" src="img/pagination_l.svg"></button>
                            <span tabindex='0' id="currentPage">1</span>
                            <span tabindex='0' >из</span>
                            <span tabindex='0' id="totalPages">10</span>
                            <button id="nextBtn"><img class="pagination_arrow" src="img/pagination_r.svg"></button>
                        </div>
                    </div>
                </div>
                <!-- Форма с полями ввода -->
                <div id="modal" class="modal">
                    <div class="modalcontent">
                        <div class="info_modal">
                            <div tabindex='0' aria-label="закрыть окно" class="closemodal">×</div>
                            <p tabindex='0' id="contenttext">Редакторовать</p>
                        </div>
                        <form method="post" class="admin_form" enctype="multipart/form-data">
                            <div class="content_users">
                                <div>
                                    <div class='p_text_td'>
                                        <input tabindex='0' type="text" placeholder="ФИО" class="login_admin user_name_admin"
                                               pattern="([А-ЯЁ][а-яё]+[\-\s]?){3,}" name="name" required
                                               value="<?php isset($_GET['red_id']) ? $dataUsers['name'] : ''; ?>">
                                        <span tabindex='0' class="form__error">поле должно содержать буквы</span>
                                    </div>
                                </div>
                                <div id="status_td">
                                    <div class='p_text_td'>
                                        <input tabindex='0' type="text" placeholder="статус" class="login_admin user_status_admin" name="status"
                                               pattern="^[01]+$" size="3" required
                                               value="<?php isset($_GET['red_id']) ? $dataUsers['name'] : ''; ?>">
                                        <span tabindex='0' class="form__error">число должно быть 0 или 1</span>
                                    </div>
                                </div>
                            <div>
                                <div class='p_text_td'>
                                    <input tabindex='0' type="text" placeholder="дата" class="login_admin user_date_admin"
                                           name="date" pattern="\d{4}-\d{2}-\d{2} \d{2}:\d{2}|unceration"
                                           size="3" required
                                           value="<?php isset($_GET['red_id']) ? $dataUsers['name'] : ''; ?>">
                                    <span tabindex='0' class="form__error">не соответвует формату</span>
                                </div>
                            </div>
                                <div>
                                    <div class='p_text_td'>
                                        <input tabindex='0' type="text" placeholder="кабинет" class="login_admin user_cabinet_admin"
                                               name="cabinet" pattern="^\d{3}$"
                                               size="3" required
                                               value="<?php isset($_GET['red_id']) ? $dataUsers['name'] : '';?>">
                                        <span tabindex='0' class="form__error">должно быть число длиной 3 символа</span>
                                    </div>
                                </div>
                            <div>
                                <button name="sendusercontent" class="btn_form" type="submit">сохранить</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
</div>
</main>
<footer class="footer" style="display: flex">
    <div class="footer__container" aria-label="дополнительная информация">
        <div class="block_item footer__content">
            <p tabindex='0' class="footer_text">
                Государственное бюджетное стационарное учреждение социального обслуживания Московской области
                «Семейный центр имени А.И. Мещерякова».
            </p>
        </div>
    </div>
    </div>
</footer>
</div>
</body>
</html>