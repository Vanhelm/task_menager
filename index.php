<?php
require_once('system/init.php');

$title = 'Главная страница';
$sort = null;

$current_page = $_GET['page'] ?? 1;
$page_items = 4;
$result = mysqli_query($link, "SELECT COUNT(*) as cnt FROM tasks");
$items_count = mysqli_fetch_assoc($result)['cnt'];
$pages_count = ceil($items_count/$page_items);
$offset = ($current_page - 1) * $page_items;
$pages = range(1, $pages_count);

$sql_tasks = "SELECT * FROM tasks LIMIT $page_items OFFSET $offset";
$res_tasks = mysqli_query($link, $sql_tasks);
$tasks = mysqli_fetch_all($res_tasks, MYSQLI_ASSOC);

if(isset($_GET['sort'])){
    $sort = mysqli_real_escape_string($link,($_GET['sort']));
    $sql_tasks = "SELECT * FROM tasks ORDER BY $sort ASC LIMIT $page_items OFFSET $offset";
    $res_tasks = mysqli_query($link, $sql_tasks);
    $tasks = mysqli_fetch_all($res_tasks, MYSQLI_ASSOC);
}


$layout = include_template('layout.php', ['title'=>$title, 'tasks' => $tasks, 'pages' => $pages, 'pages_count' => $pages_count, 'current_page' => $current_page, 'admin' => $admin, 'sort' => $sort]);

print_r($layout);
