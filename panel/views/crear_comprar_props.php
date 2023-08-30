<?php
include 'inputs_panel.php';


$check_baño = "SELECT * FROM baño;";
$res_check_baño = mysqli_query($cnx, $check_baño);

$check_habitaciones = "SELECT * FROM habitaciones;";
$res_check_habitaciones = mysqli_query($cnx, $check_habitaciones);

$check_cocina = "SELECT * FROM cocina;";
$res_check_cocina = mysqli_query($cnx, $check_cocina);

$check_exterior = "SELECT * FROM exterior;";
$res_check_exterior = mysqli_query($cnx, $check_exterior);

$check_estacionamiento = "SELECT * FROM estacionamiento;";
$res_check_estacionamiento = mysqli_query($cnx, $check_estacionamiento);

$check_entretenimiento = "SELECT * FROM entretenimiento;";
$res_check_entretenimiento = mysqli_query($cnx, $check_entretenimiento);


$check_calefaccion = "SELECT * FROM calefaccion;";
$res_check_calefaccion = mysqli_query($cnx, $check_calefaccion);


$errores=[];
if (!empty($_GET['campo']))
    $errores = json_decode($_GET['campo']);


$prop = [];
$accion='Publicar';
$archivo = 'alta_comprar_props.php';

?>




<section class="container" id="alta_producto">
<?php
if(!empty($_GET['tipo']) && $_GET['tipo'] == 'producto'):
?>
<div class="alert alert-danger alert-dismissible fade show my-1" role="alert">
   <h2 class="display-5">Hubo un error al cargar el producto. Intenta nuevamente.</h2>
 </div>

<?php
endif;
?>

<?php
if(!empty($_GET['status']) && $_GET['status'] == 'error'):
?>
<div class="alert alert-danger alert-dismissible fade show my-1" role="alert">
   <h2 class="display-5">Hubo un error al cargar el producto. Intenta nuevamente..</h2>
 </div>

<?php
endif;
?>

    
        <h2 class="display-6 text-center my-5"><?=$accion?> nueva propiedad para comprar</h2>
            <div>
                <form action="features/<?= $archivo ?>" method="POST" enctype="multipart/form-data">
             



    <div class='container my-5'>
    <a class="btn btn-primary mb-5" href="panel.php?seccion=listado_comprar_props" role="button"><i class="bi bi-arrow-bar-left"></i> Volver</a>

    <div class='row'>    


<!--Agregar img-->
<div class="col-12">
        <div class="form-img">
            <span class="form-title">Sube tus fotos</span>
            <p class="form-paragraph">
                Las fotos deberian ser JPG o PNG
                </p>
            <label for="file-input" class="drop-container">
            <span class="drop-title">Drop files here</span>
            or
            <input type="file" required="" id="file-input" name="img" multiple>
            </label>
        </div>
            <?php
            if (isset($errores->img)):
            ?>
                <p class="fw-bold text-danger">
                    <?= $errores->img ?>
                </p>
                                                        
            <?php
            endif;
            ?>
</div>




