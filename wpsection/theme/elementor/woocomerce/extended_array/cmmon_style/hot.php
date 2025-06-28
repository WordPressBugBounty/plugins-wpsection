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


        
//Hot/Sale Button 888  ============

// ======================================Hot offe==============================================


$this->start_controls_section(
            'hot_button_control',
            array(
                'label' => __( 'Discount Settings', 'wpsection' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                
            )
        );
        

        $this->add_control(
                'show_hot',
               array(
                    'label' => __( 'Show Hot Tag', 'wpsection' ),
				 
                     'description'       => __( 'This will hide Total Area', 'wpsection' ),
                    'type'     => \Elementor\Controls_Manager::SWITCHER,
                     'return_value' => '1',
                     'default'      => '1',
                    'placeholder' => __( 'Show Hot Tag', 'wpsection' ),
                )
            );




            $this->add_control(
            'hot_text',
            array(
                'label'       => __( 'Hot/Sale Text', 'wpsection' ),
                  'condition'    => array( 'show_hot' => '1' ),
                 'description'       => __( 'Check Product Meta for change Text.This is Default.', 'wpsection' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'dynamic'     => [
                    'active' => true,
                ],
                'placeholder' => __( 'Hot/Sale', 'wpsection' ),
             
            )
        );




          $this->add_control(
                'show_hot_percent',
               array(
                    'label' => __( 'Show Hot Percent', 'wpsection' ),
				     'condition'    => array( 'show_hot' => '1' ),
                     'description'       => __( 'This will hide Only Percentage Area', 'wpsection' ),
                    'type'     => \Elementor\Controls_Manager::SWITCHER,
                     'return_value' => '1',
                     'default'      => '1',
                    'placeholder' => __( 'Show Hot Percent', 'wpsection' ),
                      'separator' => 'after'
                )
            );



     
        $this->add_control(
                    'hot_button_alingment',
                    array(
                        'label' => esc_html__( 'Alignment', 'wpsection' ),
                        'type' => \Elementor\Controls_Manager::CHOOSE,
                        'condition'    => array( 'show_hot' => '1' ),
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
                        'default' => 'left',
                        'toggle' => true,
                        'selectors' => array(
                            '{{WRAPPER}} .mr_hot' => 'text-align: {{VALUE}} !important',
                        ),
                    )
                );  

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'hot_button_typography',
              'condition'    => array( 'show_hot' => '1' ),
                'label'    => __( 'Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}} .mr_hot .hot_text',
            )
        );      
        $this->add_control(
                    'hot_button_color',
                    array(
                        'label'     => __( 'Button Color', 'wpsection' ),
                       'condition'    => array( 'show_hot' => '1' ),
                        'type'      => \Elementor\Controls_Manager::COLOR,
                        'selectors' => array(
                            '{{WRAPPER}} .mr_hot .hot_text' => 'color: {{VALUE}} !important',

                        ),
                    )
                );
        $this->add_control(
                    'hot_button_bg_color',
                    array(
                        'label'     => __( 'Background Color', 'wpsection' ),
                          'condition'    => array( 'show_hot' => '1' ),
                        'type'      => \Elementor\Controls_Manager::COLOR,
                        'selectors' => array(
                            '{{WRAPPER}} .mr_hot .hot_text' => 'background: {{VALUE}} !important',
                        ),
                    )
                );  
            
    $this->add_control(
            'hot_button_padding',
            array(
                'label'     => __( 'Padding', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
               'condition'    => array( 'show_hot' => '1' ),
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}} .mr_hot .hot_text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            ) 
        );

    $this->add_control(
            'hot_button_margin',
            array(
                'label'     => __( 'Margin', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                 'condition'    => array( 'show_hot' => '1' ),
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .mr_hot .hot_text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );
        

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            array(
                'name' => 'hot_border',
                 'condition'    => array( 'show_hot' => '1' ),
                'selector' => '{{WRAPPER}} .mr_hot .hot_text',
            )
        );

        $this->add_control(
            'hot_border_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
              'condition'    => array( 'show_hot' => '1' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .mr_hot .hot_text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'hot_shadow',
              'condition'    => array( 'show_hot' => '1' ),
                'label' => esc_html__( 'Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .mr_hot .hot_text',
            ]
        );

        
        
    
        
        $this->end_controls_section();
        
//End of hot Button
//Special Offer Button 


// ======================================Special Offer ==============================================



$this->start_controls_section(
            'spcl_button_control',
            array(
                'label' => __( 'Special Discount Settings', 'wpsection' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                
            )
        );
        

 


        $this->add_control(
                'show_spcl',
               array(
                    'label' => __( 'Special Offer Tag', 'wpsection' ),
				    
                     'description'       => __( 'This will hide Total Area', 'wpsection' ),
                    'type'     => \Elementor\Controls_Manager::SWITCHER,
                     'return_value' => '1',
                     'default'      => '1',
                    'placeholder' => __( 'Show Special Offer', 'wpsection' ),
                )
            );
/*
       $this->add_control(
            'spcl_text',
            array(
                'label'       => __( 'Special Offer Text', 'wpsection' ),
				  'condition'    => array( 'show_spcl' => '1' ),
                 'description'       => __( 'Check Product Meta for change Text.This is Default.', 'wpsection' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'dynamic'     => [
                    'active' => true,
                ],
                'placeholder' => __( 'Hot/Sale', 'wpsection' ),
             
            )
        );
       */ 
        $this->add_control(
                    'spcl_button_alingment',
                    array(
                        'label' => esc_html__( 'Alignment', 'wpsection' ),
                        'type' => \Elementor\Controls_Manager::CHOOSE,
                           'condition'    => array( 'show_spcl' => '1' ),
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
                        'default' => 'left',
                        'toggle' => true,
                        'selectors' => array(
                            '{{WRAPPER}} .mr_spcl' => 'text-align: {{VALUE}} !important',
                        ),
                    )
                );  

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'spcl_button_typography',
                  'condition'    => array( 'show_spcl' => '1' ),
                'label'    => __( 'Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}} .mr_spcl .spcl_text',
            )
        );      
        $this->add_control(
                    'spcl_button_color',
                    array(
                        'label'     => __( 'Button Color', 'wpsection' ),
                            'condition'    => array( 'show_spcl' => '1' ),
                        'type'      => \Elementor\Controls_Manager::COLOR,
                        'selectors' => array(
                            '{{WRAPPER}} .mr_spcl .spcl_text' => 'color: {{VALUE}} !important',

                        ),
                    )
                );
        $this->add_control(
                    'spcl_button_bg_color',
                    array(
                        'label'     => __( 'Background Color', 'wpsection' ),
                         'condition'    => array( 'show_spcl' => '1' ),
                        'type'      => \Elementor\Controls_Manager::COLOR,
                        'selectors' => array(
                            '{{WRAPPER}} .mr_spcl .spcl_text' => 'background: {{VALUE}} !important',
                        ),
                    )
                );  
            
    $this->add_control(
            'spcl_button_padding',
            array(
                'label'     => __( 'Padding', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                   'condition'    => array( 'show_spcl' => '1' ),
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}} .mr_spcl .spcl_text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            ) 
        );

    $this->add_control(
            'spcl_button_margin',
            array(
                'label'     => __( 'Margin', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'condition'    => array( 'show_spcl' => '1' ),
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .mr_spcl .spcl_text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );
        

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            array(
                'name' => 'spcl_border',
                    'condition'    => array( 'show_spcl' => '1' ),
                'selector' => '{{WRAPPER}} .mr_spcl .spcl_text',
            )
        );

        $this->add_control(
            'spcl_border_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
                   'condition'    => array( 'show_spcl' => '1' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .mr_spcl .spcl_text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'spcl_shadow',
                'condition'    => array( 'show_spcl' => '1' ),
                'label' => esc_html__( 'Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .mr_spcl .spcl_text',
            ]
        );

        
        
    
        
        $this->end_controls_section();