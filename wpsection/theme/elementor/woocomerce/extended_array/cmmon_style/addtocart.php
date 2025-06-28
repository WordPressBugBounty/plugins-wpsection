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



// ====================================== Product Button  ===================================










// Button Settings
$this->start_controls_section(
    'wps_button_control',
    array(
        'label' => __( 'Add to Cart Settings', 'wpsection' ),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,

    )
);


  $this->add_control(
                'show_prduct_x_button',
                array(
                    'label' => __( 'Show Product Button', 'wpsection' ),
                    'type'     => \Elementor\Controls_Manager::SWITCHER,
                    'return_value' => '1',
                     'default'      => '1',
                    'placeholder' => __( 'Show Product Button', 'wpsection' ),
                     'separator' => 'after'
                )
            );


     $this->add_control(
            'position_order_eight',
            array(
                'label' => __( 'Position Order Settings', 'wpsection' ),
                'condition'    => array( 'show_prduct_x_button' => '1' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '8',
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
    
//Add to cart Style


  $this->add_control(
            'wps_addtocart_select',
            array(
                'label' => __( ' Style Settings', 'wpsection' ),
                'type' => \Elementor\Controls_Manager::SELECT,
				'condition'    => array( 'show_prduct_x_button' => '1' ),
                'default' => 'default',
                'options' => [
                    'default'  => __( 'Default', 'wpsection' ),
                    'advance' => __( 'Advance', 'wpsection' ),
                    'cusotm_link' => __( 'Cusotm Link', 'wpsection' ),
           
               
                ],
            )
        );

//Advance
    $this->add_control(
            'wps_quick_view_button', [
                'label'       => esc_html__( 'Buton Text', 'wpsection' ),
                 'condition'    => array( 'wps_addtocart_select' => 'advance' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Add to Cart',
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
        

$this->add_control(
                'show_prduct_addtocart_icon',
                array(
                    'label' => __( 'Show Add to Cart Icons', 'wpsection' ),
                    'type'     => \Elementor\Controls_Manager::SWITCHER,
                    'condition'    => array( 'wps_addtocart_select' => 'advance' ),
                    'return_value' => '1',
                    'default'      => '1',

                )
            );

    $this->add_control(
    'wps_product_adcart_icon',
    [
        'label' => __( 'Add to Cart Icon', 'wpsection' ),
       'condition'    => array( 'wps_addtocart_select' => 'advance' ),
        'type' => \Elementor\Controls_Manager::ICONS,
        'default' => [
            'value' => 'eicon-cart-light',
            'library' => 'solid',
        ],
    ]
    );

 


//Custom Linik

        $this->add_control(
            'wps_addtocart_custom_button_link', [
                'label'       => esc_html__( 'Set Link - Default Cart Page', 'wpsection' ),
                 'condition'    => array( 'wps_addtocart_select' => 'cusotm_link' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => ' ',
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'wps_addtocart_custom_button_text',
            array(
                'label'       => __( 'Add to Cart', 'wpsection' ),
                'condition'    => array( 'wps_addtocart_select' => 'cusotm_link' ),
                 'description'       => __( 'Add to Cart Text', 'wpsection' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'dynamic'     => [
                    'active' => true,
                ],

            )
        );


 $this->add_control(
                'wps_product_buynow_hide',
                array(
                    'label' => __( 'Hide Buy Now ', 'wpsection' ),
                    'type'     => \Elementor\Controls_Manager::SWITCHER,
                    'return_value' => '1',
                     'default'      => '1',
                    'placeholder' => __( 'Hide Buy Now', 'wpsection' ),
            
                )
            );





// Alignment Control
$this->add_control(
    'wps_button_x_alingment',
    array(
        'label' => esc_html__( 'Alignment', 'wpsection' ),
         'condition' => array( 'wps_addtocart_select' => 'advance' ),
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
        'toggle' => true,
        'selectors' => array(
            '{{WRAPPER}} .quick_defult_wps' => 'text-align: {{VALUE}} !important',
        ),
    )
);

// Alignment Control
$this->add_control(
    'wps_button_x_alingment_2',
    array(
        'label' => esc_html__( 'Alignment', 'wpsection' ),
        'condition' => array( 'wps_addtocart_select' => 'default' ),
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
        'toggle' => true,
        'selectors' => array(
            '{{WRAPPER}} .woocommerce-variation-add-to-cart' => 'text-align: {{VALUE}} !important',
        ),
    )
);


// Button Color Control
$this->add_control(
    'wps_button_color',
    [
        'label'     => __( 'Button Color', 'wpsection' ),
        'type'      => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .wps_button' => 'color: {{VALUE}} !important',
            '{{WRAPPER}} .single_add_to_cart_button' => 'color: {{VALUE}} !important',
            '{{WRAPPER}} .wps_defult_addtocar .product_type_variable' => 'color: {{VALUE}} !important',
        ],
    ]
);


// Button Hover Color Control
$this->add_control(
    'wps_button_color_hover',
    array(
        'label'     => __( 'Button Hover Color', 'wpsection' ),
        'type'      => \Elementor\Controls_Manager::COLOR,
        'selectors' => array(
            '{{WRAPPER}} .quick_defult_wps .wps_button:hover' => 'color: {{VALUE}} !important',
            '{{WRAPPER}} .single_add_to_cart_button:hover' => 'color: {{VALUE}} !important',
			'{{WRAPPER}} .wps_defult_addtocar:hover .product_type_variable' => 'color: {{VALUE}} !important',
        ),
    )
);

// Button Background Color Control
$this->add_control(
    'wps_button_bg_color',
    array(
        'label'     => __( 'Background Color', 'wpsection' ),
        'type'      => \Elementor\Controls_Manager::COLOR,
        'selectors' => array(
            '{{WRAPPER}} .quick_defult_wps .wps_button' => 'background: {{VALUE}} !important',
            '{{WRAPPER}} .single_add_to_cart_button' => 'background: {{VALUE}} !important',
			 '{{WRAPPER}} .wps_defult_addtocar .product_type_variable' => 'background: {{VALUE}} !important',
        ),
    )
);

// Button Hover Background Color Control
$this->add_control(
    'wps_button_hover_color',
    array(
        'label'     => __( 'Background Hover Color', 'wpsection' ),
        'type'      => \Elementor\Controls_Manager::COLOR,
        'selectors' => array(
            '{{WRAPPER}} .quick_defult_wps .wps_button:hover' => 'background: {{VALUE}} !important',
            '{{WRAPPER}} .cart-btn button:before' => 'background-color: {{VALUE}} !important',
            '{{WRAPPER}} .single_add_to_cart_button:hover' => 'background: {{VALUE}} !important',
			'{{WRAPPER}} .wps_defult_addtocar .product_type_variable:hover' => 'background: {{VALUE}} !important',
        ),
    )
);

// Button Width Control
$this->add_control(
    'wps_button_width',
    [
        'label' => esc_html__( 'Width', 'wpsection' ),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'size_units' => [ 'px', '%' ],
        'range' => [
            'px' => [
                'min' => 0,
                'max' => 2000,
                'step' => 1,
            ],
            '%' => [
                'min' => 0,
                'max' => 100,
            ],
        ],
        'selectors' => [
            '{{WRAPPER}} .quick_defult_wps .wps_button' => 'width: {{SIZE}}{{UNIT}};',
            '{{WRAPPER}} .single_add_to_cart_button' => 'width: {{SIZE}}{{UNIT}};',
			'{{WRAPPER}} .wps_defult_addtocar .product_type_variable' => 'width: {{SIZE}}{{UNIT}};',
        ]
    ]
);

// Button Height Control
$this->add_control(
    'wps_button_height',
    [
        'label' => esc_html__( 'Height', 'wpsection' ),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'size_units' => [ 'px', '%' ],
        'range' => [
            'px' => [
                'min' => 0,
                'max' => 1000,
                'step' => 1,
            ],
            '%' => [
                'min' => 0,
                'max' => 100,
            ],
        ],
        'selectors' => [
            '{{WRAPPER}} .quick_defult_wps .wps_button' => 'height: {{SIZE}}{{UNIT}};',
            '{{WRAPPER}} .single_add_to_cart_button' => 'height: {{SIZE}}{{UNIT}};',
		 '{{WRAPPER}} .wps_defult_addtocar .product_type_variable' => 'height: {{SIZE}}{{UNIT}};',
        ]
    ]
);

// Button Padding Control
$this->add_control(
    'wps_button_padding',
    array(
        'label'     => __( 'Padding', 'wpsection' ),
        'type'      => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' =>  ['px', '%', 'em'],
        'selectors' => array(
            '{{WRAPPER}} .quick_defult_wps .wps_button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
            '{{WRAPPER}} .single_add_to_cart_button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
			 '{{WRAPPER}} .wps_defult_addtocar .product_type_variable' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
			
        ),
    )
);

// Button Margin Control
$this->add_control(
    'wps_button_margin',
    array(
        'label'     => __( 'Margin', 'wpsection' ),
        'type'      => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' =>  ['px', '%', 'em'],
        'selectors' => array(
            '{{WRAPPER}} .quick_defult_wps .wps_button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
            '{{WRAPPER}} .single_add_to_cart_button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
			 '{{WRAPPER}} .wps_defult_addtocar .product_type_variable' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
			
        ),
    )
);

// Typography Control for Button
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    array(
        'name'     => 'wps_button_typography',
        'condition' => array( 'wps_addtocart_select' => 'advance' ),
        'label'    => __( 'Typography', 'wpsection' ),
        'selector' => '{{WRAPPER}} .quick_defult_wps .wps_button',
    )
);


// Typography Control for Default Button
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name'      => 'wps_button_typography_2',
        'label'     => __( 'Typography Default', 'wpsection' ),
        'condition' => [ 'wps_addtocart_select' => 'default' ],
        'selector'  => '{{WRAPPER}} .single_add_to_cart_button, {{WRAPPER}} .wps_defult_addtocar a',
    ]
);


// Button Border Control
$this->add_group_control(
    \Elementor\Group_Control_Border::get_type(),
    [
        'name'     => 'wps_button_border',
        'label'    => __( 'Button Border', 'wpsection' ),
        'selector' => '
		{{WRAPPER}} .quick_defult_wps .wps_button, 
		{{WRAPPER}} .single_add_to_cart_button,
		{{WRAPPER}} .wps_defult_addtocar .product_type_variable
		
		',
    ]
);


// Button Border Radius Control
$this->add_control(
    'wps_button_radius',
    array(
        'label'     => __( 'Border Radius', 'wpsection' ),
        //'condition' => array( 'wps_addtocart_select' => 'advance' ),
        'type'      => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em'],
        'selectors' => array(
            '{{WRAPPER}} .quick_defult_wps .wps_button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
			 '{{WRAPPER}} .single_add_to_cart_button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
			 '{{WRAPPER}} .wps_defult_addtocar .product_type_variable' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
        ),
    )
);

// Box Shadow Control for Button
$this->add_group_control(
    \Elementor\Group_Control_Box_Shadow::get_type(),
    [
        'name'     => 'wps_button_shadow',
        //'condition' => array( 'wps_addtocart_select' => 'advance' ),
         'selector' => '
		{{WRAPPER}} .quick_defult_wps .wps_button, 
		{{WRAPPER}} .single_add_to_cart_button,
		{{WRAPPER}} .wps_defult_addtocar .product_type_variable
		
		',
    ]
);




//Icon settings
$this->add_control(
    'wps_qnt_simbol_icon_separator',
    array(
        'type' => \Elementor\Controls_Manager::DIVIDER,
    )
);


$this->add_control(
            'wps_addto_icon_color',
            array(
                'label'     => __( 'Icon Color', 'wpsection' ),
                'condition'    => array( 'wps_addtocart_select' => 'advance' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
    
                'selectors' => array(
                    '{{WRAPPER}}   .wps_cart_qnt .quick_defult_wps i' => 'color: {{VALUE}} !important',

                ),
            )
        );
$this->add_control(
            'wps_addto_icon_color_hover',
            array(
                'label'     => __( 'Icon Hover Color', 'wpsection' ),
                'condition'    => array( 'wps_addtocart_select' => 'advance' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_cart_qnt .quick_defult_wps:hover i' => 'color: {{VALUE}} !important',

                ),
            )
        );
$this->add_control(
            'wps_addto_icon_bg_color',
            array(
                'label'     => __( 'Icon Background Color', 'wpsection' ),
                'condition'    => array( 'wps_addtocart_select' => 'advance' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}}  .wps_cart_qnt .quick_defult_wps i' => 'background: {{VALUE}} !important',
                ),
            )
        );  
$this->add_control(
            'wps_addto_icon_hover_color',
            array(
                'label'     => __( 'Icon Background Hover Color', 'wpsection' ),
                'condition'    => array( 'wps_addtocart_select' => 'advance' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}}  .wps_cart_qnt .quick_defult_wps i:hover' => 'background: {{VALUE}} !important',
        
                ),
            )
        );  
        
    $this->add_control(
            'wps_addto_icon_padding',
            array(
                'label'     => __( 'Padding', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'condition'    => array( 'wps_addtocart_select' => 'advance' ),
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}}  .wps_cart_qnt .quick_defult_wps i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

    $this->add_control(
            'wps_addto_icon_margin',
            array(
                'label'     => __( 'Margin', 'wpsection' ),
                'condition'    => array( 'wps_addtocart_select' => 'advance' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}}  .wps_cart_qnt .quick_defult_wps i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'wps_addto_icon_typography',
                'condition'    => array( 'wps_addtocart_select' => 'advance' ),
                'label'    => __( 'Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}}  .wps_cart_qnt .quick_defult_wps i',
            )
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            array(
                'name' => 'wps_addto_icon_border',
                'condition'    => array( 'wps_addtocart_select' => 'advance' ),
                'selector' => '{{WRAPPER}}  .wps_cart_qnt .quick_defult_wps i ',
            )
        );
    

        $this->add_control(
            'wps_addto_icon_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
                'condition'    => array( 'wps_addtocart_select' => 'advance' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}} .wps_cart_qnt .quick_defult_wps i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );


            $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_addto_icon_shadow',
                'condition'    => array( 'wps_addtocart_select' => 'advance' ),
                'label' => esc_html__( 'Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_cart_qnt .quick_defult_wps i',
            ]
        );
        
        $this->end_controls_section();  


// Button Setting ======================================================
    
$this->start_controls_section(
            'wps_qnt_button_control',
            array(
                'label' => __( 'Quantity Button Settings', 'wpsection' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
 
            )
        );
        
 $this->add_control(
                'wps_product_qun_hide',
                array(
                    'label' => __( 'Hide Quantity Option', 'wpsection' ),
                    'type'     => \Elementor\Controls_Manager::SWITCHER,
                    'return_value' => '1',
                     'default'      => '1',
                    'placeholder' => __( 'Hide Product Quantityn', 'wpsection' ),
            
                )
            );


    $this->add_control(
            'wps_product_hide_option',
            array(
                'label' => esc_html__( 'Hide Default Quantity', 'wpsection' ),
				 'condition'    => array( 'wps_product_qun_hide' => '1' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
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
                    '{{WRAPPER}} .wps_defult_addtocar .quantity' => 'display: {{VALUE}} !important',
                ),
            )
        );  


//Product product plusin minus 
   $this->add_control(
            'position_order_eleven',
            array(
                'label' => __( 'Quantity Position Settings', 'wpsection' ),
                'condition'    => array( 'wps_product_qun_hide' => '1' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '11',
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
                    '11' => __( '11th Position', 'wpsection' ),
                    '12' => __( '12th Position', 'wpsection' ),
                ],
            )
        );









 $this->add_control(
                    'wps_qnt_button_x_alingment',
                    array(
                        'label' => esc_html__( 'Alignment', 'wpsection' ),
					
						
						 'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'advance'
        ],
						
                        'type' => \Elementor\Controls_Manager::CHOOSE,
                        'options' => [
                            'flex-start' => [
                                'title' => esc_html__( 'Left', 'wpsection' ),
                                'icon' => 'eicon-text-align-left',
                            ],
                            'center' => [
                                'title' => esc_html__( 'Center', 'wpsection' ),
                                'icon' => 'eicon-text-align-center',
                            ],
                            'flex-end' => [
                                'title' => esc_html__( 'Right', 'wpsection' ),
                                'icon' => 'eicon-text-align-right',
                            ],
                        ],
                        'default' => 'center',
                        'toggle' => true,
                        'selectors' => array(
                            '{{WRAPPER}} .wps_qnt_button' => 'justify-content: {{VALUE}} !important',
                        ),
                    )
                );  

        
        


$this->add_control(
            'wps_qnt_button_bg_color',
            array(
                'label'     => __( 'Area Background Color', 'wpsection' ),
								 'condition' => [
            'wps_product_qun_hide' => '1',
  
        ],
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}}  .wps_product_details .quantity' => 'background: {{VALUE}} !important',
                ),
            )
        );  

