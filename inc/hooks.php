<?php

add_action('stylish_top_header', 'stylish_top_header_container', 0);
add_action('stylish_top_header', 'stylish_top_header_left_block', 5);
add_action('stylish_top_header', 'stylish_top_header_right_block', 5);
add_action('stylish_top_header', 'stylish_top_header_container_close', 41);

// Middle Header
add_action('storefront_header', 'stylish_middle_header_container', 30);

add_action('stylish_middle_header', 'storefront_site_branding', 5);
add_action('stylish_middle_header', 'storefront_product_search', 10);
add_action('stylish_middle_header', 'storefront_header_cart', 15);

function stylish_remove_parent_actions()
{
    remove_action('storefront_header', 'storefront_site_branding', 20);
    remove_action('storefront_header', 'storefront_secondary_navigation', 30);
    remove_action('storefront_header', 'storefront_product_search', 40);
    remove_action('storefront_header', 'storefront_header_cart', 60);
    remove_action('storefront_footer', 'storefront_credit', 20);
}

add_action('init', 'stylish_remove_parent_actions');


// Filter Hooks

add_filter('woocommerce_breadcrumb_defaults', 'stylish_change_breadcrumb_delimiter', 20);

add_action('storefront_footer', 'stylish_footer_before_copyright_widgets', 15);
add_action('storefront_after_footer', 'storefront_credit', 10);
