<?php
session_start();
//Включаем ошибки
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

//Ставим время МСК
date_default_timezone_set('Europe/Moscow');

require_once('functions/functions.php');

$link = mysqli_connect("localhost", "vanhelm_tasks", "P4fhpr1231", "vanhelm_tasks");
$admin_status = 0;
$admin = [];


if (isset($_SESSION['admin'])) {
    $admin_status = $_SESSION['admin'];
    $sql_user = "SELECT * FROM users WHERE admin = " . $admin_status;
    $result = mysqli_query($link, $sql_user);
    $admin = mysqli_fetch_assoc($result);
}
