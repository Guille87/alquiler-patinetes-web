<?php
include('../_conexion.php');
$response = new stdClass();

$codpro = $_POST['codpro'];
$sql = "SELECT * FROM producto WHERE codpro = $codpro";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$obj = new stdClass();
$obj->nombreprod = utf8_encode($row['nombreprod']);
$obj->descripcion = utf8_encode($row['descripcion']);
$obj->stock = $row['stock'];
$obj->imagen = $row['imagen'];
$response->product=$obj;

echo json_encode($response);