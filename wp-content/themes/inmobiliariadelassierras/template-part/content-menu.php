<?php
// Agrega este código en tu archivo de encabezado (header.php) donde deseas mostrar el menú de navegación

// Definir el menú principal
$main_menu_args = array(
    'theme_location'  => 'main-menu', // El nombre de la ubicación del menú registrada en tu tema
    'container'       => 'nav',
    'container_class' => 'navbar navbar-expand-md bg-body-tertiary navbar-light bg-light',
    'menu_class'      => 'navbar-nav me-auto',
    'fallback_cb'     => false,
    'walker'          => new Bootstrap_Walker_Nav_Menu(),
);

// Mostrar el menú principal
wp_nav_menu($main_menu_args);
?>
