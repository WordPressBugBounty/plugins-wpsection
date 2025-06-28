<?php
/*
wps_product_tab Style-1 using Swiper.js
*/
$templatePartDir = esc_attr(__DIR__ . '/../template_part/');
$unique_id_tab_one = 'wps_tab_one_' . uniqid();
$allowed_tags = wp_kses_allowed_html('post');
?>
<script>
jQuery(document).ready(function($) {
    function initSwiper(container) {
        container.find(".swiper-container").each(function() {
            var swiperEl = this;

            if (!swiperEl.swiper) {
                const autoplay = swiperEl.dataset.autoplay === 'true';
                const hideArrows = swiperEl.dataset.hideArrows === 'true';
                const hideDots = swiperEl.dataset.hideDots === 'true';

                const nextBtn = swiperEl.querySelector(".swiper-button-next");
                const prevBtn = swiperEl.querySelector(".swiper-button-prev");

                if (hideArrows) {
                    if (nextBtn) nextBtn.style.display = 'none';
                    if (prevBtn) prevBtn.style.display = 'none';
                }

                new Swiper(swiperEl, {
                    loop: true,
               
autoplay: {
    delay: 3000,
    disableOnInteraction: false,
},
					
					
                    spaceBetween: 10,
                    slidesPerView: 1,

                
					
   breakpoints: {
        320: {
            slidesPerView: <?php echo (int) $settings['block_column_mobile']; ?>,
            autoplay: swiperEl.dataset.autoplayMobile === 'true' ? { delay: 3000 } : false,
        },
        576: {
            slidesPerView: <?php echo (int) $settings['block_column_mobile']; ?>,
            autoplay: swiperEl.dataset.autoplayMobile === 'true' ? { delay: 3000 } : false,
        },
        768: {
            slidesPerView: <?php echo (int) $settings['block_column_tab']; ?>,
            autoplay: swiperEl.dataset.autoplayTab === 'true' ? { delay: 3000 } : false,
        },
        992: {
            slidesPerView: <?php echo (int) $settings['block_column']; ?>,
            autoplay: swiperEl.dataset.autoplayDesktop === 'true' ? { delay: 3000 } : false,
        },
        1200: {
            slidesPerView: <?php echo (int) $settings['block_column']; ?>,
            autoplay: swiperEl.dataset.autoplayDesktop === 'true' ? { delay: 3000 } : false,
        }
    },
						   
						   


                    pagination: !hideDots ? {
                        el: swiperEl.querySelector(".swiper-pagination"),
                        clickable: true,
                    } : false,

                    navigation: !hideArrows ? {
                        nextEl: nextBtn,
                        prevEl: prevBtn,
                    } : false,
                });
            }
        });
    }

    var tabContainerClass = '.<?php echo esc_js($unique_id_tab_one); ?>';
    initSwiper($(tabContainerClass + " .tab-pane.active"));

    $(tabContainerClass + " .nav-link").on("click", function(e) {
        e.preventDefault();
        var targetPaneId = $(this).attr("href");
        $(tabContainerClass + " .product-block-spining").addClass("loading");

        setTimeout(function() {
            $(tabContainerClass + " .product-block-spining").removeClass("loading");
            initSwiper($(targetPaneId));
        }, 300);
    });
});
</script>


<?php 


 if ($settings['block_column'] == '10') {
                            $columns_markup = ' mr_column_10 ';
                        } elseif ($settings['block_column'] == '9') {
                            $columns_markup = ' mr_column_9 ';
                        } elseif ($settings['block_column'] == '8') {
                            $columns_markup = ' mr_column_8 ';
                        } elseif ($settings['block_column'] == '7') {
                            $columns_markup = ' mr_column_7 ';
                        } elseif ($settings['block_column'] == '6') {
                            $columns_markup = 'col-lg-2 ';
                        } elseif ($settings['block_column'] == '5') {
                            $columns_markup = ' mr_column_5 ';
                        } elseif ($settings['block_column'] == '4') {
                            $columns_markup = 'col-lg-3 ';
                        } elseif ($settings['block_column'] == '3') {
                            $columns_markup = 'col-lg-4 ';
                        } elseif ($settings['block_column'] == '2') {
                            $columns_markup = 'col-lg-6 ';
                        } elseif ($settings['block_column'] == '1') {
                            $columns_markup = 'col-lg-12 ';
                        }
						
   
         if ($settings['block_column_tab'] == '6') {
                        $columns_markup_tab = ' col-md-2';
                    }

         elseif ($settings['block_column_tab'] == '4') {
                        $columns_markup_tab = ' col-md-3 ';
                    }   
        elseif ($settings['block_column_tab'] == '3') {
                        $columns_markup_tab = ' col-md-4';
                    }
         elseif ($settings['block_column_tab'] == '2') {
                        $columns_markup_tab = ' col-md-6';
                    } 
         elseif ($settings['block_column_tab'] == '1') {
                        $columns_markup_tab = ' col-md-12';
                    }
						
												
