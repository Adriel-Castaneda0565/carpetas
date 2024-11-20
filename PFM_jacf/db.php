<?php
$servername="localhost";
$username="root";
$password="";
$dbname="dinotienda";
//crear conexion
$conn=new mysqli($servername,$username,$password,$dbname);
//Verificar la conexion
if($conn->connect_error){
    die("Connection Failed:".$conn->connect_error);
}
?>