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
class PremioCarttriggerPublic {

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

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_public_scripts' ) );

	}

	/**
	 * Admin Enqueue Scripts
	 *
	 * @return void
	 */
	public function enqueue_public_scripts( $hook ) {

		if ( 'toplevel_page_premio_cart_trigger' === $hook ) {
			
		}

	}

}
