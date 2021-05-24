<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Articulo</title>
</head>

<body>
<?php 
    include 'C:\xampp\htdocs\Instituto\Programacion\tp-progra-restaurant/conexiondb_CRUD.php';
?>
    <div>
        <form action="agregar.php" method="GET">
            <label>Nombre</label><br>
            <input type="text" name="txtnombre"><br>
            <label>Precio</label><br>
            <input type="text" name="txtprecio"><br>
            <label>Descripcion</label><br>
            <input type="text" name="txtdescripcion"><br>
            <input type="submit" value="Agregar" name="submit">
            <hr>
            <a href="index.php">Regresar</a>
        </form>
    </div>

    <?php 
    if(isset($_GET['submit'])){
    $nombre=$_GET['txtnombre'];
    $descripcion=$_GET['txtdescripcion'];
    $precio=$_GET['txtprecio'];
        if($nombre!=null && $descripcion!=null && $precio!=null){
        $sql="INSERT INTO articulo (nombre,descripcion,precio)VALUES('".$nombre."','".$descripcion."','".$precio."')";
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