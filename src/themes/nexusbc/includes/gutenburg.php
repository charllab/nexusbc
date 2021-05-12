<?php
if (!function_exists('my_wrap_quote_block_fitler')) {

    add_filter('render_block', 'my_wrap_quote_block_fitler', 10, 3);

    function my_wrap_quote_block_fitler($block_content, $block)
    {
        if ("core-embed/youtube" !== $block['blockName']) {
            return $block_content;
        }

        $output = '<div class="embed-responsive embed-responsive-16by9 mb-1">';
        $output .= $block_content;
        $output .= '</div>';

        return $output;
    }
}