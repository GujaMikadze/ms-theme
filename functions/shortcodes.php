<?php
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// CONFIGURACIÓN WP
// Aquí añadimos nuestras propias funciones de Wordpress
// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

// ----------------------------------------------------------------------------------------------------------------------------------------------------------
// Social Share
// ----------------------------------------------------------------------------------------------------------------------------------------------------------
/*
	wp_enqueue_style('fontAwesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css', array(), '4.3.0', 'all');  
	use in template files:: <?php echo do_shortcode('[social_share]') ; ?>
*/
function social_sharing( $atts )
{
	$atts = array_change_key_case((array)$atts, CASE_LOWER);
	
	$atts = shortcode_atts(
		array(
			'title' => 'Social Share',
			'disable' => ''
		), $atts );
	
	$title = esc_html__( $atts['title'], 'themeFront' );
	
	if ( $atts['disable'] != '' )
	{
		$disable = explode( ',', $atts['disable'] );
		
		foreach ( $disable as $dis )
		{
			${$dis} = true;
		}
	}
		
	$sshare = '';
	
	if ( $title )
		$sshare .= '<p class="social-sharing-label">' . $title . '</p>';
		
	$sshare .= '<div class="social-sharing-container">';
	
		if ( !$facebook )
			$sshare .= '<a class="social-sharing-icon social-sharing-icon-facebook" target="_new" href="http://www.facebook.com/share.php?u=' . urlencode( get_the_permalink() ) . '&title=' . urlencode( get_the_title() ) . '"><i class="fa fa-facebook-square"></i></a>';
		
		if ( !$twitter )
			$sshare .= '<a class="social-sharing-icon social-sharing-icon-twitter" target="_new" href="http://twitter.com/home?status='. urlencode( get_the_title() ) . '+'. urlencode( get_the_permalink() ) . '"><i class="fa fa-twitter-square"></i></a>';
		
		if ( !$pinterest )
			$sshare .= '<a class="social-sharing-icon social-sharing-icon-pinterest" target="_new" href="https://pinterest.com/pin/create/button/?url=' . urlencode( get_the_permalink() ) . '&media=' . urlencode( get_template_directory_uri() . "/img/logo.png") . '&description=' . urlencode( get_the_title() ) . '"><i class="fa fa-pinterest-square"></i></a>';
			
		if ( !$google_plus )
			$sshare .= '<a class="social-sharing-icon social-sharing-icon-google-plus" target="_new" href="https://plus.google.com/share?url=' . urlencode( get_the_permalink() ) . '"><i class="fa fa-google-plus-square"></i></a>';
			
		if ( !$linkedin )
			$sshare .= '<a class="social-sharing-icon social-sharing-icon-linkedin" target="_new" href="http://www.linkedin.com/shareArticle?mini=true&url=' . urlencode( get_the_permalink() ) . '&title=' . urlencode( get_the_title() ) . '&source=' . get_bloginfo("url") . '"><i class="fa fa-linkedin-square"></i></a>';
			
		if ( !$tumblr )
			$sshare .= '<a class="social-sharing-icon social-sharing-icon-tumblr" target="_new" href="http://www.tumblr.com/share?v=3&u=' . urlencode( get_the_permalink() ) . '&t=' . urlencode( get_the_title() ) . '"><i class="fa fa-tumblr-square"></i></a>';
			
		if ( !$whatsapp )
			$sshare .= '<a class="social-sharing-icon social-sharing-icon-whatsapp hidden-lg hidden-md" target="_new" href="whatsapp://send?text=' . urlencode( get_the_title() ) . ' ' . urlencode( get_the_permalink() ) . '" data-action="share/whatsapp/share"><i class="fa fa-whatsapp"></i></a>';
			
		if ( !$email )
			$sshare .= '<a class="social-sharing-icon social-sharing-icon-email" target="_new" href="mailto:?subject=' . urlencode( get_the_permalink() ) . '&body=Check out this article I came across '. get_the_permalink() .'"><i class="fa fa-envelope"></i></a>';
			
	$sshare .= '</div>';
	
	return $sshare;
}
//add_shortcode('social_share', 'social_sharing');

function searchForId($id, $array) {
    foreach ($array as $key => $val) {
        if ($val['course_id'] === $id) {
            return $key;
        }
    }
    return null;
}


// This is the end...
// My only friend,
// The end!!
?>