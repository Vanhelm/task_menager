<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <title><?=$title?></title>
</head>
<body>

<nav class="navbar navbar-dark bg-dark justify-content-end">

<ul class="nav">
<li class="nav-item btn-dark">
    <a class="nav-link" href="/">Главная</a>
  </li>
<li class="nav-item btn-dark">
    <a class="nav-link" href="/add.php">Создать задачу</a>
  </li>
  <li class="nav-item">
  <span class="navbar-text">
    <? if(!empty($admin)) : ?> Администратор <? endif ?>
    </span>
  </li>
  <li class="nav-item">  
    <? if(empty($admin)) : ?> <a class="nav-link active" href="/auth.php">Вход</a><? endif ?>
    <? if(!empty($admin)) : ?> <a class="nav-link active" href="/logout.php">Выход</a> <? endif ?>
  </li>
</ul>
</nav>

<nav class="navbar navbar-expand-lg navbar-dark text-center">
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="/index.php?sort=name_user">Сортировка по имени</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/index.php?sort=email_user">Сортировка по email</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/index.php?sort=status">Сортировка по статусу</a>
      </li>
    </ul>
  </div>
</nav>


<div class="row">
<? foreach($tasks as $task) : ?>
  <div class="col-sm-6 text-center">
    <div class="card text-white bg-secondary <? if($task['status'] == 0) : ?> bg-success <? endif ?> mb-3">
      <div class="card-body">
        <h5 class="card-title"><?=$task['name_user']?>, ставит задачу:</h5>
        <p class="card-text"><?=$task['text_task']?></p>
        <p class="card-text">Email: <?=$task['email_user']?></p>
        <? if($task['status'] == 0) : ?> Задача выполнена <? endif ?>
        <? if($task['status'] == 1) : ?> Задача открыта <? endif ?>
        <? if(!empty($admin)) : ?> <a href="/edit.php?task=<?=$task['id_task']?>" class="btn btn-dark">Редактировать</a> <? endif ?>
      </div>
    </div>
  </div>
<? endforeach ?>
</div>
<?if($pages_count > 1) : ?>
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center navbar-dark">
    <? foreach($pages as $page) : ?>
    <li class="page-item <?if($page == $current_page) :?> active <? endif ?>"><a class="page-link" href="/?page=<?=$page?><?if(isset($sort)) : ?>&sort=<?=$sort?> <?endif?> "><?=$page?></a></li>
    <? endforeach ?>
  </ul>
</nav>
<? endif ?>

<div class="card text-center text-white bg-secondary">
  <div class="card-body">
    <h5 class="card-title">Тестовое задание</h5>
    <p class="card-text">Ссылка на git ниже. Время выполнения: 07:36:00</p>
    <a href="https://github.com/Vanhelm/task_menager" class="btn btn-dark">Github</a>
  </div>
</div>




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>