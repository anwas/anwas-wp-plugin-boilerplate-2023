<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com/
 * @since             1.0.0
 * @package           Plugin_Name
 *
 * @wordpress-plugin
 * Plugin Name:       WordPress Plugin Boilerplate
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Plugin URI:        http://example.com/plugin-name-uri/
 * Version:           1.0.0
 * Requires at least: 6.2
 * Requires PHP:      8.0
 * Author:            Your Name or Your Company
 * Author URI:        http://example.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       plugin-name
 * Domain Path:       /languages
 */

declare( strict_types=1 );

namespace Plugin_Name;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! defined( '\Plugin_Name\PLUGIN_VERSION' ) ) {
	/**
	 * Currently plugin version.
	 * Start at version 1.0.0 and use SemVer - https://semver.org
	 * Rename this for your plugin and update it as you release new versions.
	 */
	define( 'Plugin_Name\PLUGIN_VERSION', '1.0.0' );
}

if ( ! defined( '\Plugin_Name\PLUGIN_PREFIX' ) ) {
	/**
	 * The unique prefix of this plugin.
	 * Rename this for your own.
	 */
	define( 'Plugin_Name\PLUGIN_PREFIX', 'plugin_name' );
}

if ( ! defined( '\Plugin_Name\REQUIRED_CAP' ) ) {
	/**
	 * The name of the management capability of this plugin.
	 */
	define( 'Plugin_Name\REQUIRED_CAP', PLUGIN_PREFIX . '_plugin_manage' );
}

if ( ! defined( '\Plugin_Name\PLUGIN_DIR' ) ) {
	/**
	 * The DIR PATH of this plugin with trailing slash.
	 */
	define( 'Plugin_Name\PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( '\Plugin_Name\PLUGIN_URI' ) ) {
	/**
	 * The URL of this plugin with trailing slash.
	 */
	define( 'Plugin_Name\PLUGIN_URI', plugin_dir_url( __FILE__ ) );
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/plugin-name-activator.php
 */
function plugin_name_activate() {
	require_once \Plugin_Name\PLUGIN_DIR . 'includes/plugin-name-activator.php';
	\Plugin_Name\Plugin_Name_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/plugin-name-deactivator.php
 */
function plugin_name_deactivate() {
	require_once \Plugin_Name\PLUGIN_DIR . 'includes/plugin-name-deactivator.php';
	\Plugin_Name\Plugin_Name_Deactivator::deactivate();
}

register_activation_hook( __FILE__, __NAMESPACE__ . '\\plugin_name_activate' );
register_deactivation_hook( __FILE__, __NAMESPACE__ . '\\plugin_name_deactivate' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require \Plugin_Name\PLUGIN_DIR . 'includes/plugin-name.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function plugin_name_run() {

	$plugin = new \Plugin_Name\Plugin_Name();
	$plugin->run();

}
plugin_name_run();
