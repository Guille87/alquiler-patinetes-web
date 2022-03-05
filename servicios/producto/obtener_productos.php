<?php
include('../_conexion.php');
$response = new stdClass();

//$datos = array();
$datos = [];
$i = 0;
$sql = "SELECT * FROM producto";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result)) {
    $obj = new stdClass();
    $obj->codpro = $row['codpro'];
    $obj->nombreprod = $row['nombreprod'];
    $obj->descripcion = $row['descripcion'];
    $obj->stock = $row['stock'];
    $obj->imagen = $row['imagen'];
    $datos[$i] = $obj;
    $i++;
}
$response->datos=$datos;

mysqli_close($con);
header('Content-Type: application/json');
echo json_encode($response);