$this->add_control( 'wps_qnt_button_width',
                    [
                        'label' => esc_html__( 'Area Width',  'wpsection' ),
										 'condition' => [
            'wps_product_qun_hide' => '1',
            
        ],
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 2000,
                                'step' => 1,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        
                        'selectors' => [
                            '{{WRAPPER}} .wps_product_details .quantity' => 'width: {{SIZE}}{{UNIT}};',
                        ]
                    
                    ]
                );

    

    $this->add_control( 'wps_qnt_button_height',
                    [
                        'label' => esc_html__( 'Area Height', 'wpsection' ),
										 'condition' => [
            'wps_product_qun_hide' => '1',
      
        ],
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 1000,
                                'step' => 1,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        
                        'selectors' => [
                            '{{WRAPPER}} .wps_product_details .quantity' => 'height: {{SIZE}}{{UNIT}};',
                    
                        ]
                    ]
                );      
            
    
        
    $this->add_control(
            'wps_qnt_button_padding',
            array(
                'label'     => __( 'Area Padding', 'wpsection' ),
								 'condition' => [
            'wps_product_qun_hide' => '1',
     
        ],
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}}  .wps_product_details .quantity' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

    $this->add_control(
            'wps_qnt_button_margin',
            array(
                'label'     => __( 'Area Margin', 'wpsection' ),
								 'condition' => [
            'wps_product_qun_hide' => '1',
   
        ],
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .wps_product_details .quantity' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );


        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            array(
                'name' => 'wps_qnt_button_border',
								 'condition' => [
            'wps_product_qun_hide' => '1',
        
        ],
                'selector' => '{{WRAPPER}} .wps_product_details .quantity',
            )
        );
    

        $this->add_control(
            'wps_qnt_button_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
								 'condition' => [
     
        ],
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}} .wps_product_details .quantity' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );


            $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_qnt_button_shadow',
                				 'condition' => [
            'wps_product_qun_hide' => '1',
          
        ],
                'label' => esc_html__( 'Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_product_details .quantity',
            ]
        );


