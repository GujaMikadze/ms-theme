<?php

/*
----------------------------------------------------------------------------------------------------------------------------------------------------------
INSTALACIÓN
Lo básico para arrancar: Sidebar, Menú Principal, Traducciones
----------------------------------------------------------------------------------------------------------------------------------------------------------
*/
include __DIR__ . "/functions/installation.php";

/*
----------------------------------------------------------------------------------------------------------------------------------------------------------
CONFIGURACIÓN WP
Aquí añadimos nuestras propias funciones de Wordpress
----------------------------------------------------------------------------------------------------------------------------------------------------------
*/
include __DIR__ . "/functions/config.php";

/*
----------------------------------------------------------------------------------------------------------------------------------------------------------
SHORTCODES
Aquí añadimos nuestros shortcodes
----------------------------------------------------------------------------------------------------------------------------------------------------------
*/
include __DIR__ . "/functions/shortcodes.php";

/*
----------------------------------------------------------------------------------------------------------------------------------------------------------
BLOCKS
Here we add the Guttemberg ACF Blocks
----------------------------------------------------------------------------------------------------------------------------------------------------------
*/
include __DIR__ . "/functions/blocks.php";

/*
----------------------------------------------------------------------------------------------------------------------------------------------------------
SCRIPTS Y ESTILOS
Registramos los Scripts JS y los estios CSS en la carpeta 'functions/enqueues/'
----------------------------------------------------------------------------------------------------------------------------------------------------------
*/
foreach (glob(__DIR__ . "/functions/enqueues/*.php") as $filename)
    include $filename;

/*
----------------------------------------------------------------------------------------------------------------------------------------------------------
CUSTOM POST TYPES (CPT)
Incluimos todos los Custom Post Types que necesitemos en la carpeta 'functions/cpt/'
----------------------------------------------------------------------------------------------------------------------------------------------------------
*/
foreach (glob(__DIR__ . "/functions/cpt/*.php") as $filename)
    include $filename;

/*
----------------------------------------------------------------------------------------------------------------------------------------------------------
ADVANCED CUSTOM FIELDS (ACF)
Incluimos todos los Advanced Custom Field files que necesitemos en la carpeta 'functions/acf/'
----------------------------------------------------------------------------------------------------------------------------------------------------------
*/
foreach (glob(__DIR__ . "/functions/acf/*.php") as $filename)
    include $filename;

/*
----------------------------------------------------------------------------------------------------------------------------------------------------------
CUSTOM USER ROLES (CUR)
Incluimos todos los nuevos tipos de usuarios y sus roles en la carpeta 'functions/cur/'
----------------------------------------------------------------------------------------------------------------------------------------------------------
*/
foreach (glob(__DIR__ . "/functions/cur/*.php") as $filename)
    include $filename;


include __DIR__ . "/functions/inc/ajaxcalls.php";


if ( !function_exists( 'wpex_pagination' ) ) {
	
	function wpex_pagination() {
		
		$prev_arrow = is_rtl() ? '→' : '←';
		$next_arrow = is_rtl() ? '←' : '→';
		
		global $wp_query;
		$total = $wp_query->max_num_pages;
		$big = 999999999; // need an unlikely integer
		if( $total > 1 )  {
			 if( !$current_page = get_query_var('paged') )
				 $current_page = 1;
			 if( get_option('permalink_structure') ) {
				 $format = 'page/%#%/';
			 } else {
				 $format = '&paged=%#%';
			 }
			echo paginate_links(array(
				'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'		=> $format,
				'current'		=> max( 1, get_query_var('paged') ),
				'total' 		=> $total,
				'mid_size'		=> 3,
				'type' 			=> 'list',
				'prev_text'		=> $prev_arrow,
				'next_text'		=> $next_arrow,
			 ) );
		}
	}
	
}

function my_load_more_scripts() {
 
	global $wp_query; 
 
	// In most cases it is already included on the page and this line can be removed
	wp_enqueue_script('jquery');
 
	// register our main script but do not enqueue it yet
	wp_register_script( 'my_loadmore', get_stylesheet_directory_uri() . '/src/myloadmore.js', array('jquery') );
 
	// now the most interesting part
	// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script( 'my_loadmore', 'loadmore_params', array(
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages
	) );
  
 	wp_enqueue_script( 'my_loadmore' );
}
 
add_action( 'wp_enqueue_scripts', 'my_load_more_scripts' );

function loadmore_ajax_handler(){
 
	// prepare our arguments for the query
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';
    $args['post_type'] = 'course';

	$posts = query_posts($args);
    $data = [];
    foreach($posts as $key => $post) {
        $data[$key] = [
            'title' => $post->post_title,
            'excerpt' => $post->post_excerpt,
            'url' => $post->guid,
            'image' => get_the_post_thumbnail_url($post),
            'tax' => (array) get_the_terms($post->ID, 'course_type')
        ];
    }
    wp_send_json_success( array( 
        'posts' => $data
    ), 200 );

	die; // here we exit the script and even no wp_reset_query() required!
}
  
add_action('wp_ajax_loadmore', 'loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'loadmore_ajax_handler'); // wp_ajax_nopriv_{action}
?>

