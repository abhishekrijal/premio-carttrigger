<?php
/**
 * Main Plugin class
 *
 * @package PremioCarttrigger
 */

namespace PremioCarttrigger;

defined( 'ABSPATH' ) || exit;

/**
 * Final PremioCarttrigger class.
 *
 * @package PremioCarttrigger
 */
final class PremioCarttrigger {

	/**
	 * Version
	 */
	public $version = '1.0.0';

	/**
	 * Single instance of the class
	 */
	protected static $_instance = null;

	/**
	 * Class Instance
	 *
	 * @return class instance
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Plugin constructor
	 */
	public function __construct() {
		$this->defineConstants();
		$this->includes();
		$this->init_hooks();

		$this->admin  = new PremioCarttriggerAdmin();
		$this->public = new PremioCarttriggerPublic();
	}

	/**
	 * Fires during plugin activation
	 *
	 * @return void
	 */
	public function activate() {
		require_once plugin_dir_path( PREMIO_CARTTRIGGER_PLUGIN_FILE ) . 'includes/classes/class-premio-carttrigger-activator.php';
		\PremioCartTriggerActivator::activate();
	}

	/**
	 * Fires during plugin deactivation
	 *
	 * @return void
	 */
	public function deactivate() {

	}

	/**
	 * Init plugin hooks.
	 *
	 * @return void
	 */
	public function init_hooks() {
		register_activation_hook( PREMIO_CARTTRIGGER_PLUGIN_FILE, array( $this, 'activate' ) );
		register_deactivation_hook( PREMIO_CARTTRIGGER_PLUGIN_FILE, array( $this, 'deactivate' ) );

		add_action( 'init', array( $this, 'init' ) );
	}

	/**
     * Init Wheel_Of_Life when WordPress initializes.
     *
     * @since 1.0.0
     * @access public
     */
    public function init() {
        // Before init action.
		do_action( 'before_PremioCarttrigger_init' );

        // Set up localization.
        $this->loadPluginTextdomain();
    }

	/**
	 * Define constants
	 *
	 * @return void
	 */
	public function defineConstants() {
		$this->define( 'PREMIO_CARTTRIGGER_PLUGIN_NAME', 'PremioCarttrigger' );
		$this->define( 'PREMIO_CARTTRIGGER_ABSPATH', dirname( PREMIO_CARTTRIGGER_PLUGIN_FILE ) . '/' );
		$this->define( 'PREMIO_CARTTRIGGER_VERSION', $this->version );
	}

	/**
	 * Plugin includes
	 *
	 * @return void
	 */
	public function includes() {

	}

	/**
	 * Define constant if not already set.
	 *
	 * @param string      $name       Constant name.
	 * @param string|bool $value      Constant value.
	 * @return void
	 */
	private function define( $name, $value ) {
		if ( ! defined( $name ) ) {
			define( $name, $value );
		}
	}

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since 1.0.0
	 *
	 * Note: the first-loaded translation file overrides any following ones -
	 * - if the same translation is present.
	 *
	 * Locales found in:
	 *      - WP_LANG_DIR/premio-carttrigger/premio-carttrigger-LOCALE.mo
	 *      - WP_LANG_DIR/plugins/premio-carttrigger-LOCALE.mo
	 */
	public function loadPluginTextdomain() {
		if ( function_exists( 'determine_locale' ) ) {
			$locale = determine_locale();
		} else {
			$locale = is_admin() ? get_user_locale() : get_locale();
		}

		$locale = apply_filters( 'plugin_locale', $locale, 'premio-carttrigger' );

		unload_textdomain( 'premio-carttrigger' );
		load_textdomain( 'premio-carttrigger', WP_LANG_DIR . '/premio-carttrigger/premio-carttrigger-' . $locale . '.mo' );
		load_plugin_textdomain(
			'premio-carttrigger',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);
	}

}
