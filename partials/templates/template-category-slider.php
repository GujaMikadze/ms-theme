<?php
/**
 * Template Name: Category Slider
 *
 * This is the template that displays the Category slider.
 */

$title = get_field('title');
$category = get_field('category');


//get posts
$args = array(
    'post_type' => 'post',
    'post_per_page' => 8,
    'category' => $category,
);


$postslist = get_posts($args);
?>

<div class="posts-category-slider_slide swiper">

    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->
        <?php foreach ($postslist as $post) : ?>
            <?php $category_id = get_field('CategoryDisplay', get_the_ID()); ?>


            <div class="swiper-slide posts-category-slider--single ">
                <div class="bookmark-button"></div>
                <a href="<?php echo get_permalink() ?> ">
                    <div class="posts-category-slider--single--image position-relative">

                        <?php the_post_thumbnail() ?>
                        <span class="posts-category-slider card-category"><?php echo get_cat_name($category_id); ?></span>
                        <span class="posts-category-slider card-time"><?php echo get_field('reading_time', get_the_ID()); ?> min</span>
                        <a href="#" class="bookmark"><img
                                    src="<?php echo get_template_directory_uri(); ?>/_/img/bookmark.svg" alt=""></a>
                    </div>
                    <h4 class="posts--category--slider-single__title  extrabold fw-bold  mt-3"><?php the_title(); ?></h4>
                    <a href="<?php echo get_permalink() ?>" class="card-more"><img
                                src="<?php echo get_template_directory_uri(); ?>/_/img/arrow-right.svg" alt=""></a>
                </a>
            </div>
        <?php endforeach; ?>

    </div>


</div>


