<?php
/**
 * Fired during plugin activation
 *
 * @link       http://example.com/
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 */

declare( strict_types=1 );

namespace Plugin_Name;

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 * @author     Your Name <email@example.com>
 */
class Plugin_Name_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * During plugin activation for `administrator` and `editor` roles
	 * are assigned the management capabilities of the plugin.
	 * The rewrite rules are removed and re-created.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		if ( ! current_user_can( 'activate_plugins' ) ) {
			return;
		}

		$admin_role = get_role( 'administrator' );

		if ( ! empty( $admin_role ) ) {
			$admin_role->add_cap( \Plugin_Name\PLUGIN_PREFIX . '_plugin_manage' );
		}

		$editor_role = get_role( 'editor' );

		if ( ! empty( $editor_role ) ) {
			$editor_role->add_cap( \Plugin_Name\PLUGIN_PREFIX . '_plugin_manage' );
		}

		flush_rewrite_rules();

	}

}