//mobile column
       if ($settings['block_column_mobile'] == '6') {
                        $columns_markup_mobile = ' col-2';
                    }

         elseif ($settings['block_column_mobile'] == '4') {
                        $columns_markup_mobile = ' col-3 ';
                    }   
        elseif ($settings['block_column_mobile'] == '3') {
                        $columns_markup_mobile = ' col-4';
                    }
         elseif ($settings['block_column_mobile'] == '2') {
                        $columns_markup_mobile = ' col-6';
                    } 
         elseif ($settings['block_column_mobile'] == '1') {
                        $columns_markup_mobile = ' col-12';
                    }
						
												
	$new_markup = $columns_markup . ' ' . $columns_markup_tab . ' ' . $columns_markup_mobile ;		
?>


<section class="wps_tab_slide wps_product_tab_width mr_shop mr_products_one produt_section wps_tab_one <?php echo esc_attr( $unique_id_tab_one ); ?>">

      <?php if (!empty($settings['wps_tab_section_title'])) : ?>
                <div class="col-md-12 wps_tab_section_title">
                    <h2 class="wps_tab_title text-start m-0">
               <?php echo wp_kses($settings['wps_tab_section_title'], $allowed_tags); ?>

					
                    </h2>
                </div>
            <?php endif; ?>     
	
	
	<div class="row">
			
            <?php
            if ('2' === $settings['tab_left_right']) {
                $colClass = 'col-md-12';
            } else {
                $colClass = ' col-md-' . esc_attr($settings['grid_width_x_tab']);
                $styleAttribute = 'style="order:' . esc_attr($settings['tab_left_right']) . '"';
            }
            ?>
			


<?php if ( empty( $settings['hide_tab_title_area'] ) ) : ?>			
   <div class="<?php echo esc_attr( $colClass ); ?>" <?php echo isset( $styleAttribute ) ? wp_kses_post( $styleAttribute ) : ''; ?>>

	
                <!-- Your content goes here -->
                <div class="wps_tab_container">
                    <ul class="nav nav-tabs tab-title wps_tab_ul" role="tablist">
                    
						
<?php
$i = 1;
foreach ($settings['repeat'] as $tab) {
    $this->tabid[$tab['_id']] = $tab['_id'] . wp_rand(1000, 9999);
    $active_btn = ($i == 1) ? 'active' : '';

?>				
                          
						
  <li class="wps_tab_button nav-item">
            <a class="nav-link <?php echo esc_attr($active_btn); ?>" href="#tab-<?php echo esc_attr($this->tabid[$tab['_id']]); ?>" role="tab" data-bs-toggle="tab"><?php echo esc_html($tab['tab_title']); ?></a>
        </li>						
						
                        <?php $i++;
                        } ?>
                    </ul>
                </div>
            </div>
			
