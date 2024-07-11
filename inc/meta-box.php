<?php
// var_dump("hello");
add_filter('woocommerce_product_data_tabs', 'myplugin_add_custom_product_data_tab');
function myplugin_add_custom_product_data_tab($tabs)
{
    // var_dump($tabs);
    $tabs['myplugin_custom_tab'] = array(
        'label'    => __('Stylish Info', 'stylish-jewelry'),
        'target'   => 'stylish_info_custom_product_data',
        'class'    => array('show_if_simple', 'show_if_variable'),
        'priority' => 21,
    );
    return $tabs;
}

add_action('woocommerce_product_data_panels', 'stylish_info_custom_data_fields');
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





add_action('woocommerce_process_product_meta', 'stylish_save_infos_data');
function stylish_save_infos_data($post_id)
{
    // prettify($_POST);
    // die();
    $custom_field_value = isset($_POST['_stylish_info']) ? $_POST['_stylish_info'] : '';
    update_post_meta($post_id, '_stylish_info', $custom_field_value);
}
