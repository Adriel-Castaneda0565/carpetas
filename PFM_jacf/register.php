<?php
include('db.php');

//user

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=$_POST['username'];
    $password=$_POST['password'];

    //Prevenir SQL injection
    $username=$conn->real_escape_string($username);
    $password=$conn->real_escape_string($password);

    //Hash de la contraseña
    $password_hashed=password_hash($password,PASSWORD_BCRYPT);

    $sql="INSERT INTO users(username,password)VALUES('$username','$password_hashed')";

    if($conn->query($sql)==TRUE){
        echo"User registered successfuly!";
        header("location: login.php");
    }else{
        echo"Error:".$sql. "<br>".$conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="login-box">
        <h2>Registro</h2>
        <form method="POST" action="">
            <div class="textbox">
                <input type="text" placeholder="Usuario" name="username" required>
            </div>
            <div class="textbox">
                <input type="password" placeholder="Contraseña" name="password" required>
            </div>
            <a href="index.php"><input type="submit" class="btn" value="Registrar"></a><br><br>
            <a href="inicio.php"class="btn">Volver</a><br><br><br>
        </form>

    </div>

</body>
</html>