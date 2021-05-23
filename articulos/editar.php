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
    include 'conexiondb_CRUD.php';
    include 'eliminar.php';
$id=$_GET['id'];
$sql="SELECT * FROM persona WHERE id='".$id."' ";
$resultado = $conexionDB->query($sql);
while ($filas = $resultado->fetch_array()) { 
?>
    <table>
        <tr>
            <td><?php echo $filas['id'] ?></td>
            <td><?php echo $filas['usuario'] ?></td>
            <td><?php echo $filas['apenom'] ?></td>
            <td><?php echo $filas['email'] ?></td>
            <td><?php echo $filas['clave'] ?></td>
        </tr>
    </table>

    <div>
        <form action="editar.php">
            <input type="hidden" name="txtid" value="<?php echo $filas['id']?>">
            <label>Nombre y Apellido</label><br>
            <input type="text" name="txtapenom" value="<?php echo $filas['apenom']?>"><br>
            <label>Usuario</label><br>
            <input type="text" name="txtuser" value="<?php echo $filas['usuario']?>"><br>
            <label>Email</label><br>
            <input type="text" name="txtemail" value="<?php echo $filas['email']?>"><br>
            <label>clave</label><br>
            <input type="text" name="txtclave" value="<?php echo $filas['clave']?>"><br>
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
    $apenom=$_GET['txtapenom'];
    $clave=$_GET['txtclave'];
    if($user!=null && $email!=null && $apenom!=null && $clave!=null){
    $sql2="UPDATE persona SET usuario='".$user."', email='".$email."',apenom='".$apenom."',clave='".$clave."' WHERE id='".$idp."' ";   
    $resultado2=$conexionDB->query($sql2);
        echo "entro";
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