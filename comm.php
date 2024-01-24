<!doctype html>
<html lang="ru">
<head>
    <title>Админ-панель</title>
</head>
<body>
<div class="table_users">
    <?php
    $connect = mysqli_connect('localhost', 'annabelk', '201500Anna', 'testCoursework');
    if (!$connect) {
        die('error connect to database');
    }
    if (isset($_POST["name"])) {
        //Если это запрос на обновление, то обновляем
        if (isset($_GET['red_id'])) {
            $tableUse = mysqli_query($connect, "UPDATE `usersCoursework` SET `name` = '{$_POST['name']}',`status` = '{$_POST['status']}' WHERE `id`= {$_GET['red_id']}");
        } else {
            //Иначе вставляем данные, подставляя их в запрос
            $tableUse = mysqli_query($connect, "INSERT INTO `usersCoursework` (`name`, `status`) VALUES ('{$_POST['name']}', '{$_POST['status']}')");
        }

        //Если вставка прошла успешно
        if ($tableUse) {
            echo '<p>Успешно!</p>';
        } else {
            echo '<p>Произошла ошибка: ' . mysqli_error($connect) . '</p>';
        }
    }

    if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
        //удаляем строку из таблицы
        $tableUse = mysqli_query($connect, "DELETE FROM `usersCoursework` WHERE `id` = {$_GET['del_id']}");
        if ($connect) {
            echo "<p>пользователь удален.</p>";
        } else {
            echo '<p>Произошла ошибка: ' . mysqli_error($connect) . '</p>';
        }
    }

    //Если передана переменная red_id, то надо обновлять данные. Для начала достанем их из БД
    if (isset($_GET['red_id'])) {
        $tableUse = mysqli_query($connect, "SELECT `id`, `name`, `status` FROM `usersCoursework` WHERE `id`={$_GET['red_id']}");
        $dataUsers = mysqli_fetch_array($tableUse);
    }
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>ФИО</td>
                <td><input type="text" name="name" value="<?= isset($_GET['red_id']) ? $dataUsers['name'] : ''; ?>"></td>
            </tr>
            <tr>
                <td>статус:</td>
                <td><input type="text" name="status" size="3" value="<?= isset($_GET['red_id']) ? $dataUsers['status'] : ''; ?>"> руб.</td>
            </tr>
            <tr>
                <button class="btn_form" type="submit">отправить</button>
            </tr>
        </table>
    </form>
    <table border='1'>
        <tr>
            <td>Идентификатор</td>
            <td>Наименование</td>
            <td>Цена</td>
            <td>Удаление</td>
            <td>Редактирование</td>
        </tr>
        <?php
        $tableUse = mysqli_query($connect, 'SELECT `id`, `name`, `status` FROM `usersCoursework`');
        while ($result = mysqli_fetch_array($tableUse)) {
            echo '<tr>' .
                "<td>{$result['id']}</td>" .
                "<td>{$result['name']}</td>" .
                "<td>{$result['status']} ₽</td>" .
                "<td><a href='?del_id={$result['id']}'>Удалить</a></td>" .
                "<td><a href='?red_id={$result['id']}'>Изменить</a></td>" .
                '</tr>';
        }
        ?>
    </table>
    <!--                        </div>-->
</div>
</body>
</html>