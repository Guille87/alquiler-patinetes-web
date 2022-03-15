<?php
include('_conexion.php');
$response = new stdClass();

$usu = $_POST['usuario'];
$prod = $_POST["producto"];
$fecha = $_POST["fecha"];
$hora = $_POST["hora"];
$tiempo = $_POST["answer"];

$sql = "INSERT INTO reserva(codpro, codusu, fecha, hora, tiempo) VALUES('$prod','$usu','$fecha','$hora','$tiempo')";
if (mysqli_query($con, $sql)) {
    $message = "Reserva realizada";
}
else {
    $message = "Ha fallado la reserva";
}
echo "<script type='text/javascript'>alert('$message');</script>";
mysqli_close($con);
echo  "<script type='text/javascript'>";
echo "window.close();";
echo "</script>";
