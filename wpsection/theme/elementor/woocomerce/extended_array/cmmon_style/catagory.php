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


 // ======================================= Product catargory =======================



//Catgory text Settings 
   $this->start_controls_section(
            'product_cat_x_settings',
            array(
                'label' => __( 'Catagory  Setting', 'wpsection' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
      
            )
        );
        
          $this->add_control(
                'show_product_cat_features',
               array(
                    'label' => __( 'Show Catagory', 'wpsection' ),
                    'type'     => \Elementor\Controls_Manager::SWITCHER,
                     'return_value' => '1',
                     'default'      => '0',
                    'placeholder' => __( 'Show Catagory', 'wpsection' ),
                )
            );
     $this->add_control(
            'position_order_nine',
            array(
                'label' => __( 'Position Order Settings', 'wpsection' ),
                'type' => \Elementor\Controls_Manager::SELECT,
             
			'condition' => [
            'show_product_cat_features' => '1',
       
        ],
                'default' => '9',
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
			'hr_cat_titles',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
				'condition' => [
            'show_product_cat_features' => '1',
 
        ],
			]
		);
    $this->add_control(
            'show_cat_x_title',
            array(
                'label' => esc_html__( 'Hide Title', 'wpsection' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
					'condition' => [
            'show_product_cat_features' => '1',
 
        ],
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
                    '{{WRAPPER}} .wps_cat_title' => 'display: {{VALUE}} !important',
                ),
            )
        );  




    $this->add_control(
            'catx_title_padding',
            array(
                'label'     => __( 'Padding', 'wpsection' ),
            
					'condition' => [
            'show_product_cat_features' => '1',
            'show_cat_x_title' => 'show'
        ],
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}} .wps_cat_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

       $this->add_control(
            'catx_title_margin',
            array(
                'label'     => __( 'Margin', 'wpsection' ),
            		'condition' => [
            'show_product_cat_features' => '1',
            'show_cat_x_title' => 'show'
        ],
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}} .wps_cat_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'carx_itle_typography',
               		'condition' => [
            'show_product_cat_features' => '1',
            'show_cat_x_title' => 'show'
        ],
                'label'    => __( 'Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_cat_title',
            )
        );

        $this->add_control(
            'catx_title_color',
            array(
                'label'     => __( 'Color', 'wpsection' ),
               		'condition' => [
            'show_product_cat_features' => '1',
            'show_cat_x_title' => 'show'
        ],
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_cat_title' => 'color: {{VALUE}} !important',
        
                ),
            )
        );
    $this->add_control(
            'catx_title_bg_color',
            array(
                'label'     => __( 'Bg Color', 'wpsection' ),
               		'condition' => [
            'show_product_cat_features' => '1',
            'show_cat_x_title' => 'show'
        ],
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_cat_title' => 'background: {{VALUE}} !important',
        
                ),
            )
        );
 
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            array(
                'name' => 'cat_area_title_border',
    
							'condition' => [
            'show_product_cat_features' => '1',
         
        ],
                'selector' => '{{WRAPPER}} .wps_cat_title',
            )
        );
                
            $this->add_control(
            'cat_area_title_border_radius',
            array(
                'label'     => __( 'Cat Area Border Radius', 'wpsection' ),
       
			'condition' => [
            'show_product_cat_features' => '1',
            'show_thumbnail' => 'show'
        ],
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .wps_cat_title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );  



 	$this->add_control(
			'hr_cat',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
				     	'condition' => [
            'show_product_cat_features' => '1',
 
        ],
			]
		);

        
        
    $this->add_control(
            'show_cat_n_title',
            array(
                'label' => esc_html__( 'Show Number', 'wpsection' ),
						'condition' => [
            'show_product_cat_features' => '1',
       
        ],
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
                    '{{WRAPPER}} .wps_cat_number' => 'display: {{VALUE}} !important',
                ),
            )
        );  

      $this->add_control(
        'cat_postion_style',
        [
            'label'   => esc_html__( 'Select Number Style', 'wpsection' ),
					'condition' => [
            'show_product_cat_features' => '1',
      
        ],
            'type'    => Controls_Manager::SELECT,
            'default' => 'style-1',
            'options' => array(
                'style-1'   => esc_html__( 'Next to Text', 'wpsection' ),
                'style-2'   => esc_html__( 'Next Line ', 'wpsection' ),
            
            ),
        ]
    );

    $this->add_control(
            'title_catn_alingment',
            array(
                'label' => esc_html__( 'Number Alignment', 'wpsection' ),
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
            'show_product_cat_features' => '1',
            'cat_postion_style' => 'style-2'
        ],
                'toggle' => true,
                'selectors' => array(
                
                    '{{WRAPPER}} .wps_cat_number' => 'text-align: {{VALUE}} !important',
                ),
            )
        );          


    $this->add_control(
            'catn_title_padding',
            array(
                'label'     => __( 'Padding', 'wpsection' ),
    
		'condition' => [
            'show_product_cat_features' => '1',
            'show_cat_n_title' => 'show'
        ],
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}} ..wps_cat_number' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

       $this->add_control(
            'catn_title_margin',
            array(
                'label'     => __( 'Margin', 'wpsection' ),
            
				
		'condition' => [
            'show_product_cat_features' => '1',
            'show_cat_n_title' => 'show'
        ],
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}} .wps_cat_number' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'catn_itle_typography',
          
				'condition' => [
            'show_product_cat_features' => '1',
            'show_cat_n_title' => 'show'
        ],
                'label'    => __( 'Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_cat_number',
            )
        );

        $this->add_control(
            'catn_title_color',
            array(
                'label'     => __( 'Color', 'wpsection' ),
           
				'condition' => [
            'show_product_cat_features' => '1',
            'show_cat_n_title' => 'show'
        ],
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_cat_number' => 'color: {{VALUE}} !important',
        
                ),
            )
        );
 	$this->add_control(
			'hr_cat_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

$this->add_control(
            'show_catx_thumbnail',
            array(
                'label' => esc_html__( 'Show Cat Image', 'wpsection' ),
				'condition' => [
            'show_product_cat_features' => '1',

        ],
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
                    '{{WRAPPER}} .wps_cat_img' => 'display: {{VALUE}} !important',
                ),
            )
        );      
    $this->add_control( 'thumb_cat_width',
                    [
                        'label' => esc_html__( 'Width',  'wpsection' ),
						'condition' => [
            'show_product_cat_features' => '1',

        ],
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 300,
                                'step' => 1,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        
                        'selectors' => [
                            '{{WRAPPER}} .wps_cat_img img' => 'width: {{SIZE}}{{UNIT}};',
                        ]
                    
                    ]
                );
        
      $this->add_control(
        'thumb_cat_postion_style',
        [
            'label'   => esc_html__( 'Select Style', 'wpsection' ),
			'condition' => [
            'show_product_cat_features' => '1',
       
        ],
            'type'    => Controls_Manager::SELECT,
            'default' => 'style-1',
            'options' => array(
                'style-1'   => esc_html__( 'Next to Text', 'wpsection' ),
                'style-2'   => esc_html__( 'Next Line ', 'wpsection' ),
            
            ),
        ]
    );


    $this->add_control(
            'thumb_cat_alingment',
            array(
                'label' => esc_html__( 'Alignment', 'wpsection' ),
				'condition' => [
            'show_product_cat_features' => '1',
            'thumb_cat_postion_style' => 'style-2'
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
                'default' => 'center',
            
                'toggle' => true,
                'selectors' => array(
                
                    '{{WRAPPER}} .wps_cat_thumb ' => 'text-align: {{VALUE}} !important',
                ),
            )
        );          

    $this->add_control(
            'thumbnail_catx_padding',
            array(
                'label'     => __( 'Padding', 'wpsection' ),
					'condition' => [
            'show_product_cat_features' => '1',
         
        ],
            
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
        
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}} .wps_cat_img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

    $this->add_control(
            'thumbnail_catx_margin',
            array(
                'label'     => __( 'Margin', 'wpsection' ),
              
					'condition' => [
            'show_product_cat_features' => '1',
            'show_thumbnail' => 'show'
        ],
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
            
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .wps_cat_img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );


        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            array(
                'name' => 'thumbnail_catx_border',
    
							'condition' => [
            'show_product_cat_features' => '1',
            'show_thumbnail' => 'show'
        ],
                'selector' => '{{WRAPPER}} .wps_cat_img',
            )
        );
                
            $this->add_control(
            'thumbnail_catx_border_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
       
			'condition' => [
            'show_product_cat_features' => '1',
            'show_thumbnail' => 'show'
        ],
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .wps_cat_img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );  

// Catagory Reaa Setting 
 	$this->add_control(
			'hr_cat_2_area',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

    $this->add_control(
            'title_catx_alingment',
            array(
                'label' => esc_html__( 'Alignment', 'wpsection' ),
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
                'default' => 'flex-start',
              	'condition' => [
            'show_product_cat_features' => '1',
 
        ],
                'toggle' => true,
                'selectors' => array(
                
                    '{{WRAPPER}} .wps_cat' => 'justify-content: {{VALUE}} !important',
                ),
            )
        ); 

    $this->add_control( 'cat_area_catx_width',
                    [
                        'label' => esc_html__( 'Width',  'wpsection' ),
						'condition' => [
            'show_product_cat_features' => '1',

        ],
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 300,
                                'step' => 1,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        
                        'selectors' => [
                            '{{WRAPPER}} .wps_cat' => 'width: {{SIZE}}{{UNIT}};',
                        ]
                    
                    ]
                );


  $this->add_control(
            'cat_area_catx_padding',
            array(
                'label'     => __( 'Cat Area Padding', 'wpsection' ),
					'condition' => [
            'show_product_cat_features' => '1',
        ],
            
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
        
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}} .wps_cat' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

    $this->add_control(
            'cat_area_catx_margin',
            array(
                'label'     => __( 'Cat Area Margin', 'wpsection' ),
              
					'condition' => [
            'show_product_cat_features' => '1',
        
        ],
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
            
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .wps_cat' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );


        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            array(
                'name' => 'cat_area_catx_border',
    
							'condition' => [
            'show_product_cat_features' => '1',
         
        ],
                'selector' => '{{WRAPPER}} .wps_cat',
            )
        );
                
            $this->add_control(
            'cat_area_catx_border_radius',
            array(
                'label'     => __( 'Cat Area Border Radius', 'wpsection' ),
       
			'condition' => [
            'show_product_cat_features' => '1',
            'show_thumbnail' => 'show'
        ],
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .wps_cat' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );  
	
	
	


        $this->end_controls_section();
//Catagr thumbnail Settings    