<?php endif; ?>			
			
			

            <?php
            if ('2' === $settings['tab_left_right']) {
                $colClassTwo = 'col-md-12';
            } else {
                $colClassTwo = 'col-md-12 col-lg-' . esc_attr(12 - $settings['grid_width_x_tab']);
            }
            ?>

				
	   <div class="<?php echo esc_attr( $colClassTwo ); ?> theme_overflow_hidden">			
                <div class="tab-content">
                    <?php
                    $i = 1;
                    foreach ($settings['repeat'] as $tab) {
                        $product_grid_type = $tab['product_grid_type'];
                        $product_per_page  = $tab['product_per_page'];
                        $product_order     = $tab['product_order'];
                        $product_order_by  = $tab['product_order_by'];
                        $catagory_name     = $tab['catagory_name'];


                        $active_tab = '';
                        if ($i == 1) {
                            $active_tab = 'active';
                        }
                    ?>

<div role="tabpanel" class="tab-pane show <?php echo esc_attr( $active_tab ); ?> animated fadeIn" id="tab-<?php echo esc_attr( isset( $this->tabid[ $tab['_id'] ] ) ? $this->tabid[ $tab['_id'] ] : 'default' ); ?>">


                 <?php if ('slider' === $settings['product_display_mode']) : ?>
	

<div class="swiper-container"
    data-autoplay-mobile="<?php echo esc_attr($settings['slider_autoplay_mobile'] === 'yes' ? 'true' : 'false'); ?>"
    data-autoplay-tab="<?php echo esc_attr($settings['slider_autoplay_tab'] === 'yes' ? 'true' : 'false'); ?>"
    data-autoplay-desktop="<?php echo esc_attr($settings['slider_autoplay_desktop'] === 'yes' ? 'true' : 'false'); ?>"
	 
	  data-hide-arrows="<?php echo ($settings['hide_arrows'] === 'none') ? 'true' : 'false'; ?>"
     data-hide-dots="<?php echo ($settings['hide_dots'] === 'none') ? 'true' : 'false'; ?>"> 



	
	
							
                            <div class="swiper-wrapper">
                    <?php else : ?>
                        <div class="row">
                    <?php endif; ?>
								
								
								
								
								
                                <?php
                                $args = array();
                                if ($product_grid_type == 'sale_products') {
                                    $args = array(
                                        'post_type'      => 'product',
                                        'posts_per_page' => $product_per_page,
                                        'meta_query'     => array(
                                            'relation' => 'OR',
                                            array( // Simple products type
                                                'key'     => '_sale_price',
                                                'value'   => 0,
                                                'compare' => '>',
                                                'type'    => 'numeric',
                                            ),
                                            array( // Variable products type
                                                'key'     => '_min_variation_sale_price',
                                                'value'   => 0,
                                                'compare' => '>',
                                                'type'    => 'numeric',
                                            ),
                                        ),
                                    );
                                } elseif ($product_grid_type == 'best_selling_products') {
                                    $args = array(
                                        'post_type'      => 'product',
                                        'meta_key'       => 'total_sales',
                                        'orderby'        => 'meta_value_num',
                                        'posts_per_page' => $product_per_page,
                                    );
                                } elseif ($product_grid_type == 'recent_products') {
                                    $args = array(
                                        'post_type'      => 'product',
                                        'posts_per_page' => $product_per_page,
                                        'orderby'        => $product_order,
                                        'order'          => $product_order_by,
                                    );
                                } elseif ($product_grid_type == 'featured_products') {
                                    $args = array(
                                        'post_type'      => 'product',
                                        'posts_per_page' => $product_per_page,
                                        'tax_query'      => array(
                                            array(
                                                'taxonomy' => 'product_visibility',
                                                'field'    => 'name',
                                                'terms'    => 'featured',
                                            ),
                                        ),
                                    );
                                } elseif ($product_grid_type == 'top_rated_products') {
                                    $args = array(
                                        'posts_per_page' => $product_per_page,
                                        'no_found_rows'  => 1,
                                        'post_status'    => 'publish',
                                        'post_type'      => 'product',
                                        'meta_key'       => '_wc_average_rating',
                                        'orderby'        => $product_order_by,
                                        'order'          => $product_order,
                                        'meta_query'     => WC()->query->get_meta_query(),
                                        'tax_query'      => WC()->query->get_tax_query(),
                                    );
                                } elseif ($product_grid_type == 'product_category') {
                                    $args = array(
                                        'post_type'      => 'product',
                                        'posts_per_page' => $product_per_page,
                                        'product_cat'    => $catagory_name,
                                        'orderby'        => $product_order_by,
                                        'order'          => $product_order,
                                    );
                                }

                                $query = new \WP_Query($args);

                                if ($query->have_posts()) {
                                    $i     = 1;
                                    $count = 1;
                                    $flag  = 0;
                                ?>
                                    <!-- While Loop Area -->
                                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                                        <?php global $post, $product; ?>
                                        <!-- Product Column Start if WHILE LOOP -->
                          
											
				
				 <div class="<?php echo ('slider' === $settings['product_display_mode']) ? 'swiper-slide' : ''; ?> wps_product_column <?php echo esc_attr($new_markup); ?> masonry-item all">
								 
					 
					 
                                            <div class="mr_product_block product-block_hr_001">
                                                <!-- Global Settings -->
                                                <?php
                                                require $templatePartDir . 'hook.php';
                                                $i++;
                                                ?>
                                                <div <?php wc_product_class(); ?>>
                                                    <!-- Product Style Start -->
                                   <div class="mr_style_one wps_product_block_one product-block-spining">
		
<?php  if ( 'grid' === $settings['tab_thumbnail_view'] ) { ?>									   
<div class="row">                                   																		
<div class="col-md-6 col-lg-<?php echo esc_attr($settings['grid_width_x']); ?> 	 <?php echo ('1' === $settings['grid_order']) ? 'wps_grid_left' : ' '; ?>">	
<?php } ?> 	
									   
									   
									   
                                                        <!-- Thumbnail Area -->                        

<?php
if (isset($settings['show_product_x_thumbnail']) && $settings['show_product_x_thumbnail'] && !empty(get_the_post_thumbnail())) {

?>


                                                            <div class="wps_thumbnail_area wps_slide_thumb">
                                                                <?php
                                                                require $templatePartDir . 'hot_offer.php';
                                                                require $templatePartDir . 'special_offer.php';
                                                                require $templatePartDir . 'thumbnail.php';
                                                                ?>
                                                            </div><!-- Thumbnail area div -->
                                                            <?php require $templatePartDir . 'product_overlay.php'; ?>
                                                            
                                                        <?php } ?>
                                                        <!-- End Thumbnail Area -->
<?php  if ( 'grid' === $settings['tab_thumbnail_view'] ) { ?>		
</div>	
 <div class="col-md-6 col-lg-<?php echo esc_attr(12 - $settings['grid_width_x']); ?> wps_grid-<?php echo esc_attr($settings['grid_order']); ?>">
<?php } ?> 		 
	 
		
                                                        <!-- Product Bottom Area -->
														
<?php  if ( 'top' === $settings['wps_columns_expand'] ) { ?>
  <div class="wps_hide_two_block">
<?php } ?> 
	  
	
                                                        <div class="wps_product_details product_bottom mr_bottom wps_order_container">
                                                            <?php
                                                            // Include various template parts
                                                            require $templatePartDir . 'title.php';
                                                            require $templatePartDir . 'rating.php';
                                                            require $templatePartDir . 'price.php';
                                                            require $templatePartDir . 'progress.php';
                                                            require $templatePartDir . 'instock.php';
                                                            require $templatePartDir . 'offer_countdown.php';
															require $templatePartDir . 'offer_text.php';
                                                            require $templatePartDir . 'category.php';
                                                            require $templatePartDir . 'feature_addtocart.php';
                                                            ?>
                                                        </div>
                                                        <!-- End Product Bottom Area -->
 <?php  if ( 'top' === $settings['wps_columns_expand'] ) { ?>
  </div>
<?php } ?>	
	 
<?php  if ( 'grid' === $settings['tab_thumbnail_view'] ) { ?>	
	</div>    
	</div><!-- End grid row -->
<?php } ?>										   
									   
                                                    <!-- End Product Style One -->
													
													 </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Product Column -->
                                    <?php endwhile; ?>

 
                                <?php } ?>
								
								
								
                    
                    <?php if ('slider' === $settings['product_display_mode']) : ?>
                            </div>
                            <div class="swiper-pagination"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    <?php else : ?>
                        </div> <!-- End row -->
                    <?php endif; ?>
	
	
	
	
                        </div>
                        <?php $i++;
                    } ?>
                </div>
		   
		 
            </div>
        </div>
   
</section>
