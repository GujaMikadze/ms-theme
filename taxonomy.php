<?php

// =============================================================================
// TAXONOMY.PHP
// -----------------------------------------------------------------------------
// Plantilla base para la página de taxonomía
// =============================================================================

?>
<?php get_header(); ?>

<!-- Contenido (Main) -->
<main role="main">
	<section class="container">

		<h1><?php _e('Course Type ', 'themeFront');
			single_term_title(); ?></h1>

		<div class="row">
			<?php get_template_part('loop'); ?>
		</div>
		<?php

		global $wp_query; // you can remove this line if everything works for you

		// don't display the button if there are not enough posts
		if ($wp_query->max_num_pages > 1) {
			echo '<div class="loadmore btn btn-secondary">More posts</div>'; // you can use <a> as well
		}
		?>
		

	</section>
</main>
<!-- Fin del Contenido (Main) -->

<?php get_footer(); ?>