<?php

// ============================================================
// FRONT-PAGE.PHP
// ------------------------------------------------------------
// Plantilla base para el front-page (home con página estática) 
// ============================================================

?>

<?php get_header(); ?>
	
	<!-- Contenido (Main) -->
	<div id="main" class="main">
		<div class="container">
		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<?php
				
				if ( has_post_thumbnail() )
					the_post_thumbnail('full'); // imagen destacada (tamaño original)
					
			?>

<!--			<h1>--><?php //the_title(); // título ?><!--</h1>-->

			<div class="cont-entrada">
				<?php echo apply_filters( 'the_content', the_content() ); // contenido ?>
			</div>

		<?php endwhile; endif; ?>
		
		</div>
	</div>
	<!-- Fin del Contenido (Main) -->

<?php get_footer(); ?>