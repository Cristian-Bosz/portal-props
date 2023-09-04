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
    <!-- Incluyo styles.php para cargar los archivos CSS globales -->
    <?php require_once('styles/styles.php'); ?>
    <!--Bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!--Bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>
<body>






<nav class="navbar navbar-expand-lg navbar-light bg-nav">
      <div class="container">
        <a class="navbar-brand logo" to="/"><i class="bi bi-shop" id="text-nav"></i> </a>
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
                        <a class="nav-link active fw-bold" id="text-nav" aria-current="page" href="index.php?seccion=<?= $url ?>"><?= $boton ?></a>
                        </li>
            <?php
            endforeach;
            ?>
          </ul>
          <div class="d-flex align-items-center nav-Buttons">
          
                
            <?php
						if (!isset($_SESSION['usuario'])):
						?>
							
                                
                  <a class="text-decoration-none btn" id="btn-navlogin" href="index.php?seccion=login" role="button">Iniciar Sesión</a>
                  
               
        
						<?php
						else:
						?>
<li class="nav-item text-decoration-none dropdown">

                  <a class="nav-link dropdown-toggle text-decoration-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  		
									<?php 
                  if(empty($_SESSION['usuario']['img_user'])):
                  ?>
									<i class="text-dark bi bi-person-fill"></i>
                  
                  <?php
                  elseif  (!empty($_SESSION['usuario']['img_user'])):
                  ?>  
                  <img src="assets/users/<?=($_SESSION['usuario']['img_user'])?>" alt="Avatar de <?=($_SESSION['usuario']['nombre']) ?>" class="figure-img img-fluid  rounded-circle " style="height: 50px; width: 50px;"> 
                  <?php
                  endif;
                  ?>
                  </a>

                  <ul class="dropdown-menu">
                  <?php
                    if (!isset($_SESSION['usuario'])):
                    ?>
                                    
                    <?php
                    elseif ($_SESSION['usuario']['tipo_user_id_fk'] == 1):
                    ?>
                      <li><a class="dropdown-item fw-bold" id="btn-admin"  href="panel/panel.php">Panel de admin</a></li>
                    <?php
                    endif;
                    ?>

                    <li><a class="dropdown-item" href="index.php?seccion=editar_perfil">Editar perfil</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="features/logout_feature.php">Cerrar sesión</a></li>
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