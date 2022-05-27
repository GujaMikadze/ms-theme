<?php

// =============================================================================
// TAG.PHP
// -----------------------------------------------------------------------------
// Plantilla base para la página de tags
// =============================================================================

?>

<?php get_header(); ?>

	<!-- Contenido (Main) -->
	<main role="main">
		<section class="container">
			
			<h1><?php _e( 'Tag: ', 'themeFront' ); echo single_tag_title('', false); ?></h1>

			<?php get_template_part('loop'); ?>

		</section>
	</main>
	<!-- Fin del Contenido (Main) -->

<?php get_footer(); ?>