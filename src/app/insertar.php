<?php
include("conexion.php");
$con=conectar();

$id=$_POST['id'];
$user=$_POST['user'];
$password=$_POST['password'];
$rol=$_POST['rol'];
$name=$_POST['name'];
$surname=$_POST['surname'];
$mail=$_POST['mail'];


$sql="INSERT INTO login VALUES('$id','$user','$password','$rol','$name','$surname','$mail')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: admin.php");
    
}else {
}
?>