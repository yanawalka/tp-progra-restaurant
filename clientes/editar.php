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
$sql="SELECT * FROM clientes WHERE id='".$id."' ";
$resultado = $conexionDB->query($sql);
while ($filas = $resultado->fetch_array()) { 
?>
    <div>
        <form action="editar.php">
            <input type="hidden" name="txtid" value="<?php echo $filas['id']?>">
            <label>Nombre y Apellido</label><br>
            <input type="text" name="txtapenom" value="<?php echo $filas['apenom']?>"><br>
            <label>Email</label><br>
            <input type="text" name="txtemail" value="<?php echo $filas['mail']?>"><br>
            <label>telefono</label><br>
            <input type="text" name="txttelefono" value="<?php echo $filas['telefono']?>"><br>
            <label>Direccion</label><br>
            <input type="text" name="txtdireccion" value="<?php echo $filas['direccion']?>"><br>
            <input type="submit" value="Actualizar" name="submit">
            <hr>
            <a href="index.php">Regresar</a>
        </form>
    </div>
    <?php } ?>
    <?php 
    if(isset($_GET['submit'])){
    $idp=$_GET['txtid'];
    $direccion=$_GET['txtdireccion'];
    $email=$_GET['txtemail'];
    $apenom=$_GET['txtapenom'];
    $telefono=$_GET['txttelefono'];
    if($direccion!=null && $email!=null && $apenom!=null && $telefono!=null){
    $sql2="UPDATE clientes SET direccion='".$direccion."', mail='".$email."',apenom='".$apenom."',telefono='".$telefono."' WHERE id='".$idp."' ";   
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