<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

if (!function_exists('chld_thm_cfg_locale_css')) :
    function chld_thm_cfg_locale_css($uri)
    {
        if (empty($uri) && is_rtl() && file_exists(get_template_directory() . '/rtl.css'))
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter('locale_stylesheet_uri', 'chld_thm_cfg_locale_css');
defined('CHLD_THM_CFG_IGNORE_PARENT') or define('CHLD_THM_CFG_IGNORE_PARENT', TRUE);

// Enqueue bootstrap cdn
function enqueue_bootstrap_cdn()
{
    wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css', false, '4.0.0');
    if (is_singular('product')) {
        wp_enqueue_script('custom-stylish', get_stylesheet_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0.0', true);
        wp_localize_script('custom-stylish', 'CustomStylish', array('ajaxurl' => admin_url('admin-ajax.php')));
    }

    wp_enqueue_script('bootstrap-script', get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', [], '4.0.0', true);
    wp_enqueue_script('stylish-nav', get_stylesheet_directory_uri() . '/assets/js/navigation.js', [], '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_bootstrap_cdn', 20);

function stylish_theme_admin_scripts($hook)
{
    // var_dump($hook);
    // Check if we are on the custom theme settings page.


    // Register the script.
    wp_register_style(
        'boostrap',
        get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css',
        [],
        '4.0.0'
    );
    wp_register_style(
        'stylish-admin',
        get_stylesheet_directory_uri() . '/assets/css/stylish-admin.css',
        ['woocommerce_admin_styles'],
        '1.0.0'
    );
    // var_dump($hook);

    // if ($hook == 'post-new.php' || $hook == 'post.php') {
    //     wp_enqueue_media();
    //     wp_enqueue_script('jquery');
    //     wp_enqueue_script('editor');
    //     wp_enqueue_style('editor-buttons');
    // }

    // Enqueue the script.
    if ($hook == 'toplevel_page_stylish-settings') {
        wp_enqueue_style('boostrap');
    }
    wp_enqueue_style('stylish-admin');
}
add_action('admin_enqueue_scripts', 'stylish_theme_admin_scripts');

function prettify($code)
{
    echo '<pre>';
    var_dump($code);
    echo '</pre>';
}
require get_stylesheet_directory() . '/inc/class-stylish-walker-page.php';
require get_stylesheet_directory() . '/inc/class-stylish-walker-menu.php';
require 'inc/template-functions.php';
require 'inc/hooks.php';
require 'inc/helper.php';
require 'inc/settings.php';
require 'inc/meta-box.php';
// Custom menu walker.
