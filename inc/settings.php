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
    for ($i = 1; $i <= 5; $i++) {
        register_setting('stylish_setting_fields', 'stylish_setting_contact_field_' . $i);
    }

    // Add a settings section.
    add_settings_section(
        'stylish_theme_settings_information',
        'Shopping Information',
        'stylish_theme_settings_information_callback',
        'stylish-theme-settings'
    );

    add_settings_section(
        'stylish_theme_settings_contacts',
        'Contact Information',
        'stylish_theme_settings_contacts_callback',
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

    for ($i = 1; $i <= 5; $i++) {
        add_settings_field(
            'stylish_setting_contact_field_' . $i,
            'Contact ' . $i,
            'stylish_setting_contact_field_' . $i . '_callback',
            'stylish-theme-settings',
            'stylish_theme_settings_contacts'
        );
    }
}


function stylish_theme_settings_information_callback()
{
    echo '<p>Enter your settings below:</p>';
}

function stylish_theme_settings_contacts_callback()
{
    echo '<p>Enter your contact information below:</p>';
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


function stylish_setting_contact_field_1_callback()
{
    $option = get_option('stylish_setting_contact_field_1');

?>
    <input type="text" name="stylish_setting_contact_field_1[number]" value="<?php echo isset($option['number']) ? esc_attr($option['number']) : ''; ?>" placeholder="Enter number" />
    <input type="text" name="stylish_setting_contact_field_1[label]" value="<?php echo isset($option['label']) ? esc_attr($option['label']) : ''; ?>" placeholder="Enter label" />
<?php
}
function stylish_setting_contact_field_2_callback()
{
    $option = get_option('stylish_setting_contact_field_2');

?>
    <input type="text" name="stylish_setting_contact_field_2[number]" value="<?php echo isset($option['number']) ? esc_attr($option['number']) : ''; ?>" placeholder="Enter number" />
    <input type="text" name="stylish_setting_contact_field_2[label]" value="<?php echo isset($option['label']) ? esc_attr($option['label']) : ''; ?>" placeholder="Enter label" />
<?php
}
function stylish_setting_contact_field_3_callback()
{
    $option = get_option('stylish_setting_contact_field_3');

?>
    <input type="text" name="stylish_setting_contact_field_3[number]" value="<?php echo isset($option['number']) ? esc_attr($option['number']) : ''; ?>" placeholder="Enter number" />
    <input type="text" name="stylish_setting_contact_field_3[label]" value="<?php echo isset($option['label']) ? esc_attr($option['label']) : ''; ?>" placeholder="Enter label" />
<?php
}
function stylish_setting_contact_field_4_callback()
{
    $option = get_option('stylish_setting_contact_field_4');

?>
    <input type="text" name="stylish_setting_contact_field_4[number]" value="<?php echo isset($option['number']) ? esc_attr($option['number']) : ''; ?>" placeholder="Enter number" />
    <input type="text" name="stylish_setting_contact_field_4[label]" value="<?php echo isset($option['label']) ? esc_attr($option['label']) : ''; ?>" placeholder="Enter label" />
<?php
}
function stylish_setting_contact_field_5_callback()
{
    $option = get_option('stylish_setting_contact_field_5');

?>
    <input type="text" name="stylish_setting_contact_field_5[number]" value="<?php echo isset($option['number']) ? esc_attr($option['number']) : ''; ?>" placeholder="Enter number" />
    <input type="text" name="stylish_setting_contact_field_5[label]" value="<?php echo isset($option['label']) ? esc_attr($option['label']) : ''; ?>" placeholder="Enter label" />
<?php
}
