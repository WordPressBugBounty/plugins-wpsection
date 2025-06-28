<?php
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;

class WPSection_wps_slide_block_Widget extends Widget_Base {

    public function get_name() {
        return 'wpsection_wps_slide_block';
    }

    public function get_title() {
        return __( 'Slide Block', 'wpsection' );
    }

    public function get_icon() {
        return 'eicon-slider-album';
    }

    public function get_keywords() {
        return ['wpsection_category'];
    }

    public function get_categories() {
        return [ 'wpsection_shop' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'slide_block_settings',
            [
                'label' => esc_html__( 'Block Slide', 'wpsection' ),
            ]
        );


        $this->add_control(
            'columns_desktop',
            [
                'label' => esc_html__( 'Columns (Desktop)', 'wpsection' ),
                'type' => Controls_Manager::NUMBER,
                'default' => 3,
                'min' => 1,
                'max' => 12,
            ]
        );

        $this->add_control(
            'columns_tablet',
            [
                'label' => esc_html__( 'Columns (Tablet)', 'wpsection' ),
                'type' => Controls_Manager::NUMBER,
                'default' => 2,
                'min' => 1,
                'max' => 12,
            ]
        );

        $this->add_control(
            'columns_mobile',
            [
                'label' => esc_html__( 'Columns (Mobile)', 'wpsection' ),
                'type' => Controls_Manager::NUMBER,
                'default' => 1,
                'min' => 1,
                'max' => 12,
            ]
        );

        $this->add_control(
            'auto_loop',
            [
                'label' => esc_html__( 'Auto Loop', 'wpsection' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'wpsection' ),
                'label_off' => esc_html__( 'No', 'wpsection' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'auto_play',
            [
                'label' => esc_html__( 'Auto Play', 'wpsection' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'wpsection' ),
                'label_off' => esc_html__( 'No', 'wpsection' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'auto_play_speed',
            [
                'label' => esc_html__( 'Auto Play Speed (ms)', 'wpsection' ),
                'type' => Controls_Manager::NUMBER,
                'default' => 3000,
                'min' => 1000,
                'max' => 10000,
                'step' => 100,
                'condition' => [
                    'auto_play' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'thumbnail_position',
            [
                'label' => __( 'Thumbnail Position', 'wpsection' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'top',
                'options' => [
                    'top' => __( 'Top', 'wpsection' ),
                    'left' => __( 'Left', 'wpsection' ),
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'title',
            [
                'label' => __( 'Title', 'wpsection' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Default Title', 'wpsection' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'text',
            [
                'label' => __( 'Text', 'wpsection' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Default Text', 'wpsection' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'image',
            [
                'label' => __( 'Image', 'wpsection' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'marquee_items',
            [
                'label' => __( 'Marquee Items', 'wpsection' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => __( 'Title #1', 'wpsection' ),
                        'text' => __( 'Text #1', 'wpsection' ),
                    ],
                    [
                        'title' => __( 'Title #2', 'wpsection' ),
                        'text' => __( 'Text #2', 'wpsection' ),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();
    }

protected function render() {
    $settings = $this->get_settings_for_display();

    if ( ! empty( $settings['marquee_items'] ) ) {
        $unique_id = 'wps-swiper-' . uniqid();
        $thumbnail_position = $settings['thumbnail_position'];

        // Fallbacks
        $columns_mobile  = !empty( $settings['columns_mobile'] ) ? $settings['columns_mobile'] : 1;
        $columns_tablet  = !empty( $settings['columns_tablet'] ) ? $settings['columns_tablet'] : 2;
        $columns_desktop = !empty( $settings['columns_desktop'] ) ? $settings['columns_desktop'] : 3;

        // Autoplay
        $autoplay = ( $settings['auto_play'] === 'yes' ) ? 'true' : 'false';
        $autoplay_speed = !empty( $settings['auto_play_speed'] ) ? intval( $settings['auto_play_speed'] ) : 3000;
        ?>
        
        <!-- Swiper CSS (Add this globally or enqueue in functions.php) -->

        <div class="swiper <?php echo esc_attr( $unique_id ); ?>">
            <div class="swiper-wrapper">
                <?php foreach ( $settings['marquee_items'] as $item ) : ?>
                    <div class="swiper-slide <?php echo ( 'left' === $thumbnail_position ) ? 'thumbnail-left' : ''; ?>">
                        <div class="thumbnail">
                            <?php if ( ! empty( $item['image']['url'] ) ) : ?>
                                <img src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="<?php echo esc_attr( $item['title'] ); ?>" />
                            <?php endif; ?>
                        </div>
                        <div class="content">
                            <?php if ( ! empty( $item['title'] ) ) : ?>
                                <h4><?php echo esc_html( $item['title'] ); ?></h4>
                            <?php endif; ?>
                            <?php if ( ! empty( $item['text'] ) ) : ?>
                                <p><?php echo esc_html( $item['text'] ); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <script>
        jQuery(document).ready(function($) {
            new Swiper('.<?php echo esc_js( $unique_id ); ?>', {
                slidesPerView: <?php echo esc_js( $columns_desktop ); ?>,
                spaceBetween: 10,
                loop: <?php echo $settings['auto_loop'] === 'yes' ? 'true' : 'false'; ?>,
				autoplay: <?php echo ( $settings['auto_play'] === 'yes' ) ? '{ delay: ' . esc_js( $autoplay_speed ) . ', disableOnInteraction: false }' : 'false'; ?>,
                breakpoints: {
                    0: {
                        slidesPerView: <?php echo esc_js( $columns_mobile ); ?>
                    },
                    768: {
                        slidesPerView: <?php echo esc_js( $columns_tablet ); ?>
                    },
                    1024: {
                        slidesPerView: <?php echo esc_js( $columns_desktop ); ?>
                    }
                }
            });
        });
        </script>

        <style>
            .thumbnail-left {
                display: flex;
                gap: 10px;
            }
            .swiper-slide {
                text-align: left;
            }
        </style>

        <?php
    }
}

}

Plugin::instance()->widgets_manager->register_widget_type( new WPSection_wps_slide_block_Widget() );
