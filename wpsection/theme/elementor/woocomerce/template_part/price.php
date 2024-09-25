<?php
global $product;

if ('price_style_1' === $settings['price_style_show']) :
    if (isset($settings['show_product_price']) && $settings['show_product_price']) :
        if (!get_post_meta(get_the_ID(), 'meta_show_price', true)) : ?>
            <div class="wps_order order-<?php echo esc_attr($settings['position_order_three']); ?>">
                <div class="mr_shop_price price wps_porduct_price">
                    <?php echo wp_kses_post($price_html); ?>
                </div>
            </div>
        <?php endif;
    endif;
endif;

if ('price_style_2' === $settings['price_style_show']) :
    if (isset($settings['show_product_price']) && $settings['show_product_price']) :
        if (!get_post_meta(get_the_ID(), 'meta_show_price', true)) : ?>
            <div class="wps_order order-<?php echo esc_attr($settings['position_order_three']); ?>">
                <div class="wps_price mr_shop_price price wps_porduct_price">
                    <?php
                    // Display variation options
                    if ($product->is_type('variable')) {
                        // Output variation form
                        woocommerce_template_single_add_to_cart();
                    } else {
                        // For non-variable products, just display the price
                        woocommerce_template_single_price();
                    }
                    ?>
                </div>
            </div>
        <?php endif;
    endif;
endif;
?>