// Plus and Minus Simbol Settings=======

// Number advancee
$this->add_control(
    'wps_qnt_simbol_separator',
    array(
        'type' => \Elementor\Controls_Manager::DIVIDER,
    )
);

        
$this->add_control(
            'wps_qnt_simbol_button_color',
            array(
                'label'     => __( 'Number Color', 'wpsection' ),
			
			'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'advance'
        ],
                'type'      => \Elementor\Controls_Manager::COLOR,
    
                'selectors' => array(
                    '{{WRAPPER}} .wps_cart_number_advance' => 'color: {{VALUE}} !important',

                ),
            )
        );

$this->add_control(
            'wps_qnt_simbol_button_bg_color',
            array(
                'label'     => __( 'Number Background Color', 'wpsection' ),
					'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'advance'
        ],
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}}  .wps_cart_number_advance' => 'background: {{VALUE}} !important',
                ),
            )
        );  

$this->add_control( 'wps_qnt_simbol_button_width',
                    [
                        'label' => esc_html__( 'Number Width',  'wpsection' ),
						'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'advance'
        ],
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 2000,
                                'step' => 1,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        
                        'selectors' => [
                            '{{WRAPPER}} .wps_cart_number_advance' => 'width: {{SIZE}}{{UNIT}};',
                        ]
                    
                    ]
                );

    

    $this->add_control( 'wps_qnt_simbol_button_height',
                    [
                        'label' => esc_html__( ' Height', 'wpsection' ),
						'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'advance'
        ],
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 1000,
                                'step' => 1,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        
                        'selectors' => [
                            '{{WRAPPER}} .wps_cart_number_advance' => 'height: {{SIZE}}{{UNIT}};',
                    
                        ]
                    ]
                );      
            
    
        
    $this->add_control(
            'wps_qnt_simbol_button_padding',
            array(
                'label'     => __( 'Number Padding', 'wpsection' ),
				'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'advance'
        ],
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}}  .wps_cart_number_advance' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

    $this->add_control(
            'wps_qnt_simbol_button_margin',
            array(
                'label'     => __( 'Margin', 'wpsection' ),
			'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'advance'
        ],
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .wps_cart_number_advance' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'wps_qnt_simbol_button_typography',
				'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'advance'
        ],
                'label'    => __( 'Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_cart_number_advance ',
            )
        );


        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            array(
                'name' => 'wps_qnt_simbol_button_border',
				'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'advance'
        ],
                'selector' => '{{WRAPPER}} .wps_cart_number_advance',
            )
        );
    

        $this->add_control(
            'wps_qnt_simbol_button_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
				'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'advance'
        ],
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}} .wps_cart_number_advance' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

