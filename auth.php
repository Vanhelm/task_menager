<?php
require_once('system/init.php');

$title = 'Вход';

$keys = ['name', 'password'];
$errors = [];
$data = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Проверяем заполнены обязательные поля, если нет записываем в массив  Errors
    foreach ($keys as $val) {

        if (isset($_POST[$val]) AND !empty(trim($_POST[$val]))) {
            $data[$val] = mysqli_real_escape_string($link, trim($_POST[$val]));
        } else {
            $errors[$val] = "Это поле обязательно для заполнения";
        }
    }
    if(empty($errors['name'])){
        if($data['name'] == "admin" AND $data['password'] == 123){
            $sql = "SELECT * FROM users WHERE name='" . $data['name'] . "'";
            $res = mysqli_query($link, $sql);
            $admin_id = mysqli_fetch_assoc($res);
            $_SESSION['admin'] = intval($admin_id['id']);
            header("Location: /");
            exit();
        }else{
            $errors['name'] = "Логин или пароль не верны";
            $errors['password'] = "Логин или пароль не верны";
        }
    }
}

$content = include_template('auth.php', ['data' => $data, 'errors' => $errors, 'title' => $title]);
print_r($content);