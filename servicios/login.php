<?php
// 1: Error de conexión
// 2: Email invalido
// 3: Contraseña incorrecta
include('_conexion.php');

$email = $_POST['email'];
$passusu = $_POST['passusu'];

$sql = "SELECT * FROM usuario WHERE email='$email'";

$result = mysqli_query($con, $sql);

if ($result) {
    $count = mysqli_num_rows($result);
    if ($count != 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (!password_verify($passusu, $row['passusu'])) {
                header('Location: ../login.php?e=3');
            } else {
                $email = $row['email'];
                session_start();
                $_SESSION['codusu'] = $row['codusu'];
                $_SESSION['nomusu'] = $row['nomusu'];
                $_SESSION['email'] = $row['email'];
                $message = "Iniciando sesión";
                echo "<script type='text/javascript'>alert('$message');</script>";
                echo "<script type='text/javascript'>";
                echo "window.location.assign('../index.php')";
                echo "</script>";
            }
        }
    } else {
        header('Location: ../login.php?e=2');
    }
} else {
    header('Location: ../login.php?e=1');
}