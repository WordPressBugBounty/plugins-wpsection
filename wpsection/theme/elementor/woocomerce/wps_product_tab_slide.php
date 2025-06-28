<?php

use Elementor\Controls_Manager;
use Elementor\Controls_Stack;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;
use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Utils;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Plugin;


if (class_exists('woocommerce')) {
    
class wpsection_wps_product_tab_slide_Widget extends \Elementor\Widget_Base {
   
public function get_name() {
        return 'wpsection_wps_product_tab_slide';
    }

    public function get_title() {
        return __( ' Product Tab Slide ', 'wpsection' );
    }

    public function get_icon() {

         return 'eicon-tabs';
    }

    public function get_keywords() {
        return [ 'wpsection', 'wps_product_tab_slide' ];
    }


    public function get_categories() {
         return [  'wpsection_shop' ];
    }

public $tabid = array();
    
    private function get_all_categories() {
        $options  = array();
        $taxonomy = 'product_cat';
        if ( ! empty( $taxonomy ) ) {
            $terms = get_terms(
                array(
                    'taxonomy'   => $taxonomy,
                    'hide_empty' => false,
                    'parent'     => 0,
                )
            );
         if (!empty($terms)) {
    foreach ($terms as $term) {
        if (isset($term->slug) && isset($term->name)) {
            $options[$term->slug] = $term->name;

            $child_terms = get_terms(array(
                'taxonomy'   => $taxonomy,
                'hide_empty' => false,
                'parent'     => $term->term_id,
            ));

            foreach ($child_terms as $child_term) {
                $options[$child_term->slug] = '--' . $child_term->name;
            }
        }
    }
}

        }
        return $options;
    }   
    protected function _register_controls() {
          
    
$this->start_controls_section(
                    'product_tab_settings',
                    [
                        'label' => __( ' Genaral Settings ', 'wpsection' ),
                        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    ]
                ); 
		
   $this->add_control(
            'style',
            [
                'label'       => __( 'Template Layout', 'wpsection' ),
                'type'        => 'elementor-layout-control',
                'default' => 'style-1',
                'options' => [
                    'style-1' => [
                        'label' => esc_html__('Layout 1', 'wpsection' ),
                        'image' => get_template_directory_uri() . '/assets/images/layout/shop/s1.png'
                    ],
                
                
                ],
            ]
        );		


$this->add_control(
    'wps_tab_section_title',
    array(
        'label'       => __( 'Section Title', 'wpsection' ),
        'type'        => \Elementor\Controls_Manager::TEXTAREA,
        'dynamic'     => array(
            'active' => true,
        ),
        'placeholder' => __( 'Enter section title', 'wpsection' ),
        'default'     => __( 'Get All Category', 'wpsection' ),
        'label_block' => true,
    )
);

		

$this->add_control(
    'hide_tab_title_area',
    [
        'label' => __( 'Hide Tab Title Area', 'wpsection' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'default' => '',
    ]
);
        
$this->add_control(
    'tab_left_right',
    [
        'label' => __( 'Tab Title Position', 'wpsection' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => '2',
        'options' => [
            '0' => __( 'Left', 'wpsection' ),
            '1' => __( 'Right', 'wpsection' ),
            '2' => __( 'Top', 'wpsection' ),
        ],
        'condition' => [
            'hide_tab_title_area' => '',
        ],
    ]
);



      
   $this->add_control(
            'grid_width_x_tab',
            array(
                'label' => __( 'Tab Title Width', 'wpsection' ),
                'condition' => array(
            'tab_left_right' => array('0', '1')
        ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
					'0'  => __('0 Column', 'wpsection' ),
                    '1'  => __('1 Column', 'wpsection' ),
                    '2' => __( '2 Columns', 'wpsection' ),
                    '3' => __( '3 Columns', 'wpsection' ),
                    '4' => __( '4 Columns', 'wpsection' ),
                    '5' => __( '5 Columns', 'wpsection' ),
                    '6' => __( '6 Columns', 'wpsection' ),
                    '7' => __( '7 Columns', 'wpsection' ),
                    '8' => __( '8 Columns', 'wpsection' ),
                    '9' => __( '9 Columns', 'wpsection' ),
                    '10' => __( '10 Columns', 'wpsection' ),
                
                ],
            )
        );
        
$this->add_control(
    'tab_thumbnail_view',
    array(
        'label'   => __( 'Thumbnail View', 'wpsection' ),
        'type'    => \Elementor\Controls_Manager::SELECT,
        'default' => 'top',
        'options' => [
            'top' => __( 'Thumbnail on Top', 'wpsection' ),
            'grid' => __( 'Thumbnail Grid', 'wpsection' ),
        ],
    )
);
		
		




 $this->add_control(
            'grid_width_x',
            array(
                'label' => __( 'Thumbnail Grid Width', 'wpsection' ),
                 'condition' => array(
            'tab_thumbnail_view' => array('grid')
        ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '7',
                'options' => [
                    '1'  => __('1 Column', 'wpsection' ),
                    '2' => __( '2 Columns', 'wpsection' ),
                    '3' => __( '3 Columns', 'wpsection' ),
                    '4' => __( '4 Columns', 'wpsection' ),
                    '5' => __( '5 Columns', 'wpsection' ),
                    '6' => __( '6 Columns', 'wpsection' ),
                    '7' => __( '7 Columns', 'wpsection' ),
                    '8' => __( '8 Columns', 'wpsection' ),
                    '9' => __( '9 Columns', 'wpsection' ),
                    '10' => __( '10 Columns', 'wpsection' ),
                    '12' => __( '12 Columns', 'wpsection' ),
                ],
            )
        );
        
    
        $this->add_control(
            'grid_order',
            array(
                'label' => __( 'Thumbnail Order', 'wpsection' ),
                  'condition' => array(
            'tab_thumbnail_view' => array('grid')
        ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '2',
                'options' => [
                    '1'  => __('Right Side', 'wpsection' ),
                    '2' => __( 'Left Side', 'wpsection' ),
       
                ],
            )
        );  

      $this->add_control(
                'show_features_expand',
               array(
                    'label' => __( 'Hover Expand', 'wpsection' ),
                    'type'     => \Elementor\Controls_Manager::SWITCHER,
                     'return_value' => '1',
                     'default'      => '1',
                    'placeholder' => __( 'Show Features Text Expand', 'wpsection' ),
                )
            );

  $this->add_control(
            'wps_columns_expand',
            array(
                'label' => __( 'Expand Settings', 'wpsection' ),
                 'condition'    => array( 'show_features_expand' => '1' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'top',
                'options' => [
                    'top'  => __( 'Expand on Top', 'wpsection' ),
                    'bottom' => __( 'Expand to Bottom', 'wpsection' ),
               
                ],
            )
        );


 
$this->add_control(
    'expand_top_height',
    [
        'label' => esc_html__( 'Expand Top Height ', 'wpsection' ),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'condition' => [
            'wps_columns_expand' => 'top',  // First condition
            'show_features_expand' => '1',   // Second condition
        ],
        'size_units' => [ 'px', '%' ],
        'range' => [
            'px' => [
                'min' => 0,
                'max' => 300,
                'step' => 1,
            ],
            '%' => [
                'min' => 0,
                'max' => 100,
            ],
        ],
        'default' => [
            'unit' => 'px',
            'size' => 80,
        ],
        'selectors' => [
            '{{WRAPPER}} .mr_shop .product-block_hr_001:hover .wps_hide_two_block .hider_area_2' => 'height: {{SIZE}}{{UNIT}};',
            '{{WRAPPER}} .mr_shop .product-block_hr_001:hover .wps_hide_two_block .wps_product_details.product_bottom.mr_bottom' => 'margin-top: -{{SIZE}}{{UNIT}};',
        ],
    ]
);
 


		

$this->add_control(
    'product_display_mode',
    [
        'label' => __( 'Display Mode', 'wpsection' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'grid',
        'options' => [
            'grid' => __( 'Grid (Rows)', 'wpsection' ),
            'slider' => __( 'Slider (Swiper)', 'wpsection' ),
        ],
    ]
);

		




$this->add_control(
    'slider_autoplay_desktop',
    [
        'label' => __( 'Autoplay on Desktop', 'wpsection' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'default' => '',
        'condition' => [
            'product_display_mode' => 'slider',
        ],
    ]
);
$this->add_control(
    'slider_autoplay_tab',
    [
        'label' => __( 'Autoplay on Tablet', 'wpsection' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'default' => '',
        'condition' => [
            'product_display_mode' => 'slider',
        ],
    ]
);
$this->add_control(
    'slider_autoplay_mobile',
    [
        'label' => __( 'Autoplay on Mobile', 'wpsection' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'default' => 'yes',
        'condition' => [
            'product_display_mode' => 'slider',
        ],
    ]
);

		
		

    $this->add_control(
            'hide_arrows',
            array(
                'label' => esc_html__( 'Show Arrow', 'wpsection' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
				 'condition' => [
            'product_display_mode' => 'slider',
        ],
                'options' => [
                    'show' => [
                        'show' => esc_html__( 'Show', 'wpsection' ), 
                        'icon' => 'eicon-check-circle',
                    ],
                    'none' => [
                        'none' => esc_html__( 'Hide', 'wpsection' ),
                        'icon' => 'eicon-close-circle',
                    ],
                ],
                'default' => 'show',
                'selectors' => array(
                    '{{WRAPPER}} .wps_tab_slide .swiper-button-prev ,{{WRAPPER}} .wps_tab_slide .swiper-button-next' => 'display: {{VALUE}} !important',
                ),
            )
        );  			
		
   $this->add_control(
            'hide_dots',
            array(
                'label' => esc_html__( 'Show Dot', 'wpsection' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
				 'condition' => [
            'product_display_mode' => 'slider',
        ],
                'options' => [
                    'show' => [
                        'show' => esc_html__( 'Show', 'wpsection' ), 
                        'icon' => 'eicon-check-circle',
                    ],
                    'none' => [
                        'none' => esc_html__( 'Hide', 'wpsection' ),
                        'icon' => 'eicon-close-circle',
                    ],
                ],
                'default' => 'show',
                'selectors' => array(
                    '{{WRAPPER}} .wps_tab_slide .swiper-pagination' => 'display: {{VALUE}} !important',
                ),
            )
        );  			
					
		

		

// Product Column 
		
 $this->add_control(
    'block_column',
    [
        'label'   => esc_html__( 'Column Desktop', 'wpsection' ),
        'type'    => \Elementor\Controls_Manager::SELECT,
        'default' => '3',
        'options' => [
            '1'  => __( '1 Column', 'wpsection' ),
            '2'  => __( '2 Columns', 'wpsection' ),
            '3'  => __( '3 Columns', 'wpsection' ),
            '4'  => __( '4 Columns', 'wpsection' ),
            '5'  => __( '5 Columns', 'wpsection' ),
            '6'  => __( '6 Columns', 'wpsection' ),
            '7'  => __( '7 Columns', 'wpsection' ),
            '8'  => __( '8 Columns', 'wpsection' ),
            '9'  => __( '9 Columns', 'wpsection' ),
            '10' => __( '10 Columns', 'wpsection' ),
        ],
    ]
);
		
 $this->add_control(
    'block_column_tab',
    [
        'label'   => esc_html__( 'Column Tab', 'wpsection' ),
        'type'    => \Elementor\Controls_Manager::SELECT,
        'default' => '3',
        'options' => [
            '1'  => __( '1 Column', 'wpsection' ),
            '2'  => __( '2 Columns', 'wpsection' ),
            '3'  => __( '3 Columns', 'wpsection' ),
            '4'  => __( '4 Columns', 'wpsection' ),
            '6'  => __( '6 Columns', 'wpsection' ),
        ],
    ]
);		

 $this->add_control(
    'block_column_mobile',
    [
        'label'   => esc_html__( 'Column Mobile', 'wpsection' ),
        'type'    => \Elementor\Controls_Manager::SELECT,
        'default' => '2',
        'options' => [
            '1'  => __( '1 Column', 'wpsection' ),
            '2'  => __( '2 Columns', 'wpsection' ),
            '3'  => __( '3 Columns', 'wpsection' ),
            '4'  => __( '4 Columns', 'wpsection' ),
            '6'  => __( '6 Columns', 'wpsection' ),
        ],
    ]
);		

		
				
	


		
		
		
//Product Full Area 		
 $this->add_control(
            'container_width',
            [
                'label' => esc_html__( 'Section Width ', 'wpsection' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 3000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 1320,
                ],
                'selectors' => [
                    '{{WRAPPER}} .wps_product_tab_width' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );          


$repeater = new Repeater();

$repeater->add_control(
    'tab_title',
    [
        'label'   => esc_html__('Tab Title', 'wpsection'),
        'type'    => \Elementor\Controls_Manager::TEXTAREA,
        'default' => esc_html__('Title', 'wpsection')
    ]
);


		
$repeater->add_control(
    'product_grid_type',
    [
        'label'   => esc_html__( 'Product Type', 'wpsection' ),
        'type'    => \Elementor\Controls_Manager::SELECT,
        'default' => 'recent_products',
        'options' => [
            'featured_products'     => esc_html__( 'Featured Products', 'wpsection' ),
            'sale_products'         => esc_html__( 'Sale Products', 'wpsection' ),
            'best_selling_products' => esc_html__( 'Best Selling Products', 'wpsection' ),
            'recent_products'       => esc_html__( 'Recent Products', 'wpsection' ),
            'top_rated_products'    => esc_html__( 'Top Rated Products', 'wpsection' ),
            'product_category'      => esc_html__( 'Product Category', 'wpsection' ),
        ],
    ]
);

$repeater->add_control(
    'catagory_name',
    [
        'label'     => esc_html__( 'Category', 'wpsection' ),
        'type'      => \Elementor\Controls_Manager::SELECT,
        'options'   => $this->get_all_categories(),
        'condition' => [
            'product_grid_type' => 'product_category',
        ],
    ]
);

$repeater->add_control(
    'product_per_page',
    [
        'label'   => esc_html__( 'Number of Products', 'wpsection' ),
        'type'    => \Elementor\Controls_Manager::NUMBER,
        'default' => 8,
    ]
);

$repeater->add_control(
    'product_order_by',
    [
        'label'   => esc_html__( 'Order By', 'wpsection' ),
        'type'    => \Elementor\Controls_Manager::SELECT,
        'default' => 'date',
        'options' => [
            'date'          => esc_html__( 'Date', 'wpsection' ),
            'ID'            => esc_html__( 'ID', 'wpsection' ),
            'author'        => esc_html__( 'Author', 'wpsection' ),
            'title'         => esc_html__( 'Title', 'wpsection' ),
            'modified'      => esc_html__( 'Modified', 'wpsection' ),
            'rand'          => esc_html__( 'Random', 'wpsection' ),
            'comment_count' => esc_html__( 'Comment count', 'wpsection' ),
            'menu_order'    => esc_html__( 'Menu order', 'wpsection' ),
        ],
    ]
);

$repeater->add_control(
    'product_order',
    [
        'label'   => esc_html__( 'Product Order', 'wpsection' ),
        'type'    => \Elementor\Controls_Manager::SELECT,
        'default' => 'desc',
        'options' => [
            'desc' => esc_html__( 'DESC', 'wpsection' ),
            'asc'  => esc_html__( 'ASC', 'wpsection' ),
        ],
    ]
);

$this->add_control(
    'repeat',
    [
        'label'       => esc_html__( 'Tab Repeat', 'wpsection' ),
        'show_label'  => false,
        'type'        => \Elementor\Controls_Manager::REPEATER,
        'separator'   => 'before',
        'title_field' => '{{ title }}',
        'dynamic'     => [
            'active' => true,
        ],
        'default'     => [
            [
                'title' => esc_html__( 'Set Tab', 'wpsection' ),
            ],
        ],
        'fields'      => $repeater->get_controls(),
    ]
);


$this->end_controls_section();    
        
        




        
require 'extended_array/common_settings.php'; 

//require 'extended_array/slider_control.php';    

//=======================End of Meta Settings  ======================

require 'extended_array/tab_control.php';
        
//Tab Button Settings End  
require 'extended_array/common_style.php';

//=============================End of Area DO NOT Edit BEllow Codes============          
               
    }


    protected function render() {
    
        global $product;
        $settings = $this->get_settings_for_display();
        $allowed_tags = wp_kses_allowed_html('post');        
   

            $style_folder = __DIR__ . '/wps_product_tab_slide/style-1.php';
            if (is_readable($style_folder)) {
                require $style_folder;
            } else {
                echo " Style file  not found or could not be read.";
            }

        wp_reset_postdata();

        } 


}

       
Plugin::instance()->widgets_manager->register( new \wpsection_wps_product_tab_slide_Widget() );

}