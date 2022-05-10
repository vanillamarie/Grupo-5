<?php
$hostdb="localhost";
$userdb = "root";
$passworddb = "";
$db = "proyecto_005";

$data=mysqli_connect($hostdb,$userdb,$passworddb,$db);

if ($data==false){
    die("Error de conexion");
}

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = $_POST["user"];
    $password = $_POST["password"];
    $sql="SELECT * FROM login WHERE User='".$username."' AND Password='".$password."'";
    $result=mysqli_query($data,$sql);
    $row=mysqli_fetch_array($result);

    if($row["Rol"]=="user"){
        header("Location: ../app/user.html");
    }
    elseif ($row["Rol"]=="admin"){
        header("Location: admin.php");

    }else{
        echo "ERROR";
    }
}
?>