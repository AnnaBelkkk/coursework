<?php
session_start();
$id = $_SESSION['id'];
$connect = mysqli_connect('localhost', 'annabelk', '201500Anna', 'testCoursework');
if (!$connect) {
    die('error connect to database');
}
$tableUse2 = mysqli_query($connect, "SELECT * FROM `usersCoursework` WHERE  `id` = '$id'");
$user = mysqli_fetch_assoc($tableUse2);
$cabinet = $user['cabinet'];

function updateStatus($status, $datetime) {
    $connect = mysqli_connect('localhost', 'annabelk', '201500Anna', 'testCoursework');
    if (!$connect) {
        die('Ошибка при подключении к базе данных');
    }
//    session_start();
    $id = $_SESSION['id'];
    $tableUse = "UPDATE `usersCoursework` SET `status` = '$status', `date` = '$datetime', `cabinet` = 104 WHERE `id` = '$id' ";
    if (mysqli_query($connect, $tableUse)) {
        header('Location: http://project/profile.php');
        echo $datetime;
    } else {
        echo "Ошибка при обновлении статуса: " . mysqli_error($connect);
    }
    mysqli_close($connect);
}
if(isset($_POST['update_status_button_1'])) {
    $date = $_POST['date'];
    $time = $_POST['time'];

    if (strlen($date) > 0) {
        $datetime = $date.' '.$time;
        $timestamp = strtotime($date);
        $formattedDate = date("d.m.Y", $timestamp);
        $result = $formattedDate . " " . $time;
        $timestamp = strtotime(str_replace('.', '-', $datetime));
        $formattedDate2 = date("Y-m-d", $timestamp). " " . $time;

        updateStatus(1, $formattedDate2); // Вызываем функцию для обновления статуса на 1


        $_SESSION['messagedate'] = 'дата и время приема: ' . $result;

    } else{
        $_SESSION['messagedate'] = 'введите дату';
        header('Location: http://project/profile.php');
    }
}
// Проверяем, была ли нажата кнопка для обновления статуса на 0
if(isset($_POST['update_status_button_0'])) {
    $datetime = '';
    $_SESSION['messagedate'] = $datetime;
    updateStatus( 0,$datetime); // Вызываем функцию для
}