<!--FORMULARIO DATOS DEL PRODUCTO-->
        <div class='my-2'>    
                <div class='row align-items-center mb-3'>
        
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-5 mx-2 my-2">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="titulo">
                                            <label for="titulo">Título</label>
                                        </div>
                                                <?php
                                                if(isset($errores->titulo)):
                                                ?>                     
                                                      <p class="fw-bold text-danger"> <?= $errores->titulo?></p>                                                              
                                                <?php
                                                endif;
                                                ?>
                                    </div>


                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-10 mx-2 my-2">
                                           <div class="form-floating">
                                                <textarea class="form-control" placeholder="Leave a comment here" name="descripcion" id="descripcion" style="height: 100px"></textarea>
                                                <label for="descripcion">Descripción</label>
                                            </div>
                                                    <?php
                                                    if(isset($errores->descripcion)):
                                                    ?>
                                                            <p class="fw-bold text-danger">
                                                            <?= $errores->descripcion?>
                                                            </p>
                                                    <?php
                                                    endif;
                                                    ?>
                                    </div>


                                        
                    <?php
                        foreach ($inputs_panel as $item) {
                            echo ' <div class="col-6 col-sm-5 col-md-5 col-lg-3 col-xl-2 mx-2 my-5">';
                            echo '<div class="form__group field">';
                            
                            echo '<input type="' . $item['type'] . '" placeholder="' . $item['placeholder'] . '" id="' . $item['ids'] . '" name="' . $item['names'] . '" class="form__field">';
                            echo '<label class="form__label" for="name">' . $item['span'] . '</label>' ;
                    
                            if (isset($errores->{$item['errores']})) {
                                echo '<p class="fw-bold text-danger">';
                                    echo $errores->{$item['errores']};
                                echo '</p>';
                            }

                            echo '</div>';
                            echo '</div>';
                        }
                    ?>
                </div>




                <section class="row">
                    <h4 class="my-3">Indícanos que insumos vienen incluidos en la propiedad</h4>

                     <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 my-5"> 
                        <p class="text-center mt-5">Baños</p>
                    
                        <div id="checklist">
                            
                            <?php
                                while ($baños = mysqli_fetch_assoc($res_check_baño)):
                            ?>

                            <input type="checkbox" value="1" name="baño<?=($baños['baño_id'])?>" id="Baño <?=($baños['baño_id'])?>">
                            <label for="Baño <?=($baños['baño_id'])?>"><?= ucfirst($baños['accesorios_baño']) ?></label>
                            
                            <?php
                                endwhile;
                            ?>                     
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 my-5"> 
                        <p class="text-center mt-5">Habitaciones y lavadero</p>
                    
                        <div id="checklist">
                            
                            <?php
                                while ($habitaciones = mysqli_fetch_assoc($res_check_habitaciones)):
                            ?>

                            <input type="checkbox" value="1" name="habitacion<?=($habitaciones['habitaciones_id'])?>" id="Habitacion <?=($habitaciones['habitaciones_id'])?>">
                            <label for="Habitacion <?=($habitaciones['habitaciones_id'])?>"><?= ucfirst($habitaciones['accesorios_habitaciones']) ?></label>
                            
                            <?php
                                endwhile;
                            ?>                     
                        </div>
                    </div>
                    
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 my-5"> 
                        <p class="text-center mt-5">Comedor y cocina</p>
                    
                        <div id="checklist">
                            
                            <?php
                                while ($cocina = mysqli_fetch_assoc($res_check_cocina)):
                            ?>

                            <input type="checkbox" value="1" name="cocina<?=($cocina['cocina_id'])?>" id="cocina <?=($cocina['cocina_id'])?>">
                            <label for="cocina <?=($cocina['cocina_id'])?>"><?= ucfirst($cocina['accesorios_cocina']) ?></label>
                            
                            <?php
                                endwhile;
                            ?>                     
                        </div>
                    </div>
                    
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 my-5"> 
                        <p class="text-center mt-5">Exterior</p>
                    
                        <div id="checklist">
                            
                            <?php
                                while ($exterior = mysqli_fetch_assoc($res_check_exterior)):
                            ?>

                            <input type="checkbox" value="1" name="exterior<?=($exterior['exterior_id'])?>" id="exterior <?=($exterior['exterior_id'])?>">
                            <label for="exterior <?=($exterior['exterior_id'])?>"><?= ucfirst($exterior['accesorios_exterior']) ?></label>
                            
                            <?php
                                endwhile;
                            ?>                     
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 my-5"> 
                        <p class="text-center mt-5">Estacionamiento</p>
                    
                        <div id="checklist">
                            
                            <?php
                                while ($estacionamiento = mysqli_fetch_assoc($res_check_estacionamiento)):
                            ?>

                            <input type="checkbox" value="1" name="estacionamiento<?=($estacionamiento['estacionamiento_id'])?>" id="estacionamiento <?=($estacionamiento['estacionamiento_id'])?>">
                            <label for="estacionamiento <?=($estacionamiento['estacionamiento_id'])?>"><?= ucfirst($estacionamiento['accesorios_estacionamiento']) ?></label>
                            
                            <?php
                                endwhile;
                            ?>                     
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 my-5"> 
                        <p class="text-center mt-5">Entretenimiento</p>
                    
                        <div id="checklist">
                            
                            <?php
                                while ($entretenimiento = mysqli_fetch_assoc($res_check_entretenimiento)):
                            ?>

                            <input type="checkbox" value="1" name="entretenimiento<?=($entretenimiento['entretenimiento_id'])?>" id="entretenimiento <?=($entretenimiento['entretenimiento_id'])?>">
                            <label for="entretenimiento <?=($entretenimiento['entretenimiento_id'])?>"><?= ucfirst($entretenimiento['accesorios_entretenimiento']) ?></label>
                            
                            <?php
                                endwhile;
                            ?>                     
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 my-5"> 
                        <p class="text-center mt-5">Calefacción</p>
                    
                        <div id="checklist">

                            <?php
                                while ($calefaccion = mysqli_fetch_assoc($res_check_calefaccion)):
                            ?>

                            <input type="checkbox" value="1" name="calefaccion<?=($calefaccion['calefaccion_id'])?>" id="calefaccion <?=($calefaccion['calefaccion_id'])?>">
                            <label for="calefaccion <?=($calefaccion['calefaccion_id'])?>"><?= ucfirst($calefaccion['accesorios_calefaccion']) ?></label>
                            
                            <?php
                                endwhile;
                            ?>                     
                        </div>
                    </div>
                    
                </section>  
                   







                                        
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mx-2 my-5 ">
                        <button type="submit" class="cssbuttons-io-button float-end"> <?= $accion?> propiedad
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"></path></svg>
                            </div>
                        </button>
                    </div>
                    
                    

                   
        </div>      
    </div>
</div>


                    </form>
              
    </div>
</section>


