<!DOCTYPE html>
<html lang="es">
<?php
require_once('config/config.php');
require_once('config/arrays.php');
require_once('config/functions.php');
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inmobiliaria</title>
    <link rel="stylesheet" href="styles/index.css">

    <!--Bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!--Bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <ul class="navbar-nav">

            <!--foreach de la estructura del navbar que quiero que se repita -->       
            <?php                  
                    foreach ($navbar as $boton => $url):
            ?>
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?seccion=<?= $url ?>"><?= $boton ?></a>
                        </li>
            <?php
            endforeach;
            ?>
</ul>
    </div>
  </div>
</nav>


 
<?php

$seccion = $_GET['seccion'] ?? 'home';
$seccion = empty($seccion) ? 'error' : $seccion;
require_once("pages/$seccion.php");

?>

    






    <!--Bootstrap js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>