<?php

/**
 * Ajax of PremioCarttriger.
 *
 * @package PremioCarttriger
 */

namespace PremioCarttriger;

defined( 'ABSPATH' ) || exit;

/**
 * Admin class
 *
 * @package PremioCarttriger
 */
class PremioCarttriger_Ajax {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->init();
	}

	/**
	 * Initialization.
	 *
	 * @since 1.0.0
	 * @access private
	 *
	 * @return void
	 */
	private function init() {
		// Initialize hooks.
		$this->init_hooks();
	}

	/**
	 * Initialize hooks.
	 *
	 * @since 1.0.0
	 * @access private
	 *
	 * @return void
	 */
	private function init_hooks() {

	}
}

new PremioCarttriger_Ajax();
