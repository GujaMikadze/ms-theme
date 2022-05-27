<?php

// =============================================================================
// ARCHIVE.PHP
// -----------------------------------------------------------------------------
// Plantilla base para la página de archivos (Categorías, Tags, Búquedas, etc.)
// =============================================================================

?>

<?php get_header(); ?>

	<!-- Contenido (Main) -->
	<main role="main">
		<section class="container">
			
			<h1><?php _e( 'Archivos', 'themeFront' ); ?></h1>
			
			<?php get_template_part('loop'); ?>

		</section>
	</main>
	<!-- Fin del Contenido (Main) -->

<?php get_footer(); ?>