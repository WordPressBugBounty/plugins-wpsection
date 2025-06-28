<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;

// ================= Product Rating Section ===================

$this->start_controls_section(
    'product_rating_setting',
    [
        'label' => __('Product Rating Setting', 'wpsection'),
        'tab'   => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'show_product_x_rating',
    [
        'label'        => __('Show Rating Area', 'wpsection'),
        'type'         => Controls_Manager::SWITCHER,
        'default'      => '1',
        'return_value' => '1',
    ]
);





$this->add_control(
    'position_order_two',
    [
        'label'     => __('Position Order Settings', 'wpsection'),
        'type'      => Controls_Manager::SELECT,
        'condition' => ['show_rating' => 'show'],
		 'condition' => [
            'show_product_x_rating' => '1',
        
        ],
        'default'   => '2',
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
    ]
);


$this->add_control(
    'product_rating_alingment',
    [
        'label'     => esc_html__('Alignment', 'wpsection'),
        'type'      => Controls_Manager::CHOOSE,
         'condition' => [
            'show_product_x_rating' => '1',
        
        ],
        'options'   => [
            'left'   => ['title' => esc_html__('Left', 'wpsection'), 'icon' => 'eicon-text-align-left'],
            'center' => ['title' => esc_html__('Center', 'wpsection'), 'icon' => 'eicon-text-align-center'],
            'right'  => ['title' => esc_html__('Right', 'wpsection'), 'icon' => 'eicon-text-align-right'],
        ],
        'default'   => 'center',
        'toggle'    => true,
        'selectors' => ['{{WRAPPER}} .mr_rating' => 'text-align: {{VALUE}} !important'],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name'      => 'product_rating_typography',
        'label'     => __('Product Rating Typography', 'wpsection'),
      'condition' => [
            'show_product_x_rating' => '1',
        
        ],
        'selector'  => '{{WRAPPER}} .mr_star_rating li i',
    ]
);

$this->add_control(
    'product_rating_color',
    [
        'label'     => __('Rating Color', 'wpsection'),
        'type'      => Controls_Manager::COLOR,
     'condition' => [
            'show_product_x_rating' => '1',
        
        ],
        'selectors' => ['{{WRAPPER}} .mr_star_rating li i' => 'color: {{VALUE}} !important'],
    ]
);

$this->add_control(
    'product_rating_margin',
    [
        'label'      => __('Product Rating Padding', 'wpsection'),
        'type'       => Controls_Manager::DIMENSIONS,
       'condition' => [
            'show_product_x_rating' => '1',
        
        ],
        'size_units' => ['px', '%', 'em'],
        'selectors'  => ['{{WRAPPER}} .mr_star_rating' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important'],
    ]
);

$this->add_control(
    'show_avarage_rating_x',
    [
        'label'        => __('Show Rating Text', 'wpsection'),
		 'condition' => [
            'show_product_x_rating' => '1',
        
        ],
        'type'         => Controls_Manager::SWITCHER,
        'default'      => '1',
        'return_value' => '1',
    ]
);

$this->add_control(
    'review_text_x',
    [
        'label'     => __('Review Text', 'wpsection'),
		 'condition' => [
            'show_product_x_rating' => '1',
        
        ],
        'type'      => Controls_Manager::TEXT,
        'default'   => __('Review', 'wpsection'),
        'dynamic'   => ['active' => true],
    ]
);


$this->add_control(
    'product_avarage_rating_location',
    [
        'label'     => esc_html__('Location', 'wpsection'),
		 'condition' => [
            'show_product_x_rating' => '1',
        ],
        'type'      => Controls_Manager::CHOOSE,
        'options'   => [
            'wps_inline_block' => [
                'title' => esc_html__('Right of Rating', 'wpsection'),
                'icon'  => 'eicon-h-align-right',
            ],
            'wps_inline' => [
                'title' => esc_html__('Bottom of Rating', 'wpsection'),
                'icon'  => 'eicon-v-align-bottom',
            ],
        ],
        'default' => 'wps_inline_block',
        'toggle'  => true,
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name'      => 'product_avarage_rating_typography',
        'label'     => __('Product Average Typography', 'wpsection'),
        'condition' => [
            'show_product_x_rating' => '1',
        ],
        'selector'  => '{{WRAPPER}} .mr_review_number',
    ]
);

$this->add_control(
    'product_avarage_rating_color',
    [
        'label'     => __('Color', 'wpsection'),
        'type'      => Controls_Manager::COLOR,
        'condition' => [
            'show_product_x_rating' => '1',
        ],
        'selectors' => ['{{WRAPPER}} .mr_review_number' => 'color: {{VALUE}} !important'],
    ]
);

$this->add_control(
    'product_avarage_rating_margin',
    [
        'label'      => __('Area Margin', 'wpsection'),
        'type'       => Controls_Manager::DIMENSIONS,
        'condition' => [
            'show_product_x_rating' => '1',
        ],
        'size_units' => ['px', '%', 'em'],
        'selectors'  => ['{{WRAPPER}} .mr_rating' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important'],
    ]
);



$this->end_controls_section();
