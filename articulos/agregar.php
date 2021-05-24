<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuario</title>
</head>

<body>
<?php 
    include 'C:\xampp\htdocs\Instituto\Programacion\tp-progra-restaurant/conexiondb_CRUD.php';
?>
    <div>
        <form action="agregar.php" method="GET">
            <label>Usuario</label><br>
            <input type="text" name="txtuser"><br>
            <label>Nombre y Apellido</label><br>
            <input type="text" name="txtapenom"><br>
            <label>Email</label><br>
            <input type="text" name="txtemail"><br>
            <label>clave</label><br>
            <input type="text" name="txtclave"><br>
            <input type="submit" value="Agregar" name="submit">
            <hr>
            <a href="index.php">Regresar</a>
        </form>
    </div>

    <?php 
    if(isset($_GET['submit'])){
    $user=$_GET['txtuser'];
    $email=$_GET['txtemail'];
    $apenom=$_GET['txtapenom'];
    $clave=$_GET['txtclave'];
        if($user!=null && $email!=null && $apenom!=null && $clave!=null){
        $sql="INSERT INTO persona (usuario,email,apenom,clave)VALUES('".$user."','".$email."','".$apenom."','".$clave."')";
        $resultado=$conexionDB->query($sql);
        if ($resultado==1){
            header("location:index.php");
            echo "Se agrego nuevo registro";
        }
        else
        {
            echo " ERROR: No fue posible ejecutar la consulta: $instruccionSql.". $conexionDB->error;
        }
        }
        else{echo "no lleno todos los campos";}
    $conexionDB->close();
    }
    ?>
</body>

</html>