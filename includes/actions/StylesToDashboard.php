<?php
// Add a font-awesome about CDN
if (!function_exists('feloopLoadFontAwesome')) :
    function feloopLoadFontAwesome() : void
    {
        wp_enqueue_style('fontawesome-5', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/fontawesome.min.css', array(), null);
        wp_enqueue_style('fontawesome-brand', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/brands.min.css', ['fontawesome-5'], null);
    }
endif;
//add_action('admin_enqueue_scripts', 'feloopLoadFontAwesome');

// Add attribute to CDN links
if (!function_exists('feloopAddFontawesome5CdnAttributes')) :
    function feloopAddFontawesome5CdnAttributes(string $html, string $handle) : string
    {
        switch ($handle) {
            case 'fontawesome-5':
                $html = str_replace("media='all'", "media='all' integrity='sha512-kJ30H6g4NGhWopgdseRb8wTsyllFUYIx3hiUwmGAkgA9B/JbzUBDQVr2VVlWGde6sdBVOG7oU8AL35ORDuMm8g==' crossorigin='anonymous'", $html);
                break;
            case 'fontawesome-brand':
                $html = str_replace("media='all'", "media='all' integrity='sha512-D0B6cFS+efdzUE/4wh5XF5599DtW7Q1bZOjAYGBfC0Lg9WjcrqPXZto020btDyrlDUrfYKsmzFvgf/9AB8J0Jw==' crossorigin='anonymous'", $html);
                break;
        }
        return $html;
    }
endif;
add_filter('style_loader_tag', 'feloopAddFontawesome5CdnAttributes', 10, 2);
