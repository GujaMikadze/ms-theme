<?php

// =============================================================================
// PAGE.PHP
// -----------------------------------------------------------------------------
// Default Page Template
// =============================================================================

?>
<?php get_header(); ?>

	<main role="main">
	
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<div class="content">
				<?php echo apply_filters( 'the_content', the_content() ); ?>
			</div>

		<?php endwhile; endif; ?>

	</main>

<?php get_footer(); ?>