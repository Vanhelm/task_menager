<?php 
require_once('system/init.php');

$title = 'Редактировать';

if(empty($admin)){
    header("Location: /");
    exit();
}
if(isset($_GET['task'])){
    $id_task=$_GET['task'];
}
if(isset($_COOKIE['id_task'])){
    $id_task = intval($_COOKIE['id_task']);
}else{
    setcookie("id_task", $id_task);
    
}
$result_task = mysqli_query($link, "SELECT * FROM tasks WHERE id_task = $id_task");
$task = mysqli_fetch_assoc($result_task);
$errors = [];
$text_task = $task['text_task'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['task']) AND !empty(trim($_POST['task']))){
        $text_task = mysqli_real_escape_string($link, trim($_POST['task']));
    }else{
        $errors['task'] = "Это поле обязательно для заполнения";
    }
    if(isset($_POST['radio'])){
        $status = intval($_POST['radio']);
    }
    if(empty($errors)){
        $sql = "UPDATE tasks SET text_task='$text_task', status=$status WHERE id_task=$id_task";
        $result = mysqli_query($link, $sql);

        if ($result) {
            setcookie("id_task", '');
            header("Location: /");
            exit();
        }
    }
}

$layout = include_template('edit.php', ['title'=>$title, 'errors'=>$errors, 'data'=> $text_task, 'status' => $task['status'], 'admin' => $admin]);
print_r($layout);