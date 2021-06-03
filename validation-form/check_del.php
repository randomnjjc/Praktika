<?php
	$id = filter_var(trim($_POST['del_user']), FILTER_SANITIZE_STRING);

if (is_numeric($id)){
	$servername = "127.0.0.1";
	$username = "root";
	$password = "root";
	$dbname = "register-bd";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
    	echo "<h1 align='center'>Connection failed: " . $conn->connect_error?><br> Пожалуйста, повторите попытку <a href="/database/deleteDB.php">еще раз</a></h1><?php
    	exit();
	}

	$result = $conn->query("SELECT * FROM `users` WHERE `id` = '$id'");
	$user = $result->fetch_assoc();
	if($user == '') {
		echo "<h1 align='center'>Такой пользователь не найден, проверьте данные и "?><a href="/index.php">введите еще раз</a></h1><?php
		exit();
	} else {
		$sql = "SELECT id, login, pass, name FROM users";
		$sql = "DELETE FROM `users` WHERE `users`.`id` = $id";
		$result = $conn->query($sql);
		$conn->close();
		if (isset($_COOKIE['user'])){
		setcookie('user', $_COOKIE['user'], time() - 3600, "/");
		header('Location: /database/deleteDB.php');}
		else {
			header('Location: /database/deleteDB.php');
		}
		}

	} else if ($id == ''){
		echo "<h1 align='center'>Вы не ввели id, пожалуйста, повторите попытку ";?><a href="/database/deleteDB.php">еще раз</a></h1><?php
		exit();
	} else {
		echo "<h1 align='center'>Вы ввели не существующий id,<br> пожалуйста, повторите попытку ";?><a href="/database/deleteDB.php">еще раз</a></h1><?php
		exit();
	}
?>