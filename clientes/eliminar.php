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
    include 'conexiondb_CRUD.php';
    if (isset($_GET['id'])) {
        $userid = $_GET['id'];
        $sql = "DELETE FROM persona WHERE id='" . $userid . "' ";
        $conexionDB->query($sql);
        header("location:index.php");
    }

    ?>
</body>

</html>