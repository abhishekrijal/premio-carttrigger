<?php
/**
 * Admin screen functionality
 *
 * @package PremioCarttrigger
 */

namespace PremioCarttrigger;

defined( 'ABSPATH' ) || exit;

/**
 * Admin class
 *
 * @package PremioCarttrigger
 */
class PremioCarttriggerAdmin {

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->init();
	}

	/**
	 * Init
	 *
	 * @return void
	 */
	public function init() {

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );

		// Admin Script Translations
		add_action( 'admin_enqueue_scripts', array( $this, 'set_script_translations' ) );

		// Register pages
		add_action( 'admin_menu', array( $this, 'add_settings_menu' ) );

		// Redirect to settings page on activation
		add_action( 'admin_init', array( $this, 'redirect_to_settings_page' ) );

	}

	/**
	 * Admin Enqueue Scripts
	 *
	 * @return void
	 */
	public function enqueue_admin_scripts( $hook ) {

		if ( 'toplevel_page_premio_cart_trigger' === $hook ) {

			$admin_js_path = require plugin_dir_path( PREMIO_CARTTRIGGER_PLUGIN_FILE ) . '/app/build/adminJS.asset.php';

			wp_register_script( 'premio-admin', plugin_dir_url( PREMIO_CARTTRIGGER_PLUGIN_FILE ) . '/app/build/adminJS.js', $admin_js_path['dependencies'],  $admin_js_path['version'], true );

			wp_enqueue_script( 'premio-admin' );
		}

	}

	/**
	 * Add PremioCarttrigger Menu
	 *
	 * @return void
	 */
	public function add_settings_menu() {
		add_menu_page(
			esc_html__( 'Cart Triggers', 'premio-carttrigger' ),
			esc_html__( 'Cart Triggers', 'premio-carttrigger' ),
			'manage_options',
			'premio_cart_trigger',
			[$this,'render_options_page'],
			'dashicons-cart',
			40
		);
	}

	/**
	 * Redirect to settings page on activation
	 * */
	public function redirect_to_settings_page () {
		if ( get_transient( 'premio_carttrigger_show_settings_page' ) ) {
			delete_transient( 'premio_carttrigger_show_settings_page' );
			wp_safe_redirect( admin_url( 'admin.php?page=premio_cart_trigger' ) );
			exit;
		}
	}

	/**
	 * Set Script Translations
	 *
	 * @return void
	 */
	public function set_script_translations() {
		wp_set_script_translations( 'premio-carttrigger', 'premio-carttrigger' );
	}

	/**
	 * render options page
	 *
	 * @return void
	 */
	public function render_options_page() {
		echo '<div id="premioCartTriggerAdminPageRoot" style="margin-left:-20px;"></div>';
	}

}
