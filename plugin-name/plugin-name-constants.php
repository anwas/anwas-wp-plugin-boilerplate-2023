<?php
/**
 * WordPress Plugin Boilerplate plugin constants file.
 *
 * @package Plugin_Name
 */

declare( strict_types=1 );

namespace Plugin_Name;

// Exit if accessed directly.
if ( ! defined( '\WPINC' ) ) {
	die( 'Action denied.' );
}

if ( ! \defined( '\Plugin_Name\PLUGIN_VERSION' ) ) {
	/**
	 * Currently plugin version.
	 *
	 * Start at version 1.0.0 and use SemVer - https://semver.org
	 * RUpdate it as you release new versions.
	 *
	 * The getter is set in the 'includes/Plugin_Name_Helpers.php' file.
	 */
	\define( 'Plugin_Name\PLUGIN_VERSION', '1.0.0' );
}

if ( ! \defined( '\Plugin_Name\PLUGIN_NAME' ) ) {
	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * The name is also used for the translation text domain.
	 * The getter is set in the 'includes/Plugin_Name_Helpers.php' file.
	 */
	\define( 'Plugin_Name\PLUGIN_NAME', 'plugin-name' );
}

if ( ! \defined( '\Plugin_Name\PLUGIN_PREFIX' ) ) {
	/**
	 * The unique prefix of this plugin.
	 *
	 * The getter is set in the 'includes/Plugin_Name_Helpers.php' file.
	 */
	\define( 'Plugin_Name\PLUGIN_PREFIX', 'plugin_name' );
}

if ( ! \defined( '\Plugin_Name\REQUIRED_CAP' ) ) {
	/**
	 * The name of the management capability of this plugin.
	 *
	 * The getter is set in the 'includes/Plugin_Name_Helpers.php' file.
	 */
	\define( 'Plugin_Name\REQUIRED_CAP', \Plugin_Name\PLUGIN_PREFIX . '_plugin_manage' );
}

if ( ! \defined( '\Plugin_Name\PLUGIN_URL' ) ) {
	/**
	 * The URL path of the directory that contains the plugin (with trailing slash).
	 */
	\define( 'Plugin_Name\PLUGIN_URL', \plugin_dir_url( __FILE__ ) );
}

if ( ! \defined( '\Plugin_Name\PLUGIN_PATH' ) ) {
	/**
	 * The filesystem PATH of the directory that contains the plugin (with trailing slash).
	 */
	\define( 'Plugin_Name\PLUGIN_PATH', \plugin_dir_path( __FILE__ ) );
}
