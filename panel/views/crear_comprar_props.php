<?php
include 'inputs_panel.php';


$check_baño = "SELECT * FROM baños;";
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
$accion='Crear';
$archivo = 'alta_comprar_props.php';

?>




<section class="container" id="alta_producto">

    
        <h2 class="display-6 text-center my-5">Cargar nueva propiedad para comprar</h2>
                
                <div>
                    <form action="procesos/<?= $archivo ?>" method="POST" enctype="multipart/form-data">
             



    <div class='container my-5'>
    <a class="btn btn-primary mb-5" href="panel.php?seccion=listado_comprar_props" role="button"><i class="bi bi-arrow-bar-left"></i> Volver</a>

    <div class='row'>    


<!--Agregar img-->
<div class="col-12">


    <label class="custum-file-upload" for="file">
        <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24"><g stroke-width="0" id="SVGRepo_bgCarrier"></g><g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g><g id="SVGRepo_iconCarrier"> <path fill="" d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z" clip-rule="evenodd" fill-rule="evenodd"></path> </g></svg>
        </div>
        <div class="text">
            <span>Click para subir fotos</span>
        </div>
        <input type="file" id="file">
    </label>

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
                    <h4 class="my-3">Indícanos que insúmos vienen incluidos en la propiedad</h4>

                     <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 my-5"> 
                        <p class="text-center mt-5">Baños</p>
                    
                        <div id="checklist">
                            
                            <?php
                                while ($baños = mysqli_fetch_assoc($res_check_baño)):
                            ?>

                            <input type="checkbox" value="1" name="<?=($baños['accesorios_baño']) ?>" id="Baño <?=($baños['baños_id'])?>">
                            <label for="Baño <?=($baños['baños_id'])?>"><?= ucfirst($baños['accesorios_baño']) ?></label>
                            
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

                            <input type="checkbox" value="1" name="<?=($habitaciones['accesorios_habitaciones']) ?>" id="Habitacion <?=($habitaciones['habitaciones_id'])?>">
                            <label for="Habitacion <?=($habitaciones['habitaciones_id'])?>"><?= ucfirst($habitaciones['accesorios_habitaciones']) ?></label>
                            
                            <?php
                                endwhile;
                            ?>                     
                        </div>
                    </div>
                    
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 my-5"> 
                        <p class="text-center mt-5">Cocina y comedor</p>
                    
                        <div id="checklist">
                            
                            <?php
                                while ($cocina = mysqli_fetch_assoc($res_check_cocina)):
                            ?>

                            <input type="checkbox" value="1" name="<?=($cocina['accesorios_cocina']) ?>" id="cocina <?=($cocina['cocina_id'])?>">
                            <label for="Cocina <?=($cocina['cocina_id'])?>"><?= ucfirst($cocina['accesorios_cocina']) ?></label>
                            
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

                            <input type="checkbox" value="1" name="<?=($exterior['accesorios_exterior']) ?>" id="exterior <?=($exterior['exterior_id'])?>">
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

                            <input type="checkbox" value="1" name="<?=($estacionamiento['accesorios_estacionamiento']) ?>" id="estacionamiento <?=($estacionamiento['estacionamiento_id'])?>">
                            <label for="estacionamiento <?=($estacionamiento['estacionamiento_id'])?>"><?= ucfirst($estacionamiento['accesorios_estacionamiento']) ?></label>
                            
                            <?php
                                endwhile;
                            ?>                     
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 my-5"> 
                        <p class="text-center mt-5">entretenimiento</p>
                    
                        <div id="checklist">
                            
                            <?php
                                while ($entretenimiento = mysqli_fetch_assoc($res_check_entretenimiento)):
                            ?>

                            <input type="checkbox" value="1" name="<?=($entretenimiento['accesorios_entretenimiento']) ?>" id="entretenimiento <?=($entretenimiento['entretenimiento_id'])?>">
                            <label for="entretenimiento <?=($entretenimiento['entretenimiento_id'])?>"><?= ucfirst($entretenimiento['accesorios_entretenimiento']) ?></label>
                            
                            <?php
                                endwhile;
                            ?>                     
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 my-5"> 
                        <p class="text-center mt-5">calefaccion</p>
                    
                        <div id="checklist">
                            
                            <?php
                                while ($calefaccion = mysqli_fetch_assoc($res_check_calefaccion)):
                            ?>

                            <input type="checkbox" value="1" name="<?=($calefaccion['accesorios_calefaccion']) ?>" id="calefaccion <?=($calefaccion['calefaccion_id'])?>">
                            <label for="calefaccion <?=($calefaccion['calefaccion_id'])?>"><?= ucfirst($calefaccion['accesorios_calefaccion']) ?></label>
                            
                            <?php
                                endwhile;
                            ?>                     
                        </div>
                    </div>
                    
                </section>  
                   







                                        
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-4 mx-2 my-5">
                        <button type="submit" class="cssbuttons-io-button"> <?= $accion?> propiedad
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


