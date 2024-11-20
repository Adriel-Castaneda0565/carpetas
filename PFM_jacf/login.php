<?php
session_start();
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Prevenir SQL Injection
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    $sql = "SELECT id, username, password FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['users'] = $row['username'];
            header("location: index.php");
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found.";
    }
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="login-box">
        <h2>INICIAR SESION</h2>
        <form method="POST" action="">
            <div class="textbox">
                <input type="text" placeholder="Usuario" name="username" required>
            </div>
            <div class="textbox">
                <input type="password" placeholder="Contraseña" name="password" required>
            </div>
            <input type="submit" class="btn" value="Iniciar  Sesion"><br><br>
            <a href="inicio.php"class="btn">Volver</a><br><br><br>
        </form>
    </div>
</body>
</html>