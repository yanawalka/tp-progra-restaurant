<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="test.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="test.js"></script>

    <title>Document</title>
</head>

<body>
<?php 
     include 'C:\xampp\htdocs\Instituto\Programacion\tp-progra-restaurant/conexiondb_CRUD.php';
     $sql = "SELECT usuario, clave FROM persona";
     $resultado = $conexionDB->query($sql);
     ?>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="#" class="active" id="login-form-link">Ingresa</a>
                            </div>
                            <div class="col-xs-6">
                                <a href="#" id="register-form-link">Registrate</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="login-form" action="test.php" method="GET"
                                    role="form" style="display: block;">
                                    <div class="form-group">
                                        <input type="text" name="txtuser" id="username" tabindex="1"
                                            class="form-control" placeholder="Usuario" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="txtclave" id="password" tabindex="2"
                                            class="form-control" placeholder="Contrasena">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="submit" id="login-submit" tabindex="4"
                                                    class="form-control btn btn-login" value="Ingresa!!">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <a href="https://phpoll.com/recover" tabindex="5"
                                                        class="forgot-password">Olvide mi contrasena</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form id="register-form" action="test.php" method="GET"
                                    role="form" style="display: none;">
                                    <div class="form-group">
                                        <input type="text" name="txtuser" id="username" tabindex="1"
                                            class="form-control" placeholder="Usuario" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="txtapenom" id="apenom" tabindex="1"
                                            class="form-control" placeholder="Apellido y Nombre" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="txtemail" id="email" tabindex="1" class="form-control"
                                            placeholder="Email" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="txtclave" id="password" tabindex="2"
                                            class="form-control" placeholder="Contrasena">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="submitR" id="submitR"
                                                    tabindex="4" class="form-control btn btn-register"
                                                    value="Registrate!!">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    while ($filas = $resultado->fetch_array()) {
    
    if(isset($_GET['submit'])){
        $user=$_GET['txtuser'];
        $clave=$_GET['txtclave'];

     if($filas['usuario']==$user && $filas['clave']==$clave){
        echo '<script type="text/javascript">',
        'window.location.replace("http://localhost/Instituto/Programacion/tp-progra-restaurant/indexPrincipal.php");',
        '</script>';
     }
     else {echo "Ingreso un usuario invalido";} 
    }
    
    } ?>

    <?php 
    if(isset($_GET['submitR'])){
    $sql=0;
    $user=$_GET['txtuser'];
    $email=$_GET['txtemail'];
    $apenom=$_GET['txtapenom'];
    $clave=$_GET['txtclave'];
        if($user!=null && $email!=null && $apenom!=null && $clave!=null){
        $sql="INSERT INTO persona (usuario,email,apenom,clave)VALUES('".$user."','".$email."','".$apenom."','".$clave."')";
        $resultado=$conexionDB->query($sql);
        if ($resultado==true){
        
            // header("location:index.php");
            echo  "<td><span><center><H1>Se agrego nuevo registro</H1></center></span></td>";
        }
        else
        {
            echo " ERROR: No fue posible ejecutar la consulta: $sql.". $conexionDB->error;
        }
        }
        else{echo  "<td><span><center><H1>Debe llenar todos los campos</H1></center></span></td>";}
    $conexionDB->close();
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
    </script>
</body>

</html>