<?php

function feloopChangeHTMLGallery($output, $attr, $instance)
{
    $post_id = get_the_ID();

    if (!empty($attr['ids'])) {
        $attr['orderby'] = 'post__in';
        $attr['include'] = $attr['ids'];
    }

    // Merge attributes with $attr variable
    extract(shortcode_atts([
        'orderby' => 'menu_order ASC, ID ASC',
        'include' => '',
        'id' => $post_id,
        'itemtag' => 'dl',
        'icontag' => 'dt',
        'captiontag' => 'dd',
        'columns' => 3,
        'size' => 'large',
        'link' => 'file'
    ], $attr));

    $args = [
        'post_type' => 'attachment',
        'post_status' => 'inherit',
        'post_mime_type' => 'image',
        'orderby' => $orderby
    ];

    if (!empty($include)) {
        $args['include'] = $include;
    } else {
        $args['post_parent'] = $id;
        $args['numberposts'] = -1;
    }

    if ($args['include'] == "") {
        $args['orderby'] = 'date';
        $args['order'] = 'asc';
    }
    // Get the posts filtered by some arguments
    $images = get_posts($args);
    $output .= '<section class="hero is-medium has-carousel mb-5">';
    $output .= '<div class="hero-carousel" id="carousel-slider">';
    for ($i = 0, $imagesLenght = count($images); $i < $imagesLenght; $i++) {
        $image = $images[$i];
        $imageHTML = wp_get_attachment_image($image->ID, 'full');
        $currentSlider = $i + 1;
        $output .= "<div class='item-{$currentSlider}' id='image-container{$currentSlider}'>{$imageHTML}</div>";
    }
    $output .= '</div></section>';
        
    return $output;
}

add_filter('post_gallery', 'feloopChangeHTMLGallery', 10, 3);
