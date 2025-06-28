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

//=============================== CountDown ======================================


 //Countdown 
 // Button Setting
    
$this->start_controls_section(
            'wps_counter_control',
            array(
                'label' => __( 'Offer Countdown ', 'wpsection' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
    
            )
        );
     $this->add_control(
                'show_countdown',
                array(
                    'label' => __( 'Show Countdown', 'wpsection' ),
                    'type'     => \Elementor\Controls_Manager::SWITCHER,
                    'return_value' => '1',
                     'default'      => '0',
                    'placeholder' => __( 'Show Countdown', 'wpsection' ),
                  
                )
            );

     $this->add_control(
            'position_order_six',
            array(
                'label' => __( 'Position Order Settings', 'wpsection' ),
                'condition'    => array( 'show_countdown' => '1' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '6',
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
            'offer_days',
            [
                'label' => __('Days Text', 'wpsection'),
                'condition'    => array( 'show_countdown' => '1' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Days',
            ]
        );

        $this->add_control(
            'offer_hours',
            [
                'label' => __('Hours Text', 'wpsection'),
                'condition'    => array( 'show_countdown' => '1' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Hours',
            ]
        );

        $this->add_control(
            'offer_min',
            [
                'label' => __('Minutes Text', 'wpsection'),
                'condition'    => array( 'show_countdown' => '1' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Minutes',
            ]
        );

        $this->add_control(
            'offer_sec',
            [
                'label' => __('Seconds Text', 'wpsection'),
                 'condition'    => array( 'show_countdown' => '1' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Seconds',
            ]
        );





 $this->add_control(
                    'wps_button_alingment',
                    array(
                        'label' => esc_html__( 'Alignment', 'wpsection' ),
						 'condition'    => array( 'show_countdown' => '1' ),
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
                            '{{WRAPPER}}  .wps-countdown ' => 'text-align: {{VALUE}} !important',
                        ),
                    )
                );  

  $this->add_control( 'wps_counter_width',
                    [
                        'label' => esc_html__( 'Width',  'wpsection' ),
						 'condition'    => array( 'show_countdown' => '1' ),
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
                            '{{WRAPPER}} .wps-countdown .wps_date' => 'width: {{SIZE}}{{UNIT}};',
                        ]
                    
                    ]
                );   

  $this->add_control( 'wps_counter_height',
                    [
                        'label' => esc_html__( 'Height',  'wpsection' ),
						 'condition'    => array( 'show_countdown' => '1' ),
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
                            '{{WRAPPER}} .wps-countdown .wps_date' => 'height: {{SIZE}}{{UNIT}};',
                        ]
                    
                    ]
                ); 


    $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'wps_counter_typography',
				 'condition'    => array( 'show_countdown' => '1' ),
                'label'    => __( 'Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps-countdown .wps_date',
            )
        );        
$this->add_control(
            'wps_counter_color',
            array(
                'label'     => __( 'Counter Color', 'wpsection' ),
				 'condition'    => array( 'show_countdown' => '1' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
    
                'selectors' => array(
                    '{{WRAPPER}}   .wps-countdown .wps_date' => 'color: {{VALUE}} !important',

                ),
            )
        );

$this->add_control(
            'wps_counter_bg_color',
            array(
                'label'     => __( 'Background Color', 'wpsection' ),
				 'condition'    => array( 'show_countdown' => '1' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}}  .wps-countdown .wps_date' => 'background: {{VALUE}} !important',
                ),
            )
        );  

        
    $this->add_control(
            'wps_counter_padding',
            array(
                'label'     => __( 'Padding', 'wpsection' ),
				 'condition'    => array( 'show_countdown' => '1' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}}  .wps-countdown .wps_date' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

    $this->add_control(
            'wps_counter_margin',
            array(
                'label'     => __( 'Margin', 'wpsection' ),
				 'condition'    => array( 'show_countdown' => '1' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}}  .wps-countdown .wps_date' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

      $this->add_control(
            'wps_counter_area_margin',
            array(
                'label'     => __( 'Area Margin', 'wpsection' ),
				 'condition'    => array( 'show_countdown' => '1' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}}  .wps_offer_count' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            array(
                'name' => 'wps_counter_border',
				 'condition'    => array( 'show_countdown' => '1' ),
                'selector' => '{{WRAPPER}}  .wps-countdown .wps_date ',
            )
        );
    

        $this->add_control(
            'wps_counter_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
				 'condition'    => array( 'show_countdown' => '1' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}} .wps-countdown .wps_date' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );


            $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_counter_shadow',
                 'condition'    => array( 'show_countdown' => '1' ),
                'label' => esc_html__( 'Counter Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps-countdown .wps_date',
            ]
        );
        
        $this->end_controls_section();  