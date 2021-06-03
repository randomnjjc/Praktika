<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Удалить пост</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/navigation.css">
    <style>
  body { background: url(/photo/fon1.jpg); }
</style>
</head>
<body>
    <nav class="top-menu">
    <ul class="menu-main">
    <li><a href="/reg.php">Зарегистрироваться</a></li>
    <li><a href="/index.php">Войти</a></li>
    <li><a href="database.php">База данных</a></li>
    <li><a href=""class="current">Удалить пост</a></li>
    </ul>
    </nav>

    <div class="container mt-4">
        <div class="row">

<?php
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "register-bd";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, login, pass, name FROM users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    echo '<table border="3" align="center" width="50%" cellpadding
="5" bgcolor="GreenYellow" bordercolor="Black">';
    echo '<td>id</td><td>Name</td><td>Login</td><td>Password</td><tr>';
    while($row = $result->fetch_assoc()) {
        echo "<td> " . $row["id"]. "</td> <td>" . $row["name"]. "</td> <td> " . $row["login"]. "</td> <td>**********</td><tr><br>";
    }
    echo '</table>';
} else {
    echo "0 results";
}
$conn->close();
?>

            <div class="col" align="center">
                <h1>Введите id пользователя,<br> которого хотите удалить</h1>
                <form action="/validation-form/check_del.php" method="post">
                <input type="text" class="form-control" name="del_user" id="del_user" placeholder="Введите id"><br>
                <button class="btn btn-success" type="submit">Удалить</button>
            </div>
        </div>
    </div>
</body>
</html>