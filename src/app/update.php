<?php

include("conexion.php");
$con=conectar();

$id=$_POST['id'];
$user=$_POST['user'];
$password=$_POST['password'];
$mail=$_POST['mail'];

$sql="UPDATE login SET  user='$user',password='$password',mail='$mail' WHERE id='$id'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: admin.php");
    }
?>