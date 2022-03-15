<?php
include('_conexion.php');
$response = new stdClass();

//$datos = array();
$datos = [];
$i = 0;
$sql = "SELECT * FROM tiemporeserva";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result)) {
    $obj = new stdClass();
    $obj->codtiempo = $row['codtiempo'];
    $obj->tiempo = $row['tiempo'];
    $datos[$i] = $obj;
    $i++;
}
$response->datos=$datos;

mysqli_close($con);
header('Content-Type: application/json');
echo json_encode($response);