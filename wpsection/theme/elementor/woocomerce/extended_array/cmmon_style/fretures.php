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



 // ======================================= Product Features  Text =======================

    $this->start_controls_section(
            'product_features_x_settings',
            array(
                'label' => __( 'Features Text Setting', 'wpsection' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
          
            )
        );
        
          $this->add_control(
                'show_product_features',
               array(
                    'label' => __( 'Show Features Text', 'wpsection' ),
                    'type'     => \Elementor\Controls_Manager::SWITCHER,
                     'return_value' => '1',
                     'default'      => '0',
                    'placeholder' => __( 'Show Features Text', 'wpsection' ),
                )
            );
  


     $this->add_control(
            'position_order_seven',
            array(
                'label' => __( 'Position Order Settings', 'wpsection' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'condition'    => array( 'show_product_features' => '1' ),
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
            'title_f_alingment_x',
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
                   'condition'    => array( 'show_product_features' => '1' ),
                'toggle' => true,
                'selectors' => array(
                
                    '{{WRAPPER}} .wps_meta_text ul li' => 'text-align: {{VALUE}} !important',
					'{{WRAPPER}} .wps_meta_text' => 'text-align: {{VALUE}} !important',
                ),
            )
        );          


$this->add_control(
    'title_f_padding',
    array(
        'label'      => __( 'Padding', 'wpsection' ),
            'condition'    => array( 'show_product_features' => '1' ),
        'type'       => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em'],
        'selectors'  => array(
            '{{WRAPPER}} .wps_meta_text li'    => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
            '{{WRAPPER}} .wps_meta_text'       => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
        ),
    )
);


$this->add_control(
    'title_f_margin',
    array(
        'label'      => __( 'Margin', 'wpsection' ),
           'condition'    => array( 'show_product_features' => '1' ),
        'type'       => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em'],
        'selectors'  => array(
            '{{WRAPPER}} .wps_meta_text li'    => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
            '{{WRAPPER}} .wps_meta_text'       => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
        ),
    )
);


$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    array(
        'name'      => 'title_f_typography',
            'condition'    => array( 'show_product_features' => '1' ),
        'label'     => __( 'Typography', 'wpsection' ),
        'selector'  => '{{WRAPPER}} .wps_meta_text, {{WRAPPER}} .wps_meta_text li',
    )
);


$this->add_control(
    'title_f_color',
    array(
        'label'      => __( 'Color', 'wpsection' ),
            'condition'    => array( 'show_product_features' => '1' ),
        'type'       => \Elementor\Controls_Manager::COLOR,
        'selectors'  => array(
            '{{WRAPPER}} .wps_meta_text'    => 'color: {{VALUE}} !important',
            '{{WRAPPER}} .wps_meta_text li' => 'color: {{VALUE}} !important',
        ),
    )
);


 $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'block_fe_li_border',
                  'condition'    => array( 'show_product_features' => '1' ),
                'label' => esc_html__( 'Box Border Expand Bottom', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_meta_text li',
            ]
        );



        $this->end_controls_section();
          
//end of title 