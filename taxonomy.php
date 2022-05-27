<?php

// =============================================================================
// TAXONOMY.PHP
// -----------------------------------------------------------------------------
// Plantilla base para la página de taxonomía
// =============================================================================

?>

<?php get_header(); ?>

	<!-- Contenido (Main) -->
	<main role="main">
		<section class="container">
			
			<h1><?php _e( 'Taxonomía ', 'themeFront' ); single_term_title(); ?></h1>
			
			<?php get_template_part('loop'); ?>

		</section>
	</main>
	<!-- Fin del Contenido (Main) -->

<?php get_footer(); ?>