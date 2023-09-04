<?php
// Define rutas a tus archivos CSS modulares
$cssFiles = [
    './styles/pages/index.css',
    './styles/pages/navbar.css',
    './styles/pages/registro.css',
    './styles/pages/home.css',
    './styles/pages/comprar.css',
    '../styles/panel/panel.css',
    '../styles/panel/listado_comprar.css',
    '../styles/panel/alta_panel.css',
    // Agrega más rutas según sea necesario
];

// Incluye cada archivo CSS
foreach ($cssFiles as $file) {
    echo '<link rel="stylesheet" type="text/css" href="' . $file . '">';
}
?>
