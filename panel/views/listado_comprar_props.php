<?php
$orden = '';
if(!empty($_GET['columna']) && !empty($_GET['orden'])){

    $orden="ORDER BY {$_GET['columna']} {$_GET['orden']}";
}


$select_props_panel = "SELECT comprar_prop_id, titulo, precio, expensas, ambientes 
FROM comprar_prop
$orden;";

$resSelect_panel = mysqli_query($cnx, $select_props_panel);

?>






<section class="p-5 m-0">

<?php
    if ((!empty($_GET['status']) && $_GET['status'] == 'ok') &&
    (!empty($_GET['accion']) && ($_GET['accion'] == 'creado' || $_GET['accion'] == 'eliminado' || $_GET['accion'] == 'editado'))
    ):
    $accion = $_GET['accion'];
?>
    
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <h2 class="display-6"><strong>¡Bien hecho!</strong> La propiedad fue <b> <?= $accion ?> </b> exitosamente.</h2>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php
endif;
?>


    <h2 class="display-4 text-center text-white mb-5">Publicar nuevas propiedades para comprar</h2>
  
  <div class="container">
    <div class="row m-0 p-0">
        
        <div class="col-12 m-0 p-0">
                <a class="btn btn-primary my-3" href="panel.php?seccion=inicio" role="button"><i class="bi bi-arrow-bar-left"></i> Volver</a>
                <a href="panel.php?seccion=crear_comprar_props" class="btn btn-outline-success float-end my-3"><i class="bi bi-plus-circle-dotted mx-1"></i> Nuevo producto </a>
            <div class="table-responsive">
                <table class="table align-middle table-bordered table-hover ">
                <caption>Lista de Propiedades</caption>
                    
                <thead class="text-center">
                        <tr>
                            <th><a href="panel.php?seccion=listado_comprar_props&columna=comprar_prop_id&orden=ASC" class="text-danger text-decoration-none">#</a></th>
                            <th><a href="panel.php?seccion=listado_comprar_props&columna=titulo&orden=ASC" class="text-danger text-decoration-none">Titulo</a></th>
                            <th><a href="panel.php?seccion=listado_comprar_props&columna=precio&orden=ASC" class="text-danger text-decoration-none">Precio</a></th>
                            <th><a href="panel.php?seccion=listado_comprar_props&columna=expensas&orden=ASC" class="text-danger text-decoration-none">Expensas</a></th>
                            <th><a href="panel.php?seccion=listado_comprar_props&columna=ambientes&orden=ASC" class="text-danger text-decoration-none">Ambientes</a></th>
                            <th>Acciones</th>         
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    while ($props = mysqli_fetch_assoc($resSelect_panel)):
                    ?>
                                <tr class="text-center">
                                    <td class="text-center"><?= $props['comprar_prop_id'] ?></td>
                                    <td><?= ucfirst($props['titulo']) ?></td>
                                    <td><?= $props['precio'] ?></td>
                                    <td><?= ucfirst($props['expensas']) ?></td>
                                    <td><?= ucfirst($props['ambientes']) ?></td>
                                    <td class="text-center">
                                    <div class="btn-group">

                                            
                                            <button class="button-edit me-3">Editar 
                                                <svg class="svg-edit" viewBox="0 0 512 512">
                                                    <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path></svg>
                                            </button>
                                           
                                        


                                            


                                                <form action="procesos/baja_productos.php" method="POST">
                                                            <input type="hidden" name="id" value="<?= $props['productos_id'] ?>">
                                                            
                                                <button type="submit" class="button-delete">
                                                    <span class="button__text">Eliminar</span>
                                                        <span class="button__icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="512" viewBox="0 0 512 512" height="512" class="svg-delete"><title></title><path style="stroke:#323232;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px" d="M112,112l20,320c.95,18.49,14.4,32,32,32H348c17.67,0,30.87-13.51,32-32l20-320"></path><line y2="112" y1="112" x2="432" x1="80" style="stroke:#323232;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px"></line><path style="fill:none;stroke:#323232;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px" d="M192,112V72h0a23.93,23.93,0,0,1,24-24h80a23.93,23.93,0,0,1,24,24h0v40"></path><line y2="400" y1="176" x2="256" x1="256" style="fill:none;stroke:#323232;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line><line y2="400" y1="176" x2="192" x1="184" style="fill:none;stroke:#323232;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line><line y2="400" y1="176" x2="320" x1="328" style="fill:none;stroke:#323232;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line>
                                                        </svg>
                                                    </span>
                                                </button>
                                                                                                                        
                                                </form>
                                                
                                        </div>
                                    </td>
                                </tr>
                    <?php
                    endwhile;
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</section>
