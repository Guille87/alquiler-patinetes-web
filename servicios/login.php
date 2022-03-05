<?php
// 1: Error de conexión
// 2: Email invalido
// 3: Contraseña incorrecta
include('_conexion.php');

$email = $_POST['email'];

$sql = "SELECT * FROM usuario WHERE email='$email'";

$result = mysqli_query($con, $sql);

if ($result) {
    $row = mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);
    if ($count != 0) {
        $passusu = $_POST['passusu'];
        if ($row['passusu'] != $passusu) {
            header('Location: ../login.php?e=3');
        } else {
            session_start();
            $_SESSION['codusu'] = $row['codusu'];
            $_SESSION['nomusu'] = $row['nomusu'];
            $_SESSION['email'] = $row['email'];
            header('Location: ../');
        }
    } else {
        header('Location: ../login.php?e=2');
    }
} else {
    header('Location: ../login.php?e=1');
}