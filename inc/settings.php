<?php
add_action('admin_menu', 'stylish_settings_page');
add_action('admin_init', 'stylish_settings_init');


if (!function_exists('stylish_settings_page')) {
    function stylish_settings_page()
    {
        add_menu_page('Stylish Settings Page', 'Stylish Settings', 'manage_options', 'stylish-settings', 'stylish_render_settings_page');
    }
}



/**
 * Renders the settings page for the Stylish theme.
 *
 * This function is responsible for rendering the settings page for the Stylish theme.
 * It generates the HTML markup for the page and includes the necessary form elements.
 *
 * @return void
 */
function stylish_render_settings_page()
{
?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('stylish_setting_fields');
            do_settings_sections('stylish-theme-settings');
            submit_button();
            ?>
        </form>
    </div>
<?php
}

/**
 * Initializes custom theme settings.
 *
 */
function stylish_settings_init()
{
    // Register a setting for this page.
    // create a for loop from an array of size 5
    register_setting('stylish_setting_fields', 'stylish_setting_info_fields');
    register_setting('stylish_setting_fields', 'stylish_setting_contact_fields_heading');
    register_setting('stylish_setting_fields', 'stylish_setting_contact_fields');
    register_setting('stylish_setting_fields', 'stylish_setting_how_to_buy');
    register_setting('stylish_setting_fields', 'stylish_setting_return_policy');
    register_setting('stylish_setting_fields', 'stylish_setting_fb_link');
    register_setting('stylish_setting_fields', 'stylish_setting_top_phone');

    // Add a settings section.
    add_settings_section(
        'stylish_theme_settings_information',
        '',
        '',
        'stylish-theme-settings'
    );

    // Add a field to the section.
    add_settings_field(
        'stylish_setting_info_fields',
        'Informations',
        'stylish_setting_info_fields_callback',
        'stylish-theme-settings',
        'stylish_theme_settings_information'
    );
    add_settings_field(
        'stylish_setting_contact_fields_heading',
        'Heading',
        'stylish_setting_contact_fields_heading_callback',
        'stylish-theme-settings',
        'stylish_theme_settings_information'
    );
    add_settings_field(
        'stylish_setting_contact_fields',
        'Contact Numbers',
        'stylish_setting_contact_fields_callback',
        'stylish-theme-settings',
        'stylish_theme_settings_information'
    );
    add_settings_field(
        'stylish_setting_how_to_buy',
        'How To Buy',
        'stylish_setting_how_to_buy_callback',
        'stylish-theme-settings',
        'stylish_theme_settings_information'
    );
    add_settings_field(
        'stylish_setting_return_policy',
        'Return Policy',
        'stylish_setting_return_policy_callback',
        'stylish-theme-settings',
        'stylish_theme_settings_information'
    );
    add_settings_field(
        'stylish_setting_fb_link',
        'Facebook Page Link',
        'stylish_setting_fb_link_callback',
        'stylish-theme-settings',
        'stylish_theme_settings_information'
    );
    add_settings_field(
        'stylish_setting_top_phone',
        'Phone Number',
        'stylish_setting_top_phone_callback',
        'stylish-theme-settings',
        'stylish_theme_settings_information'
    );
}

