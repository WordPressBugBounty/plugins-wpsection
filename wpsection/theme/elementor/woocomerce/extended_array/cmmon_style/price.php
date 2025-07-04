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



//price control============
// bosch  666
// ======================================= PRice Text =======================



    $this->start_controls_section(
            'price_settings',
            array(
                'label' => __( 'Price Setting', 'wpsection' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
          
            )
        );
        
      $this->add_control(
                'show_product_price',
               array(
                    'label' => __( 'Show Price Area', 'wpsection' ),
                    'type'     => \Elementor\Controls_Manager::SWITCHER,
                     'return_value' => '1',
                     'default'      => '1',
                    'placeholder' => __( 'Show Price', 'wpsection' ),
                )
            );

   $this->add_control(
            'position_order_three',
            array(
                'label' => __( 'Position Order Settings', 'wpsection' ),
                'type' => \Elementor\Controls_Manager::SELECT,
            
				 'condition' => [
            'show_product_price' => '1',
           
        ],
                'default' => '3',
                'options' => [
                    '1'  => __( '1st Position', 'wpsection' ),
                    '2' => __( '2nd Position', 'wpsection' ),
                    '3' => __( '3rd Position', 'wpsection' ),
                    '4' => __( '4th Position', 'wpsection' ),
                    '5' => __( '5th Position', 'wpsection' ),
                    '6' => __( '6th Position', 'wpsection' ),
                    '7' => __( '7th Position', 'wpsection' ),
                    '8' => __( '8th Position', 'wpsection' ),
                    '9' => __( '9th Position', 'wpsection' ),
                    '10' => __( '10th Position', 'wpsection' ),
                ],
            )
        );

$this->add_control(
    'show_product_price_tag',
    [
        'label' => esc_html__( 'Show Price Tag', 'wpsection' ),
		'condition' => [
            'show_product_price' => '1',
        
        ],
        'type' => \Elementor\Controls_Manager::CHOOSE,
        'options' => [
            'show' => [
                'title' => esc_html__( 'Show', 'wpsection' ), 
                'icon' => 'eicon-check-circle',
            ],
            'none' => [
                'title' => esc_html__( 'Hide', 'wpsection' ),
                'icon' => 'eicon-close-circle',
            ],
        ],
        'default' => 'show',
        'selectors' => [
            '{{WRAPPER}} .wps_price_tag' => 'display: {{VALUE}} !important',
        ],
    ]
);




    $this->add_control(
            'price_style_show',
            array(
                'label'   => esc_html__( 'Price Type', 'wpsection' ),
				 'condition' => [
            'show_product_price' => '1',
        
        ],
                'type'    =>  \Elementor\Controls_Manager::SELECT,
                'default' => 'price_style_1',
                'options' => array(
                    'price_style_1'     => esc_html__( 'Basic Price', 'wpsection' ),
                    'price_style_2'         => esc_html__( 'Variation Price', 'wpsection' ),
                  
                ),
            )
        );





    $this->add_control(
            'price_alingment',
            array(
                'label' => esc_html__( 'Alignment', 'wpsection' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'wpsection' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'wpsection' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'wpsection' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
              
				 'condition' => [
            'show_product_price' => '1',
        
        ],
                'toggle' => true,
                'selectors' => array(
                    '{{WRAPPER}} .mr_shop_price' => 'text-align: {{VALUE}} !important',
                ),
            )
        );  
    $this->add_control(
            'price_padding',
            array(
                'label'     => __( 'Padding', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
              'condition' => [
            'show_product_price' => '1',
      
        ],
                'selectors' => array(
                    '{{WRAPPER}} .mr_shop_price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );
     $this->add_control(
            'margin_padding',
            array(
                'label'     => __( 'Margin', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'separator'  => 'after',
                'size_units' =>  ['px', '%', 'em' ],
                'condition' => [
            'show_product_price' => '1',
       
        ],
                'selectors' => array(
                    '{{WRAPPER}} .mr_shop_price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );
       
//Price Regular



$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    array(
        'name'      => 'price_typography',
      
		 'condition' => [
            'show_product_price' => '1',
            'price_style_show' => 'price_style_1'
        ],
        'label'     => __( 'Regular Price Typography', 'wpsection' ),
        'selector'  => '{{WRAPPER}} .wps_basic_pricing >.amount',
    )
);

     $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'currency_typography',
            
				 'condition' => [
            'show_product_price' => '1',
            'price_style_show' => 'price_style_1'
        ],
                'label'    => __( 'Regular Currency Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_basic_pricing >.amount > .woocommerce-Price-currencySymbol',
            )
        );

$this->add_control(
    'price_color',
    array(
        'label'      => __( 'Regular Color', 'wpsection' ),
      'condition' => [
            'show_product_price' => '1',
            'price_style_show' => 'price_style_1'
        ],
         'separator'  => 'after',
        'type'       => \Elementor\Controls_Manager::COLOR,
        'selectors'  => array(
            '{{WRAPPER}} .wps_basic_pricing >.amount' => 'color: {{VALUE}} !important',
        ),
    )
);

//*** Variation Price
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    array(
        'name'      => 'price_v_typography',
    
		 'condition' => [
            'show_product_price' => '1',
            'price_style_show' => 'price_style_2'
        ],
        'label'     => __( 'Regular Price Typography', 'wpsection' ),
        'selector'  => '{{WRAPPER}} .wps_advance_pricing .price>.amount>bdi',
    )
);

     $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'currency_v_typography',
          
				 'condition' => [
            'show_product_price' => '1',
            'price_style_show' => 'price_style_2'
        ],
                'label'    => __( 'Regular Currency Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_advance_pricing .price>.amount > bdi>.woocommerce-Price-currencySymbol',
            )
        );

$this->add_control(
    'price_v_color',
    array(
        'label'      => __( 'Regular Color', 'wpsection' ),
     
		 'condition' => [
            'show_product_price' => '1',
            'price_style_show' => 'price_style_2'
        ],
         'separator'  => 'after',
        'type'       => \Elementor\Controls_Manager::COLOR,
        'selectors'  => array(
            '{{WRAPPER}} .wps_advance_pricing .price>.amount >bdi ' => 'color: {{VALUE}} !important',
        ),
    )
);


//Discounted Price 

     $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'dicounted_price_typography',
               
				 'condition' => [
            'show_product_price' => '1',
            'price_style_show' => 'price_style_1'
        ],
                'label'    => __( 'Dicounted Price Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_basic_pricing>ins>.amount',
            )
        );



     $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'dicounted_currency_typography',
						 'condition' => [
            'show_product_price' => '1',
            'price_style_show' => 'price_style_1'
        ],
              
                'label'    => __( 'Dicounted Currency Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_basic_pricing>ins>.amount >.woocommerce-Price-currencySymbol',
            )
        );

$this->add_control(
    'dicounted_price_color',
    array(
        'label'      => __( 'Discounted Color', 'wpsection' ),
				 'condition' => [
            'show_product_price' => '1',
            'price_style_show' => 'price_style_1'
        ],

        'separator'  => 'after',
        'type'       => \Elementor\Controls_Manager::COLOR,
        'selectors'  => array(
            '{{WRAPPER}} .wps_basic_pricing>ins>.amount ' => 'color: {{VALUE}} !important',
            '{{WRAPPER}} .wps_basic_pricing>ins>.amount >.woocommerce-Price-currencySymbol' => 'color: {{VALUE}} !important',
        ),
    )
);
//* Variation Price 
    $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'dicounted_price_v_typography',
           
			'condition' => [
            'show_product_price' => '1',
            'price_style_show' => 'price_style_2'
        ],
                'label'    => __( 'Dicounted Price Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_advance_pricing .price>ins>.amount>bdi ',
            )
        );



     $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'dicounted_currency_v_typography',
             	'condition' => [
            'show_product_price' => '1',
            'price_style_show' => 'price_style_2'
        ],
				
                'label'    => __( 'Dicounted Currency Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_advance_pricing .price>ins>.amount >bdi> .woocommerce-Price-currencySymbol',
            )
        );

$this->add_control(
    'dicounted_price_v_color',
    array(
        'label'      => __( 'Discounted Color', 'wpsection' ),
     	'condition' => [
            'show_product_price' => '1',
            'price_style_show' => 'price_style_2'
        ],
        'separator'  => 'after',
        'type'       => \Elementor\Controls_Manager::COLOR,
        'selectors'  => array(
            '{{WRAPPER}} .wps_advance_pricing .price>ins>.amount>bdi' => 'color: {{VALUE}} !important',
            '{{WRAPPER}} .wps_advance_pricing .price>ins>.amount >bdi> .woocommerce-Price-currencySymbol' => 'color: {{VALUE}} !important',
        ),
    )
);
	  

// Old Price        

     $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'old_price_typography',
					'condition' => [
            'show_product_price' => '1',
            'price_style_show' => 'price_style_1'
        ],
         
                'label'    => __( 'Old Price Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_basic_pricing>del>.amount ',
            )
        );



     $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'old_currency_typography',
               			'condition' => [
            'show_product_price' => '1',
            'price_style_show' => 'price_style_1'
        ],
                'label'    => __( 'Old Currency Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_basic_pricing>del>.amount>.woocommerce-Price-currencySymbol',
				
            )
        );
