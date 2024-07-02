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
         */
        do_action('stylish_top_header');

        echo '<div class="col-full ss">';
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
                <p>Welcome to Stylish Jewelry Shop</p>
            </div>
        </div>
<?php
    }
}
