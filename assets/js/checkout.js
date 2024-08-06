jQuery(function($) {
    $('body').on('click', '.quantity__plus', function() {
        // console.log(this);
        var $qty = $(this).closest('.quantity').find('.qty');
        var currentVal = parseFloat($qty.val());
        var max = parseFloat($qty.attr('max'));
        if (currentVal < max || isNaN(max)) {
            $qty.val(currentVal + 1).change();
        }
    });

    $('body').on('click', '.quantity__minus', function() {
        // console.log(this);
        var $qty = $(this).closest('.quantity').find('.qty');
        var currentVal = parseFloat($qty.val());
        console.log(currentVal);
        if (currentVal > 1) {
            $qty.val(currentVal - 1).change();
        }
    });

    // Update the checkout summary when quantity changes
    // $('body').on('change', '.qty', function() {
    //     console.log(this);
    //     $('[name="update_cart"]').trigger('click');
    // });

    $('body').on('change', '.qty', function() {
        var $this = $(this);
        var cart_item_key = $this.closest('.woocommerce-cart-form__cart-item').data('cart_item_key');
        var quantity = $this.val();
        console.log(cart_item_key, quantity);
        var loading = '<div class="loading-overlay"><div class="blockUI" style="display:none"></div><div class="blockUI blockOverlay" style="z-index: 1000; border: none; margin: 0px; padding: 0px; width: 100%; height: 100%; top: 0px; left: 0px; background: rgb(255, 255, 255); opacity: 0.6; cursor: default; position: absolute;"></div><div class="blockUI blockMsg blockElement" style="z-index: 1011; display: none; position: absolute; left: 270px; top: 147px;"></div></div>';
        var orderRediewTable = $('.woocommerce-checkout-review-order-table');

        orderRediewTable.append(loading);
    
        $.ajax({
            url: StylishCheckout.ajaxurl,
            type: 'POST',
            data: {
                action: 'update_cart_quantity',
                cart_item_key: cart_item_key,
                quantity: quantity
            },
            success: function(response) {
                const loading = $('.loading-overlay');
                
                // Handle the updated cart response here
                if (response.fragments) {
                    $.each(response.fragments, function(key, value) {
                        var $fragment = $(key);
                        $fragment.fadeOut(300, function() {
                            $(this).replaceWith(value);
                            $(key).fadeIn(300); // Fade in animation
                        });
                    });
                }
                loading.remove();
            }
        });
    });
});
