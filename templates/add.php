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

<form action="/add.php" method="post">
  <div class="form-group">
    <label for="formGroupExampleInput">Ваше имя:</label>
    <input  type="text" name="name" class="form-control <? if(!empty($errors['name'])) :?> is-invalid <?endif?>" id="formGroupExampleInput" placeholder="Имя" value="<?=$data['name'] ?? "" ?>">
    <? if(!empty($errors['name'])) :?>
        <div class="invalid-feedback">
          <?=$errors['name']?>
        </div>
    <? endif ?>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Ваш Email:</label>
    <input type="email" name="email" class="form-control <? if(!empty($errors['email'])) :?> is-invalid <?endif?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Еmail" value="<?=$data['email'] ?? "" ?>">
    <? if(!empty($errors['email'])) : ?>
        <div class="invalid-feedback">
          <?=$errors['email']?>
        </div>
    <? endif ?>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Текст задачи:</label>
    <textarea class="form-control <? if(!empty($errors['task'])) :?> is-invalid <?endif?>" id="exampleFormControlTextarea1" name="task" rows="3"><?=$data['task'] ?? "" ?></textarea>
    <? if(!empty($errors['task'])) : ?>
        <div class="invalid-feedback">
          <?=$errors['task']?>
        </div>
    <? endif ?>
  </div>
  <button type="submit"  class="btn btn-dark">Создать задачу</button>
</form>

<div class="card text-center text-white bg-secondary">
  <div class="card-body">
    <h5 class="card-title">Тестовое задание</h5>
    <p class="card-text">Ссылка на git ниже. Время выполнения: 07:36:00</p>
    <a href="#" class="btn btn-dark">Github</a>
  </div>
</div>




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>