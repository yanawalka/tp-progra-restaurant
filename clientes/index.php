<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>
    <?php
    include 'C:\xampp\htdocs\Instituto\Programacion\tp-progra-restaurant/conexiondb_CRUD.php';
    $sql="SELECT * FROM clientes";
    // $resultado=mysql_query($sql);
    $resultado = $conexionDB->query($sql);
    ?>
    <div>
    <a href="http://localhost/Instituto/Programacion/tp-progra-restaurant/indexPrincipal.php">Menu Principal</a>
    <a href="agregar.php">Nuevo</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>APENOM</th>
                    <th>TELEFONO</th>
                    <th>EMAIL</th>
                    <th>DIRECCION</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($filas = $resultado->fetch_array()) {               
            ?>
                <tr>
                    <td><?php echo $filas['id'] ?></td>
                    <td><?php echo $filas['telefono'] ?></td>
                    <td><?php echo $filas['apenom'] ?></td>
                    <td><?php echo $filas['mail'] ?></td>
                    <td><?php echo $filas['direccion'] ?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $filas['id']?>">Editar</a>
                        <a href="eliminar.php?id=<?php echo $filas['id']?>">Eliminar</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>