//Advance Plus



   
        
$this->add_control(
            'wps_qnt_simbol_button_color11',
            array(
                'label'     => __( 'Plus Color', 'wpsection' ),
				'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'advance'
        ],
                'type'      => \Elementor\Controls_Manager::COLOR,
    
                'selectors' => array(
                    '{{WRAPPER}} .wps_cart_plus_advance' => 'color: {{VALUE}} !important',

                ),
            )
        );

$this->add_control(
            'wps_qnt_simbol_button_bg_color11',
            array(
                'label'     => __( 'Plus Background Color', 'wpsection' ),
			'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'advance'
        ],
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}}  .wps_cart_plus_advance' => 'background: {{VALUE}} !important',
                ),
            )
        );  

$this->add_control( 'wps_qnt_simbol_button_width11',
                    [
                        'label' => esc_html__( 'Plus Width',  'wpsection' ),
						'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'advance'
        ],
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 2000,
                                'step' => 1,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        
                        'selectors' => [
                            '{{WRAPPER}} .wps_cart_plus_advance' => 'width: {{SIZE}}{{UNIT}};',
                        ]
                    
                    ]
                );

    

    $this->add_control( 'wps_qnt_simbol_button_height11',
                    [
                        'label' => esc_html__( 'Plus Height', 'wpsection' ),
					'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'advance'
        ],
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 1000,
                                'step' => 1,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        
                        'selectors' => [
                            '{{WRAPPER}} .wps_cart_plus_advance' => 'height: {{SIZE}}{{UNIT}};',
                    
                        ]
                    ]
                );      
            
    
        
    $this->add_control(
            'wps_qnt_simbol_button_padding11',
            array(
                'label'     => __( 'Plus Padding', 'wpsection' ),
				'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'advance'
        ],
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}}  .wps_cart_plus_advance' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

    $this->add_control(
            'wps_qnt_simbol_button_margin11',
            array(
                'label'     => __( 'Margin', 'wpsection' ),
				'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'advance'
        ],
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .wps_cart_plus_advance' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'wps_qnt_simbol_button_typography11',
				'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'advance'
        ],
                'label'    => __( 'Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_cart_plus_advance ',
            )
        );


        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            array(
                'name' => 'wps_qnt_simbol_button_border11',
			'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'advance'
        ],
                'selector' => '{{WRAPPER}} .wps_cart_plus_advance',
            )
        );
    

        $this->add_control(
            'wps_qnt_simbol_button_radius11',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
				'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'advance'
        ],
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}} .wps_cart_plus_advance' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );


