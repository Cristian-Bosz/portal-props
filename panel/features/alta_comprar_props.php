<?php
require_once('../../config/config.php');
require_once('../../config/functions.php');


$errores = [];
//validacion de los input text
if (empty($_POST['titulo']) || (trim($_POST['titulo']) == '')) {
    $errores['titulo'] = 'Ups! Olvidaste escribir el titulo';
}elseif (strlen($_POST['titulo']) > 45){
    $errores['titulo'] = 'Ups! El titulo debe de tener hasta 45 caracteres MÁXIMO';
}

if (empty($_POST['descripcion']) || (trim($_POST['descripcion']) == '')) {
    $errores['descripcion'] = 'Ups! Olvidaste escribir la DESCRIPCIÓN del producto';
}elseif (strlen($_POST['descripcion']) > 1000){
    $errores['descripcion'] = 'Ups! La descripción debe de tener hasta 1000 caracteres MÁXIMO';
}

//validacion de los input numbers
if (empty($_POST['precio']) || (trim($_POST['precio']) == '')) {
    $errores['precio'] = 'Ups! Olvidaste escribir el PRECIO';
}

if (empty($_POST['expensas']) || (trim($_POST['expensas']) == '')) {
    $errores['expensas'] = 'Ups! Olvidaste escribir el expensas';
}

if (empty($_POST['superficie_total']) || (trim($_POST['superficie_total']) == '')) {
    $errores['superficie_total'] = 'Ups! Olvidaste escribir el superficie_total';
}

if (empty($_POST['superficie_cubierta']) || (trim($_POST['superficie_cubierta']) == '')) {
    $errores['superficie_cubierta'] = 'Ups! Olvidaste escribir el superficie_cubierta';
}

if (empty($_POST['ambientes']) || (trim($_POST['ambientes']) == '')) {
    $errores['ambientes'] = 'Ups! Olvidaste escribir el ambientes';
}

if (empty($_POST['baños']) || (trim($_POST['baños']) == '')) {
    $errores['baños'] = 'Ups! Olvidaste escribir el baños';
}

if (empty($_POST['dormitorios']) || (trim($_POST['dormitorios']) == '')) {
    $errores['dormitorios'] = 'Ups! Olvidaste escribir el dormitorios';
}

if (empty($_POST['cocheras']) || (trim($_POST['cocheras']) == '')) {
    $errores['cocheras'] = 'Ups! Olvidaste escribir el cocheras';
}

if (empty($_POST['antiguedad']) || (trim($_POST['antiguedad']) == '')) {
    $errores['antiguedad'] = 'Ups! Olvidaste escribir el antiguedad';
}


// Validación de los checkboxes
$bañosSeleccionados = [];
while ($baño = mysqli_fetch_assoc($res_check_baño)) {
    $checkboxName = 'baño' . $baño['baño_id'];
    if (isset($_POST[$checkboxName])) {
        $bañosSeleccionados[] = $baño['baño_id'];
    }
}

$habitacionesSeleccionadas = [];
while ($habitacion = mysqli_fetch_assoc($res_check_habitaciones)) {
    $checkboxName = 'habitacion' . $habitacion['habitaciones_id'];
    if (isset($_POST[$checkboxName])) {
        $habitacionesSeleccionadas[] = $habitacion['habitaciones_id'];
    }
}

$cocinaSeleccionadas = [];
while ($cocina = mysqli_fetch_assoc($res_check_cocina)) {
    $checkboxName = 'cocina' . $cocina['cocina_id'];
    if (isset($_POST[$checkboxName])) {
        $cocinaSeleccionadas[] = $cocina['cocina_id'];
    }
}

$exteriorSeleccionadas = [];
while ($exterior = mysqli_fetch_assoc($res_check_exterior)) {
    $checkboxName = 'exterior' . $exterior['exterior_id'];
    if (isset($_POST[$checkboxName])) {
        $exteriorSeleccionadas[] = $exterior['exterior_id'];
    }
}

$estacionamientoSeleccionadas = [];
while ($estacionamiento = mysqli_fetch_assoc($res_check_estacionamiento)) {
    $checkboxName = 'estacionamiento' . $estacionamiento['estacionamiento_id'];
    if (isset($_POST[$checkboxName])) {
        $estacionamientoSeleccionadas[] = $estacionamiento['estacionamiento_id'];
    }
}

