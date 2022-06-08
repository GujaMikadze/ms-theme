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

			
		<?php
		global $wp_query; // you can remove this line if everything works for you

		// don't display the button if there are not enough posts
		if ($wp_query->max_num_pages > 1) {
			echo '<div class="loadmore">More posts</div>'; // you can use <a> as well
		}
		?>
		
		</section>
	</main>
	<!-- Fin del Contenido (Main) -->

<?php get_footer(); ?>