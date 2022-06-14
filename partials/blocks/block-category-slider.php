<?php

/**
 * Block Name: Category Slider
 *
 * This is homepage Category Slider block.
 */
$category_slider = get_field('category');

//get posts
$args = array(
    'posts_per_page' => '-1',
    'post_type' => 'course',
    'numberposts' => -1,
    'tax_query' => [
        [
            'taxonomy' => 'course_type',
            'field' => 'slug',
            'terms' =>   $category_slider['categories']->slug
        ]
    ]
);
$postslist = new WP_Query($args);

// echo "<pre>";
// print_r($category_slider);
// echo "</pre>";
// echo "<pre>";
// print_r($postslist);
// echo "</pre>";

?>

<div class="slider-block position-relative mb-5">
    <div class="slider-block__header">
        <h2>
            <a href="<?php echo $category_slider['title']['url'] ?>">
                <?php echo $category_slider['title']['title'] ?>
            </a>
        </h2>
    </div>
    <!-- Slider main container -->
    <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->

            <?php
            if ($category_slider['categories']) {
                foreach ($postslist->posts as $slide) : ?>
                    <div class="swiper-slide">
                        <div class="card slider-block__card">
                            <?php if (has_post_thumbnail($slide->ID)) : ?>
                                <a href="<?php echo get_the_permalink($slide->ID) ?>" class="card-img-block">
                                    <img src="<?php echo get_the_post_thumbnail_url($slide->ID) ?>" class="card-img-top img-ratio" alt="Card Img">
                                </a>
                            <?php else : ?>
                                <a href="<?php echo get_the_permalink($slide->ID) ?>" class="card-img-block">
                                    <img src="<?php echo get_theme_file_uri() ?>/_/img/no-image.png" class="card-img-top img-ratio" alt="Card Img">
                                </a>
                            <?php endif ?>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php echo get_the_title($slide->ID) ?>
                                </h5>
                                <?php if (count(get_the_terms($slide->ID, 'course_type'))) : ?>
                                    <div class="card__category mb-2">
                                        <?php foreach (get_the_terms($slide->ID, 'course_type') as $course_type) : ?>
                                            <a href="<?php echo get_term_link($course_type->term_id) ?>">
                                                <?php echo $course_type->name; ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                <p class="card-text">
                                    <?php echo get_the_excerpt($slide->ID) ?>
                                </p>
                                <a href="<?php echo get_the_permalink($slide->ID) ?>" class="btn btn-primary">Open</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach;
            } else {
                foreach ($category_slider["posts"] as $slide) : ?>

                    <div class="swiper-slide">
                        <div class="card slider-block__card">
                            <?php if (has_post_thumbnail($slide)) : ?>
                                <a href="<?php echo get_the_permalink($slide) ?>" class="card-img-block">
                                    <img src="<?php echo get_the_post_thumbnail_url($slide) ?>" class="card-img-top img-ratio" alt="Card Img">
                                </a>
                            <?php else : ?>
                                <a href="<?php echo get_the_permalink($slide) ?>" class="card-img-block">
                                    <img src="<?php echo get_theme_file_uri() ?>/_/img/no-image.png" class="card-img-top img-ratio" alt="Card Img">
                                </a>
                            <?php endif ?>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php echo get_the_title($slide) ?>
                                </h5>
                                <?php if (count(get_the_terms($slide, 'course_type'))) : ?>
                                    <div class="card__category mb-2">
                                        <?php foreach (get_the_terms($slide, 'course_type') as $course_type) : ?>
                                            <a href="<?php echo get_term_link($course_type->term_id) ?>">
                                                <?php echo $course_type->name; ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                <p class="card-text">
                                    <?php echo get_the_excerpt($slide) ?>
                                </p>
                                <a href="<?php echo get_the_permalink($slide) ?>" class="btn btn-primary">Open</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php } ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <div class="swiper-button-prev prev"></div>
    <div class="swiper-button-next next"></div>
</div>