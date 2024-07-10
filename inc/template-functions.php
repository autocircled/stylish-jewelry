<?php
if (!function_exists('storefront_header_container')) {
    /**
     * The header container
     */
    function storefront_header_container()
    {
        /**
         * Functions hooked into stylish_top_header action
         *
         * @hooked stylish_top_header_container                - 0
         * @hooked stylish_top_header_left_block               - 5
         * @hooked stylish_top_header_right_block              - 5
         * @hooked stylish_top_header_container_close          - 41
         * @hooked stylish_middle_header_container             - 45
         * @hooked storefront_header_container_close           - 70
         */
        do_action('stylish_top_header');

        echo '<div class="container">';
    }
}


if (!function_exists('stylish_top_header_container')) {
    /**
     * The header container
     */
    function stylish_top_header_container()
    {
        echo '<div class="top-header">';
        echo '<div class="container">';
        echo '<div class="row">';
    }
}

if (!function_exists('stylish_top_header_container_close')) {
    /**
     * The header container close
     */
    function stylish_top_header_container_close()
    {
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}

if (!function_exists('stylish_top_header_left_block')) {
    /**
     * The stylish_top_header_left_block
     */
    function stylish_top_header_left_block()
    {
?>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mobile_screen_768_view_none left_block">
            <div class="inner-wrapper">
                <p>Welcome to Stylish Jewelry Shop</p>
            </div>
        </div>
    <?php
    }
}
if (!function_exists('storefront_primary_navigation_wrapper')) {
    /**
     * The primary navigation wrapper
     */
    function storefront_primary_navigation_wrapper()
    {
        echo '<div class="storefront-primary-navigation"><div class="container">';
    }
}
if (!function_exists('stylish_top_header_right_block')) {
    /**
     * The stylish_top_header_right_block
     */
    function stylish_top_header_right_block()
    {
    ?>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 right_block">
            <div class="inner-wrapper">
                <?php
                // show nav menu
                storefront_secondary_navigation();
                // do_action('stylish_top_header_right_block');
                ?>
            </div>
        </div>
    <?php
    }
}

if (!function_exists('stylish_middle_header_container')) {
    /**
     * The header container close
     */
    function stylish_middle_header_container()
    {
    ?>
        <div class="header-middle">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        <!-- logo -->
                        <?php storefront_site_branding(); ?>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-5 col-sm-4 col-xs-12">
                        <!-- product search -->
                        <?php storefront_product_search(); ?>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 mobile_screen_768_view_none">
                        <!-- call us -->
                        <a href="tel:0123456789" class="call_us text-decoration-none link-dark">
                            <div class="phone d-flex align-items-center gap-2">
                                <div class="icon">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                </div>
                                <div class="text d-flex flex-column lh-1">
                                    <span class="title">Call Us</span>
                                    <span class="number fw-bold">0123456789</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 mobile_screen_768_view_none">
                        <!-- cart -->
                        <?php storefront_header_cart(); ?>
                    </div>
                </div>
            </div>

        </div>
        <?php
    }
}
// woocommerce_breadcrumb_defaults
if (!function_exists('stylish_change_breadcrumb_delimiter')) {
    function stylish_change_breadcrumb_delimiter($defaults)
    {
        // $defaults['delimiter']   = '<span class="breadcrumb-separator"> / </span>';
        $defaults['wrap_before'] = '<div class="storefront-breadcrumb"><div class="container"><nav class="woocommerce-breadcrumb" aria-label="' . esc_attr__('breadcrumbs', 'storefront') . '">';
        // $defaults['wrap_after']  = '</nav></div></div>';
        return $defaults;
    }
}


if (!function_exists('storefront_footer_widgets')) {
    /**
     * Display the footer widget regions.
     *
     * @since  1.0.0
     * @return void
     */
    function storefront_footer_widgets()
    {
        $rows    = intval(apply_filters('storefront_footer_widget_rows', 1));
        $regions = intval(apply_filters('storefront_footer_widget_columns', 4));

        for ($row = 1; $row <= $rows; $row++) :

            // Defines the number of active columns in this footer row.
            for ($region = $regions; 0 < $region; $region--) {
                if (is_active_sidebar('footer-' . esc_attr($region + $regions * ($row - 1)))) {
                    $columns = $region;
                    break;
                }
            }

            if (isset($columns)) :
        ?>
                <div class=<?php echo '"footer-widgets row row-' . esc_attr($row) . ' cols-' . esc_attr($columns) . ' fix"'; ?>>
                    <?php
                    for ($column = 1; $column <= $columns; $column++) :
                        $footer_n = $column + $regions * ($row - 1);

                        if (is_active_sidebar('footer-' . esc_attr($footer_n))) :
                    ?>
                            <div class="block footer-widget-<?php echo esc_attr($column); ?> col-md-<?php echo $column == 1 ? '4' : ($column == 2 || $column == 3 ? '2' : ($column == 4 ? '4' : 0)); ?>">
                                <?php dynamic_sidebar('footer-' . esc_attr($footer_n)); ?>
                            </div>
                    <?php
                        endif;
                    endfor;
                    ?>
                </div><!-- .footer-widgets.row-<?php echo esc_attr($row); ?> -->
        <?php
                unset($columns);
            endif;
        endfor;
    }
}


if (!function_exists('stylish_footer_before_copyright_widgets')) {

    function stylish_footer_before_copyright_widgets()
    {
        if (is_active_sidebar('footer-before-copyright')) {
            dynamic_sidebar('footer-before-copyright');
        }
    }
}


if (!function_exists('storefront_credit')) {
    /**
     * Display the theme credit
     *
     * @since  1.0.0
     * @return void
     */
    function storefront_credit()
    {
        $links_output = '';

        if (apply_filters('storefront_credit_link', true)) {

            $links_output .= '<a href="https://ticlimited.com.bd" target="_blank" title="' . esc_attr__('Built with TIC Limted', 'stylish-jewelry') . '" rel="noreferrer nofollow">' . esc_html__('Developed by TIC Limted', 'stylish-jewelry') . '</a>.';
        }

        if (apply_filters('storefront_privacy_policy_link', true) && function_exists('the_privacy_policy_link')) {
            $separator    = '<span role="separator" aria-hidden="true"></span>';
            $links_output = get_the_privacy_policy_link('', (!empty($links_output) ? $separator : '')) . $links_output;
        }

        $links_output = apply_filters('storefront_credit_links_output', $links_output);
        ?>
        <div class="site-info">
            <div class="container">
                <div class="row">
                    <div class="col-md-6"><?php echo esc_html(apply_filters('storefront_copyright_text', $content = '&copy; ' . get_bloginfo('name') . ' ' . gmdate('Y'))); ?></div>
                    <div class="col-md-6 text-end">
                        <?php if (!empty($links_output)) { ?>
                            <?php echo wp_kses_post($links_output); ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div><!-- .site-info -->
    <?php
    }
}


if (!function_exists('stylish_woocommerce_output_related_products_args')) {

    function stylish_woocommerce_output_related_products_args($args)
    {
        $args['posts_per_page'] = 6;
        $args['columns']        = 6;
        return $args;
    }
}


if (!function_exists('storefront_before_content')) {
    /**
     * Before Content
     * Wraps all WooCommerce content in wrappers which match the theme markup
     *
     * @since   1.0.0
     * @return  void
     */
    function storefront_before_content()
    {
    ?>
        <div id="primary" class="content-area col-md-9 order-5">
            <main id="main" class="site-main" role="main">
            <?php
        }
    }


    if (!function_exists('langle_addons_woocommerce_show_product_loop_sale_flash')) {
        function langle_addons_woocommerce_show_product_loop_sale_flash()
        {
            global $product;

            if (!$product->is_on_sale() || !$product->is_purchasable() || $product->is_type('variable')) {
                return;
            }
            // var_dump($product);

            $regular_price = (float) $product->get_regular_price(); // Regular price
            $sale_price = (float) $product->get_price(); // Active price (the "Sale price" when on-sale)

            $precision = 1; // Max number of decimals
            $saving_percentage = round(100 - ($sale_price / $regular_price * 100), $precision) . '%';

            echo '<span class="la-onsale">' . esc_html__('-' . $saving_percentage, 'langle-addons') . '</span>';
        }
    }

    if (!function_exists('stylish_woocommerce_template_loop_product_link_open')) {
        /**
         * Insert the opening anchor tag for products in the loop.
         */
        function stylish_woocommerce_template_loop_product_link_open()
        {
            global $product;

            $link = apply_filters('woocommerce_loop_product_link', get_the_permalink(), $product);

            echo '<a href="' . esc_url($link) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link position-relative d-block overflow-hidden rounded border border-dark-subtle">';
        }
    }

    if (!function_exists('stylish_woocommerce_template_loop_add_to_cart')) {
        /**
         * Insert the opening anchor tag for products in the loop.
         */
        function stylish_woocommerce_template_loop_add_to_cart()
        {
            global $product;

            $link = apply_filters('woocommerce_loop_product_link', get_the_permalink(), $product);

            echo '<a href="' . esc_url($link) . '" class="la-wc-product-link">' . __('Buy Now', 'stylish-jewelry') . '</a>';
        }
    }

    if (!function_exists('stylish_woocommerce_buy_now_button')) {
        function stylish_woocommerce_buy_now_button()
        {
            global $product;
            if ($product->is_type('simple')) {
                $link = apply_filters('woocommerce_loop_product_link', wc_get_checkout_url(), $product);
                echo '<a href="' . esc_url($link) . '?add-to-cart=' . $product->get_id() . '&quantity=1" class="la-wc-product-link">' . __('Buy Now', 'stylish-jewelry') . '</a>';
            }
        }
    }

    // <a href="/?add-to-cart=123&quantity=1&redirect_to_checkout=yes" class="button buy-now-button">Buy Now</a>

    if (!function_exists('stylish_add_fav_button')) {
        function stylish_add_fav_button()
        {
            global $product;
            $post_id = $product->get_id();
            $site_id = get_current_blog_id();
            the_favorites_button($post_id, $site_id);
        }
    }


    if (!function_exists('stylish_get_product_sku')) {

        function stylish_get_product_sku()
        {
            global $product;
            ?>
                <?php if (wc_product_sku_enabled() && ($product->get_sku() || $product->is_type('variable'))) : ?>

                    <span class="sku_wrapper"><?php esc_html_e('Code:', 'woocommerce'); ?> <span class="sku"><?php echo ($sku = $product->get_sku()) ? $sku : esc_html__('Code', 'woocommerce'); ?></span></span>

                <?php endif; ?>
            <?php
        }
    }
    if (!function_exists('stylish_add_wa_ask_button')) {

        function stylish_add_wa_ask_button()
        {
            ?>
                <a href="https://wa.me/8801310899412" class="whatsapp_flex d-block" target="_blank"><svg data-v-55282aa0="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="18px" height="18px" fill-rule="evenodd" clip-rule="evenodd" class="single_whats_app">
                        <path data-v-55282aa0="" fill="#fff" d="M4.9,43.3l2.7-9.8C5.9,30.6,5,27.3,5,24C5,13.5,13.5,5,24,5c5.1,0,9.8,2,13.4,5.6	C41,14.2,43,18.9,43,24c0,10.5-8.5,19-19,19c0,0,0,0,0,0h0c-3.2,0-6.3-0.8-9.1-2.3L4.9,43.3z"></path>
                        <path data-v-55282aa0="" fill="#fff" d="M4.9,43.8c-0.1,0-0.3-0.1-0.4-0.1c-0.1-0.1-0.2-0.3-0.1-0.5L7,33.5c-1.6-2.9-2.5-6.2-2.5-9.6	C4.5,13.2,13.3,4.5,24,4.5c5.2,0,10.1,2,13.8,5.7c3.7,3.7,5.7,8.6,5.7,13.8c0,10.7-8.7,19.5-19.5,19.5c-3.2,0-6.3-0.8-9.1-2.3	L5,43.8C5,43.8,4.9,43.8,4.9,43.8z"></path>
                        <path data-v-55282aa0="" fill="#cfd8dc" d="M24,5c5.1,0,9.8,2,13.4,5.6C41,14.2,43,18.9,43,24c0,10.5-8.5,19-19,19h0c-3.2,0-6.3-0.8-9.1-2.3	L4.9,43.3l2.7-9.8C5.9,30.6,5,27.3,5,24C5,13.5,13.5,5,24,5 M24,43L24,43L24,43 M24,43L24,43L24,43 M24,4L24,4C13,4,4,13,4,24	c0,3.4,0.8,6.7,2.5,9.6L3.9,43c-0.1,0.3,0,0.7,0.3,1c0.2,0.2,0.4,0.3,0.7,0.3c0.1,0,0.2,0,0.3,0l9.7-2.5c2.8,1.5,6,2.2,9.2,2.2	c11,0,20-9,20-20c0-5.3-2.1-10.4-5.8-14.1C34.4,6.1,29.4,4,24,4L24,4z"></path>
                        <path data-v-55282aa0="" fill="#40c351" d="M35.2,12.8c-3-3-6.9-4.6-11.2-4.6C15.3,8.2,8.2,15.3,8.2,24c0,3,0.8,5.9,2.4,8.4L11,33l-1.6,5.8	l6-1.6l0.6,0.3c2.4,1.4,5.2,2.2,8,2.2h0c8.7,0,15.8-7.1,15.8-15.8C39.8,19.8,38.2,15.8,35.2,12.8z"></path>
                        <path data-v-55282aa0="" fill="#fff" fill-rule="evenodd" d="M19.3,16c-0.4-0.8-0.7-0.8-1.1-0.8c-0.3,0-0.6,0-0.9,0	s-0.8,0.1-1.3,0.6c-0.4,0.5-1.7,1.6-1.7,4s1.7,4.6,1.9,4.9s3.3,5.3,8.1,7.2c4,1.6,4.8,1.3,5.7,1.2c0.9-0.1,2.8-1.1,3.2-2.3	c0.4-1.1,0.4-2.1,0.3-2.3c-0.1-0.2-0.4-0.3-0.9-0.6s-2.8-1.4-3.2-1.5c-0.4-0.2-0.8-0.2-1.1,0.2c-0.3,0.5-1.2,1.5-1.5,1.9	c-0.3,0.3-0.6,0.4-1,0.1c-0.5-0.2-2-0.7-3.8-2.4c-1.4-1.3-2.4-2.8-2.6-3.3c-0.3-0.5,0-0.7,0.2-1c0.2-0.2,0.5-0.6,0.7-0.8	c0.2-0.3,0.3-0.5,0.5-0.8c0.2-0.3,0.1-0.6,0-0.8C20.6,19.3,19.7,17,19.3,16z" clip-rule="evenodd"></path>
                    </svg>
                    Ask for details</a>
        <?php
        }
    }


    if (!function_exists('stylish_woocommerce_product_price_html')) {
        function stylish_woocommerce_product_price_html($price, $product)
        {
            if (is_singular('product')) {
                $price = 'Price: ' . $price;
            }
            return $price;
        }
    }

    // Make postal code optional
    add_filter('woocommerce_default_address_fields', 'customize_extra_fields', 1000, 1);
    function customize_extra_fields($address_fields)
    {
        $address_fields['postcode']['required'] = false; //Postcode
        return $address_fields;
    }

    // Hide checkout fields
    function reorder_billing_fields($fields)
    {
        $billing_order = [
            'billing_first_name',
            'billing_phone',
            'billing_state',
            'billing_city',
            'billing_address_1',
            // 'billing_last_name',
            // 'billing_email',
            //         'billing_company',
            // 'billing_country',
            //         'billing_address_2',
            // 'billing_postcode',
        ];

        foreach ($billing_order as $field) {
            if ('billing_phone' == $fields['billing'][$field]) {
            }
            $ordered_fields[$field] = $fields['billing'][$field];
        }
        $ordered_fields['billing_first_name']['label'] = __('নাম', 'stylish-jewelry');
        $ordered_fields['billing_first_name']['placeholder'] = __('আপনার নাম লিখুন', 'stylish-jewelry');
        $ordered_fields['billing_first_name']['class'] = ['form-row-wide'];

        $ordered_fields['billing_phone']['priority'] = 15;
        $ordered_fields['billing_phone']['label'] = __('মোবাইল নম্বর', 'stylish-jewelry');
        $ordered_fields['billing_phone']['placeholder'] = __('মোবাইল নম্বর', 'stylish-jewelry');

        $ordered_fields['billing_state']['priority'] = 20;
        $ordered_fields['billing_state']['label'] = __('জেলা', 'stylish-jewelry');

        $ordered_fields['billing_city']['priority'] = 25;
        $ordered_fields['billing_city']['label'] = __('থানা', 'stylish-jewelry');
        $ordered_fields['billing_city']['placeholder'] = __('আপনার এলাকার নাম লিখুন', 'stylish-jewelry');

        $ordered_fields['billing_address_1']['priority'] = 30;
        $ordered_fields['billing_address_1']['label'] = __('সম্পূর্ণ ঠিকানা', 'stylish-jewelry');
        $ordered_fields['billing_address_1']['placeholder'] = __('আপনার সম্পূর্ণ ঠিকানা লিখুন', 'stylish-jewelry');


        $fields['billing'] = $ordered_fields;

        return $fields;
    }

    add_filter('woocommerce_checkout_fields', 'reorder_billing_fields');

    // add_filter('wc_add_to_cart_message', 'remove_add_to_cart_message');

    function remove_add_to_cart_message()
    {
        return;
    }
    // wc_print_notice(esc_html__('No saved methods found.', 'woocommerce'), 'notice');
    // wc_add_to_cart_message()

    if (!function_exists('stylish_checkout_notice')) {
        function stylish_checkout_notice()
        {
            wc_add_notice('অর্ডার করতে আপনার সঠিক তথ্য দিয়ে নিচের ফর্মটি সম্পূর্ণ পূরণ করুন। (আমাদের একজন প্রতিনিধি দ্রুত সময়ের মধ্যে আপনার সাথে যোগাযোগ করবে)', 'success');
        }
    }


    add_action('woocommerce_review_order_before_submit', 'stylish_checkout_terms');
    if (!function_exists('stylish_checkout_terms')) {
        function stylish_checkout_terms()
        {
            global $wp;
            $page_id = get_option('wc_terms_page_id');
            if ($page_id) {
                $page = get_post($page_id);
                if ($page && $page->post_content) {
                    $page_content = $page->post_content;
                    $page_content = apply_filters('the_content', $page_content);
                    echo $page_content;
                }
            }
            wc_print_notice('অর্ডার করতে আপনার সঠিক তথ্য দিয়ে নিচের ফর্মটি সম্পূর্ণ পূরণ করুন।', 'notice');
        }
    }
