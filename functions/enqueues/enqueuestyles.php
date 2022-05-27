<?php

/*
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
HOJAS DE ESTILO (CSS) MAIN
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
*/

function site_styles() {
	wp_register_style( 'main',  get_template_directory_uri() . '/dist/main.css' );
	wp_enqueue_style( 'main' );
}

add_action( 'wp_enqueue_scripts', 'site_styles' );

/*
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
HOJAS DE ESTILO (CSS) ADMIN
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
*/

function admin_styles() {
	if ( is_login_page() ) : // is_login_page no existe en el codex de WP, la generamos en /functions/installation.php
	    wp_register_style( 'admin',  get_template_directory_uri() . '/dist/admin.css' );
		wp_enqueue_style( 'admin');
	endif;
}

add_action( 'login_enqueue_scripts', 'admin_styles' );

?>