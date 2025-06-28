<?php
if (isset($settings['show_instock']) && $settings['show_instock']) {
    if (!get_post_meta(get_the_ID(), 'meta_show_instock', true)) {
        ?>
        <div class="wps_order order-<?php echo esc_attr($settings['position_order_five']); ?>">
            <div class="wps_instock">
                <button class="wps_instock_text">
                    <?php
                    if ($stock_quantity > 0) {
                        // Product is in stock
                        ?>
                        <i class="<?php echo esc_attr(str_replace('icon ', '', $settings['instock_icon']['value'])); ?>"></i>
                        <?php
                        echo esc_html($settings['instock_text']);
                        if (!empty($settings['show_instock_number']) && $settings['show_instock_number'] === '1') {
                            echo ' (' . esc_html($stock_quantity) . ')';
                        }
                    } else {
                        // Product is out of stock
                        ?>
                        <span class="wps_out_stock_icon">
                            <i class="<?php echo esc_attr(str_replace('icon ', '', $settings['outstock_icon']['value'])); ?>"></i>
                            <?php echo esc_html($settings['instock_text_not']); ?>
                        </span>
                        <?php
                    }
                    ?>
                </button>
            </div>
        </div>
        <?php
    }
}
?>
