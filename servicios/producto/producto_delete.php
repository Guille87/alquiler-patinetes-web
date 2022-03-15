<?php
    include('../_conexion.php');
    $response = new stdClass();

    $response->state = true;

    $codigo = $_GET['codpro'];

    $sql = "DELETE FROM producto WHERE codpro = '$codigo'";
    $result = mysqli_query($con, $sql);

    echo "<script type='text/javascript'>";
    echo "window.location.assign('../../admin/productos.php')";
    echo "</script>";
    