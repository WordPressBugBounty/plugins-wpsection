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



// ======================================= Progress Text =======================







        
// bosch  ppp  === progress =============
$this->start_controls_section(
            'progress_control',
            array(
                'label' => __( 'Progress Settings', 'wpsection' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
      
                
            )
        );

        $this->add_control(
                'show_product_progress',
               array(
                    'label' => __( 'Show Prgress', 'wpsection' ),
                    'type'     => \Elementor\Controls_Manager::SWITCHER,
                     'return_value' => '1',
                     'default'      => '0',
                    'placeholder' => __( 'Show Prgress', 'wpsection' ),
                )
            );

     $this->add_control(
            'position_order_four',
            array(
                'label' => __( 'Position Order Settings', 'wpsection' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'condition'    => array( 'show_product_progress' => '1' ),
                'default' => '4',
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
                    'hide_sold_text',
                    array(
                        'label' => esc_html__( 'Show Sold text-align', 'wpsection' ),
						'condition'    => array( 'show_product_progress' => '1' ),
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
                            '{{WRAPPER}} .mr_product_progress .product-single-item-sold' => 'display: {{VALUE}} !important',

                        ),
                    )
                ); 


$this->add_control(
    'product_progress_percentage',
    [
        'label'     => esc_html__( 'Select Text Style', 'wpsection' ),
		 'condition'    => array( 'show_product_progress' => '1' ),
        'type'      => \Elementor\Controls_Manager::SELECT,
        'default'   => 'progress_text',
        'options'   => [
            'progress_text'       => esc_html__( 'Product Number', 'wpsection' ),
            'progress_percentage' => esc_html__( 'Product Percentage', 'wpsection' ),
        ],
    ]
);

$this->add_control(
    'product_percentage_digit',
    [
        'label'     => esc_html__( 'Select Percentage Digit', 'wpsection' ),
		 'condition'    => array( 'show_product_progress' => '1' ), 
        'type'      => \Elementor\Controls_Manager::SELECT,
        'default'   => 'digit_all',
        'options'   => [
            'digit_all' => esc_html__( 'Full Number', 'wpsection' ),
            'digit_two' => esc_html__( 'Two Decimal', 'wpsection' ),
        ],
    ]
);


    $this->add_control(
            'sold_text',
            array(
                'label'       => __( 'Sold Text', 'wpsection' ),
                'condition'    => array( 'show_product_progress' => '1' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'dynamic'     => [
                    'active' => true,
                ],
                'default' => __( 'sold', 'wpsection' ),
            )
        );

     $this->add_control(
                    'wps_sold_alingment',
                    array(
                        'label' => esc_html__( 'Alignment', 'wpsection' ),
						'condition'    => array( 'show_product_progress' => '1' ),
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
                            '{{WRAPPER}}  .mr_product_progress .product-single-item-sold' => 'text-align: {{VALUE}} !important',
                        ),
                    )
                ); 


        $this->add_control(
                    'sold_color',
                    array(
                        'label'     => __( 'Color', 'wpsection' ),
                        'condition'    => array( 'show_product_progress' => '1' ),
                        'type'      => \Elementor\Controls_Manager::COLOR,
                        'selectors' => array(
                            '{{WRAPPER}} .mr_product_progress .product-single-item-sold p' => 'color: {{VALUE}} !important',

                        ),
                    )
                );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'progress_sold',
                'label'    => __( 'Typography', 'wpsection' ),
                'condition'    => array( 'show_product_progress' => '1' ),
                'selector' => '{{WRAPPER}} .mr_product_progress .product-single-item-sold p',
                 
            )
        );  



        $this->add_control(
                    'show_progress',
                    array(
                        'label' => esc_html__( 'Show Progress Bar', 'wpsection' ),
						'condition'    => array( 'show_product_progress' => '1' ),
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
                            '{{WRAPPER}} .mr_product_progress .product-single-item-bar' => 'display: {{VALUE}} !important',

                        ),
                        'separator' => 'before',
                    )
                );      
    

$this->add_control(
    'border_defult',
    array(
        'label'     => __( 'Full Bar Background ', 'wpsection' ),
   'condition'    => array( 'show_product_progress' => '1' ),
        'type'      => \Elementor\Controls_Manager::COLOR,
        'selectors' => array(
            '{{WRAPPER}} .mr_shop .product-single-item-bar' => 'background: {{VALUE}} !important',
        ),
    )
);



// Control for Level One (Progress Level One)
$this->add_control(
    'level_one',
    array(
        'label'       => __( 'Progress Level One', 'wpsection' ),
      'condition'    => array( 'show_product_progress' => '1' ),
        'type'        => \Elementor\Controls_Manager::NUMBER,
        'dynamic'     => [
            'active' => true,
        ],
        'default'     => __( '35', 'wpsection' ), // Default to 35%
    )
);

// Color for Level One (Green)
$this->add_control(
    'border_green',
    array(
        'label'     => __( 'Level One Background', 'wpsection' ),
       'condition'    => array( 'show_product_progress' => '1' ),
        'type'      => \Elementor\Controls_Manager::COLOR,
        'selectors' => array(
            '{{WRAPPER}} .mr_product_progress span.border-green' => 'background: {{VALUE}} !important',
        ),
    )
);

// Control for Level Two (Progress Level Two)
$this->add_control(
    'level_two',
    array(
        'label'       => __( 'Progress Level Two', 'wpsection' ),
      'condition'    => array( 'show_product_progress' => '1' ),
        'type'        => \Elementor\Controls_Manager::NUMBER,
        'dynamic'     => [
            'active' => true,
        ],
        'default'     => __( '66', 'wpsection' ), // Default to 66%
    )
);

// Color for Level Two (Yellow)
$this->add_control(
    'border_yellow',
    array(
        'label'     => __( 'Level Two Background', 'wpsection' ),
      'condition'    => array( 'show_product_progress' => '1' ),
        'type'      => \Elementor\Controls_Manager::COLOR,
        'selectors' => array(
            '{{WRAPPER}} .mr_product_progress span.border-yellow' => 'background: {{VALUE}} !important',
        ),
    )
);

// Control for Level Three (Progress Level Three)
$this->add_control(
    'level_three',
    array(
        'label'       => __( 'Progress Level Three', 'wpsection' ),
     'condition'    => array( 'show_product_progress' => '1' ),
        'type'        => \Elementor\Controls_Manager::NUMBER,
        'dynamic'     => [
            'active' => true,
        ],
        'default'     => __( '90', 'wpsection' ), // Default to 90%
    )
);



// Control for Level Four (Progress Level Four - Maximum)
$this->add_control(
    'border_red',
    array(
        'label'     => __( 'Level Three Background', 'wpsection' ),
      'condition'    => array( 'show_product_progress' => '1' ),
        'type'      => \Elementor\Controls_Manager::COLOR,
        'selectors' => array(
            '{{WRAPPER}} .mr_product_progress span.border-red' => 'background: {{VALUE}} !important',
        ),
    )
);

            


    $this->add_control(
            'progress_button_padding',
            array(
                'label'     => __( 'Padding', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
               'condition'    => array( 'show_product_progress' => '1' ),
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}} .mr_product_progress .product-single-item-bar' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

        

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            array(
                'name' => 'progress_border',
             'condition'    => array( 'show_product_progress' => '1' ),
                'selector' => '{{WRAPPER}} .mr_product_progress .product-single-item-bar',
            )
        );
    
        
            $this->add_control(
            'progress_border_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
              'condition'    => array( 'show_product_progress' => '1' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .mr_product_progress .product-single-item-bar' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );
        
        
        $this->end_controls_section();
        
//End progress bar
