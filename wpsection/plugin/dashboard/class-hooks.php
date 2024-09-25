<?php
/**
 * Class Hooks
 */

use Elementor\Plugin;
use Elementor\User;

if ( ! class_exists( 'WPSECTION_Hooks' ) ) {
	class WPSECTION_Hooks {

		function __construct() {

			add_action( 'init', [ $this, 'register_everything' ] );
			add_action( 'admin_menu', [ $this, 'register_dashboard' ] );
			add_action( 'admin_init', [ $this, 'tablepress_backend_support' ] );
			add_action( 'elementor/elements/categories_registered', [ $this, 'add_category' ] );

			add_action( 'pb_settings_before_wpsection_elements_active', array( $this, 'render_settings_toggler' ) );
			add_action( 'pb_settings_before_wpsection_elements_ext_active', array( $this, 'render_settings_toggler' ) );
			add_action( 'pb_settings_fields_area', array( $this, 'render_template_library' ) );			
			add_action( 'wpsection_update_data', array( $this, 'update_plugin_data' ) );
			add_action( 'wp_ajax_populate_import_popup', array( $this, 'populate_import_popup' ) );
			add_action( 'wp_ajax_import_element', array( $this, 'import_element' ) );
		}


		/**
		 * Import element
		 */
	function import_element() {

			
	
$posted_data   = array_map('sanitize_text_field', $_POST );
$nonce       = wpsection()->get_settings_atts( 'wpsection_nonce', '', $posted_data );

if ( wp_verify_nonce( $nonce, 'wpsection_nonce_action' ) ) {

	$elements_active = wpsection()->get_settings_atts( 'wpsection_elements_active', array(), $posted_data );

	if ( is_array( $elements_active ) ) {
		update_option( 'wpsection_elements_active', $elements_active );
	}
}	
		
		
		
		
		

    // Example usage of variables and functions
    $page_id = wpsection()->get_settings_atts( 'page_id', '91', $posted_data );

    if ( empty( $page_id ) || $page_id === 0 ) {
        wp_send_json_error( esc_html__( 'Invalid page ID', 'wpsection' ) );
    }

    // Example remote request
    $response = wp_remote_get( sprintf( '%s/wp-json/wpsection/page-data/%s', WPSECTION_API_URL, $page_id ) );

    if ( is_wp_error( $response ) ) {
        wp_send_json_error( $response->get_error_message() );
    }

    $response_data = wp_remote_retrieve_body( $response );
    $response_data = json_decode( $response_data, true );

    // Example post creation and update
    $local_page_id = wp_insert_post( array(
        'post_type'    => 'page',
        'post_status'  => 'publish',
        'post_title'   => wp_kses_post( wpsection()->get_settings_atts( 'page_title', '', $response_data ) ),
        'post_content' => wp_kses_post( wpsection()->get_settings_atts( 'post_content', '', $response_data ) ),
    ) );

    if ( is_wp_error( $local_page_id ) ) {
        wp_send_json_error( esc_html__( 'Error creating new page', 'wpsection' ) );
    }

    // Example updating post meta
    update_post_meta( $local_page_id, '_elementor_data', wp_kses_post( wpsection()->get_settings_atts( '_elementor_data', '', $response_data ) ) );

    // Example success response
    wp_send_json_success(
        sprintf(
            '%s. <a href="%s" target="_blank">%s</a>',
            esc_html__( 'Successfully imported', 'wpsection' ),
            get_permalink( $local_page_id ),
            esc_html__( 'View Page', 'wpsection' )
        )
    );
}


		/**
		 * Return html through ajax response
		 */
		function populate_import_popup() {

			
$posted_data   = array_map('sanitize_text_field', $_POST );
$nonce       = wpsection()->get_settings_atts( 'wpsection_nonce', '', $posted_data );

if ( wp_verify_nonce( $nonce, 'wpsection_nonce_action' ) ) {

	$elements_active = wpsection()->get_settings_atts( 'wpsection_elements_active', array(), $posted_data );

	if ( is_array( $elements_active ) ) {
		update_option( 'wpsection_elements_active', $elements_active );
	}
}	
				
			
			
			
			$template_id    = wpsection()->get_settings_atts( 'template_id', '', $posted_data );
			$template_group = wpsection()->get_settings_atts( 'template_group', '', $posted_data );
			$template       = wpsection()->get_template_by_id( $template_id, $template_group );
			$active_plugins = wpsection()->get_option( 'active_plugins', array() );
			$should_import  = true;

			ob_start();

			// Window title with close icon
			printf( '<h2>%s</h2><span class="dashicons dashicons-no-alt import-close"></span>', esc_html__( 'Template Importing', 'wpsection' ) );



			
			// Template Name
printf( '<div class="import-inline"><strong>%s</strong><div class="inline-content">%s</div></div>',
    esc_html__( 'Template Name', 'wpsection' ),
    esc_html( wpsection()->get_settings_atts( 'title', '', $template ) )
);



			// Required Plugins
			$req_plugins = array();
			foreach ( wpsection()->get_settings_atts( 'req_plugins', array(), $template ) as $plugin ) {

				if ( empty( $plugin_id = wpsection()->get_settings_atts( 'id', '', $plugin ) ) ) {
					continue;
				}

				$plugin_label  = wpsection()->get_settings_atts( 'label', '', $plugin );
				$plugin_is_pro = wpsection()->get_settings_atts( 'is_pro', false, $plugin );
				$plugin_type   = $plugin_is_pro ? 'pro' : 'free';
				$plugin_url    = $plugin_is_pro ? wpsection()->get_settings_atts( 'url', '', $plugin ) : esc_url( sprintf( 'https://wordpress.org/plugins/%s', $plugin_id ) );
				$is_activated  = in_array( sprintf( '%1$s/%1$s.php', $plugin_id ), $active_plugins );
				$status_class  = $is_activated ? 'activated' : 'none';
				$req_plugins[] = sprintf( '<a class="status-%s type-%s" href="%s" target="_blank">%s</a>', $status_class, $plugin_type, $plugin_url, $plugin_label );

				if ( ! $is_activated ) {
					$should_import = false;
				}
			}
			
	

if ( ! empty( $req_plugins ) ) {
    $escaped_plugins = array_map( 'esc_html', $req_plugins );
    $plugin_list = implode( '', $escaped_plugins );

    printf( '<div class="import-inline"><strong>%s</strong><div class="inline-content"><span class="note">%s</span>%s</div></div>',
        esc_html__( 'Required Plugins', 'wpsection' ),
        esc_html__( 'Please activate these plugins before importing', 'wpsection' ),
        wp_kses_post( $plugin_list )
    );
}



			// Page Selection
/*
			$pages_array  = wpsection()->PB_Settings()->get_pages_array();
			$page_options = array_map( function ( $page_name, $page_id ) {
				return sprintf( '<option value="%s">%s</option>', $page_id, $page_name );
			}, $pages_array, array_keys( $pages_array ) );
			printf( '<div class="import-inline"><strong>%s</strong><div class="inline-content"><span class="note">%s</span><select class="wpsection-select2 local-page-id" >%s</select></div></div>',
				esc_html__( 'Select Page', 'wpsection' ),
				esc_html__( 'Leave empty if you wish to create a new page', 'wpsection' ),
				sprintf( '<option></option>%s', implode( ' ', $page_options ) )
			);
			printf( '<script>jQuery(document).ready(function () {jQuery(".wpsection-select2").select2({placeholder: "%s"});});</script>', esc_html__( 'Select an option', 'wpsection' ) );
*/

			
			
			
			// Rendering Button

			
			
printf(
    '<div class="import-inline"><div class="wpsection-import-button %s" data-page-id="%s">%s</div></div>',
    $should_import ? '' : 'disabled',
    esc_attr( wpsection()->get_settings_atts( 'page_id', array(), $template ) ),
    esc_html__( 'Import Now', 'wpsection' )
);
			
			

			wp_send_json_success( ob_get_clean() );
		}


		/**
		 * Update plugin data from api remote server
		 */
		function update_plugin_data() {

			update_option( 'wpsection_api_response', wpsection()->get_plugin_data_from_api() );
		}


		/**
		 * Render Template Library
		 *
		 * @param PB_Settings $pb_settings
		 */
		function render_template_library( PB_Settings $pb_settings ) {

			if ( $pb_settings->get_menu_slug() !== 'wpsection-library' ) {
				return;
			}

			global $template_group;

			if ( ! empty( $template_id = wpsection()->get_settings_atts( 'template-group', '', wp_unslash( $_GET ) ) ) ) {
				
$posted_data   = array_map('sanitize_text_field', $_POST );
$nonce       = wpsection()->get_settings_atts( 'wpsection_nonce', '', $posted_data );

if ( wp_verify_nonce( $nonce, 'wpsection_nonce_action' ) ) {

	$elements_active = wpsection()->get_settings_atts( 'wpsection_elements_active', array(), $posted_data );

	if ( is_array( $elements_active ) ) {
		update_option( 'wpsection_elements_active', $elements_active );
	}
}			
				
				
				

				$templates      = wpsection()->get_plugin_data( 'templates' );
				$template_group = isset( $templates[ $template_id ] ) ? array_merge( array( 'template_group' => $template_id ), $templates[ $template_id ] ) : array();

				include WPSECTION_PLUGIN_DIR . 'plugin/adminboard/template-library.php';
			} else {
				include WPSECTION_PLUGIN_DIR . 'plugin/adminboard/template-groups.php';
			}
		}
		

		
		/**
		 * Render Settings Toggler
		 */
		function render_settings_toggler() {
			printf( '<div class="wpsection-toggler"><span class="button wpsection-enable">%s</span><span class="button wpsection-disable">%s</span></div>',
				esc_html__( 'Enable All', 'wpsection' ),
				esc_html__( 'Disable All', 'wpsection' )
			);
		}


		/**
		 * Add custom category for all widgets
		 *
		 * @param $elements_manager
		 */
		function add_category( $elements_manager ) {

			if ( $elements_manager instanceof Elementor\Elements_Manager ) {
				$elements_manager->add_category( 'wpsection_category',
					array(
						'title' => esc_html__( 'wpsection', 'wpsection' ),
					)
				);
			}
		}


		/**
		 * Provide tablepress support
		 */
		function tablepress_backend_support() {

			if ( ! class_exists( 'TablePress' ) ) {
				return;
			}

			TablePress::load_controller( 'frontend' );

			$controller = new TablePress_Frontend_Controller();
			$controller->init_shortcodes();

			add_action( 'admin_enqueue_scripts', array( $controller, 'enqueue_css' ) );
		}


		/**
		 * Render settings dashboard
		 */
		function render_dashboard() {

			wp_enqueue_style( 'bootstrap' );
			wp_enqueue_script( 'bootstrap' );

			include WPSECTION_PLUGIN_DIR . 'plugin/adminboard/settings-dashboard.php';
		}


		/**
		 * Register Dashboard Menu
		 */
		function register_dashboard() {

			$page_title = sprintf( esc_html__( 'WpSection - Settings', 'wpsection' ) );


			
			$menu_title = esc_html__( 'wpsection', 'wpsection' );

			add_menu_page( $page_title, $menu_title, 'manage_options', 'wpsection-settings', [ $this, 'render_dashboard' ], 'dashicons-image-flip-horizontal', 30 );
		}



		/**
		 * Register everything
		 */
		function register_everything() {


			// Adding library menu
			wpsection()->PB_Settings( array(
				'add_in_menu'     => true,
				'menu_type'       => 'submenu',
				'menu_title'      => esc_html__( 'Template Library', 'wpsection' ),
				'menu_name'       => esc_html__( 'Template Library', 'wpsection' ),  
				'menu_page_title' => esc_html__( 'WpSection Template Library', 'wpsection' ),
				'capability'      => 'manage_options',
				'menu_slug'       => 'wpsection-library',
				'parent_slug'     => 'wpsection-settings',
			) );





		}
	}

	new WPSECTION_Hooks();
}