<?php
/**
 * Plugin Name: Simple Counter
 * Plugin URI:  https://ab-wp.com/plugins/simple-counter/
 * Description: Simple adding the most common counters to the site in the administrative part of the blog.
 * Version:     1.0
 * Author:      AB-WP
 * Author URI:  https://ab-wp.com/
 * Text Domain: abwp-simple-counter
 * Domain Path: /languages/
 * Requires at least: 3.9
 * Tested up to: 5.4
 * License: GPLv2 (or later)
**/
if ( !class_exists( 'ABWP_simple_counter' ) ) {
	class ABWP_simple_counter
	{
		
		public function __construct()
		{
			if ( is_admin() ) { // admin actions
				$this->load_dependencies();
				$this->define_admin_hooks();
			} else {
				add_action('init', array($this, 'init'));
			}
		}

		private function load_dependencies() 
		{
			require_once plugin_dir_path( __FILE__ ) . 'includes/admin-counters.php';
		}

		private function define_admin_hooks() 
		{
			add_action('plugins_loaded', array($this,'load_plugin_textdomain'));
			add_action('admin_menu', array($this, 'admin_menu'));
			add_action('admin_init', array($this, 'admin_init'));
		}

		public function load_plugin_textdomain() 
		{
			load_plugin_textdomain( 'abwp-simple-counter', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' ); 
		}

		public function admin_menu()
		{
			$admin_counters = new ABWP_simple_counter_admin();
			add_options_page( 
					__('Simple Counter', 'abwp-simple-counter'), 
					__('Simple Counter', 'abwp-simple-counter'), 
					'manage_options', 
					'simple-counter', 
					array( $admin_counters, 'view' ) );
		}

		public function admin_init()
		{
			register_setting( 'abwp-simple-counter-options-group', 'abwp_sc_yandex_webmaster');
			register_setting( 'abwp-simple-counter-options-group', 'abwp_sc_google_search_console');
			register_setting( 'abwp-simple-counter-options-group', 'abwp_sc_yandex_metrika');
			register_setting( 'abwp-simple-counter-options-group', 'abwp_sc_yandex_metrika_position');
			register_setting( 'abwp-simple-counter-options-group', 'abwp_sc_google_analytics');
			register_setting( 'abwp-simple-counter-options-group', 'abwp_sc_google_analytics_position');
			register_setting( 'abwp-simple-counter-options-group', 'abwp_sc_yandex_metrika_token');
			register_setting( 'abwp-simple-counter-options-group', 'abwp_sc_yandex_metrika_counter_id');
		}

		public function init()
		{
			add_action('wp_head', array($this, 'get_head_code'));
			add_action('wp_footer', array($this, 'get_footer_code'));
			add_shortcode('simple-counter', array($this, 'get_shortcode_counter') );
		}

		public function get_head_code()
		{
			if(get_option('abwp_sc_yandex_webmaster') && is_front_page()) {
				echo htmlspecialchars_decode(get_option('abwp_sc_yandex_webmaster'))."\n";
			}
			if(get_option('abwp_sc_google_search_console') && is_front_page()) {
				echo htmlspecialchars_decode(get_option('abwp_sc_google_search_console'))."\n";
			}
			if (get_option('abwp_sc_yandex_metrika_position') && (1 == get_option('abwp_sc_yandex_metrika_position'))) {
				if(get_option('abwp_sc_yandex_metrika')) {
					echo get_option('abwp_sc_yandex_metrika')."\n";
				}
			}
			if (get_option('abwp_sc_google_analytics_position') && (1 == get_option('abwp_sc_google_analytics_position'))) {
				if(get_option('abwp_sc_google_analytics')) {
					echo get_option('abwp_sc_google_analytics')."\n";
				}
			}
		}

		public function get_footer_code()
		{
			if (!get_option('abwp_sc_yandex_metrika_position') || (0 == get_option('abwp_sc_yandex_metrika_position'))) {
				if(get_option('abwp_sc_yandex_metrika')) {
					echo get_option('abwp_sc_yandex_metrika')."\n";
				}
			}
			if (!get_option('abwp_sc_google_analytics_position') || (0 == get_option('abwp_sc_google_analytics_position'))) {
				if(get_option('abwp_sc_google_analytics')) {
					echo get_option('abwp_sc_google_analytics')."\n";
				}
			}
		}

		public function get_shortcode_counter($atts)
		{
			$return = '';
			switch ($atts['id']) {
				case 'metrika':
					if (get_option('abwp_sc_yandex_metrika_position') && (2 == get_option('abwp_sc_yandex_metrika_position'))) {
						if(get_option('abwp_sc_yandex_metrika')) {
							$return = get_option('abwp_sc_yandex_metrika')."\n";
						}
					}
					break;

					case 'analytics':
						if (get_option('abwp_sc_google_analytics_position') && (2 == get_option('abwp_sc_google_analytics_position'))) {
							if(get_option('abwp_sc_google_analytics')) {
								$return = get_option('abwp_sc_google_analytics')."\n";
							}
						}
						break;

				default:
					break;
			}
			return $return;
		}
	}

	$ABWP_simple_counter = new ABWP_simple_counter();
}