$this->add_control(
    'old_price_color',
    array(
        'label'      => __( 'Old Color', 'wpsection' ),
     			'condition' => [
            'show_product_price' => '1',
            'price_style_show' => 'price_style_1'
        ],
        'type'       => \Elementor\Controls_Manager::COLOR,
        'selectors'  => array(
            '{{WRAPPER}} .wps_basic_pricing>del>.amount ' => 'color: {{VALUE}} !important',
        ),
    )
);



           $this->add_control(
            'price_underline_color',
            array(
                'label'     => __( 'Price Old Under-Line Color', 'wpsection' ),
               			'condition' => [
            'show_product_price' => '1',
            'price_style_show' => 'price_style_1'
        ],
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_basic_pricing>del>.amount' => 'text-decoration-color: {{VALUE}} !important',
                ),
            )
        );



//* Variation 
      $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'old_price_v_typography',
							'condition' => [
            'show_product_price' => '1',
            'price_style_show' => 'price_style_2'
        ],
          
                'label'    => __( 'Old Price Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_advance_pricing .price>del>.amount>bdi ',
            )
        );



     $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'old_currency_v_typography',
             'condition' => [
            'show_product_price' => '1',
            'price_style_show' => 'price_style_2'
        ],
                'label'    => __( 'Old Currency Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_advance_pricing .price>del>.amount > bdi >.woocommerce-Price-currencySymbol',
				
            )
        );
