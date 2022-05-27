<?php
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// CONFIGURACIÓN WP
// Aquí añadimos nuestras propias funciones de Wordpress
// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~


// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// CAMBIAR mensaje de error del login
// Así evitamos dar pistas a los malos
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

function login_errors_message() {
    return 'Vaya! creo que has hecho algo mal...';
}
add_filter('login_errors', 'login_errors_message');


// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// ELIMINAR “basura” del <head>
// (Versión de WordPress, RSD, Windows Live Writter, etc.)
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);


// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// AÑADIR el slug de las páginas como class en el body
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
		// en este caso añade el tipo de post más "-" más el nombre de la página 
		$classes[] = $post->post_type . '-' . $post->post_name;
	}
	return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );


// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// AÑADIR SVG
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

function my_upload_mimes($mimes = array()) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'my_upload_mimes');


// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// Permitir a la plantilla leer las traducciones
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

load_theme_textdomain( 'themeFront', get_template_directory().'/languages' );


// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// Forzar "Imagen Destacada". Desaparece cuando instalamos ACF Pro
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

add_theme_support( 'post-thumbnails' );


// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// Crear tamaños de imagen
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

//add_image_size( $name, $width, $height, $crop = true/false );


// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// Añadir nuevos menús a la plantilla
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

function registrar_mis_menus()
{
	register_nav_menus(
		array(
			'main' => __( 'Menu Principal' ),
			'footer' => __( 'Footer' ),
			'menu-secondary' => __( 'Menu Secondary' ),
			// Añade aquí más menús
		)
	);
}
add_action( 'init', 'registrar_mis_menus' );


// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// Cargas async y defer de enqueues
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

function add_defer_attribute( $tag, $handle )
{
	// add script handles to the array below
	$scripts_to_defer = array('slick');
	
	foreach($scripts_to_defer as $defer_script) {
		if ($defer_script === $handle) {
			return str_replace(' src', ' defer src', $tag);
		}
	}
	return $tag;
}
add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);

function add_async_attribute( $tag, $handle )
{
	// add script handles to the array below
	$scripts_to_async = array('form_validation', 'form_validation_bootstrap', 'form_validation_es', 'form-contacto');
	
	foreach($scripts_to_async as $async_script) {
		if ($async_script === $handle) {
			return str_replace(' src', ' async src', $tag);
		}
	}
	return $tag;
}
add_filter('script_loader_tag', 'add_async_attribute', 10, 2);


function addNewCourse($user_id, $course_id) {
	$allCourses = get_user_meta($user_id, 'course_enroll');

	var_dump(get_user_meta($user_id, 'course_enroll'));
	var_dump(array_column($allCourses, 'course_id'));
	var_dump(array_search($course_id, array_column($allCourses, 'course_id')));
	if(!array_search($course_id, array_column($allCourses, 'course_id'))) {
		add_user_meta($user_id, 'course_enroll', ['course_id' => $course_id, 'current_section' => 0, 'current_lesson' => 0]);
	}
}

function pluginname_ajaxurl() {
    ?>
    <script type="text/javascript">
        var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
        var nonce = '<?php echo wp_create_nonce("getanswer");?>';
    </script>
    <?php
}
add_action('wp_head','pluginname_ajaxurl');
// This is the end...
// My only friend,
// The end!!
?>