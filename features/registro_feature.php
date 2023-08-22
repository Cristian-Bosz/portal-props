<?php
require_once('../config/config.php');
require_once('../config/functions.php');


$errores = [];
if (empty($_POST['nombre']) || (trim($_POST['nombre']) == '')) {
    $errores['nombre'] = 'Olvidaste escribir tu nombre';
}elseif (strlen($_POST['nombre']) > 60)
    $errores['nombre'] = 'El nombre puede tener hasta 20 caracteres máximo';


if (empty($_POST['apellido']) || (trim($_POST['apellido']) == '')) {
    $errores['apellido'] = 'Olvidaste escribir tu apellido';
}elseif (strlen($_POST['apellido']) > 60)
    $errores['apellido'] = 'El apellido puede tener hasta 20 caracteres máximo';
    

if (empty($_POST['email']) || (trim($_POST['email']) == '')) {
    $errores['email'] = 'Olvidaste escribir tu email';
}else{
    $select_email = "SELECT email FROM usuarios WHERE email = '$_POST[email]'";
    $res_select_email = mysqli_query($cnx, $select_email);

    if ($res_select_email->num_rows)
        $errores['email'] = 'Este email ya está registrado';
    elseif (strlen($_POST['email']) > 120)
        $errores['email'] = 'El email puede tener hasta 120 caracteres';
}

if (empty($_POST['pass']))
    $errores['pass'] = 'Olvidaste poner tu contraseña';
    elseif (strlen($_POST['pass']) < 8)
    $errores['pass'] = 'Muy pobre. La contraseña debe de tener más de 8 caracteres.';
    elseif (strlen($_POST['pass']) > 16)
    $errores['pass'] = 'Demasiados caracteres. La contraseña debe de tener entre 8 y 16 caracteres.';




if (count($errores)) {
    $_SESSION['errores'] = $errores;
    $_SESSION['campos'] = $_POST;

    header("Location: ../index.php?seccion=registro");
    exit;
}



//aca guardo en variables, los datos que mandó el usuario en el formulario, para asi guardarlo en la base de datos

$nombre = mysqli_real_escape_string($cnx, $_POST['nombre']);
$apellido = mysqli_real_escape_string($cnx, $_POST['apellido']);
$email = mysqli_real_escape_string($cnx, $_POST['email']);
$password = mysqli_real_escape_string($cnx, password_hash($_POST['pass'], PASSWORD_DEFAULT));

$insert="INSERT INTO usuarios (nombre, apellido, email, password, tipo_user_id_fk)
VALUES ('$nombre', '$apellido', '$email', '$password', 2);";
$res_insert = mysqli_query($cnx, $insert);

if ($res_insert) {
    unset($_SESSION['errores']);
    unset($_SESSION['campos']);
    $_SESSION['ok'] = '¡Bien hecho! Ya podés iniciar sesión';
    header('Location: ../index.php?seccion=login');
} else {
    $_SESSION['campos'] = $_POST;
    unset($_SESSION['errores']);

    header('Location: ../index.php?seccion=registro&status=error');
}