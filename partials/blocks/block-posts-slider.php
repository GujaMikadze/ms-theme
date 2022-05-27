<?php
$type = get_field('type');
$title = get_field('title');
$category = get_field('category');
$category_link = get_category_link( $category );



?>

<div class="posts-category-slider">
    <div class="post-category-slider__header d-flex justify-content-between">
    <div class="posts-category-slider__title  fw-bold ">
       <h1 class="text-purple"> <?php echo $title ?></h1>
    </div>
        <div class="post-category-slider__url">
        <a href="<?php echo $category_link ?>">Ver todo</a>
        </div>

    </div>




    <?php
    if ($type == 'category') {
        if (file_exists(get_template_part("partials/templates/template-category-slider"))) {
            get_template_part("partials/templates/template-category-slider");
        }

    }
    if ($type == 'popular') {
        if (file_exists(get_template_part("partials/templates/template-popular-slider"))) {
            get_template_part("partials/templates/template-popular-slider");
        }
    }
    if ($type == 'hot') {
        if (file_exists(get_template_part("partials/templates/template-hot-slider"))) {
            get_template_part("partials/templates/template-hot-slider");
        }
    }


    ?>

</div>





