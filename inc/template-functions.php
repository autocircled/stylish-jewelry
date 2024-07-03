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

        echo '<div class="col-full">';
    }
}


if (!function_exists('stylish_top_header_container')) {
    /**
     * The header container
     */
    function stylish_top_header_container()
    {
        echo '<div class="col-full top-header">';
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
                                <div class="text lh-1">
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
