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
                <a href="panel.php?seccion=alta_producto" class="btn btn-outline-warning float-end my-3"><i class="bi bi-plus-circle-dotted mx-1"></i> Nuevo producto </a>
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

                                            <a class="btn btn-outline-info me-1" href="panel.php?seccion=alta_producto&id=<?= $props['comprar_prop_id'] ?>" role="button"><i class="bi bi-pencil-square mx-1"></i>Editar</a>
                                        
                                                <form action="procesos/baja_productos.php" method="POST">
                                                            <input type="hidden" name="id" value="<?= $props['productos_id'] ?>">
                                                            <button class="btn btn-outline-danger" type="submit">
                                                            <i class="bi bi-trash"></i> Eliminar</button>
                                                            
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
