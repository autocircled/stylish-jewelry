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
