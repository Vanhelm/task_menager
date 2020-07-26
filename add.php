<?php
require_once('system/init.php');
//Объявляем переменные
$title = 'Создать задачу';
$keys = ['email', 'task'];
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
    if (strlen($_POST['name']) > 30) {
        $errors['name'] = "Cлишком длинное имя, максимум 30 символов";
    }else{
        $data['name'] = mysqli_real_escape_string($link, trim($_POST['name']));
        if(empty($data['name'])){
            $data['name'] = "Гость";
        }
    }
    if (empty($errors['email'])) {
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "E-mail введён некорректно";
        }
    }
    if(empty($errors['task']) AND mb_strlen($data['task'] > 256)){
        $errors['task'] = "Слишком длинная задача, максимум 256 сивмолов";
    }
    if (empty($errors)) {
        $sql = "INSERT INTO tasks (text_task, name_user, email_user) VALUES ('" . $data['task'] . "','" . $data['name'] . "','" . $data['email'] . "')";
        $result = mysqli_query($link, $sql);

        if ($result) {
            header("Location: /");
            exit();
        }
    }
}




$layout = include_template('add.php', ['title'=>$title, 'errors'=>$errors, 'data'=>$data]);

print_r($layout);
