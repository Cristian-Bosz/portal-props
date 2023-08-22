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






<nav class="navbar navbar-expand-lg navbar-light bg-white">
      <div class="container">
        <Link class="navbar-brand logo" to="/"><i class="bi bi-shop"></i> </Link>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
             <!--foreach de la estructura del navbar que quiero que se repita -->       
             <?php                  
                    foreach ($navbar as $boton => $url):
            ?>
                        <li class="nav-item mx-4">
                        <a class="nav-link active" aria-current="page" href="index.php?seccion=<?= $url ?>"><?= $boton ?></a>
                        </li>
            <?php
            endforeach;
            ?>
          </ul>
          <div class="d-flex align-items-center nav-Buttons">
          <li class="nav-item text-decoration-none dropdown">
                
            <?php
						if (!isset($_SESSION['usuario'])):
						?>
							
                  <a class="nav-link dropdown-toggle text-decoration-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="text-dark bi bi-person-fill"></i>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="index.php?seccion=login">Iniciar Sesión</a></li>
                    <li><a class="dropdown-item" href="index.php?seccion=registro">Registrarme</a></li>
                    <li><hr class="dropdown-divider"></li>
                  </ul>
        
						<?php
						else:
						?>


                  <a class="nav-link dropdown-toggle text-decoration-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  		
									<?php 
                  if(empty($_SESSION['usuario']['img_user'])):
                  ?>
									<i class="text-dark bi bi-person-fill"></i>
                  
                  <?php
                  elseif  (!empty($_SESSION['usuario']['img_user'])):
                  ?>  
                  <img src="img/users/<?=($_SESSION['usuario']['img_user'])?>" alt="Avatar de <?=($_SESSION['usuario']['nombre']) ?>" class="figure-img img-fluid  rounded-circle " style="height: 50px; width: 50px;"> 
                  <?php
                  endif;
                  ?>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="index.php?seccion=editar_perfil">Editar perfil</a></li>
                    <li><a class="dropdown-item" href="features/logout.php">Cerrar sesión</a></li>
                    <li><hr class="dropdown-divider"></li>
                  </ul>



						<?php
						endif;
						?>

          </li>
          </div>
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