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


//========================== In stock Available =================================

 
$this->start_controls_section(
            'wps_instock_control',
            array(
                'label' => __( 'InStock Settings', 'wpsection' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
           
            )
        );
        
       $this->add_control(
                'show_instock',
                array(
                    'label' => __( 'Show In Stock', 'wpsection' ),
                    'type'     => \Elementor\Controls_Manager::SWITCHER,
                    'return_value' => '1',
                     'default'      => '1',
                    'placeholder' => __( 'Show In Stock', 'wpsection' ),
                     //'separator' => 'after'
                )
            );   

     $this->add_control(
            'position_order_five',
            array(
                'label' => __( 'Position Order Settings', 'wpsection' ),
                'condition'    => array( 'show_instock' => '1' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '5',
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
            'instock_text',
            array(
                'label'       => __( 'Stock Text', 'wpsection' ),
                    'condition'    => array( 'show_instock' => '1' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'dynamic'     => [
                    'active' => true,
                ],
                'default' => __( 'In Stock', 'wpsection' ),
                   
            )
        );

          $this->add_control(
            'instock_text_not',
            array(
                'label'       => __( 'Stock Out Text', 'wpsection' ),
                    'condition'    => array( 'show_instock' => '1' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'dynamic'     => [
                    'active' => true,
                ],
                'default' => __( 'Sold Out', 'wpsection' ),
                   
            )
        );

 $this->add_control(
    'show_instock_number',
    array(
        'label' => __( 'Show Stock Number', 'wpsection' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'return_value' => '1',
        'default' => '1',
        'placeholder' => __( 'Show In-Stock Number', 'wpsection' ),
        'condition' => array( 'show_instock' => '1' ),
    )
);

 $this->add_control(
    'show_instock_icon',
    array(
        'label' => __( 'Show Stock Icon', 'wpsection' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'return_value' => '1',
        'default' => '1',
        'placeholder' => __( 'Show In-Stock Icon', 'wpsection' ),
        'condition' => array( 'show_instock' => '1' ),
    )
);

$this->add_control(
    'instock_icon',
    [
        'label' => __( 'In Stock Icon', 'wpsection' ),
        'type' => \Elementor\Controls_Manager::ICONS,
        'default' => [
            'value' => 'eicon-product-stock',
            'library' => 'solid',
        ],
        'condition' => [
            'show_instock' => '1',
            'show_instock_icon' => '1',
        ],
    ]
);

$this->add_control(
    'outstock_icon',
    [
        'label' => __( 'Out Stock Icon', 'wpsection' ),
        'type' => \Elementor\Controls_Manager::ICONS,
        'default' => [
            'value' => 'eicon-product-info',
            'library' => 'solid',
        ],
        'condition' => [
            'show_instock' => '1',
            'show_instock_icon' => '1',
        ],
    ]
);



 	$this->add_control(
			'hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);


$this->add_control(
            'wps_instock_color',
            array(
                'label'     => __( ' in-Stock Color', 'wpsection' ),
				 'condition'    => array( 'show_instock' => '1' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
    
                'selectors' => array(
                    '{{WRAPPER}}   .wps_instock_text' => 'color: {{VALUE}} !important',

                ),
            )
        );

$this->add_control(
            'wps_outstock_color',
            array(
                'label'     => __( 'Out Stock Color', 'wpsection' ),
				 'condition'    => array( 'show_instock' => '1' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
    
                'selectors' => array(
                    '{{WRAPPER}}   .wps_instock_text .wps_out_stock_icont' => 'color: {{VALUE}} !important',

                ),
            )
        );
$this->add_control(
            'wps_instock_color_hover',
            array(
                'label'     => __( ' Hover Color', 'wpsection' ),
				 'condition'    => array( 'show_instock' => '1' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}}  .wps_instock_text:hover' => 'color: {{VALUE}} !important',

                ),
            )
        );
 
      $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'wps_instock_typography',
				 'condition'    => array( 'show_instock' => '1' ),
                'label'    => __( 'Text Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}}  .wps_instock_text ',
            )
        );   
               
        
        
 $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'wps_instock_icon_typography',
				 'condition'    => array( 'show_instock' => '1' ),
                'label'    => __( 'Icon Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}}  .wps_instock_text i',
            )
        );         
        
        
$this->add_control(
            'wps_instock_bg_color',
            array(
                'label'     => __( 'Background Color', 'wpsection' ),
				 'condition'    => array( 'show_instock' => '1' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}}  .wps_instock_text' => 'background: {{VALUE}} !important',
                ),
            )
        );  
$this->add_control(
            'wps_instock_hover_color',
            array(
                'label'     => __( 'Background Hover Color', 'wpsection' ),
				 'condition'    => array( 'show_instock' => '1' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}}  .wps_instock_text:hover' => 'background: {{VALUE}} !important',
                ),
            )
        ); 


 $this->add_control(
                    'wps_instock_alingment',
                    array(
                        'label' => esc_html__( 'Alignment', 'wpsection' ),
						 'condition'    => array( 'show_instock' => '1' ),
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
                            '{{WRAPPER}}  .wps_instock' => 'text-align: {{VALUE}} !important',
                        ),
                    )
                );  

 
$this->add_control( 'wps_instock_width',
                    [
                        'label' => esc_html__( 'Width',  'wpsection' ),
						 'condition'    => array( 'show_instock' => '1' ),
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
                            '{{WRAPPER}} .wps_instock_text' => 'width: {{SIZE}}{{UNIT}};',
                        ]
                    
                    ]
                );
        

    $this->add_control( 'wps_instock_height',
                    [
                        'label' => esc_html__( ' Height', 'wpsection' ),
						 'condition'    => array( 'show_instock' => '1' ),
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
                            '{{WRAPPER}} .wps_instock_text' => 'height: {{SIZE}}{{UNIT}};',
                    
                        ]
                    ]
                );      
            
    
        
    $this->add_control(
            'wps_instock_padding',
            array(
                'label'     => __( 'Padding', 'wpsection' ),
				 'condition'    => array( 'show_instock' => '1' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}}  .wps_instock_text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

    $this->add_control(
            'wps_instock_margin',
            array(
                'label'     => __( 'Margin', 'wpsection' ),
				 'condition'    => array( 'show_instock' => '1' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}}  .wps_instock_text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

    
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            array(
                'name' => 'wps_instock_border',
				 'condition'    => array( 'show_instock' => '1' ),
                'selector' => '{{WRAPPER}}  .wps_instock_text ',
            )
        );
    

        $this->add_control(
            'wps_instock_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
				 'condition'    => array( 'show_instock' => '1' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}} .wps_instock_text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );


            $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_instock_shadow',
                 'condition'    => array( 'show_instock' => '1' ),
                'label' => esc_html__( 'Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_instock_text',
         
                
            ]
        ); 

 



        
 


        

        
        $this->end_controls_section();  
