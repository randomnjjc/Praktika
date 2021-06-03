<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/navigation.css">
    <style>
  body { background: url(photo/fon1.jpg); }
</style>
</head>
<body>
    <nav class="top-menu">
    <ul class="menu-main">
    <li><a href="" class="current">Зарегистрироваться</a></li>
    <li><a href="index.php">Войти</a></li>
    <li><a href="database/database.php">База данных</a></li>
    <li><a href="database/deleteDB.php">Удалить пост</a></li>
    </ul>
    </nav>

    <div class="container mt-4">

        <?php
            if (!isset($_COOKIE['user'])):
        ?>

        <div class="row">
            <div class="col" align="center">
                <h1>Регистрация</h1>
                <form action="validation-form/check.php" method="post">
                <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин"><br>
                <input type="text" class="form-control" name="name" id="name" placeholder="Введите имя"><br>
                <input type="password" class="form-control" name="pass" id="pass" placeholder="Введите пароль"><br>
                <button class="btn btn-success" type="submit">Зарегистрировать</button>
                </form>
            </div>

    <?php else: ?>
        <h1 align="center"><img style="width: 35%; height: 35%;" src="photo/cat.jpg"><br>Привет, <?=$_COOKIE['user']?>!<br> Вы уже зарегистрированы.<br> Чтобы выйти или создать новый аккаунт нажмите <a href="validation-form/exit_create.php">здесь</a>.</h1>

    <?php endif; ?>
</div>
    </div>
</body>
</html>