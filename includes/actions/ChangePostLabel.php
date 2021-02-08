<?php
// Change dashboard Posts to Tutorials
if (!function_exists('feloopChangePostObject')) :
    function feloopChangePostObject() : void
    {
        $get_post_type = get_post_type_object('post');
        $labels = $get_post_type->labels;
        $labels->name = 'Tutorial';
        $labels->singular_name = 'Tutorial';
        $labels->add_new = _x('Add New', 'post', 'feloopcustom');
        $labels->add_new_item = __('Add New Tutorial', 'feloopcustom');
        $labels->edit_item = __('Edit Tutorial', 'feloopcustom');
        $labels->new_item = __('New Tutorial', 'feloopcustom');
        $labels->view_item = __('View Tutorial', 'feloopcustom');
        $labels->search_items = __('Search Tutorials', 'feloopcustom');
        $labels->not_found = __('No Tutorial found', 'feloopcustom');
        $labels->not_found_in_trash = __('No Tutorials found in Trash', 'feloopcustom');
        $labels->all_items = __('All Tutorials', 'feloopcustom');
        $labels->menu_name = __('Tutorials', 'feloopcustom');
        $labels->name_admin_bar = __('Tutorials', 'feloopcustom');
        $labels->menu_icon='dashicons-media-document';
    }
endif;
add_action('init', 'feloopChangePostObject');
