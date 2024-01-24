<?php
session_start();
$connect = mysqli_connect('localhost', 'annabelk', '201500Anna', 'testCoursework');
if (!$connect) {
    die('error connect to database');
}
if ($connect) {
    $id = $_SESSION['id'];
    // Получение значения статуса
    $statusQuery = mysqli_query($connect, "SELECT `cabinet` FROM `usersCoursework` WHERE `id` = '$id'");
    $row = mysqli_fetch_assoc($statusQuery);
    $cabinet = $row['cabinet'];
    echo $cabinet;

} else {
    echo "Ошибка при обновлении статуса: " . mysqli_error($connect);
}
