<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php 
    include 'sesion.php';
     include 'C:\xampp\htdocs\Instituto\Programacion\tp-progra-restaurant/conexiondb_CRUD.php';
     $sql = "SELECT usuario, clave FROM persona";
     $resultado = $conexionDB->query($sql);
     
     
     $userSession = new UserSession();
     $user = User();

     if(isset($_SESSION['user'])){
         echo "Hay sesion";
     }elseif(isset($_GET['txtuser'] && isset($_GET['txtclave'] )){
        echo "Validacion de login";
     }else{
         echo "nada perro";
     }
     
     
     ?>
    <div>
        <form action="loggin.php" method="GET">
            <label>Usuario</label><br>
            <input type="text" name="txtuser"><br>
            <label>Clave</label><br>
            <input type="text" name="txtclave"><br>
            <input type="submit" value="Ingresar" name="submit">
            <hr>
        </form>
    </div>

    <?php
    while ($filas = $resultado->fetch_array()) {
    
    if(isset($_GET['submit'])){
        $user=$_GET['txtuser'];
        $clave=$_GET['txtclave'];

     if($filas['usuario']==$user && $filas['clave']==$clave){
        echo '<script type="text/javascript">',
        'window.location.replace("index.php");',
        '</script>';
     }
     else {echo "Ingreso un usuario invalido";} 
    }
    
    } ?>


</body>

</html>