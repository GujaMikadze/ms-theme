<?php

/**
 * Block Name: Hero post
 *
 * This is homepage hero post block.
 */

$post_object = get_field('postdisplay');
$post_id = $post_object->ID;
$postImage = get_the_post_thumbnail_url($post_id);
$categoryToDisplay = get_field('CategoryDisplay', $post_id);
$herotext = get_field('herotext');
$herotitle =get_field('herotitle');




?>

<div class="container hero-bg">
    <div class="row g-0">
        <div class="col-12 col-lg-8">
            <div class="hero-post">
                <h2 class="hero-post__title d-lg-none"><?php echo $herotitle ?></h2>
                <div class="position-relative">
                    <img src="<?php echo $postImage ?> " alt="hero image" class="hero-post__image">
                    <div class="hero-post__gradient d-lg-none"></div>
                    <p class="hero-post__desc d-lg-none"><?php echo $herotext ?></p>
                    <a href="#" class="bookmark"><img
                                src="<?php echo get_template_directory_uri(); ?>/_/img/bookmark.svg" alt=""></a>
                    <span class="hero-post__category card-category"><?php echo get_cat_name($categoryToDisplay); ?> </span>
                    <span class="hero-post__time card-time"><?php echo get_field('reading_time', $post_id); ?> min</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="d-lg-flex flex-column h-100 justify-content-center">
                <h2 class="hero-post__title d-none d-lg-block"><?php echo $herotitle ?></h2>
                <p class="hero-post__desc d-none d-lg-block"><?php echo $herotext?></p>
                <div class="hero-post__button">
                    <a href="<?php echo get_permalink($post_id); ?> " class="btn btn-primary box-shadow-pink">Leer
                        artículo destacado</a>
                </div>
            </div>
        </div>
    </div>
</div>