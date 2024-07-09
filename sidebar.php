<?php

/**
 * The sidebar containing the main widget area.
 *
 * @package storefront
 */

if (!is_active_sidebar('sidebar-1')) {
    return;
}
?>

<div id="secondary" class="la-widget-area col-md-3 order-1" role="complementary">
    <?php dynamic_sidebar('sidebar-1'); ?>
</div><!-- #secondary -->