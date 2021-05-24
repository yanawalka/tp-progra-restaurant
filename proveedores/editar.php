<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>

<body>
    <?php
    include 'C:\xampp\htdocs\Instituto\Programacion\tp-progra-restaurant/conexiondb_CRUD.php';
$id=$_GET['id'];
$sql="SELECT * FROM proveedores WHERE id='".$id."' ";
$resultado = $conexionDB->query($sql);
while ($filas = $resultado->fetch_array()) { 
?>

<table>
        <tr>
            <td><?php echo $filas['id'] ?></td>
            <td><?php echo $filas['nombre'] ?></td>
            <td><?php echo $filas['telefono'] ?></td>
            <td><?php echo $filas['mail'] ?></td>
        </tr>
    </table>


 <div>
        <form action="editar.php">
            <input type="hidden" name="txtid" value="<?php echo $filas['id']?>">
            <label>Nombre y Apellido</label><br>
            <input type="text" name="txtuser" value="<?php echo $filas['nombre']?>"><br>
            <label>Telefono</label><br>
            <input type="text" name="txtelefono" value="<?php echo $filas['telefono']?>"><br>
            <label>Email</label><br>
            <input type="text" name="txtemail" value="<?php echo $filas['mail']?>"><br>
            <input type="submit" value="Actualizar" name="submit">
            <hr>
            <a href="index.php">Regresar</a>
        </form>
    </div>
    <?php } ?>
    <?php 
    if(isset($_GET['submit'])){
        $idp=$_GET['txtid'];
        $user=$_GET['txtuser'];
        $email=$_GET['txtemail'];
        $telefono=$_GET['txtelefono'];
    if($user!=null && $email!=null && $telefono!=null){
    $sql2="UPDATE proveedores SET nombre='".$user."', mail='".$email."',telefono='".$telefono."' WHERE id='".$idp."' ";   
    $resultado2=$conexionDB->query($sql2);
        if ($resultado2==1){
            header("location:index.php");
            echo "Se agrego nuevo registro";
        }
        else
        {
            echo " ERROR: No fue posible ejecutar la consulta: $sql.". $conexionDB->error;
        }
    }
    else{echo "no lleno todos los campos";}
}
    ?>
</body>

</html>