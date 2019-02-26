<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://mint.rs
 * @since      1.0.0
 *
 * @package    Wordpress_Api_Example
 * @subpackage Wordpress_Api_Example/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wordpress_Api_Example
 * @subpackage Wordpress_Api_Example/includes
 * @author     Igor Hrcek <igor.hrcek@mint.rs>
 */
class Wordpress_Api_Example_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wordpress-api-example',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
