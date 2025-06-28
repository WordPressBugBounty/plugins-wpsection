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


//==================================Thumbnail Setting =====================================
    $this->start_controls_section(
                    'product_x_thumb_settings',
                    [
                        'label' => __( 'Thumbnail Settings', 'wpsection' ),
                        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    ]
                ); 

$this->add_control(
            'show_thumbnaili_view_setting',
            array(
                'label' => __( 'Thumbnail Options Settings', 'wpsection' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                 'condition' => array('show_product_x_thumbnail' => '1'),
                'default' => 'thumbnai_meta_optins',
                'description' => __( 'Meta set diffrent Style / Elemntor set SAME fol All', 'wpsection' ),
                'options' => [
                    'thumbnai_meta_optins'  => __( 'Meta Thumbnail Settings', 'wpsection' ),
                    'thumbnai_elementor_optins' => __( 'Elemntor Thumbnail Settings', 'wpsection' ),
                
               
                ],
            )
        );


  $this->add_control(
            'wps_thumbnial_select',
            array(
                'label' => __( 'Thumbnail Style Settings', 'wpsection' ),
                'condition'    => array( 'show_thumbnaili_view_setting' => 'thumbnai_elementor_optins' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'thumbnail',
                'description' => __( 'If Option not found fallback  is Thumbnail', 'wpsection' ),
                'options' => [
                    'thumbnail'  => __( 'Thumbnail', 'wpsection' ),
                    'meta' => __( 'Meta Image', 'wpsection' ),
                    'meta_flip' => __( 'Meta Flip Image', 'wpsection' ),
                    'slide_number' => __( 'Slide Number', 'wpsection' ),
                    'hover_slide' => __( 'Hover Slides', 'wpsection' ),
               
                ],
            )
        );







         $this->add_control(
                'show_product_x_thumbnail',
               array(
                    'label' => __( 'Hide Thumbnail', 'wpsection' ),
                    'type'     => \Elementor\Controls_Manager::SWITCHER,
                     'return_value' => '1',
                     'default'      => '1',
                    'placeholder' => __( 'Show Thumbnail', 'wpsection' ),
                )
            );




$this->end_controls_section();




// ====================================== Wish List ==============================================
 $this->start_controls_section(
                'meta_wishlist_settings',
                    [
                        'label' => __( 'Meta Settings', 'wpsection' ),
                        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    ]
                ); 


if (class_exists('MrwooMart')) : 
      $this->add_control(
            'wishlist_tooltip',
            array(
                'label'       => __( 'Tooltip Wish list Text', 'wpsection' ),
                 'condition'    => array( 'show_whishlist' => '1' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'dynamic'     => [
                    'active' => true,
                ],
                'default' => __( 'wishlist', 'wpsection' ),
             

            )
        );  


    $this->add_control(
    'wishlist_icon',
    [
        'label' => __( 'Icon', 'wpsection' ),
        'condition'    => array( 'show_whishlist' => '1' ),
        'type' => \Elementor\Controls_Manager::ICONS,
        'default' => [
            'value' => 'eicon-heart-o',
            'library' => 'solid',
        ],
    ]
    );
     

  $this->add_control(
            'overlay_order_one',
            array(
                'label' => __( 'Position Order Settings', 'wpsection' ),
                'condition'    => array( 'show_whishlist' => '1' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1'  => __( '1st Position', 'wpsection' ),
                    '2' => __( '2nd Position', 'wpsection' ),
                    '3' => __( '3rd Position', 'wpsection' ),
                    '4' => __( '4th Position', 'wpsection' ),
                    '5' => __( '5th Position', 'wpsection' ),
                    '6' => __( '6th Position', 'wpsection' ),
                ],
            )
        );
    

           $this->add_control(
                'show_whishlist',
                array(
                    'label' => __( 'Show Wish List', 'wpsection' ),
                    'type'     => \Elementor\Controls_Manager::SWITCHER,
                     'return_value' => '1',
                     'default'      => '1',
                    'placeholder' => __( 'Show Wish List', 'wpsection' ),
                       'separator' => 'after'
                )
            );
                


 // ======================================Show Compare ==============================================    

      $this->add_control(
            'compare_tooltip',
            array(
                'label'       => __( 'Tooltip Compare', 'wpsection' ),
                    'condition'    => array( 'show_compare' => '1' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'dynamic'     => [
                    'active' => true,
                ],
                'default' => __( 'Compare', 'wpsection' ),
             
            )
        );

     

    $this->add_control(
    'compare_icon',
    [
        'label' => __( 'Icon', 'wpsection' ),
        'condition'    => array( 'show_compare' => '1' ),
        'type' => \Elementor\Controls_Manager::ICONS,
        'default' => [
            'value' => 'eicon-user-preferences',
            'library' => 'solid',
        ],
    ]
    );
     
       $this->add_control(
            'overlay_order_two',
            array(
                'label' => __( 'Position Order Settings', 'wpsection' ),
                'condition'    => array( 'show_compare' => '1' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '2',
                'options' => [
                    '1'  => __( '1st Position', 'wpsection' ),
                    '2' => __( '2nd Position', 'wpsection' ),
                    '3' => __( '3rd Position', 'wpsection' ),
                    '4' => __( '4th Position', 'wpsection' ),
                    '5' => __( '5th Position', 'wpsection' ),
                    '6' => __( '6th Position', 'wpsection' ),
                ],
            )
        );
    
       $this->add_control(
                'show_compare',
                 array(
                    'label' => __( 'Show Compare', 'wpsection' ),
                    'type'     => \Elementor\Controls_Manager::SWITCHER,
                     'return_value' => '1',
                     'default'      => '1',
                    'placeholder' => __( 'Show Compare', 'wpsection' ),
                      'separator' => 'after'
                )
            );      

endif;
 // ====================================== Quick view ============================================== 


        $this->add_control(
            'quickview_tooltip',
            array(
                'label'       => __( 'Quickview Compare', 'wpsection' ),
                    'condition'    => array( 'show_quickview' => '1' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'dynamic'     => [
                    'active' => true,
                ],
                'default' => __( 'Quickview', 'wpsection' ),
               
            )
        );

    $this->add_control(
    'quickview_icon',
    [
        'label' => __( 'Icon', 'wpsection' ),
        'condition'    => array( 'show_quickview' => '1' ),
        'type' => \Elementor\Controls_Manager::ICONS,
        'default' => [
            'value' => 'eicon-product-add-to-cart',
            'library' => 'solid',
        ],
    ]
    );


   $this->add_control(
            'overlay_order_three',
            array(
                'label' => __( 'Position Order Settings', 'wpsection' ),
                'condition'    => array( 'show_quickview' => '1' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '1'  => __( '1st Position', 'wpsection' ),
                    '2' => __( '2nd Position', 'wpsection' ),
                    '3' => __( '3rd Position', 'wpsection' ),
                    '4' => __( '4th Position', 'wpsection' ),
                    '5' => __( '5th Position', 'wpsection' ),
                    '6' => __( '6th Position', 'wpsection' ),
                ],
            )
        );
             $this->add_control(
                'show_quickview',
                 array(
                    'label' => __( 'Show Quickview', 'wpsection' ),
                    'type'     => \Elementor\Controls_Manager::SWITCHER,
                     'return_value' => '1',
                     'default'      => '1',
                    'placeholder' => __( 'Show Quickview', 'wpsection' ),
                    'separator' => 'after'
                )
            );

  

// ====================================== add to cart  ==============================================  
 

      $this->add_control(
            'addtocart_tooltip',
            array(
                'label'       => __( 'Tooltip Add to Cart', 'wpsection' ),
                    'condition'    => array( 'show_addtocart' => '1' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'dynamic'     => [
                    'active' => true,
                ],
                'default' => __( 'Add to Cart', 'wpsection' ),
                   
            )
        );


    $this->add_control(
    'addtocart_icon',
    [
        'label' => __( 'AddToCart Icon', 'wpsection' ),
        'condition'    => array( 'show_addtocart' => '1' ),
        'type' => \Elementor\Controls_Manager::ICONS,
        'default' => [
            'value' => 'eicon-cart',
            'library' => 'solid',
        ],
    ]
    );

 $this->add_control(
            'overlay_order_four',
            array(
                'label' => __( 'Position Order Settings', 'wpsection' ),
                'condition'    => array( 'show_addtocart' => '1' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '4',
                'options' => [
                    '1'  => __( '1st Position', 'wpsection' ),
                    '2' => __( '2nd Position', 'wpsection' ),
                    '3' => __( '3rd Position', 'wpsection' ),
                    '4' => __( '4th Position', 'wpsection' ),
                    '5' => __( '5th Position', 'wpsection' ),
                    '6' => __( '6th Position', 'wpsection' ),
                ],
            )
        );

            $this->add_control(
                'show_addtocart',
                array(
                    'label' => __( 'Show Add to cart', 'wpsection' ),
                    'type'     => \Elementor\Controls_Manager::SWITCHER,
                    'return_value' => '1',
                     'default'      => '1',
                    'placeholder' => __( 'Show Add tp Cart', 'wpsection' ),
                     'separator' => 'after'
                )
            );
$this->end_controls_section();     

