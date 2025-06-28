<?php
if (
    !empty($settings['show_product_x_rating']) &&
    !get_post_meta(get_the_ID(), 'meta_show_rating', true)
) :
    $rating_location = esc_attr($settings['product_avarage_rating_location'] ?? '');
    $review_count = get_comments_number(get_the_ID());
?>
    <div class="wps_order order-<?php echo esc_attr($settings['position_order_two']); ?>">
        <div class="mr_rating">
            <div class="mr_rating_number <?php echo esc_attr($rating_location); ?>">
                <?php echo function_exists('mr_product_rating') ? esc_html(mr_product_rating()) : ''; ?>
            </div>

            <?php if (!empty($settings['show_avarage_rating_x'])) : ?>
                <span class="mr_review_number <<?php echo esc_attr($rating_location); ?>">
                    <?php if ($review_count): ?>
                        <span class="review-count"><?php echo esc_html("($review_count)"); ?></span>
                    <?php endif; ?>
                   <?php if (!empty($settings['review_text_x'])): ?>
    <span class="review-text">
        <?php 
        $review_text = $settings['review_text_x'];
        if (isset($review_count) && is_numeric($review_count) && $review_count > 1) {
            $review_text .= 's'; // Add 's' for plural
        }
        echo esc_html($review_text);
        ?>
    </span>
<?php endif; ?>

					
					
					
                </span>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
