<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.christian-dullin.de
 * @since             0.1.1
 * @package           Tcconnect
 *
 * @wordpress-plugin
 * Plugin Name:       TrinityCore Connect
 * Plugin URI:        https://discord.gg/xbfZU6vsS9
 * Description:       Used to Syncronize Wordpress CMS with World of Warcraft TrinityCore Database. New Users will automaticaly added into your TrinityCore Database (Currently only TrinityCore is supported)
 * Version:           0.1.1
 * Author:            DuelistRage
 * Author URI:        https://www.christian-dullin.de
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       tcconnect
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 0.1.1 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'TCCONNECT_VERSION', '0.1.1' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-tcconnect-activator.php
 */
function activate_tcconnect() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tcconnect-activator.php';
	Tcconnect_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-tcconnect-deactivator.php
 */
function deactivate_tcconnect() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tcconnect-deactivator.php';
	Tcconnect_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_tcconnect' );
register_deactivation_hook( __FILE__, 'deactivate_tcconnect' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-tcconnect.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.1.1
 */
function run_tcconnect() {

	$plugin = new Tcconnect();
	$plugin->run();

}
run_tcconnect();
