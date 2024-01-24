<?php
//mysql_connect
//подключение к базе данных
$connect = mysqli_connect('localhost', 'annabelk', '201500Anna', 'testCoursework');
if (!$connect) {
    die('error connect to database');
}