<?php
// Add the post type free-courses
feloopcustom()->register_post_type(
    'free_course',
    __('Free Courses', 'feloopcustom'),
    __('Free Course', 'feloopcustom'),
    __('Content that has a logical sequence will be entered', 'feloopcustom'),
    ['menu_icon' => 'dashicons-book']
);

// Add the post type CSS
/* feloopcustom()->register_post_type(
    'post_css',
    __('Posts CSS', 'feloopcustom'),
    __('Post CSS', 'feloopcustom'),
    __('All CSS tutorials are entered', 'feloopcustom'),
    ['menu_icon' => FELOOPC_URL . 'assets/svg/css3-alt-brands.svg']
); */




