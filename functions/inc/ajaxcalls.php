<?php 

add_action('wp_ajax_meta_update', 'meta_update');
add_action('wp_ajax_nopriv_ meta_update', 'meta_update');


function meta_update() {
   $user_data = get_user_meta($_POST['user'], 'course_enroll');
   $key = array_search($_POST['post'], array_column($user_data, 'course_id'));
   $watched = $user_data[$key]['watched_lesson'];
   if(!array_search($_POST['video'], $watched) && array_search($_POST['video'], $watched) !== 0) {
      $watched[] = $_POST['video'];
   }
   update_user_meta($_POST['user'],'course_enroll',['course_id' => $_POST['post'], 'current_section' => $_POST['section'], 'current_lesson' => $_POST['nextvid'], 'watched_lesson' => $watched], $user_data[$key]);
}