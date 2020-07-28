<?php 
session_start();
$_SESSION = [];
setcookie("id_task", '');
header("Location: /");