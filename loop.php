		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article class="my-3 col-4">
					<div class="card slider-block__card">
						<?php if (has_post_thumbnail()) : ?>
							<a href="<?php echo get_the_permalink() ?>" class="card-img-block">
								<img src="<?php echo get_the_post_thumbnail_url() ?>" class="card-img-top img-ratio" alt="Card Img">
							</a>
						<?php else : ?>
							<a href="<?php echo get_the_permalink() ?>" class="card-img-block">
								<img src="<?php echo get_theme_file_uri() ?>/_/img/no-image.png" class="card-img-top img-ratio" alt="Card Img">
							</a>
						<?php endif ?>
						<div class="card-body">
							<h5 class="card-title">
								<?php echo get_the_title() ?>
							</h5>
							<?php if (count(get_the_terms(get_the_ID(), 'course_type'))) : ?>
								<div class="card__category mb-2">
									<?php foreach (get_the_terms(get_the_ID(), 'course_type') as $course_type) : ?>
											<a href="<?php echo get_term_link($course_type->term_id) ?>">
												<?php echo $course_type->name; ?>
											</a>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>							<p class="card-text">
								<?php echo get_the_excerpt() ?>
							</p>
							<a href="<?php echo get_the_permalink() ?>" class="btn btn-primary">Open</a>
						</div>
					</div>
				</article>

			<?php endwhile;
		else : ?>

			<article>

				<?php if (is_search()) : ?>

					<h2><?php printf(__('Sorry, but we can\'t find anything related to your search', 'themeFront'), $search_query); ?></h2>

				<?php else : ?>

					<h2><?php _e('I\'m sorry, but we still don\'t have a post to show you...', 'themeFront'); ?></h2>

				<?php endif; ?>

			</article>

		<?php endif; ?>