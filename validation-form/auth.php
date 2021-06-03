<?php
	$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
	$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

	if ($login == '') {
		echo "<h1 align='center'>Вы не ввели логин, повторите попытку ";?><a href="/index.php">еще раз</a></h1><?php
		exit();
	} elseif ($pass == '') {
		echo "<h1 align='center'>Вы не ввели пароль, повторите попытку ";?><a href="/index.php">еще раз</a></h1><?php
		exit();
	}
	else {
	$pass = md5($pass."dXa2cK9Mar2P4");

	$mysql = new mysqli('127.0.0.1', 'root', 'root', 'register-bd');

	$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");
	$user = $result->fetch_assoc();
	if($user == '') {
		echo "<h1 align='center'>Такой пользователь не найден, проверьте данные и "?><a href="/index.php">введите еще раз</a></h1><?php
		exit();
	}

	setcookie('user', $user['name'], time() + 3600, "/");

	$mysql->close();

	header('Location: /');
	}
?>