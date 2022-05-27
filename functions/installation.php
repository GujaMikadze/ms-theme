<?php
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// INSTALACIÓN
// Lo básico para arrancar
// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~


// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// Incluir la función is_login_page() para poder encolar el css de la página de login sólo en la página de login (con if/else)
// Fuente: http://wordpress.stackexchange.com/questions/28095/how-can-i-tell-if-im-on-a-login-page
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

function is_login_page()
{
    return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}


// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// Función personalizada que permite hacer el excerpt del tamaño que se desee*/
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

function custom_excerpt($new_length = 20, $new_more = '...') 
{
	add_filter('excerpt_length', function () use ($new_length) 
	{
		return $new_length;
	}, 999);
	add_filter('excerpt_more', function () use ($new_more)
	{
		return $new_more;
	});
	$output = get_the_excerpt();
	$output = apply_filters('wptexturize', $output);
	$output = apply_filters('convert_chars', $output);
	$output = '<p>' . $output . '</p>';
	echo $output;
}

function custom_excerpt_characters() 
{
	$excerpt = get_the_excerpt();
	$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, 200);
	//$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
	$excerpt = $excerpt . '...';
	echo $excerpt;
}


// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// Páginas de opciones globales para ACF
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

if ( function_exists('acf_add_options_page') )
{
	acf_add_options_page(array(
		'page_title' 	=> 'Opciones Globales',
		'menu_title'	=> 'Opciones Globales',
		'menu_slug' 	=> 'opciones-globales',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	// Subpáginas
	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Título de la página',
	// 	'menu_title'	=> 'Título en el menú',
	// 	'parent_slug'	=> 'opciones-globales',
	// ));
}


// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// Función para envíar emails
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

function sendEmail()
{
	$params = array();
	$data = $attachment = $message = $messageH = $messageB = $messageF = $to = $subject = '';
	$to = 'email@email.com';
	$subject = 'Asunto del email';
	
	$data = parse_str( $_POST['data'], $params );
	$res['data'] = $params;
	
	$messageH = '<body>';
		$messageH .= '<h1>Cabecera del email</h1>';
			
			$messageB = '<h3>Contenido del email</h3>';
			$messageB .= '<p>Nombre: ' . $params['form-name'] . '</p>';
			$messageB .= '<p>Teléfono: ' . $params['form-tel'] . '</p>';
			$messageB .= '<p>Password: ' . $params['form-pass'] . '</p>';
			$messageB .= '<p>Email: ' . $params['form-email'] . '</p>';
			$messageB .= '<p>Comentarios: ' . $params['form-comments'] . '</p>';
			
		$messageF = '<p><strong>Pie del email</strong></p>';
	$messageF .= '</body>';
	
	$message = $messageH . $messageB . $messageF;
	
	if ( $attachment )
		$attachments = array( WP_CONTENT_DIR . '/uploads/' . $attachment );
	
	$headers = array(
		'From: XXXXX <from@email.com>',
		'Content-Type: text/html; charset=UTF-8'
	);
	$envioMail = wp_mail( $to, $subject, $message, $headers, $attachments );
	
	$res['envio'] = $envioMail;
	
	echo json_encode($res);

	wp_die();
}
add_action('wp_ajax_sendEmail', 'sendEmail');
add_action('wp_ajax_nopriv_sendEmail', 'sendEmail');


// This is the end...
// My only friend,
// The end!!
?>