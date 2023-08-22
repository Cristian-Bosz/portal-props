<?php
require_once('../config/config.php');
require_once('../config/functions.php');


$errores = [];
if (empty($_POST['email'])){
    $errores['email'] = 'El email que ingresaste no pertenece a ninguna cuenta. Comprueba el email y vuelve a intentarlo.
    ';
}

if (empty($_POST['pass'])){
    $errores['pass'] = 'La contraseña no es correcta. Compruébala.';
}

if (count($errores)){
    $_SESSION['errores'] = $errores;
    header("Location: ../index.php?seccion=login");
    exit;
}


$usr = mysqli_real_escape_string($cnx, $_POST['email']);
$select_username="SELECT * FROM usuarios WHERE email='$usr'";
$res_select_username=mysqli_query($cnx, $select_username);
$user = mysqli_fetch_assoc($res_select_username);

if ((!$res_select_username->num_rows) || !password_verify($_POST['pass'], $user['password'])){
    unset($_SESSION['errores']);
    $_SESSION['error'] = 'El nombre de usuario o la contraseña son incorrectas. Volve a intentarlo.';
    header("Location: ../index.php?seccion=login");
    exit;
}
unset($_SESSION['errores']);
unset($_SESSION['error']);

$_SESSION['usuario'] = $user;
header("Location: ../index.php?seccion=home");
