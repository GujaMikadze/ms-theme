<?php

// =============================================================================
// PAGE_CONTACT.PHP
// -----------------------------------------------------------------------------
// Contact Page Template
// =============================================================================

/* Template Name: Contact */

?>

<?php get_header(); ?>

	<main role="main">
	
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<div class="content">
				<?php echo apply_filters( 'the_content', the_content() ); ?>
			</div>

			<?php get_template_part('partials/templates/template-contact-form'); ?>

		<?php endwhile; endif; ?>

	</main>

<?php get_footer(); ?>