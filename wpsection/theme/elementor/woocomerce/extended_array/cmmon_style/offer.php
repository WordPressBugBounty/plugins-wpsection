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



   
//===============================Offer Text ======================================

   $this->start_controls_section(
            'product_offerx_settings',
            array(
                'label' => __( 'Offer Text Setting', 'wpsection' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
    
            )
        );
       $this->add_control(
                'show_offer_x_event',
                array(
                    'label' => __( 'Show Offer Text', 'wpsection' ),
                    'type'     => \Elementor\Controls_Manager::SWITCHER,
                    'return_value' => '1',
                    'default'      => '0',
                    'placeholder' => __( 'Show Offer Text', 'wpsection' ),
                     'separator' => 'after'
                )
            );      
       
    $this->add_control(
            'position_order_ten',
            array(
                'label' => __( 'Position Order Settings', 'wpsection' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'condition'    => array( 'show_offer_x_event' => '1' ),
                'default' => '7',
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
            'title_offerx_alingment',
            array(
                'label' => esc_html__( 'Alignment', 'wpsection' ),
				 'condition' => [
            'show_offer_x_event' => '1',
         
        ],
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
                'default' => 'left',
         
                'toggle' => true,
                'selectors' => array(
                
                    '{{WRAPPER}} .wps_offer_text' => 'text-align: {{VALUE}} !important',
                ),
            )
        );          


    $this->add_control(
            'offerx_padding',
            array(
                'label'     => __( 'Padding', 'wpsection' ),
               
						 'condition' => [
            'show_offer_x_event' => '1',
        
        ],
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}} .wps_offer_text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

       $this->add_control(
            'cofferx_margin',
            array(
                'label'     => __( 'Margin', 'wpsection' ),
          
						 'condition' => [
            'show_offer_x_event' => '1',
     
        ],
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}} .wps_offer_text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'offerx_typography',
        		 'condition' => [
            'show_offer_x_event' => '1',
    
        ],
                'label'    => __( 'Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_offer_text p',
            )
        );

        $this->add_control(
            'offerx_color',
            array(
                'label'     => __( 'Color', 'wpsection' ),
               		 'condition' => [
            'show_offer_x_event' => '1',
    
        ],
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_offer_text p' => 'color: {{VALUE}} !important',
        
                ),
            )
        );

        $this->end_controls_section();
    
        