// Advacne Minus

   
        
$this->add_control(
            'wps_qnt_simbol_button_color22',
            array(
                'label'     => __( 'Minus Color', 'wpsection' ),
			'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'advance'
        ],
                'type'      => \Elementor\Controls_Manager::COLOR,
    
                'selectors' => array(
                    '{{WRAPPER}} .wps_cart_minus_advance' => 'color: {{VALUE}} !important',

                ),
            )
        );

$this->add_control(
            'wps_qnt_simbol_button_bg_color22',
            array(
                'label'     => __( 'Minus Background Color', 'wpsection' ),
				'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'advance'
        ],
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}}  .wps_cart_minus_advance' => 'background: {{VALUE}} !important',
                ),
            )
        );  

$this->add_control( 'wps_qnt_simbol_button_width22',
                    [
                        'label' => esc_html__( 'Mninus Width',  'wpsection' ),
						'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'advance'
        ],
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 2000,
                                'step' => 1,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        
                        'selectors' => [
                            '{{WRAPPER}} .wps_cart_minus_advance' => 'width: {{SIZE}}{{UNIT}};',
                        ]
                    
                    ]
                );

    

    $this->add_control( 'wps_qnt_simbol_button_height22',
                    [
                        'label' => esc_html__( 'Minus Height', 'wpsection' ),
						'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'advance'
        ],
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 1000,
                                'step' => 1,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        
                        'selectors' => [
                            '{{WRAPPER}} .wps_cart_minus_advance' => 'height: {{SIZE}}{{UNIT}};',
                    
                        ]
                    ]
                );      
            
    
        
    $this->add_control(
            'wps_qnt_simbol_button_padding22',
            array(
                'label'     => __( 'Minus Padding', 'wpsection' ),
			'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'advance'
        ],
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}}  .wps_cart_minus_advance' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

    $this->add_control(
            'wps_qnt_simbol_button_margin22',
            array(
                'label'     => __( 'Margin', 'wpsection' ),
				'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'advance'
        ],
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .wps_cart_minus_advance' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'wps_qnt_simbol_button_typography22',
				'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'advance'
        ],
                'label'    => __( 'Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_cart_minus_advance ',
            )
        );


        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            array(
                'name' => 'wps_qnt_simbol_button_border22',
				'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'advance'
        ],
                'selector' => '{{WRAPPER}} .wps_cart_minus_advance',
            )
        );
    

        $this->add_control(
            'wps_qnt_simbol_button_radius22',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
				'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'advance'
        ],
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}} .wps_cart_minus_advance' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );



