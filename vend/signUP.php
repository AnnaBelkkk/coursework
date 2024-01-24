<?php
session_start();
//require_once 'connect.php';
$connect = mysqli_connect('localhost', 'annabelk', '201500Anna', 'testCoursework');
if (!$connect) {
    die('error connect to database');
}
$allowedFormats = array(IMAGETYPE_JPEG, IMAGETYPE_PNG);
$name = $_POST['name'];
$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['passwordConfirm'];

//    print_r($_FILES)
$imageType = exif_imagetype($_FILES['img']['tmp_name']);

$kapha = $_POST['kapcha'];
    if ($password === $password_confirm) {
        if ($kapha === $_SESSION['rand_code']) {
            //$_FILES['img']['name'];
            $ava = 'uploads/' . time() . $_FILES['img']['name'];
            if (!move_uploaded_file($_FILES['img']['tmp_name'], '../' . $ava)) {
                $_SESSION['message'] = 'ошибка';
                header('Location: ../registration.php');
            } else if ($_FILES['img']['size'] > 1048576 || !in_array($imageType, $allowedFormats)){
                $_SESSION['message'] = 'Ошибка, изображение превышает 1 МБ или не того формата(png,jpeg)';
                header('Location: ../registration.php');
                exit;
            }

            $password = md5($password);
            // Проверяем, установлена ли переменная в сессии
            // Инкрементируем значение переменной в сессии
            mysqli_query($connect, "INSERT INTO `usersCoursework` ( `name`, `login`, `email`, `password`, `img`) VALUES ( '$name', '$login', '$email', '$password', '$ava')");
            $_SESSION['message'] = 'Вы зарегистрированы';

//    mysqli_query($connect, "INSERT INTO `usersCoursework` (`id`, `name`, `login`, `email`, `password`, `img`) VALUES ('$a', '$name', '$login', '$email', '$password', '$ava')");
//    $_SESSION['message'] = 'вы зарегистрированы';
            header('Location: http://project/entrance.php');
        } else{
            header('Location: http://project/registration.php');
            $_SESSION['message'] = 'Captcha введена неверно';
        }
    } else {
        $_SESSION['message'] = 'пароли не совпадают';
        header('Location: http://project/registration.php');
        //die('пароли не совпадают');

}
