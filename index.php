<?php

// ===========
// INDEX.PHP
// -----------
// Comenzamos!
// ===========

?>

<?php get_header(); ?>

	<!-- Contenido (Main) -->
	<main role="main">
		<section class="container">
			
			<?php if ( get_the_title() ) : ?>
			
			<h1><?php the_title(); ?></h1>
			
			<?php else : ?>
			
			<h1><?php _e( 'Últimos Posts', 'themeFront' ); ?></h1>
			
			<?php endif; ?>
			
			<?php get_template_part('loop'); ?>
		
		</section>
	</main>
	<!-- Fin del Contenido (Main) -->

<?php get_footer(); ?>