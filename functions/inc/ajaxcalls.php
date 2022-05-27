<?php 

add_action('wp_ajax_meta_update', 'meta_update');
add_action('wp_ajax_nopriv_ meta_update', 'meta_update');


function meta_update() {
   update_user_meta($_POST['user'],$_POST['post'],['course_id' => $_POST['post'], 'current_section' => $_POST['section'], 'current_lession' => $_POST['video']]);
}