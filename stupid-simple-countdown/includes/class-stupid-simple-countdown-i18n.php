<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://samcarlton.com/
 * @since      1.0.0
 *
 * @package    Stupid_Simple_Countdown
 * @subpackage Stupid_Simple_Countdown/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Stupid_Simple_Countdown
 * @subpackage Stupid_Simple_Countdown/includes
 * @author     Sam Carlton <sam@sam.lc>
 */
class Stupid_Simple_Countdown_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'stupid-simple-countdown',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
