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



//========== Thumbnail ===================================

// bosch  888
$this->start_controls_section(
            'thumbnail_control',
            array(
                'label' => __( 'Thumbanil Settings', 'wpsection' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            )
        );
        
$this->add_control(
            'show_thumbnail',
            array(
                'label' => esc_html__( 'Show Button', 'wpsection' ),
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
                    '{{WRAPPER}} .mr_product_thumb' => 'display: {{VALUE}} !important',
                ),
            )
        );   

 

     // Adding control in Elementor
    $this->add_control(
        'show_block_column_slide_nav',
        array(
            'label' => __( 'Hide Dot/Color', 'wpsection' ),
			 'condition'    => array( 'show_thumbnail' => 'show' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'condition' => array('show_product_x_thumbnail' => '1'),
            'return_value' => '1',
            'default' => '1',
            'placeholder' => __( 'Hide Slide Dot/Nav', 'wpsection' ),
            'description' => __( 'This will disable the dot or nav in the block', 'wpsection' ),
        )
    );

 $this->add_control(
            'wps_product_color_dot',
            array(
                'label' => __( 'Product Slide Nav ', 'wpsection' ),
                 'condition'    => array( 'show_thumbnail' => 'show' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'product_dot',
                'description' => __( 'Set Style of dot from Sytle ', 'wpsection' ),
                'options' => [
                    'product_dot'  => __( 'Dot Color Defult', 'wpsection' ),
                    'product_color' => __( 'Color Form Meta', 'wpsection' ),
               
                ],
            )
        );


$this->add_control(
			'slider_prodcut_m_show_dot_x',
			array(
				'label' => esc_html__( 'Show Hove Slide Dot', 'wpsection' ),
				 'condition'    => array( 'show_thumbnail' => 'show' ),
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
					'{{WRAPPER}} .wps_thumbnail_area .product_block_one .hover-slider-indicator' => 'display: {{VALUE}} !important',
				),
			)
		);		
  
//
 $this->add_control(
            'wps_thumbnial_bgcolor_select',
            array(
                'label' => __( 'Thumbnail Background Select', 'wpsection' ),
                'condition'    => array( 'show_thumbnail' => 'show' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'bg_elementor',
                'description' => __( 'Select Background Color Options', 'wpsection' ),
                'options' => [
                    'bg_meta'  => __( 'Meta Backgorund', 'wpsection' ),
                    'bg_elementor' => __( 'Elemntor Backgorund', 'wpsection' ),
                    'bg_none' => __( 'No Backgorund', 'wpsection' ),
                
               
                ],
            )
        );

		


$this->add_control(
			'wps_thumbnail_bg',
			array(
			'label'     => __( 'Thumbnail BG Color', 'wpsection' ),
			 'condition'    => array( 'wps_thumbnial_bgcolor_select' => 'bg_elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				
			)
		);
    $this->add_control(
            'thumbnail_padding',
            array(
                'label'     => __( 'Padding', 'wpsection' ),
             'condition'    => array( 'show_thumbnail' => 'show' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
        
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}} .mr_product_thumb' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );


  $this->add_control(
            'wps_thumbnail_width',
            [
                'label' => esc_html__( 'Image Width ', 'wpsection' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'condition' => array('show_product_x_thumbnail' => '1'),
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
                'default' => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .mr_product_block img,.mr_product_block .flip-box-front' => 'max-width: {{SIZE}}{{UNIT}}!important;',
                    
                ],
            ]
        );  

  $this->add_control(
            'wps_thumbnail_height',
            [
                'label' => esc_html__( 'Max Image Height ', 'wpsection' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'condition' => array('show_product_x_thumbnail' => '1'),
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
                'default' => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .mr_product_block img,.mr_product_block .flip-box-front' => 'max-height: {{SIZE}}{{UNIT}}!important;',
                    
                ],
            ]
        );  




    $this->add_control(
            'thumbnail_x_margin',
            array(
                'label'     => __( 'Margin', 'wpsection' ),
                    'condition'    => array( 'show_thumbnail' => 'show' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
            
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .mr_product_thumb' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );


        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            array(
                'name' => 'thumbnail_border',
                    'condition'    => array( 'show_thumbnail' => 'show' ),
                'selector' => '{{WRAPPER}} .mr_product_thumb',
            )
        );
                
            $this->add_control(
            'thumbnail_border_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
                'condition'    => array( 'show_thumbnail' => 'show' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .mr_product_thumb' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );  
        $this->end_controls_section();
        
//End of Thumbnail 
