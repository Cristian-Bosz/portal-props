<?php
  $select_props = 'SELECT comprar_prop_id, titulo, foto, precio, superficie_total, ambientes, baños  
  FROM comprar_prop
  WHERE comprar_prop_id;';
  $resSelect_props = mysqli_query($cnx, $select_props);

  
?>




<!--MENSAJE ALERT DE LA VALIDACION DE LOS ID DEL DETALLE DEL PRODUCTO-->
<?php
     if (isset($_GET['error']) && $_GET['error'] == 'producto_inexistente'):
?>
    <div class="alert alert-danger d-flex align-items-center my-2" role="alert">
        <i class="fas fa-exclamation-triangle mx-2"></i><strong>Ups! Hubo un error.</strong>  El producto que solicitaste no se encuentra disponible.
    </div>
<?php
 endif;
?>
<!--/-->

<!--mensaje de error si la busqueda no existe-->
<?php
    if (!empty($_SESSION['error_busqueda'])):
?>
    <div class="container my-3">
        <div class="alert alert-danger fade show" role="alert">
            <?= $_SESSION['error_busqueda'] ?>
        </div>
    </div>
<?php
    endif;
    unset($_SESSION['error_busqueda']);
?> 
<!--/-->


<!--Buscador-->
<nav class="container navbar navbar-light my-5">
    <form action="features/buscador_feature.php" method="GET" class="form-inline ">
            <div class="input-group">
                <input class="form-control my-2" type="search" name="buscar" id="buscar" placeholder="Buscar"  value="<?= isset($_SESSION['buscar']) ? $_SESSION['buscar']['palabra'] : '' ?>">
                <button class="btn btn-outline-success my-2 mx-1" type="submit">Buscar</button>
            </div>  
    </form>
    
</nav>
   

<section class="container" >
        <div class="row mb-3">

                 <?php
                    if (isset($_SESSION['buscar'])) {
                        foreach ($_SESSION['buscar']['resultados'] as $prop) {
                    ?>

                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                        <div class="card-props">
                            <div >
                                <img src="assets/props_comprar/<?=$prop["foto"]?>" alt="" class="property-image">
                            </div>

                            <div class="text">
                                <p class="h3"> <?= ($prop["titulo"])?> </p>
                                <p class="prop-precio fw-bold"> <?= number_format($prop["precio"], 0, ',', '.') ?> USD </p>

                                <div class="prop-details">
                                <p><b><?=($prop["superficie_total"])?></b> m&sup2; | <b><?=($prop["ambientes"])?></b> ambientes | <b><?=($prop["baños"])?> </b>baños 
                                </p></div>
                            </div>
                        </div>
                    </div>
                        
<!--RECORRO LOS PRODUCTOS DE LA TIENDA-->
<?php
    }
}else{
  while($prop = mysqli_fetch_assoc($resSelect_props)):
?>

     
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                        <div class="card-props">
                            <div >
                                <img src="assets/props_comprar/<?=$prop["foto"]?>" alt="" class="property-image">
                            </div>

                            <div class="text">
                                <p class="h3"> <?= ($prop["titulo"])?> </p>
                                <p class="prop-precio fw-bold"> <?= number_format($prop["precio"], 0, ',', '.') ?> USD </p>

                                <div class="prop-details">
                                <p><b><?=($prop["superficie_total"])?></b> m&sup2; | <b><?=($prop["ambientes"])?></b> ambientes | <b><?=($prop["baños"])?> </b>baños 
                                </p></div>
                            </div>
                        </div>
                    </div>

   <?php
      endwhile;
    }
    ?>
<!--/-->
        </div> 
</section>


