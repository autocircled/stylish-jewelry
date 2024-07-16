<?php

/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.1.0
 *
 * @var WC_Order $order
 */

defined('ABSPATH') || exit;
?>

<div class="woocommerce-order">

    <?php
    if ($order) :

        do_action('woocommerce_before_thankyou', $order->get_id());
    ?>

        <?php if ($order->has_status('failed')) : ?>

            <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e('Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce'); ?></p>

            <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
                <a href="<?php echo esc_url($order->get_checkout_payment_url()); ?>" class="button pay"><?php esc_html_e('Pay', 'woocommerce'); ?></a>
                <?php if (is_user_logged_in()) : ?>
                    <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="button pay"><?php esc_html_e('My account', 'woocommerce'); ?></a>
                <?php endif; ?>
            </p>

        <?php else : ?>

            <?php wc_get_template('checkout/order-received.php', array('order' => $order)); ?>

            <div class="row w-100">
                <div class="col mb-3 flex-grow-1">
                    <div class="label text-center">
                        <?php esc_html_e('Invoice No.', 'woocommerce'); ?>
                    </div>
                    <div class="content text-center">
                        <strong><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
                                ?></strong>
                    </div>
                </div>
                <div class="col mb-3 flex-grow-1">
                    <div class="label text-center">
                        <?php esc_html_e('Date', 'woocommerce'); ?>
                    </div>
                    <div class="content text-center">
                        <strong><?php echo wc_format_datetime($order->get_date_created()); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
                                ?></strong>
                    </div>
                </div>
                <div class="col mb-3 flex-grow-1">
                    <div class="label text-center">
                        <?php esc_html_e('Mobile', 'woocommerce'); ?>
                    </div>
                    <div class="content text-center">
                        <strong><?php echo $order->get_billing_phone(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
                                ?></strong>
                    </div>
                </div>
                <?php if (is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email()) : ?>
                    <div class="col mb-3 flex-grow-1">
                        <div class="label text-center">
                            <?php esc_html_e('Email', 'woocommerce'); ?>
                        </div>
                        <div class="content text-center">
                            <strong><?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
                                    ?></strong>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($order->get_payment_method_title()) : ?>
                    <div class="col mb-3 flex-grow-1">
                        <div class="label text-center">
                            <?php esc_html_e('Payment method', 'woocommerce'); ?>
                        </div>
                        <div class="content text-center">
                            <strong><?php echo wp_kses_post($order->get_payment_method_title()); ?></strong>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="col mb-3 flex-grow-1">
                    <div class="label text-center">
                        <?php esc_html_e('Total Amount', 'woocommerce'); ?>
                    </div>
                    <div class="content text-center">
                        <strong><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
                                ?></strong>
                    </div>
                </div>
            </div>


        <?php endif; ?>

        <?php //do_action('woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id());
        ?>
        <?php do_action('woocommerce_thankyou', $order->get_id());
        ?>

    <?php else : ?>

        <?php wc_get_template('checkout/order-received.php', array('order' => false)); ?>

    <?php endif; ?>

</div>