<?php

/*
~~~~~~~~~~~~~~~~~~~~
ENCOLAR SCRIPTS (JS)
~~~~~~~~~~~~~~~~~~~~
*/

function site_scripts() {
	wp_register_script( 'main', get_template_directory_uri() . '/dist/main.bundle.js', '', true );
	wp_enqueue_script( 'main', $in_footer = true);

	wp_register_script( 'vendor', get_template_directory_uri() . '/dist/vendor.bundle.js', '', true );
	wp_enqueue_script( 'vendor', $in_footer = true);

}

add_action( 'wp_enqueue_scripts', 'site_scripts' );

?>