<?php

// =============================================================================
// AUTHOR.PHP
// -----------------------------------------------------------------------------
// Plantilla base para la página de autor
// =============================================================================

?>

<?php get_header(); ?>

	<!-- Contenido (Main) -->
	<main role="main">
		<section class="container">
		
		<?php if ( have_posts() ) : ?>
		
			<h1><?php _e( 'Autor ', 'themeFront' ); echo get_the_author(); ?></h1>
	
			<?php if ( get_the_author_meta( 'description' ) ) : ?>
				
				<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
	
				<h2><?php _e( 'Sobre ', 'themeFront' ); echo get_the_author() ; ?></h2>
	
				<?php echo wpautop( get_the_author_meta( 'description' ) ); ?>
	
			<?php endif; ?>
		
			<?php while ( have_posts() ) : the_post(); ?>

			<article>
				
				<?php if ( has_post_thumbnail() ) : ?>
				
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('large'); ?></a>
				
				<?php endif; ?>
				
				<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				
				<?php the_excerpt(); ?>
				
				<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
				<span class="author"><?php _e( 'Autor:', 'themeFront' ); ?> <?php the_author_posts_link(); ?></span>
				<span class="comments"><?php if ( comments_open( get_the_ID() ) ) comments_popup_link( __( 'Deja un comentario', 'themeFront' ), __( '1 Comentario', 'themeFront' ), __( '% Comentarios', 'themeFront' )); ?></span>
				
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php _e( 'Ver más', 'themeFront' ); ?></a>
				
			</article>

			<?php endwhile; else : ?>
			
			<article>
				
				<h2><?php _e( 'Lo siento, pero todavía no tenemos post para mostrarte...', 'themeFront' ); ?></h2>
				
			</article>
			
		<?php endif; ?>

		</section>
	</main>
	<!-- Fin del Contenido (Main) -->

<?php get_footer(); ?>