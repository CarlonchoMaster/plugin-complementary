<?php
if (!function_exists('feloopChangeHTMLImage')) :
    function feloopChangeHTMLImage(string $html)
    {
        $attrHeight=findWord($html, 'height');
        $attrWidth = findWord($html, 'width');
        $html=str_replace($attrHeight, '', $html);
        $html=str_replace($attrWidth, '', $html);
        return $html;
    }
endif;
add_filter('wp_get_attachment_image', 'feloopChangeHTMLImage');