// Default Plus Minnus

//Number        ====================
$this->add_control(
            'wps_qnt_simbol_button_color_2',
            array(
                'label'     => __( 'Number Color', 'wpsection' ),
		
					'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'default'
        ],
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_defult_addtocar .quantity .input-text.qty.text' => 'color: {{VALUE}} !important',

                ),
            )
        );

$this->add_control(
            'wps_qnt_simbol_button_bg_color_2',
            array(
                'label'     => __( 'Number Background ', 'wpsection' ),
						'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'default'
        ],
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}}  .wps_defult_addtocar .quantity .input-text.qty.text' => 'background: {{VALUE}} !important',
                ),
            )
        );  

$this->add_control( 'wps_qnt_simbol_button_width_2',
                    [
                        'label' => esc_html__( 'Number Area Width',  'wpsection' ),
								'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'default'
        ],
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 2000,
                                'step' => 1,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        
                        'selectors' => [
                            '{{WRAPPER}} .wps_defult_addtocar .quantity .input-text.qty.text' => 'width: {{SIZE}}{{UNIT}};',
                        ]
                    
                    ]
                );

    

    $this->add_control( 'wps_qnt_simbol_button_height_2',
                    [
                        'label' => esc_html__( ' Number Height', 'wpsection' ),
								'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'default'
        ],
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 1000,
                                'step' => 1,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        
                        'selectors' => [
                            '{{WRAPPER}} .wps_defult_addtocar .quantity .input-text.qty.text' => 'height: {{SIZE}}{{UNIT}};',
                    
                        ]
                    ]
                );      
            
    
        
    $this->add_control(
            'wps_qnt_simbol_button_padding_2',
            array(
                'label'     => __( 'Number Padding', 'wpsection' ),
					'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'default'
        ],
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}}  .wps_defult_addtocar .quantity .input-text.qty.text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

    $this->add_control(
            'wps_qnt_simbol_button_margin_2',
            array(
                'label'     => __( 'Number Margin', 'wpsection' ),
						'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'default'
        ],
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .wps_defult_addtocar .quantity .input-text.qty.text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'wps_qnt_simbol_button_typography_2',
						'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'default'
        ],
                'label'    => __( 'Number Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_defult_addtocar .quantity .input-text.qty.text ',
            )
        );


        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            array(
                'name' => 'wps_qnt_simbol_button_border_2',
							'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'default'
        ],
                'selector' => '{{WRAPPER}} .wps_defult_addtocar .quantity .input-text.qty.text',
            )
        );
    

        $this->add_control(
            'wps_qnt_simbol_button_radius_2',
            array(
                'label'     => __( 'Number Border Radius', 'wpsection' ),
								'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'default'
        ],
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}} .wps_defult_addtocar .quantity .input-text.qty.text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

