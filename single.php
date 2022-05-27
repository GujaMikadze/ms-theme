<?php

// =============================================================================
// SINGLE.PHP
// -----------------------------------------------------------------------------
// Default Single Template
// =============================================================================


echo "test";
?>

<?php get_header(); ?>

	<!-- Contenido (Main) -->
	<main role="main">
		<section class="container">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
			<article>
				
			<?php
				
				if ( has_post_thumbnail() )
					the_post_thumbnail('full');
					
			?>
	
				<h1><?php the_title(); ?></h1>
				
				<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
				<span class="author"><?php _e( 'Autor:', 'themeFront' ); ?> <?php the_author_posts_link(); ?></span>
				<span class="comments"><?php if ( comments_open( get_the_ID() ) ) comments_popup_link( __( 'Deja un comentario', 'themeFront' ), __( '1 Comentario', 'themeFront' ), __( '% Comentarios', 'themeFront' )); ?></span>
				
				<?php echo do_shortcode('[social_share title="" disable="email,tumblr"]'); ?>
				
				<div class="cont-entrada">
					<?php echo apply_filters( 'the_content', get_the_content() ); ?>
				</div>
				
				<?php the_tags( __( 'Tags: ', 'themeFront' ), ', ' ); ?>
	
				<p><?php _e( 'Categorías: ', 'themeFront' ); the_category(', '); ?></p>
	
				<p><?php _e( 'Post escrito por ', 'themeFront' ); the_author(); ?></p>
				
				<?php echo do_shortcode('[social_share title="Comparte" disable="email,tumblr"]'); ?>
				
				<?php comments_template(); ?>
				
			</article>
			
		<?php endwhile; endif; ?>
		
		</section>
	</main>
	<!-- Fin del Contenido (Main) -->

<?php get_footer(); ?>