<?php
global $product;

if ('price_style_1' === $settings['price_style_show']) :
    if (isset($settings['show_product_price']) && $settings['show_product_price']) :
        if (!get_post_meta(get_the_ID(), 'meta_show_price', true)) : ?>
            <div class="wps_order order-<?php echo esc_attr($settings['position_order_three']); ?>">
                <div class=" price mr_shop_price  wps_basic_pricing">
                    <?php echo wp_kses_post($price_html); ?>
					
<?php 
    if ($product->is_on_sale()) {
        $prices = mr_get_product_prices($product);
        $returned = mr_product_special_price_calc($prices);
 ?>
                    <div class="wps_price_tag" >  
                        <?php
		 				// Translators: %d is the discount percentage.
                        echo esc_html(sprintf(__('- %d%%', 'wpsection'), $returned['percent']));
                        ?> 
                    </div>
<?php }  ?>					
					
                </div>
            </div>
        <?php endif;
    endif;
endif; ?>

<?php if ('price_style_2' === $settings['price_style_show']) : ?>
	
<?php  if (isset($settings['show_product_price']) && $settings['show_product_price']) { ?>

 <?php  if (!get_post_meta(get_the_ID(), 'meta_show_price', true)) { ?>

    <div class="wps_order order-<?php echo esc_attr($settings['position_order_three']); ?>">
                <div class="wps_price  price mr_shop_price wps_porduct_price wps_advance_pricing">



        
                    <?php
             
                    if ($product->is_type('variable')) {
                    
                        woocommerce_template_single_add_to_cart();
                    } else {
        
                        woocommerce_template_single_price();
                    }
                    ?>					
      

<?php 
	
    if ($product->is_on_sale()) :
        $prices = mr_get_product_prices($product);
        $returned = mr_product_special_price_calc($prices);
 ?>
               
                    <div class="wps_price_tag" >  
                        <?php
						// Translators: %d is the discount percentage.
                        echo esc_html(sprintf(__('- %d%%', 'wpsection'), $returned['percent']));
                        ?> 
                    </div>
<?php  endif ; ?>	
 

          </div>	
</div>	

        <?php } } endif ; ?>


