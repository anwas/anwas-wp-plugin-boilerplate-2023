<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * When populating this file, consider the following flow
 * of control:
 *
 * - This method should be static
 * - Check if the $_REQUEST content actually is the plugin name
 * - Run an admin referrer check to make sure it goes through authentication
 * - Verify the output of $_GET makes sense
 * - Repeat with other user roles. Best directly by using the links/query string parameters.
 * - Repeat things for multisite. Once for a single site in the network, once sitewide.
 *
 * This file may be updated more in future version of the Boilerplate; however, this is the
 * general skeleton and outline for how the file should work.
 *
 * For more information, see the following discussion:
 * https://github.com/tommcfarlin/WordPress-Plugin-Boilerplate/pull/123#issuecomment-28541913
 *
 * @link       http://example.com/
 * @since      1.0.0
 *
 * @package    Plugin_Name
 */

$plugin_prefix = 'plugin_name';
$required_cap  = $plugin_prefix . '_plugin_manage';

// If uninstall not called from WordPress,
// if no uninstall action,
// if not this plugin,
// if no caps,
// then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' )
	|| empty( $_REQUEST )
	|| ! isset( $_REQUEST['plugin'] )
	|| ! isset( $_REQUEST['action'] )
	|| 'plugin-name/plugin-name.php' !== $_REQUEST['plugin']
	|| 'delete-plugin' !== $_REQUEST['action']
	|| ! check_ajax_referer( 'updates', '_ajax_nonce' )
	|| ! current_user_can( 'activate_plugins' )
	|| ! current_user_can( $required_cap )
) {
	wp_die( 'Action denied.' );
	exit;
}

// delete_option( $plugin_prefix . '_plugin_options' ); // If set, remove saved options from the database.

$admin_role = get_role( 'administrator' );

if ( ! empty( $admin_role ) ) {
	$admin_role->remove_cap( $required_cap );
}

$editor_role = get_role( 'editor' );

if ( ! empty( $editor_role ) ) {
	$editor_role->remove_cap( $required_cap );
}
