<?php
//проверка наличия пользователя из базы данных
session_start();
//require_once 'connect.php';
$connect = mysqli_connect('localhost', 'annabelk', '201500Anna', 'testCoursework');
if (!$connect) {
    die('error connect to database');
}
$login = $_POST['login'];
$password = md5($_POST['password']);

$tableUse = mysqli_query($connect, "SELECT * FROM `usersCoursework` WHERE `login` = '$login' AND `password` = '$password' ");

$kapha = $_POST['kapcha'];
if ($kapha === $_SESSION['rand_code']) {
    if (mysqli_num_rows($tableUse) > 0) {
        $user = mysqli_fetch_assoc($tableUse);
        $_SESSION['user'] = [
            "name" => $user['name'],
            "img" => $user['img'],
            "email" => $user['email'],
            "role" => $user['role'],
        ];
        $role = $user['role'];
        $id = $user['id'];
        $_SESSION['id'] = $id;
        header('Location: http://project/profile.php');
        if ($role === 'admin') {
            header('Location: http://project/admin.php');
        }
    } else {
        $_SESSION['message'] = 'неверный пароль';
        header('Location: http://project/entrance.php');
    }
} else{
    header('Location: http://project/entrance.php');
    $_SESSION['message'] = 'Captcha введена неверно';
}