//Plus Button
        
$this->add_control(
            'wps_qnt_simbol_button_color_3',
            array(
                'label'     => __( 'Plus Color', 'wpsection' ),
						'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'default'
        ],
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_defult_addtocar .wps_qnt_plus' => 'color: {{VALUE}} !important',

                ),
            )
        );

$this->add_control(
            'wps_qnt_simbol_button_bg_color_3',
            array(
                'label'     => __( 'Plus Background ', 'wpsection' ),
							'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'default'
        ],
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}}  .wps_defult_addtocar .wps_qnt_plus' => 'background: {{VALUE}} !important',
                ),
            )
        );  

$this->add_control( 'wps_qnt_simbol_button_width_3',
                    [
                        'label' => esc_html__( 'Plus Area Width',  'wpsection' ),
								'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'default'
        ],
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 2000,
                                'step' => 1,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        
                        'selectors' => [
                            '{{WRAPPER}} .wps_defult_addtocar .wps_qnt_plus' => 'width: {{SIZE}}{{UNIT}};',
                        ]
                    
                    ]
                );

    

    $this->add_control( 'wps_qnt_simbol_button_height3',
                    [
                        'label' => esc_html__( ' Plus Height', 'wpsection' ),
						'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'default'
        ],
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 1000,
                                'step' => 1,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        
                        'selectors' => [
                            '{{WRAPPER}} .wps_defult_addtocar .wps_qnt_plus' => 'height: {{SIZE}}{{UNIT}};',
                    
                        ]
                    ]
                );      
            
    
        
    $this->add_control(
            'wps_qnt_simbol_button_padding_3',
            array(
                'label'     => __( 'Plus Padding', 'wpsection' ),
					'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'default'
        ],
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}}  .wps_defult_addtocar .wps_qnt_plus' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

    $this->add_control(
            'wps_qnt_simbol_button_margin_3',
            array(
                'label'     => __( 'Plus Margin', 'wpsection' ),
							'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'default'
        ],
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .wps_defult_addtocar .wps_qnt_plus' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'wps_qnt_simbol_button_typography_3',
						'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'default'
        ],
                'label'    => __( 'Plus Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_defult_addtocar .wps_qnt_plus',
            )
        );


        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            array(
                'name' => 'wps_qnt_simbol_button_border_3',
						'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'default'
        ],
                'selector' => '{{WRAPPER}} .wps_defult_addtocar .wps_qnt_plus',
            )
        );
    

        $this->add_control(
            'wps_qnt_simbol_button_radius_3',
            array(
                'label'     => __( 'Plus Border Radius', 'wpsection' ),
							'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'default'
        ],
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}} .wps_defult_addtocar .wps_qnt_plus' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

