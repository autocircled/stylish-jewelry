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
    for ($i = 1; $i <= 5; $i++) {
        register_setting('stylish_setting_fields', 'stylish_setting_info_field_' . $i);
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
    for ($i = 1; $i <= 5; $i++) {
        add_settings_field(
            'stylish_setting_info_field_' . $i,
            'Info ' . $i,
            'stylish_setting_info_field_' . $i . '_callback',
            'stylish-theme-settings',
            'stylish_theme_settings_information'
        );
    }

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

function stylish_setting_info_field_1_callback()
{
    $option = get_option('stylish_setting_info_field_1');

?>
    <input type="text" name="stylish_setting_info_field_1[icon]" value="<?php echo isset($option['icon']) ? esc_attr($option['icon']) : ''; ?>" placeholder="Enter icon" />
    <input type="text" name="stylish_setting_info_field_1[text]" value="<?php echo isset($option['text']) ? esc_attr($option['text']) : ''; ?>" placeholder="Enter text" />
<?php
}
function stylish_setting_info_field_2_callback()
{
    $option = get_option('stylish_setting_info_field_2');

?>
    <input type="text" name="stylish_setting_info_field_2[icon]" value="<?php echo isset($option['icon']) ? esc_attr($option['icon']) : ''; ?>" placeholder="Enter icon" />
    <input type="text" name="stylish_setting_info_field_2[text]" value="<?php echo isset($option['text']) ? esc_attr($option['text']) : ''; ?>" placeholder="Enter text" />
<?php
}
function stylish_setting_info_field_3_callback()
{
    $option = get_option('stylish_setting_info_field_3');

?>
    <input type="text" name="stylish_setting_info_field_3[icon]" value="<?php echo isset($option['icon']) ? esc_attr($option['icon']) : ''; ?>" placeholder="Enter icon" />
    <input type="text" name="stylish_setting_info_field_3[text]" value="<?php echo isset($option['text']) ? esc_attr($option['text']) : ''; ?>" placeholder="Enter text" />
<?php
}
function stylish_setting_info_field_4_callback()
{
    $option = get_option('stylish_setting_info_field_4');

?>
    <input type="text" name="stylish_setting_info_field_4[icon]" value="<?php echo isset($option['icon']) ? esc_attr($option['icon']) : ''; ?>" placeholder="Enter icon" />
    <input type="text" name="stylish_setting_info_field_4[text]" value="<?php echo isset($option['text']) ? esc_attr($option['text']) : ''; ?>" placeholder="Enter text" />
<?php
}
function stylish_setting_info_field_5_callback()
{
    $option = get_option('stylish_setting_info_field_5');

?>
    <input type="text" name="stylish_setting_info_field_5[icon]" value="<?php echo isset($option['icon']) ? esc_attr($option['icon']) : ''; ?>" placeholder="Enter icon" />
    <input type="text" name="stylish_setting_info_field_5[text]" value="<?php echo isset($option['text']) ? esc_attr($option['text']) : ''; ?>" placeholder="Enter text" />
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
