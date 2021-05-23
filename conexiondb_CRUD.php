<?php

    try
    {
        $conexionDB= new mysqli("localhost", "root", "", "registro");
        if ($conexionDB->connect_error)
        {
            die("ocurrio un error al conectar la base de datos!");
        }
        // echo "conexion exitosa!";
    }

    catch (Exception $ex)
    {
        echo "Ocurrio un error al conectarse a la base de datos!". $ex->getMessage();

    }

?>