<?php
ini_set("display_errors", true);
error_reporting(E_ALL);
date_default_timezone_set("America/Argentina/Buenos_Aires");

//Datos de conexion
$servidor = 'localhost';
$user = "root";
$pass = "";
$db = "props";
//guardamos la conexion a la base de datos
$cnx = mysqli_connect($servidor, $user, $pass, $db);

session_start();