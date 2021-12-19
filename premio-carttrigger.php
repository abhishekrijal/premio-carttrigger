<?php
/**
 * Plugin Name:     Premio Cart Trigger
 * Plugin URI:      https://premio.io
 * Description:     A plugin to trigger Woocommerce cart events and popup on the website frontend.
 * Author:          Abhishek Rijal
 * Author URI:      https://premio.io
 * Text Domain:     premio-carttrigger
 * Domain Path:     /languages
 * Version:         1.0.0
 *
 * @package         Premio_Carttrigger
 */

// Your code starts here.
use PremioCarttrigger\PremioCarttrigger;

defined( 'ABSPATH' ) || exit;

// include autoloader
require_once __DIR__ . '/vendor/autoload.php';

if ( ! defined( 'PREMIO_CARTTRIGGER_PLUGIN_FILE' ) ) {
	define( 'PREMIO_CARTTRIGGER_PLUGIN_FILE', __FILE__ );
}


/**
 * Init function
 */
function premio_carttrigger_init() {
	return PremioCarttrigger::instance();
}

$GLOBALS['PremioCarttrigger'] = premio_carttrigger_init();
