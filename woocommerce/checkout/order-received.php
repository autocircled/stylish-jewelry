<?php

/**
 * "Order received" message.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/order-received.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.8.0
 *
 * @var WC_Order|false $order
 */

defined('ABSPATH') || exit;
?>

<p class="congrats"><img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/congratulation.gif'; ?>" alt="Congratulation your order successfully received" width="600" height="400"></p>

<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received text-center mb-5">
    <?php
    /**
     * Filter the message shown after a checkout is complete.
     *
     * @since 2.2.0
     *
     * @param string         $message The message.
     * @param WC_Order|false $order   The order created during checkout, or false if order data is not available.
     */
    $message = apply_filters(
        'woocommerce_thankyou_order_received_text',
        esc_html(__('অভিনন্দন! আপনার অর্ডারটি কনফার্ম করা হয়েছে। কিছুক্ষনের মধ্যেই আমাদের একজন প্রতিনিধি আপনার সাথে যোগাযোগ করবে।', 'woocommerce')),
        $order
    );

    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    echo $message;
    ?>
</p>