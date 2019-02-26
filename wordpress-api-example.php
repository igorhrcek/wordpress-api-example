<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://mint.rs
 * @since             1.0.0
 * @package           Wordpress_Api_Example
 *
 * @wordpress-plugin
 * Plugin Name:       WordPress API Example
 * Plugin URI:        https://wordpress.org
 * Description:       WordPress API implementacija - primeri iz prakse
 * Version:           1.0.0
 * Author:            Igor Hrcek
 * Author URI:        https://mint.rs
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wordpress-api-example
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wordpress-api-example-activator.php
 */
function activate_wordpress_api_example() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wordpress-api-example-activator.php';
	Wordpress_Api_Example_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wordpress-api-example-deactivator.php
 */
function deactivate_wordpress_api_example() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wordpress-api-example-deactivator.php';
	Wordpress_Api_Example_Deactivator::deactivate();
}
require_once ABSPATH . '/wp-includes/pluggable.php';
require_once plugin_dir_path(__FILE__) . 'includes/vendor/autoload.php';

register_activation_hook( __FILE__, 'activate_wordpress_api_example' );
register_deactivation_hook( __FILE__, 'deactivate_wordpress_api_example' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wordpress-api-example.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wordpress_api_example() {

	$plugin = new Wordpress_Api_Example();
	$plugin->run();

}
run_wordpress_api_example();
