<?php if ($stock_quantity) : ?>
    <?php
    $total_quantity = $sale_stock_quantity + $stock_quantity;
    $sale_percentage = round(($sale_stock_quantity / $total_quantity) * 100);

    // Levels
    $first_level  = $settings['level_one'] ?? 33;
    $second_level = $settings['level_two'] ?? 66;
    $third_level  = $settings['level_three'] ?? 100;

    // Progress bar class
    if ($sale_percentage < $first_level) {
        $bar_class = 'border-green';
    } elseif ($sale_percentage >= $first_level && $sale_percentage < $second_level) {
        $bar_class = 'border-yellow';
    } else {
        $bar_class = 'border-red';
    }

    // User selection
    $product_text_type      = $settings['product_progress_percentage'] ?? 'progress_text';
    $selected_digit_option  = $settings['product_percentage_digit'] ?? 'digit_all';

    // Calculate remaining percentage
    $percentage_value = 100 - $sale_percentage;

    // Format based on selection
    if ($selected_digit_option === 'digit_two') {
        $formatted_percentage = number_format($percentage_value, 2);
    } else {
        $formatted_percentage = round($percentage_value);
    }
    ?>
<?php if (isset($settings['show_product_progress']) && $settings['show_product_progress']) : ?>
    <?php if (!get_post_meta(get_the_ID(), 'meta_show_progress', true)) : ?>
        <div class="wps_order order-<?php echo esc_attr($settings['position_order_four']); ?>">
            <div class="mr_product_progress">
                <div class="product-single-item-bar">
                    <span class="<?php echo esc_attr($bar_class); ?>" style="width: <?php echo esc_attr($sale_percentage); ?>%; max-width: 100%!important;"></span>
                </div>

                <div class="product-single-item-sold">
                    <p>
                        <?php echo esc_html($settings['sold_text']); ?>
                        <span>
                            <?php if ($product_text_type === 'progress_percentage') : ?>
                                <?php echo esc_attr($formatted_percentage); ?><span class="wps_progress_percentage">%</span>
                            <?php else : ?>
                                <?php    echo ' (' . esc_html($stock_quantity) . ')';  ?>
                            <?php endif; ?>
                        </span>
                    </p>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>
<?php endif; ?>