function stylish_setting_info_fields_callback()
{
    $option = get_option('stylish_setting_info_fields');
    // echo '<pre>';
    // var_dump($option);
    // echo '</pre>';

?>
    <div class="container">
        <div class="row mb-3" style="max-width: 500px;">
            <div class="col-md-6">
                <input type="text" name="stylish_setting_info_fields[0][icon]" class="form-control" value="<?php echo isset($option[0]) && isset($option[0]['icon']) ? esc_attr($option[0]['icon']) : ''; ?>" placeholder="Enter icon" />
            </div>
            <div class="col-md-6">
                <input type="text" name="stylish_setting_info_fields[0][text]" class="form-control" value="<?php echo isset($option[0]) && isset($option[0]['text']) ? esc_attr($option[0]['text']) : ''; ?>" placeholder="Enter text" />
            </div>
        </div>
        <div class="row mb-3" style="max-width: 500px;">
            <div class="col-md-6">
                <input type="text" name="stylish_setting_info_fields[1][icon]" class="form-control" value="<?php echo isset($option[1]) && isset($option[1]['icon']) ? esc_attr($option[1]['icon']) : ''; ?>" placeholder="Enter icon" />
            </div>
            <div class="col-md-6">
                <input type="text" name="stylish_setting_info_fields[1][text]" class="form-control" value="<?php echo isset($option[1]) && isset($option[1]['text']) ? esc_attr($option[1]['text']) : ''; ?>" placeholder="Enter text" />
            </div>
        </div>
        <div class="row mb-3" style="max-width: 500px;">
            <div class="col-md-6">
                <input type="text" name="stylish_setting_info_fields[2][icon]" class="form-control" value="<?php echo isset($option[2]) && isset($option[2]['icon']) ? esc_attr($option[2]['icon']) : ''; ?>" placeholder="Enter icon" />
            </div>
            <div class="col-md-6">
                <input type="text" name="stylish_setting_info_fields[2][text]" class="form-control" value="<?php echo isset($option[2]) && isset($option[2]['text']) ? esc_attr($option[2]['text']) : ''; ?>" placeholder="Enter text" />
            </div>
        </div>
        <div class="row mb-3" style="max-width: 500px;">
            <div class="col-md-6">
                <input type="text" name="stylish_setting_info_fields[3][icon]" class="form-control" value="<?php echo isset($option[3]) && isset($option[3]['icon']) ? esc_attr($option[3]['icon']) : ''; ?>" placeholder="Enter icon" />
            </div>
            <div class="col-md-6">
                <input type="text" name="stylish_setting_info_fields[3][text]" class="form-control" value="<?php echo isset($option[3]) && isset($option[3]['text']) ? esc_attr($option[3]['text']) : ''; ?>" placeholder="Enter text" />
            </div>
        </div>
        <div class="row mb-3" style="max-width: 500px;">
            <div class="col-md-6">
                <input type="text" name="stylish_setting_info_fields[4][icon]" class="form-control" value="<?php echo isset($option[4]) && isset($option[4]['icon']) ? esc_attr($option[4]['icon']) : ''; ?>" placeholder="Enter icon" />
            </div>
            <div class="col-md-6">
                <input type="text" name="stylish_setting_info_fields[4][text]" class="form-control" value="<?php echo isset($option[4]) && isset($option[4]['text']) ? esc_attr($option[4]['text']) : ''; ?>" placeholder="Enter text" />
            </div>
        </div>

    </div>
<?php
}


function stylish_setting_contact_fields_heading_callback()
{
    $option = get_option('stylish_setting_contact_fields_heading');

?>
    <div class="container">
        <div class="row mb-3" style="max-width: 500px;">
            <div class="col-md-12">
                <input type="text" name="stylish_setting_contact_fields_heading" class="form-control" value="<?php echo isset($option) ? esc_attr($option) : ''; ?>" placeholder="Enter details" />
            </div>
        </div>
    </div>
<?php
}

