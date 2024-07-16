jQuery(document).ready(function($) {
    $('form.woocommerce-checkout').on('change', 'input[name="custom_shipping_option"]', function() {
        var custom_shipping_option = $(this).val();
        console.log(custom_shipping_option);
        $.ajax({
            type: 'POST',
            url: custom_params.ajax_url,
            data: {
                action: 'save_custom_shipping_option',
                custom_shipping_option: custom_shipping_option
            },
            success: function() {
                $('body').trigger('update_checkout');
            }
        });
    });
});