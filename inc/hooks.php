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
    remove_action('storefront_header', 'storefront_primary_navigation_wrapper', 42);
    remove_action('storefront_header', 'storefront_primary_navigation', 50);
    remove_action('storefront_header', 'storefront_header_cart', 60);
    remove_action('storefront_header', 'storefront_primary_navigation_wrapper_close', 68);



    remove_action('storefront_header', 'storefront_site_branding', 20);
    remove_action('storefront_header', 'storefront_secondary_navigation', 30);
    remove_action('storefront_header', 'storefront_product_search', 40);
    remove_action('storefront_header', 'storefront_header_cart', 60);
    remove_action('storefront_footer', 'storefront_credit', 20);
    remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
    remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
    // remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
    remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
    remove_action('woocommerce_checkout_terms_and_conditions', 'wc_checkout_privacy_policy_text', 20);

    // remove block styles
    remove_action('wp_enqueue_scripts', 'wp_common_block_scripts_and_styles');
    remove_action('admin_enqueue_scripts', 'wp_common_block_scripts_and_styles');
}

add_action('init', 'stylish_remove_parent_actions');

add_action('woocommerce_before_shop_loop_item_title', 'langle_addons_woocommerce_show_product_loop_sale_flash', 5);
add_action('stylish_woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);

add_action('woocommerce_before_shop_loop_item', 'stylish_woocommerce_template_loop_product_link_open', 10);
add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 30);
add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 35);
add_action('woocommerce_after_shop_loop_item', 'stylish_woocommerce_template_loop_add_to_cart', 10);
add_action('woocommerce_after_add_to_cart_quantity', 'stylish_woocommerce_buy_now_button', 35);
add_action('woocommerce_after_add_to_cart_button', 'stylish_add_fav_button', 36);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 6);
add_action('woocommerce_single_product_summary', 'stylish_add_wa_ask_button', 7);
add_action('woocommerce_single_product_summary', 'stylish_get_product_sku', 8);
add_action('woocommerce_before_checkout_form', 'stylish_checkout_notice', 10);

add_action('woocommerce_side_information_bar', 'stylish_order_concerns_info', 10);
add_action('woocommerce_side_information_bar', 'stylish_contact_numbers', 20);
add_filter('woocommerce_order_button_text', 'stylish_custom_order_button_text');
add_action('storefront_footer', 'stylish_footer_before_copyright_widgets', 15);
add_action('storefront_after_footer', 'storefront_credit', 10);
add_action('woocommerce_checkout_terms_and_conditions', 'stylish_woocommerce_get_terms_and_conditions_checkbox_text', 10);
add_action('wp_footer', 'whatapp_link', 10);



// Filter Hooks
add_filter('woocommerce_breadcrumb_defaults', 'stylish_change_breadcrumb_delimiter', 20);
add_filter('woocommerce_output_related_products_args', 'stylish_woocommerce_output_related_products_args', 20);
add_filter('woocommerce_get_price_html', 'stylish_woocommerce_product_price_html', 20, 2);
// add_filter('woocommerce_get_terms_and_conditions_checkbox_text', 'stylish_woocommerce_get_terms_and_conditions_checkbox_text', 10, 2);
add_filter('woocommerce_product_tabs', 'stylish_woocommerce_product_tabs', 10);

// hide Additional information notes from checkout page
add_filter('woocommerce_enable_order_notes_field', '__return_false');
add_filter('storefront_menu_toggle_text', '__return_false');
add_filter('storefront_credit_links_output', '__return_false');
add_filter('comment_form_fields', 'stylish_comment_form_default_fields');

// add_filter('storefront_handheld_footer_bar_links', 'stylish_storefront_handheld_footer_bar_links', 0);

function remove_email_requirement($fields) {
    prettify($fields);
    unset($fields['comment_author_email']);
    unset($fields['cookies']);
    return $fields;
}
// add_filter('preprocess_comment', 'remove_email_requirement');