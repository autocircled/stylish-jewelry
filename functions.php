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
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css', false, '5.1.3');
    if (is_singular('product')) {
        wp_enqueue_script('custom-stylish', get_stylesheet_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0.0', true);
        wp_localize_script('custom-stylish', 'CustomStylish', array('ajaxurl' => admin_url('admin-ajax.php')));
    }
}
add_action('wp_enqueue_scripts', 'enqueue_bootstrap_cdn', 20);


require 'inc/template-functions.php';
require 'inc/hooks.php';
require 'inc/helper.php';
