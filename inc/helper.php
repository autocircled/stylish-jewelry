<?php
// register a new menu
function mytheme_add_custom_menu()
{
    register_nav_menu('header-menu', __('Header Menu'));
}
add_action('init', 'mytheme_add_custom_menu');
