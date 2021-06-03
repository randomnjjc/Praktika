<?php
	$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
	$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
	$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

	if(mb_strlen($login) < 3 || mb_strlen($login) > 90) {
		echo "<h1 align='center'>Недопустимая длина логина,<br> пожалуйста, введите от 3 до 90 символов и повторите попытку ";?><a href="/reg.php">еще раз</a></h1><?php
		exit();
	} else if(mb_strlen($name) < 2 || mb_strlen($name) > 50) {
		echo "<h1 align='center'>Недопустимая длина имени,<br> пожалуйста, введите от 2 до 50 символов и повторите попытку ";?><a href="/reg.php">еще раз</a></h1><?php
		exit();
	} else if(mb_strlen($pass) < 4 || mb_strlen($pass) > 10) {
		echo "<h1 align='center'>Недопустимая длина пароля,<br> пожалуйста, введите от 4 до 10 символов и повторите попытку ";?><a href="/reg.php">еще раз</a></h1><?php
		exit();
	}

	$pass = md5($pass."dXa2cK9Mar2P4");

	$mysql = new mysqli('127.0.0.1', 'root', 'root', 'register-bd');
	$mysql->query("INSERT INTO `users` (`login`, `pass`, `name`) VALUES('$login', '$pass', '$name')");

	$mysql->close();

	header('Location: /reg.php');
?>