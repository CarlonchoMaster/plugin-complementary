<?php
if (!function_exists('feloopListChildPages')) :
    function feloopListChildPages() : string
    {
        global $post;
        
        if (is_page() && $post->post_parent) {
            $childpages = wp_list_pages([
                'sort_column' => 'menu_order',
                'title_li' => null,
                'child_of' => $post->post_parent,
                'echo' => false,
                'depth' => 1
            ]);
        } else {
            $childpages = wp_list_pages([
                'sort_column' => 'menu_order',
                'title_li' => null,
                'child_of' => $post->ID,
                'echo' => false,
                'depth' => 1
            ]);
        }
         
        if ($childpages) {
            $string = '<nav class="pages-cluster"><ul>' . $childpages . '</ul></nav>';
        }
         
        return $string;
    }
endif;
add_shortcode('pages-cluster', 'feloopListChildPages');
