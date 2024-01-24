<?php
//проверка наличия пользователя из базы данных
session_start();
//require_once 'connect.php';
$connect = mysqli_connect('localhost', 'annabelk', '201500Anna', 'testCoursework');
if (!$connect) {
    die('error connect to database');
}
$id = $_SESSION['id'];
// Обновление значения столбца status
$tableUse = mysqli_query($connect,"UPDATE `usersCoursework` SET `status` = 1 WHERE `date` = 'unceration' AND `id` = '$id' ");
$status = $_SESSION['userStatus'];


echo '   ';
echo $status;

if ($connect->query($tableUse) === TRUE) {
    echo "Статус успешно обновлен";
} else {
    echo "Ошибка при обновлении статуса: " . $connect->error;
}
echo $tableUse;
if ($tableUse) {
        // Получение значения статуса
        $statusQuery = mysqli_query($connect, "SELECT `status` FROM `usersCoursework` WHERE `data` IS NULL");
        $row = mysqli_fetch_assoc($statusQuery);
        $status = $row['status'];
        $_SESSION['userStatus'] = $status;
   echo $status;
//        echo $id;

} else {
    echo "Ошибка при обновлении статуса: " . mysqli_error($connect);
}



$connect->close();
// Закрытие соединения с базой данных