function stylish_setting_contact_fields_callback()
{
    $option = get_option('stylish_setting_contact_fields');

?>
    <div class="container">
        <div class="row mb-3" style="max-width: 500px;">
            <div class="col-md-6">
                <input type="text" name="stylish_setting_contact_fields[0][number]" class="form-control" value="<?php echo isset($option[0]) && isset($option[0]['number']) ? esc_attr($option[0]['number']) : ''; ?>" placeholder="Enter number" />
            </div>
            <div class="col-md-6">
                <input type="text" name="stylish_setting_contact_fields[0][label]" class="form-control" value="<?php echo isset($option[0]) && isset($option[0]['label']) ? esc_attr($option[0]['label']) : ''; ?>" placeholder="Enter label" />
            </div>
        </div>
        <div class="row mb-3" style="max-width: 500px;">
            <div class="col-md-6">
                <input type="text" name="stylish_setting_contact_fields[1][number]" class="form-control" value="<?php echo isset($option[1]) && isset($option[1]['number']) ? esc_attr($option[1]['number']) : ''; ?>" placeholder="Enter number" />
            </div>
            <div class="col-md-6">
                <input type="text" name="stylish_setting_contact_fields[1][label]" class="form-control" value="<?php echo isset($option[1]) && isset($option[1]['label']) ? esc_attr($option[1]['label']) : ''; ?>" placeholder="Enter label" />
            </div>
        </div>
        <div class="row mb-3" style="max-width: 500px;">
            <div class="col-md-6">
                <input type="text" name="stylish_setting_contact_fields[2][number]" class="form-control" value="<?php echo isset($option[2]) && isset($option[2]['number']) ? esc_attr($option[2]['number']) : ''; ?>" placeholder="Enter number" />
            </div>
            <div class="col-md-6">
                <input type="text" name="stylish_setting_contact_fields[2][label]" class="form-control" value="<?php echo isset($option[2]) && isset($option[2]['label']) ? esc_attr($option[2]['label']) : ''; ?>" placeholder="Enter label" />
            </div>
        </div>
        <div class="row mb-3" style="max-width: 500px;">
            <div class="col-md-6">
                <input type="text" name="stylish_setting_contact_fields[3][number]" class="form-control" value="<?php echo isset($option[3]) && isset($option[3]['number']) ? esc_attr($option[3]['number']) : ''; ?>" placeholder="Enter number" />
            </div>
            <div class="col-md-6">
                <input type="text" name="stylish_setting_contact_fields[3][label]" class="form-control" value="<?php echo isset($option[3]) && isset($option[3]['label']) ? esc_attr($option[3]['label']) : ''; ?>" placeholder="Enter label" />
            </div>
        </div>
        <div class="row mb-3" style="max-width: 500px;">
            <div class="col-md-6">
                <input type="text" name="stylish_setting_contact_fields[4][number]" class="form-control" value="<?php echo isset($option[4]) && isset($option[4]['number']) ? esc_attr($option[4]['number']) : ''; ?>" placeholder="Enter number" />
            </div>
            <div class="col-md-6">
                <input type="text" name="stylish_setting_contact_fields[4][label]" class="form-control" value="<?php echo isset($option[4]) && isset($option[4]['label']) ? esc_attr($option[4]['label']) : ''; ?>" placeholder="Enter label" />
            </div>
        </div>
    </div>
<?php
}

function stylish_setting_how_to_buy_callback()
{
    $option = get_option('stylish_setting_how_to_buy');

?>
    <div class="container">
        <div class="row mb-3" style="max-width: 500px;">
            <div class="col-md-12">
                <?php
                $content = isset($option) ? $option : '';
                wp_editor($content, 'stylish_setting_how_to_buy', array(
                    'textarea_name' => 'stylish_setting_how_to_buy',
                    'media_buttons' => false,
                    'textarea_rows' => 10,
                    'teeny' => true,
                ));
                ?>
            </div>
        </div>
    </div>
<?php
}

function stylish_setting_return_policy_callback()
{
    $option = get_option('stylish_setting_return_policy');

?>
    <div class="container">
        <div class="row mb-3" style="max-width: 500px;">
            <div class="col-md-12">
                <?php
                $content = isset($option) ? $option : '';
                wp_editor($content, 'stylish_setting_return_policy', array(
                    'textarea_name' => 'stylish_setting_return_policy',
                    'media_buttons' => false,
                    'textarea_rows' => 10,
                    'teeny' => true,
                ));
                ?>
            </div>
        </div>
    </div>
<?php
}


function stylish_setting_fb_link_callback()
{
    $option = get_option('stylish_setting_fb_link');

?>
    <div class="container">
        <div class="row mb-3" style="max-width: 500px;">
            <div class="col-md-12">
                <input type="text" name="stylish_setting_fb_link" class="form-control" value="<?php echo isset($option) ? esc_attr($option) : ''; ?>" placeholder="Enter Facebook Page Link" />
            </div>
        </div>
    </div>
<?php
}
function stylish_setting_top_phone_callback()
{
    $option = get_option('stylish_setting_top_phone');

?>
    <div class="container">
        <div class="row mb-3" style="max-width: 500px;">
            <div class="col-md-12">
                <input type="text" name="stylish_setting_top_phone" class="form-control" value="<?php echo isset($option) ? esc_attr($option) : ''; ?>" placeholder="Enter Phone Number" />
            </div>
        </div>
    </div>
<?php
}
