<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.christian-dullin.de
 * @since      0.1.1
 *
 * @package    Tcconnect
 * @subpackage Tcconnect/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      0.1.1
 * @package    Tcconnect
 * @subpackage Tcconnect/includes
 * @author     DuelistRage <admin@christian-dullin.de>
 */
class Tcconnect_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    0.1.1
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'tcconnect',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
