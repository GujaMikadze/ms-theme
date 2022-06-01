<?php

// =============================================================================
// SINGLE-COURSE.PHP
// -----------------------------------------------------------------------------
// Single Course Template
// =============================================================================

$course_list = get_field('course_content');
$user_data = get_user_meta(get_current_user_id(), 'course_enroll');



$post_id = get_the_ID();
$course_info = unserialize($user_data[$post_id][0]);

if ($user_data) {
    $search_id = array_search($post_id, array_column($user_data, 'course_id'));
    $watched_vids = $user_data[$search_id]['watched_lesson'];
}
if (!($search_id === 0 || $search_id)) {
    $meta_value = array(
        'course_id' => $post_id,
        'current_section' => 'collapseOne0',
        'current_lesson' => $course_list[0]['lessons'][0]['video_id'],
        'watched_lesson' => []
    );
    add_user_meta(get_current_user_id(), 'course_enroll', $meta_value);
}

// echo '<pre>';
// print_r($user_data);
// echo '</pre>';
// echo '<pre>';
// print_r($course_list);
// echo '</pre>';


?>

<?php get_header(); ?>
<main role="main">
    <section class="container">
        <h1><?php the_title(); ?></h1>
        <div>
            <?php the_content(); ?>
        </div>
        <?php if (isset($course_list[0]['section_title'])) : ?>
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="accordion course-accordion" id="accordionExample<?php echo $key ?>">
                        <?php foreach ($course_list as $key => $item) : ?>
                            <div class="accordion-item course-accordion__item">
                                <h2 class="accordion-header course-accordion__header" id="headingOne<?php echo $key ?>">
                                    <button class="accordion-button course-accordion__button <?php echo (($search_id === 0 || $search_id) ? (($user_data[$search_id]['current_section'] == 'collapseOne' . $key) ? '' :  'collapsed') : (($key == 0) ? '' : 'collapsed')); ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?php echo $key ?>" aria-controls="collapseOne<?php echo $key ?>">
                                        <?php echo $item['section_title'] ?>
                                    </button>
                                </h2>
                                <div id="collapseOne<?php echo $key ?>" class="accordion-collapse collapse <?php echo (($search_id === 0 || $search_id) ? (($user_data[$search_id]['current_section'] == 'collapseOne' . $key) ? 'show' :  '') : (($key == 0) ? 'show' : '')); ?>" aria-labelledby="headingOne<?php echo $key ?>" data-bs-parent="#accordionExample<?php echo $key ?>">
                                    <?php if ($item['lessons']) : ?>
                                        <?php foreach ($item['lessons'] as $lesson) : ?>
                                            <div data-video-id='<?php echo $lesson['video_id']; ?>' class="accordion-js accordion-body course-accordion__body
                                                  <?php echo ($search_id === 0 || $search_id) ? (($user_data[$search_id]['current_section'] == 'collapseOne' . $key && $user_data[$search_id]['current_lesson'] == $lesson['video_id']) ? 'course-active' : '') : (($key == 0 && array_search($lesson, $item['lessons']) == 0) ? 'course-active' : '')  ?>
                                                  <?php
                                                    if ($watched_vids) {
                                                        echo (array_search($lesson['video_id'], $watched_vids) === 0 || array_search($lesson['video_id'], $watched_vids)) ? 'bg-green' : '';
                                                    }
                                                    ?>
                                                  ">
                                                <div class="d-flex justify-content-between align-items-center course-accordion__title">
                                                    <?php echo $lesson['lesson_title'] ?>
                                                    <div class="d-flex flex-column align-items-center">
                                                        <?php if ($lesson['resources']['file']) : ?>
                                                            <div class="course-accordion__resources">
                                                                <a href="<?php echo $lesson['resources']['file']['url'] ?>" target="_blank">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">
                                                                        <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z" />
                                                                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                                                                    </svg>
                                                                    <span><?php echo $lesson['resources']['file_title'] ?: 'Resources'; ?></span>
                                                                </a>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if ($lesson['estimated_duration']) : ?>
                                                            <span class="course-accordion__duration">
                                                                <?php echo $lesson['estimated_duration'] ?>min
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-12 col-md-8">
                    <div class="course-video-block">
                        <div class="course-video-section">
                            <div class="course-video-lesson">
                                <?php foreach ($course_list as $key => $item) : ?>
                                    <?php foreach ($item['lessons'] as $lesson) : ?>
                                        <div class="vimeo-div <?php echo ($search_id === 0 || $search_id) ? (($user_data[$search_id]['current_section'] == "collapseOne" . $key && $user_data[$search_id]['current_lesson'] == $lesson['video_id']) ? 'vimeo-active' : '') : (($key == 0 && array_search($lesson, $item['lessons']) == 0) ? 'vimeo-active' : '')  ?>" id="<?php echo $lesson['video_id']; ?>" data-vimeo-id="<?php echo $lesson['video_id'] ?>" data-user="<?php echo get_current_user_id(); ?>" data-post="<?php echo $post_id ?>"></div>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <!-- Modal -->
        <div class="modal fade" id="doneModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    </div>
                    <div class="modal-body">
                        Congrats You Have Finished This Course
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="<?php echo home_url() ?>">Home Page</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>