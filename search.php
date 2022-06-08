<?php

// ===============================================================
// SEARCH.PHP
// ---------------------------------------------------------------
// Plantilla base para la página de con los resultados de búsqueda
// ===============================================================

global $wp_query;

$posts_found = $wp_query->found_posts;
$search_query = get_search_query();

?>

<?php get_header(); ?>
	
	<!-- Contenido (Main) -->
	<main role="main">
		<section class="container">
			
		<?php if ( $search_query ) : //Si hay término de búsqueda ?>
			
			<h1><?php printf ( __( 'Search For "%s" <small>(%s)</small>', 'themeFront' ), $search_query, $posts_found ); ?></h1>
			
			<?php get_search_form(); ?>
			
			<div class="row">
				<?php get_template_part('loop'); ?>
			</div>
			
		<?php else : ?>

			<h1><?php _e( '¿Estás interesado en hacer alguna búsqueda?', 'themeFront' ); ?></h1>
			
			<?php get_search_form(); ?>
			
		<?php endif; ?>
		
		</section>
	</main>
	<!-- Fin del Contenido (Main) -->

<?php get_footer(); ?>