$entretenimientoSeleccionadas = [];
while ($entretenimiento = mysqli_fetch_assoc($res_check_entretenimiento)) {
    $checkboxName = 'entretenimiento' . $entretenimiento['entretenimiento_id'];
    if (isset($_POST[$checkboxName])) {
        $entretenimientoSeleccionadas[] = $entretenimiento['entretenimiento_id'];
    }
}

$calefaccionSeleccionadas = [];
while ($calefaccion = mysqli_fetch_assoc($res_check_calefaccion)) {
    $checkboxName = 'calefaccion' . $calefaccion['calefaccion_id'];
    if (isset($_POST[$checkboxName])) {
        $calefaccionSeleccionadas[] = $calefaccion['calefaccion_id'];
    }
}


//validar checkbox (los checkbox solo guardan true o false por ende se guardan asi, en este ejemplo guarda 1 o 0)
$banadera = (isset($_POST['baño1']) ? true : false);
$agua_caliente = (isset($_POST['baño2']) ? true : false);
$secador_pelo = (isset($_POST['baño3']) ? true : false);
$bide = (isset($_POST['baño4']) ? true : false);
$productos_limpieza = (isset($_POST['baño5']) ? true : false);
$toallas = (isset($_POST['baño6']) ? true : false);
$shampoo = (isset($_POST['baño7']) ? true : false);
$jabon = (isset($_POST['baño8']) ? true : false);

$almohadas = (isset($_POST['habitacion1']) ? true : false);
$perchas = (isset($_POST['habitacion2']) ? true : false);
$vestidor = (isset($_POST['habitacion3']) ? true : false);
$mosquitero = (isset($_POST['habitacion4']) ? true : false);
$plancha = (isset($_POST['habitacion5']) ? true : false);
$persiana = (isset($_POST['habitacion6']) ? true : false);
$lavarropas = (isset($_POST['habitacion7']) ? true : false);
$tender = (isset($_POST['habitacion8']) ? true : false);

$cocina = (isset($_POST['cocina1']) ? true : false);
$heladera = (isset($_POST['cocina2']) ? true : false);
$microondas = (isset($_POST['cocina3']) ? true : false);
$utensillos = (isset($_POST['cocina4']) ? true : false);
$vajilla = (isset($_POST['cocina5']) ? true : false);
$horno = (isset($_POST['cocina6']) ? true : false);
$tostadora = (isset($_POST['cocina7']) ? true : false);
$utensillos_parrilla = (isset($_POST['cocina8']) ? true : false);
$mesa = (isset($_POST['cocina9']) ? true : false);

$muebles = (isset($_POST['exterior1']) ? true : false);
$zona_comer = (isset($_POST['exterior2']) ? true : false);
$parrilla = (isset($_POST['exterior3']) ? true : false);
$zona_fogata = (isset($_POST['exterior4']) ? true : false);
$pileta = (isset($_POST['exterior5']) ? true : false);

$garage = (isset($_POST['estacionamiento1']) ? true : false);

$televisor = (isset($_POST['entretenimiento1']) ? true : false);
$libros = (isset($_POST['entretenimiento2']) ? true : false);

$chimenea = (isset($_POST['calefaccion1']) ? true : false);
$ventiladores = (isset($_POST['calefaccion2']) ? true : false);
$estufas = (isset($_POST['calefaccion3']) ? true : false);
$aire_acondicionado = (isset($_POST['calefaccion4']) ? true : false);


//validacion de las imagenes
$nombre_imagen = null;
if (!empty($_FILES['img'])) {

    $img = $_FILES['img'];

 if ($img['type'] != "image/png" && $img['type'] != 'image/jpeg' && $img['type'] != 'image/webp') {
        $errores['img'] = 'La imagen debe de ser de tipo .png o .jpg o .webp';
 }
   if ($img['type'] == "image/png")
 $ext = '.png';
 else if ($img['type'] == "image/jpg")
 $ext = '.jpg';
 else if ($img['type'] == "image/webp")
 $ext = '.webp';

    $nombre_imagen = basename(time() . $ext);

    move_uploaded_file($img['tmp_name'], "../../assets/props_comprar/$nombre_imagen");
    
}



if (count($errores)) {
    $json_errores = json_encode($errores);
    header("Location: ../panel.php?seccion=crear_comprar_props&status=error&campo=$json_errores");
    exit;
}


