<?php
// Add product custom data tabs
add_filter('woocommerce_product_data_tabs', 'stylish_add_custom_product_data_tab');

// Add product custom data
add_action('woocommerce_product_data_panels', 'stylish_how_to_buy_tab_fields');
add_action('woocommerce_product_data_panels', 'stylish_return_policy_tab_fields');
add_action('woocommerce_product_data_panels', 'stylish_info_custom_data_fields');

// Save product custom data
add_action('woocommerce_process_product_meta', 'stylish_save_infos_data');

function stylish_save_infos_data($post_id)
{

    $_stylish_info_value = isset($_POST['_stylish_info']) ? $_POST['_stylish_info'] : '';
    $_stylish_how_to_buy_value = isset($_POST['_stylish_how_to_buy']) ? $_POST['_stylish_how_to_buy'] : '';
    $_stylish_return_policy_value = isset($_POST['_stylish_return_policy']) ? $_POST['_stylish_return_policy'] : '';

    update_post_meta($post_id, '_stylish_info', $_stylish_info_value);
    update_post_meta($post_id, '_stylish_how_to_buy', $_stylish_how_to_buy_value);
    update_post_meta($post_id, '_stylish_return_policy', $_stylish_return_policy_value);
}
function stylish_add_custom_product_data_tab($tabs)
{
    $tabs['stylish_info_tab'] = array(
        'label'    => __('Stylish Info', 'stylish-jewelry'),
        'target'   => 'stylish_info_custom_product_data',
        'class'    => array('show_if_simple', 'show_if_variable'),
        'priority' => 21,
    );
    $tabs['stylish_how_to_buy_tab'] = array(
        'label'    => __('How To Buy', 'stylish-jewelry'),
        'target'   => 'stylish_how_to_buy_custom_product_data',
        'class'    => array('show_if_simple', 'show_if_variable'),
        'priority' => 22,
    );
    $tabs['stylish_return_policy_tab'] = array(
        'label'    => __('Return Policy', 'stylish-jewelry'),
        'target'   => 'stylish_return_policy_custom_product_data',
        'class'    => array('show_if_simple', 'show_if_variable'),
        'priority' => 23,
    );
    return $tabs;
}

function stylish_how_to_buy_tab_fields()
{
    global $post;
    $option = get_post_meta($post->ID, '_stylish_how_to_buy', true);
?>
    <div id="stylish_how_to_buy_custom_product_data" class="panel woocommerce_options_panel stylish_info_panel">

        <div class="options_group">
            <div class="container">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <h3>How To Buy</h3>
                        <?php
                        $content = isset($option) ? $option : '';
                        wp_editor($content, '_stylish_how_to_buy', array(
                            'textarea_name' => '_stylish_how_to_buy',
                            'media_buttons' => false,
                            'textarea_rows' => 10,
                            'teeny' => true,
                        ));
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php
}
function stylish_return_policy_tab_fields()
{
    global $post;
    $option = get_post_meta($post->ID, '_stylish_return_policy', true);
?>
    <div id="stylish_return_policy_custom_product_data" class="panel woocommerce_options_panel stylish_info_panel">

        <div class="options_group">
            <div class="container">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <h3>Return Policy</h3>
                        <?php
                        $content = isset($option) ? $option : '';
                        wp_editor($content, '_stylish_return_policy', array(
                            'textarea_name' => '_stylish_return_policy',
                            'media_buttons' => false,
                            'textarea_rows' => 10,
                            'teeny' => true,
                        ));
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php
}

function stylish_info_custom_data_fields()
{
    global $post;
    $option = get_post_meta($post->ID, '_stylish_info', true);
?>
    <div id="stylish_info_custom_product_data" class="panel woocommerce_options_panel stylish_info_panel">

        <div class="options_group">
            <div class="container">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <?php echo isset($option[0]) && isset($option[0]['icon']) ? $option[0]['icon'] : ''; ?>
                        <input type="text" name="_stylish_info[0][icon]" class="form-control" value="<?php echo isset($option[0]) && isset($option[0]['icon']) ? esc_attr($option[0]['icon']) : ''; ?>" placeholder="Enter icon" />
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="_stylish_info[0][text]" class="form-control" value="<?php echo isset($option[0]) && isset($option[0]['icon']) ? esc_attr($option[0]['text']) : ''; ?>" placeholder="Enter text" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <?php echo isset($option[1]) && isset($option[1]['icon']) ? $option[1]['icon'] : ''; ?>
                        <input type="text" name="_stylish_info[1][icon]" class="form-control" value="<?php echo isset($option[1]) && isset($option[1]['icon']) ? esc_attr($option[1]['icon']) : ''; ?>" placeholder="Enter icon" />
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="_stylish_info[1][text]" class="form-control" value="<?php echo isset($option[1]) && isset($option[1]['icon']) ? esc_attr($option[1]['text']) : ''; ?>" placeholder="Enter text" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <?php echo isset($option[2]) && isset($option[2]['icon']) ? $option[2]['icon'] : ''; ?>
                        <input type="text" name="_stylish_info[2][icon]" class="form-control" value="<?php echo isset($option[2]) && isset($option[2]['icon']) ? esc_attr($option[2]['icon']) : ''; ?>" placeholder="Enter icon" />
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="_stylish_info[2][text]" class="form-control" value="<?php echo isset($option[2]) && isset($option[2]['icon']) ? esc_attr($option[2]['text']) : ''; ?>" placeholder="Enter text" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <?php echo isset($option[3]) && isset($option[3]['icon']) ? $option[3]['icon'] : ''; ?>
                        <input type="text" name="_stylish_info[3][icon]" class="form-control" value="<?php echo isset($option[3]) && isset($option[3]['icon']) ? esc_attr($option[3]['icon']) : ''; ?>" placeholder="Enter icon" />
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="_stylish_info[3][text]" class="form-control" value="<?php echo isset($option[3]) && isset($option[3]['icon']) ? esc_attr($option[3]['text']) : ''; ?>" placeholder="Enter text" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <?php echo isset($option[4]) && isset($option[4]['icon']) ? $option[4]['icon'] : ''; ?>
                        <input type="text" name="_stylish_info[4][icon]" class="form-control" value="<?php echo isset($option[4]) && isset($option[4]['icon']) ? esc_attr($option[4]['icon']) : ''; ?>" placeholder="Enter icon" />
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="_stylish_info[4][text]" class="form-control" value="<?php echo isset($option[4]) && isset($option[4]['icon']) ? esc_attr($option[4]['text']) : ''; ?>" placeholder="Enter text" />
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php
}
