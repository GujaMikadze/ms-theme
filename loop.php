		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article class="my-3">

					<div class="card search-card">
						<div class="card-header">
							<?php the_category() ?>
						</div>
						<div class="card-body">
							<h5 class="card-title">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
							</h5>
							<p class="card-text"><?php the_excerpt(); ?></p>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="btn btn-primary">OPEN</a>
						</div>
					</div>
				</article>

			<?php endwhile;
		else : ?>

			<article>

				<?php if (is_search()) : ?>

					<h2><?php printf(__('Lo siento, pero no hemos encontrado nada relacionado con tu búsqueda "%s"', 'themeFront'), $search_query); ?></h2>

				<?php else : ?>

					<h2><?php _e('Lo siento, pero todavía no tenemos post para mostrarte...', 'themeFront'); ?></h2>

				<?php endif; ?>

			</article>

		<?php endif; ?>