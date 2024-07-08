<?php
// register a new menu
function mytheme_add_custom_menu()
{
    register_nav_menu('header-menu', __('Header Menu'));
}
add_action('init', 'mytheme_add_custom_menu');

function before_footer_copy_widget_init()
{
    register_sidebar(array(
        'name'          => __('Before Footer Copyright', 'stylish-jewelry'),
        'id'            => 'footer-before-copyright',
        'description'   => __('Widgets added here will appear in before the copyright in the footer.', 'stylish-jewelry'),
        'before_widget' => '<div id="%1$s" class="footer-before-copyright %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<span class="gamma widget-title">',
        'after_title'   => '</span>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Copyright', 'stylish-jewelry'),
        'id'            => 'footer-copyright',
        'description'   => __('Widgets added here will appear in the copyright in the footer.', 'stylish-jewelry'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<span class="gamma widget-title">',
        'after_title'   => '</span>',
    ));
}
add_action('widgets_init', 'before_footer_copy_widget_init', 100);
