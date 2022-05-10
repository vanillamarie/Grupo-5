<?php 
    include("conexion.php");
    $con=conectar();

    $sql="SELECT * FROM login";
    $query=mysqli_query($con,$sql);

    $row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Página admin | GTI</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <style>
            input[type=button] {
                width: 180px;
                height: 50px;
                margin: 10% 50%;
                transform: translate(-50%, -50%);
                border-radius: 7px;
                border: 1px solid #fff;
                color: #fff;
                background-color: #820053;
                margin-top: 30px;
                margin-bottom: 0px;
            }
        </style>
    </head>
    <body>

            <div class="container mt-5" id="start">
                    <div class="row"> 
                        
                        <div class="col-md-3">
                            <a href="../index.html"><input type="button" value="Volver al inicio"></a>
                            <h1>Ingrese datos</h1>
                                <form action="insertar.php" method="POST">

                                    <input type="text" class="form-control mb-3" name="id" placeholder="id">
                                    <input type="text" class="form-control mb-3" name="user" placeholder="user">
                                    <input type="text" class="form-control mb-3" name="password" placeholder="password">
                                    <input type="text" class="form-control mb-3" name="rol" placeholder="rol">
                                    <input type="text" class="form-control mb-3" name="name" placeholder="name">
                                    <input type="text" class="form-control mb-3" name="username" placeholder="username">
                                    <input type="text" class="form-control mb-3" name="mail" placeholder="mail">
                                    
                                    <input type="submit" class="btn btn-primary">
                                </form>
                        </div>

                        <div class="col-md-8">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>Id</th>
                                        <th>User</th>
                                        <th>Password</th>
                                        <th>Mail</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr>
                                                <th><?php  echo $row['Id']?></th>
                                                <th><?php  echo $row['User']?></th>
                                                <th><?php  echo $row['Password']?></th>
                                                <th><?php  echo $row['Mail']?></th>    
                                                <th><a href="actualizar.php?id=<?php echo $row['Id'] ?>" class="btn btn-info">Editar</a></th>
                                                <th><a href="delete.php?id=<?php echo $row['Id'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>  
            </div>
    </body>
</html>