//Minus Button
        
$this->add_control(
            'wps_qnt_simbol_button_color_4',
            array(
                'label'     => __( 'Minus Color', 'wpsection' ),
						'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'default'
        ],
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_defult_addtocar .wps_qnt_minus' => 'color: {{VALUE}} !important',

                ),
            )
        );

$this->add_control(
            'wps_qnt_simbol_button_bg_color_4',
            array(
                'label'     => __( 'Minus Background ', 'wpsection' ),
							'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'default'
        ],
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}}  .wps_defult_addtocar .wps_qnt_minus' => 'background: {{VALUE}} !important',
                ),
            )
        );  

$this->add_control( 'wps_qnt_simbol_button_width_4',
                    [
                        'label' => esc_html__( 'Minus Area Width',  'wpsection' ),
								'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'default'
        ],
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 2000,
                                'step' => 1,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        
                        'selectors' => [
                            '{{WRAPPER}} .wps_defult_addtocar .wps_qnt_minus' => 'width: {{SIZE}}{{UNIT}};',
                        ]
                    
                    ]
                );

    

    $this->add_control( 'wps_qnt_simbol_button_height4',
                    [
                        'label' => esc_html__( ' Minus Height', 'wpsection' ),
								'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'default'
        ],
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 1000,
                                'step' => 1,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        
                        'selectors' => [
                            '{{WRAPPER}} .wps_defult_addtocar .wps_qnt_minus' => 'height: {{SIZE}}{{UNIT}};',
                    
                        ]
                    ]
                );      
            
    
        
    $this->add_control(
            'wps_qnt_simbol_button_padding_4',
            array(
                'label'     => __( 'Minus Padding', 'wpsection' ),
						'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'default'
        ],
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}}  .wps_defult_addtocar .wps_qnt_minus' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

    $this->add_control(
            'wps_qnt_simbol_button_margin_4',
            array(
                'label'     => __( 'Minus Margin', 'wpsection' ),
							'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'default'
        ],
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .wps_defult_addtocar .wps_qnt_minus' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'wps_qnt_simbol_button_typography_4',
						'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'default'
        ],
                'label'    => __( 'Minus Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_defult_addtocar .wps_qnt_minus',
            )
        );


        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            array(
                'name' => 'wps_qnt_simbol_button_border_4',
							'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'default'
        ],
                'selector' => '{{WRAPPER}} .wps_defult_addtocar .wps_qnt_minus',
            )
        );
    

        $this->add_control(
            'wps_qnt_simbol_button_radius_4',
            array(
                'label'     => __( 'Minus Border Radius', 'wpsection' ),
						'condition' => [
            'wps_product_qun_hide' => '1',
            'wps_addtocart_select' => 'default'
        ],
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}} .wps_defult_addtocar .wps_qnt_minus' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );


        $this->end_controls_section();   