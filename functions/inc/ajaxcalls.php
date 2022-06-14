<?php

add_action('wp_ajax_meta_update', 'meta_update');
add_action('wp_ajax_nopriv_ meta_update', 'meta_update');


function meta_update()
{
   $user_data = get_user_meta($_POST['user'], 'course_enroll');
   $key = array_search($_POST['post'], array_column($user_data, 'course_id'));
   $watched = $user_data[$key]['watched_lesson'];
   if (!array_search($_POST['video'], $watched) && array_search($_POST['video'], $watched) !== 0) {
      $watched[] = $_POST['video'];
   }
   update_user_meta($_POST['user'], 'course_enroll', ['course_id' => $_POST['post'], 'current_section' => $_POST['section'], 'current_lesson' => $_POST['nextvid'], 'watched_lesson' => $watched], $user_data[$key]);
}





function data_fetch()
{

   $the_query = new WP_Query(array('posts_per_page' => -1, 's' => esc_attr($_POST['keyword']), 'post_type' => array('course')));
   if ($the_query->have_posts()) :
      echo '<div class="row">';
      while ($the_query->have_posts()) : $the_query->the_post(); ?>

         <article class="my-3 col-4">
            <div class="card">
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
                  <a href="<?php echo get_the_permalink() ?>" class="btn btn-primary">Open</a>
               </div>
            </div>
         </article>

<?php endwhile;
      echo '</div>';
      wp_reset_postdata();
   endif;

   die();
}

add_action('wp_ajax_data_fetch', 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch', 'data_fetch');
