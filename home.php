<?php

// ======================================
// HOME.PHP
// --------------------------------------
// Plantilla base para el inicio del blog
// ======================================

?>

<?php get_header(); ?>
	
	<!-- Contenido (Main) -->
	<main role="main">
		<section class="container">
			
			<h1><?php _e( 'Últimos Posts', 'themeFront' ); ?></h1>
			
			<?php get_template_part('loop'); ?>
		
		</section>
	</main>
	<!-- Fin del Contenido (Main) -->

<?php get_footer(); ?>