//HACEMOS VECTOR CON LO AGREGADO EN LOS CHECKBOX 
$propiedades = array(
    "baño" => array(
        "Banadera" => $banadera,
        "Agua_caliente" => $agua_caliente,
        "Secador_de_pelo" => $secador_pelo,
        "Bidé" => $bide,
        "Productos_de_limpieza" => $productos_limpieza,
        "Toallas" => $toallas,
        "Shampoo" => $shampoo,
        "Jabón_de_cuerpo" => $jabon
    ),
    "habitaciones" => array(
        "Almohadas_y_mantas" => $almohadas,
        "Perchas" => $perchas,
        "Vestidor_o_armario" => $vestidor,
        "Mosquitero" => $mosquitero,
        "Plancha" => $plancha,
        "Persianas_o_cortinas" => $persiana,
        "Lavarropas" => $lavarropas,
        "Tender_de_ropa" => $tender
    ),
    "cocina" => array(
        "Cocina" => $cocina,
        "Heladera" => $heladera,
        "Microondas" => $microondas,
        "Utensillos" => $utensillos,
        "Vajilla_y_cubiertos" => $vajilla,
        "Horno" => $horno,
        "Tostadora" => $tostadora,
        "Utensillos_para_parilla" => $utensillos_parrilla,
        "Mesa_de_comedor" => $mesa
    ),
    "exterior" => array(
        "Muebles" => $muebles,
        "Zona_para_comer" => $zona_comer,
        "Parrilla" => $parrilla,
        "Zona_para_fogata" => $zona_fogata ,
        "Pileta" => $pileta
    ),
    "estacionamiento" => array(
        "Estacionamiento_o_garage" => $garage
    ),
    "entretenimiento" => array(
        "Televisor" => $televisor,
        "Libros" => $libros
    ),
    "calefaccion" => array(
        "Chimenea" => $chimenea,
        "Ventiladores" => $ventiladores,
        "Estufas" => $estufas,
        "Aire_acondicionado" => $aire_acondicionado
    )
);

$json_propiedades = json_encode($propiedades);


$titulo = mysqli_real_escape_string($cnx, $_POST['titulo']);
$descripcion = mysqli_real_escape_string($cnx, $_POST['descripcion']);
$imagen = mysqli_real_escape_string($cnx, $nombre_imagen) ?? null;

$precio = mysqli_real_escape_string($cnx, $_POST['precio']);
$expensas = mysqli_real_escape_string($cnx, $_POST['expensas']);
$superficie_total = mysqli_real_escape_string($cnx, $_POST['superficie_total']);
$superficie_cubierta = mysqli_real_escape_string($cnx, $_POST['superficie_cubierta']);
$ambientes = mysqli_real_escape_string($cnx, $_POST['ambientes']);
$baños = mysqli_real_escape_string($cnx, $_POST['baños']);
$dormitorios = mysqli_real_escape_string($cnx, $_POST['dormitorios']);
$cocheras = mysqli_real_escape_string($cnx, $_POST['cocheras']);
$antiguedad = mysqli_real_escape_string($cnx, $_POST['antiguedad']);


$insert_prop = "INSERT INTO comprar_prop (titulo, foto, descripcion, precio, expensas, superficie_total, superficie_cubierta, ambientes, baños, dormitorios, cocheras, antiguedad) 
VALUES ('$titulo', '$imagen', '$descripcion', '$precio', '$expensas', '$superficie_total', '$superficie_cubierta', '$ambientes', '$baños', '$dormitorios', '$cocheras', '$antiguedad')";
$res_insert_prop = mysqli_query($cnx, $insert_prop);


if ($res_insert_prop) {

    $id_insertado_propiedad = mysqli_insert_id($cnx);

    //ahora hacemos insert del checkbox
    $insert_checkbox = "INSERT INTO prop_insumos (propiedades_caract, id_propiedad_fk) 
                        VALUES ('$json_propiedades', '$id_insertado_propiedad')";

    $respuesta_insert_checkbox = mysqli_query($cnx, $insert_checkbox);

    header("Location: ../panel.php?seccion=listado_comprar_props&status=ok&accion=creado");
    exit;
} else {
    header("Location: ../panel.php?seccion=crear_comprar_props&status=error&tipo=producto");
    exit;
}
if($respuesta_insert_checkbox){
    echo('el insert del checkbox funciono!!!!');

} else{
    echo('el insert del checkbox no funciono');
}
