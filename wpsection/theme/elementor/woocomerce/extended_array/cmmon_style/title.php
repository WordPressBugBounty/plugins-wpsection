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


////============= Product Item  Title=======================



    $this->start_controls_section(
            'product_title_x_settings',
            array(
                'label' => __( 'Product Title Setting', 'wpsection' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
             
            )
        );
        
    
        $this->add_control(
                'show_product_title',
               array(
                    'label' => __( 'Hide Title Area', 'wpsection' ),
                    'type'     => \Elementor\Controls_Manager::SWITCHER,
                     'return_value' => '1',
                     'default'      => '1',
                    'placeholder' => __( 'Show', 'wpsection' ),
                )
            );

    $this->add_control(
            'position_order_one',
            array(
                'label' => __( 'Position Order Settings', 'wpsection' ),
				      'condition' => [
            'show_product_title' => '1',
      
        ],
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '1',
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
            'title_alingment',
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
            'show_product_title' => '1',
      
        ],
                'toggle' => true,
                'selectors' => array(
                
                    '{{WRAPPER}} .mr_product_title h2' => 'text-align: {{VALUE}} !important',
                ),
            )
        );          


    $this->add_control(
            'title_padding',
            array(
                'label'     => __( 'Padding', 'wpsection' ),
                       'condition' => [
            'show_product_title' => '1',
       
        ],
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}} .mr_product_title h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

       $this->add_control(
            'title_margin',
            array(
                'label'     => __( 'Margin', 'wpsection' ),
                      'condition' => [
            'show_product_title' => '1',
       
        ],
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}} .mr_product_title h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'title_typography',
                     'condition' => [
            'show_product_title' => '1',
       
        ],
                'label'    => __( 'Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}} .mr_product_title h2',
            )
        );



        $this->add_control(
            'title_color',
            array(
                'label'     => __( 'Color', 'wpsection' ),
                   'condition' => [
            'show_product_title' => '1',
        
        ],
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .mr_product_title h2' => 'color: {{VALUE}} !important',
        
                ),
            )
        );


        $this->add_control(
            'title_bg_color',
            array(
                'label'     => __( 'Bg Color', 'wpsection' ),
                      'condition' => [
            'show_product_title' => '1',
      
        ],
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .mr_product_title h2' => 'background: {{VALUE}} !important',
        
                ),
            )
        );

    $this->add_control(
            'title_hover_color',
            array(
                'label'     => __( 'Hover Color', 'wpsection' ),
                     'condition' => [
            'show_product_title' => '1',
       
        ],
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .mr_product_title h2:hover' => 'background: {{VALUE}} !important',
                ),
            )
        );

        $this->add_control(
            'title_color_hover',
            array(
                'label'     => __( 'Color Hover', 'wpsection' ),
                       'condition' => [
            'show_product_title' => '1',
   
        ],
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .mr_product_title h2:hover' => 'color: {{VALUE}} !important',
        
                ),
            )
        );

       $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'title_block_border',
                         'condition' => [
            'show_product_title' => '1',
     
        ],
                'label' => esc_html__( 'Box Border', 'wpsection' ),
                'selector' => '{{WRAPPER}} .mr_product_title h2',
            ]
        );
                
         $this->add_control(
            'title_border_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
                     'condition' => [
            'show_product_title' => '1',
         
        ],
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .mr_product_title h2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );


 


        $this->end_controls_section();
    
                    
//End of  Title     ==================  