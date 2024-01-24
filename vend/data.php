<?php
$connect = mysqli_connect('localhost', 'annabelk', '201500Anna', 'testCoursework');
if (!$connect) {
    die('error connect to database');
}

$tableUse = mysqli_query($connect, "SELECT  `date` FROM `usersCoursework`");

// Формирование массива данных
$data = array();
if ($tableUse->num_rows > 0) {
    while($row = $tableUse->fetch_assoc()) {
        $data[] = $row;
    }
}

// Возвращение данных в формате JSON
header('Content-Type: application/json');
echo json_encode($data);

// Закрытие соединения с базой данных
$connect->close();
?>