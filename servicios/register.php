<?php
// 1: Error de conexión
// 2: Email invalido
// 3: Contraseña incorrecta
// 4: DNI no válido
include('_conexion.php');

$nomusu = $_POST['nomusu'];
$email = $_POST['emailr'];
$dni = $_POST['dni'];

$sql = "SELECT * FROM usuario WHERE email='$email'";

$result = mysqli_query($con, $sql);

if ($result) {
    $row = mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);
    if ($count == 0) {
        // Puede crear un nuevo usuario
        $passusu = $_POST['passusur'];
        $passusu2 = $_POST['passusu2r'];
        if ($passusu != $passusu2) {
            header('Location: ../register.php?er=3');
        } else {
            if (!valida_dni($dni)) {
                header('Location: ../register.php?er=4');
            } else {
                if (!valida_email($email)) {
                    header('Location: ../register.php?er=5');
                } else {
                    $sql = "INSERT INTO usuario (nomusu, passusu, dni, email) VALUES ('$nomusu', '$passusu', '$dni', '$email')";
                    $result = mysqli_query($con, $sql);
                    session_start();
                    $_SESSION['codusu'] = $row['codusu'];
                    $_SESSION['nomusu'] = $row['nomusu'];
                    $_SESSION['email'] = $row['email'];
                    header('Location: ../');
                }
            }   
        }
    } else {
        header('Location: ../register.php?er=2');
    }
} else {
    header('Location: ../register.php?er=1');
}

function valida_dni($dni) {
   $str = trim($dni);
   //$str = str_replace("-", "", $str);
   //$str = str_ireplace(" ", "", $str);
   $n = substr($str, 0, strlen($str)-1);
   $n = intval($n);
   if (!is_int($n)) {
        return 0;
   }
   $l = substr($str, -1);
   if (!is_string($l)) {
        return 0;
   }
   $letra = substr ("TRWAGMYFPDXBNJZSQVHLCKE", $n%23, 1);
   if (strtolower($l) == strtolower($letra)) {
        return $n.$l;
   } else {
        return 0;
   }
}

/**
 * Valida un email usando filter_var
 * Devuelve true si es correcto o false en caso contrario
 * 
 * @param string $str la dirección a validar
 * @return boolean
 */
function valida_email($str) {
    return (false !== filter_var($str, FILTER_VALIDATE_EMAIL));
}