<?php
/**
 * Activator Class
 *
 * @package PremioCartTrigger
 */
class PremioCartTriggerActivator {

	/**
	 * Activation function
	 *
	 * @return void
	 */
	public static function activate() {
		$settings_shown = get_transient( 'premio_carttrigger_settings_page_shown' );

		if ( ! $settings_shown ) :
			set_transient( 'premio_carttrigger_show_settings_page', true );
		endif;
	}

}
