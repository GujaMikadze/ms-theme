<?php

// =============================================================================
// ARCHIVE.PHP
// -----------------------------------------------------------------------------
// Plantilla base para la página de categoría
// =============================================================================
global $wp_query;


$posts = $wp_query->posts;
var_dump($wp_query);
?>

<?php get_header(); ?>

<!-- Contenido (Main) -->
<main role="main">
	<section class="container">

		<h1><?php single_cat_title();
			_e(' Courses', 'themeFront'); ?></h1>

		<div class="row">
			<?php foreach ($posts as $post) : ?>
				<div class="col-12 col-md-6 col-lg-4">
					<div class="card slider-block__card mb-5">
						<?php if (has_post_thumbnail($post)) : ?>
							<a href="<?php echo get_the_permalink() ?>" class="card-img-block">
								<img src="<?php echo get_the_post_thumbnail_url() ?>" class="card-img-top img-ratio" alt="Card Img">
							</a>
						<?php else : ?>
							<a href="<?php echo get_the_permalink($post) ?>" class="card-img-block">
								<img src="<?php echo get_theme_file_uri() ?>/_/img/no-image.png" class="card-img-top img-ratio" alt="Card Img">
							</a>
						<?php endif ?>
						<div class="card-body">
							<h5 class="card-title">
								<?php echo get_the_title() ?>
							</h5>
							<?php if (isset(get_the_terms($post, 'category')[0]->name)) : ?>
								<div class="card__category mb-2">
									<?php foreach (get_the_terms($post, 'category') as $category) : ?>
										<?php if (!$category->parent) : ?>
											<a href="<?php echo get_term_link($category->term_id) ?>">
												<?php echo $category->name; ?>
											</a>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
							<p class="card-text">
								<?php echo get_the_excerpt($post) ?>
							</p>
							<a href="<?php echo get_the_permalink($post) ?>" class="btn btn-primary">Open</a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</section>
</main>
<!-- Fin del Contenido (Main) -->

<?php get_footer(); ?>