$this->add_control(
    'old_price_v_color',
    array(
        'label'      => __( 'Old Color', 'wpsection' ),
       					'condition' => [
            'show_product_price' => '1',
            'price_style_show' => 'price_style_2'
        ],
        'type'       => \Elementor\Controls_Manager::COLOR,
        'selectors'  => array(
            '{{WRAPPER}} .wps_advance_pricing .price>del>.amount>bdi ' => 'color: {{VALUE}} !important',
        ),
    )
);



           $this->add_control(
            'price_underline_v_color',
            array(
                'label'     => __( 'Price Old Under-Line Color', 'wpsection' ),
                					'condition' => [
            'show_product_price' => '1',
            'price_style_show' => 'price_style_2'
        ],
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_advance_pricing .price > del >.amount >bdi' => 'text-decoration-color: {{VALUE}} !important',
                ),
            )
        );

	
    $this->add_control(
            'price_underline_size',
            [
                'label' => esc_html__( 'Under Line Size', 'wpsection' ),
								'condition' => [
            'show_product_price' => '1',
            'price_style_show' => 'price_style_2'
        ],
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 30,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .wps_advance_pricing .price > del >.amount >bdi' => 'text-decoration-thickness: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
	  
	  
	  

           $this->add_control(
            'price_underline_size_two',
            [
                'label' => esc_html__( 'Under Line Size', 'wpsection' ),
		'condition' => [
            'show_product_price' => '1',
            'price_style_show' => 'price_style_1'
        ],
			
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 30,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .wps_basic_pricing > .price > del >.amount' => 'text-decoration-thickness: {{SIZE}}{{UNIT}};',
                ],
            ]
        );




        $this->end_controls_section();
//End of Text=========      
