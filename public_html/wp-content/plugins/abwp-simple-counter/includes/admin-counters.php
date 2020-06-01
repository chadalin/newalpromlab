<?php
if ( !class_exists( 'ABWP_simple_counter_admin' ) ) {
	class ABWP_simple_counter_admin
	{
		public function __construct ()
		{
			add_action('load-metrica_page_counters-settings', array($this, 'add_admin_help_tab'), 20);
		}

		public function view() {
			ob_start();
			include plugin_dir_path( __FILE__ ) . 'page-admin-counters.php';
			$content = ob_get_clean();
			echo $content;
		}

		public function add_admin_help_tab ()
		{
			$screen = get_current_screen();
			if( !method_exists( $screen, 'add_help_tab' ) )
				return;

			$sidebar = '
				<ul>
					<li>
						<a href="https://yandex.ru/support/webmaster/service/about.xml">'.
							__( 'Yandex.Webmaster', 'abwp-simple-counter' ).' '.__( 'help', 'abwp-simple-counter' ).
						'</a>
					</li>
					<li>
						<a href="https://yandex.ru/support/metrika/">'.
							__( 'Yandex.Metrika', 'abwp-simple-counter' ).' '.__( 'help', 'abwp-simple-counter' ).
						'</a>
					</li>
					<li>
						<a href="https://support.google.com/webmasters/" target="_blank">'.
							__( 'Google Search Console Help Center', 'abwp-simple-counter' ).
						'</a>
					</li>
					<li>
						<a href="https://support.google.com/analytics" target="_blank">'.
							__( 'Google Analytics Help Center', 'abwp-simple-counter' ).
						'</a>
					</li>
				</ul>';

			$screen->add_help_tab(
				array(
					'title' => __('Overview', 'abwp-simple-counter' ),
					'id' => 'abwp-simple-counter-overview',
					'content' => '<h2>AB Metrika home screen </h2><p>On the home screen you can add the counters</p>'
				));
			$screen->add_help_tab(
				array(
					'title' => __('Help & support', 'abwp-simple-counter' ),
					'id' => 'abwp-simple-counter-help',
					'content' => '<h2>Getting help with Simple Counter</h2><p>To ask us a question please start a new thread in the <a href="https://wordpress.org/support/plugin/simple-counter" target="_blank">support forum</a>. Provide as much relevant detail as possible and please make it clear how your query is related to Simple Counter. </p>'
				));
			$screen->set_help_sidebar( $sidebar );
		}
	}
}