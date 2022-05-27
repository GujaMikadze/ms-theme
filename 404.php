<?php

// =============================================================================
// 404.PHP
// -----------------------------------------------------------------------------
// Plantilla base para la página de error (404)
// =============================================================================

?>

<?php get_header(); ?>
	
	<!-- Contenido (Main) -->
	<main role="main">
		<section class="container">
			<article>
				<h1><?php _e('Page Not Found' , 'themeFront'); ?></h1>
			</article>
		</section>
	</main>
	<!-- Fin del Contenido (Main) -->

<?php get_footer(); ?>