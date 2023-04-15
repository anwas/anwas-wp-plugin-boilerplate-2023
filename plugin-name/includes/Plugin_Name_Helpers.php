<?php
/**
 * The file that defines the Plugin_Name_Helpers class file
 *
 * @link       http://example.com/
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 */

declare( strict_types=1 );

namespace Plugin_Name;

// Require file with defined plugin constants.
require_once \dirname( \plugin_dir_path( __FILE__ ) ) . '/plugin-name-constants.php';

/**
 * Singleton class with collection of helper methods.
 *
 * @since      1.0.0
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 * @author     Your Name <email@example.com>
 */
final class Plugin_Name_Helpers {

	/**
	 * A reference to an instance of the \Plugin_Name\Plugin_Name_Helpers class.
	 *
	 * @since  1.0.0
	 * @access private
	 *
	 * @var \Plugin_Name\Plugin_Name_Helpers $instance A reference to an instance of the \Plugin_Name\Plugin_Name_Helpers class.
	 */
	private static $instance;

	/**
	 * Returns an instance of the Plugin_Name_Helpers class.
	 *
	 * @return \Plugin_Name\Plugin_Name_Helpers An instance of the Plugin_Name_Helpers class.
	 */
	public static function get_instance(): \Plugin_Name\Plugin_Name_Helpers {
		if ( null === static::$instance ) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	/**
	 * Protected constructor blocks the creation of new class instances
	 * via the new keyword outside this class.
	 */
	private function __construct() {}

	/**
	 * The private _clone method blocks the cloning of class instances.
	 */
	private function __clone() {}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @throws \Exception If \Plugin_Name\PLUGIN_NAME constant not set.
	 *
	 * @since 1.0.0
	 *
	 * @return string The string used to uniquely identify this plugin.
	 */
	public static function get_plugin_name(): string {
		if ( ! defined( '\Plugin_Name\PLUGIN_NAME' ) ) {
			static::maybe_display_error(
				__(
					'The \Plugin_Name\PLUGIN_NAME constant must be set. Please set the required constant in the plugin-name-constants.php file.',
					'plugin-name'
				)
			);
		}

		return \Plugin_Name\PLUGIN_NAME;
	}

	/**
	 * The unique prefix of the plugin used to uniquely prefix technical functions.
	 *
	 * @throws \Exception If \Plugin_Name\PLUGIN_PREFIX constant not set.
	 *
	 * @since 1.0.0
	 *
	 * @return string The string used to uniquely prefix technical functions of this plugin.
	 */
	public static function get_plugin_prefix(): string {
		if ( ! defined( '\Plugin_Name\PLUGIN_PREFIX' ) ) {
			static::maybe_display_error(
				__(
					'The \Plugin_Name\PLUGIN_PREFIX constant must be set. Please set the required constant in the plugin-name-constants.php file.',
					'plugin-name'
				)
			);
		}

		return \Plugin_Name\PLUGIN_PREFIX;
	}

	/**
	 * The name of the management capability of this plugin.
	 *
	 * @throws \Exception If \Plugin_Name\REQUIRED_CAP constant not set.
	 *
	 * @since 1.0.0
	 *
	 * @return string The name of the management capability of this plugin.
	 */
	public static function get_plugin_required_cap(): string {
		if ( ! defined( '\Plugin_Name\REQUIRED_CAP' ) ) {
			static::maybe_display_error(
				__(
					'The \Plugin_Name\REQUIRED_CAP constant must be set. Please set the required constant in the plugin-name-constants.php file.',
					'plugin-name'
				)
			);
		}

		return \Plugin_Name\REQUIRED_CAP;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @throws \Exception If \Plugin_Name\PLUGIN_VERSION constant not set.
	 *
	 * @since 1.0.0
	 *
	 * @return string The current version of the plugin.
	 */
	public static function get_version(): string {
		if ( ! defined( '\Plugin_Name\PLUGIN_VERSION' ) ) {
			static::maybe_display_error(
				__(
					'The \Plugin_Name\PLUGIN_VERSION constant must be set. Please set the required constant in the plugin-name-constants.php file.',
					'plugin-name'
				)
			);
		}

		return \Plugin_Name\PLUGIN_VERSION;
	}

	/**
	 * Get the full filesystem path to the file in plugin folder.
	 *
	 * @param string $relative_path Relative file path for the plugin folder.
	 *
	 * @throws \Exception If \Plugin_Name\PLUGIN_PATH constant not set.
	 * @throws \Exception If file not exists.
	 *
	 * @since 1.0.0
	 *
	 * @return string The full filesystem path to the file in plugin folder.
	 */
	public static function get_file_path( string $relative_path ): string {
		if ( ! defined( '\Plugin_Name\PLUGIN_PATH' ) ) {
			static::maybe_display_error(
				__(
					'The \Plugin_Name\PLUGIN_PATH constant must be set. Please set the required constant in the plugin-name-constants.php file.',
					'plugin-name'
				)
			);
		}

		$full_path = \Plugin_Name\PLUGIN_PATH . \ltrim( $relative_path, \DIRECTORY_SEPARATOR );

		if ( ! \file_exists( $full_path ) ) {
			static::maybe_display_error(
				\sprintf(
					// translators: %s file path string.
					\__( 'The %s file does not exist.', 'plugin-name' ),
					$full_path
				)
			);
		}

		return $full_path;
	}

	/**
	 * Get the version number of the asset file.
	 *
	 * @param string $relative_path Relative file path for the plugin folder.
	 *
	 * @throws \Exception If \Plugin_Name\PLUGIN_VERSION constant not set.
	 * @throws \Exception If \Plugin_Name\PLUGIN_PATH constant not set.
	 * @throws \Exception If file not exists.
	 *
	 * @since 1.0.0
	 *
	 * @return string The asset version string.
	 */
	public static function get_asset_version( string $relative_path ): string {
		if ( ! defined( '\WP_DEBUG' ) || false === \WP_DEBUG ) {
			return static::get_version();
		}

		// Get the full filesystem path.
		// Helper method throws an Exception if file not exists or
		// \Plugin_Name\PLUGIN_PATH constant not isset.
		$full_path = static::get_file_path( \str_replace( '/', \DIRECTORY_SEPARATOR, $relative_path ) );

		return (string) \filemtime( $full_path );
	}

	/**
	 * Get the URL path to the file in plugin folder.
	 *
	 * @param string $relative_url Relative file path for the plugin folder.
	 *
	 * @throws \Exception If \Plugin_Name\PLUGIN_PATH constant not set.
	 * @throws \Exception If \Plugin_Name\PLUGIN_URL constant not set.
	 * @throws \Exception If file not exists.
	 *
	 * @since 1.0.0
	 *
	 * @return string The URL path to the file in plugin folder.
	 */
	public static function get_file_url( string $relative_url ): string {
		if ( ! defined( '\Plugin_Name\PLUGIN_URL' ) ) {
			static::maybe_display_error(
				__(
					'The \Plugin_Name\PLUGIN_URL constant must be set. Please set the required constant in the plugin-name-constants.php file.',
					'plugin-name'
				)
			);
		}

		// Try to get full filesystem path to check if file exists.
		// Helper method throws an Exception if file not exists or
		// \Plugin_Name\PLUGIN_PATH constant not isset.
		$full_path = static::get_file_path( \str_replace( '/', \DIRECTORY_SEPARATOR, $relative_url ) );

		return \Plugin_Name\PLUGIN_URL . \ltrim( $relative_url, '/' );
	}

	/**
	 * Get the Custom Taxonomies array of arguments.
	 *
	 * @return array Associative array. The key of the array is the CPT name
	 *               to which the taxonomy is assigned. The value of the array
	 *               is an associative array, where the key is the name of the taxonomy
	 *               and the value is an array of taxonomy registration arguments.
	 */
	public static function get_ctx_args(): array {
		$ctxs = array();

		// Every taxonomy array is described separately,
		// as the same taxonomy can be assigned to several CPTs.
		$custom_form_category = array(
			'labels'              => array(
				'name'          => _x( 'Form categories', 'custom taxonomy plural name', 'plugin-name' ),
				'singular_name' => _x( 'Form category', 'custom taxonomy singular name', 'plugin-name' ),
			),
			'public'              => true,
			'hierarchical'        => true,
			'show_in_rest'        => true,
			'rewrite'             => array(
				'slug' => _x( 'form-category', 'custom taxonomy slug', 'plugin-name' ),
			),
			'show_in_quick_edit'  => true,
			'show_admin_column'   => true,
			'publicly_queryable'  => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
		);

		/*
		 * If we want to add the CPT archive URL in front of the taxonomy URL, we change the 'rewrite' array.
		 * A CPT archive url can only be assigned to one taxonomy once.
		 * If a taxonomy is linked to multiple CPTs, then the URL of the taxonomy must be in addition to the URL part of the CPT archive.
		 */
		$custom_form_category['rewrite']['slug'] = static::get_custom_form_cpt_archive_url() . '/' . _x( 'form-category', 'custom taxonomy slug', 'plugin-name' );

		// The key of the $ctxs array is the CPT name to which the taxonomy is assigned.
		$ctxs['custom_form'] = array(
			'custom_form_category' => $custom_form_category,
		);

		return $ctxs;
	}

	/**
	 * Get the Custom Post Types array of arguments.
	 *
	 * @return array Associated array. The keys of the array are the CPT type
	 *                                 and the values are the array of CPT registration arguments.
	 */
	public static function get_cpt_args(): array {
		$ctx_args = static::get_ctx_args();

		return array(
			'custom_form' => array(
				'description'         => __( 'Custom forms', 'plugin-name' ),
				'labels'              => array(
					'name'                  => _x( 'Forms', 'Post type general name', 'plugin-name' ),
					'singular_name'         => _x( 'Form', 'Post type singular name', 'plugin-name' ),
					'menu_name'             => _x( 'Forms', 'Admin Menu text', 'plugin-name' ),
					'name_admin_bar'        => _x( 'Form', 'Add New on Toolbar', 'plugin-name' ),
					'add_new'               => __( 'Add New', 'plugin-name' ),
					'add_new_item'          => __( 'Add New Form', 'plugin-name' ),
					'new_item'              => __( 'New Form', 'plugin-name' ),
					'edit_item'             => __( 'Edit Form', 'plugin-name' ),
					'view_item'             => __( 'View Form', 'plugin-name' ),
					'all_items'             => __( 'All Forms', 'plugin-name' ),
					'search_items'          => __( 'Search Forms', 'plugin-name' ),
					'parent_item_colon'     => __( 'Parent Forms:', 'plugin-name' ),
					'not_found'             => __( 'No Forms found.', 'plugin-name' ),
					'not_found_in_trash'    => __( 'No Forms found in Trash.', 'plugin-name' ),
					'featured_image'        => _x( 'Form Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'plugin-name' ),
					'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'plugin-name' ),
					'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'plugin-name' ),
					'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'plugin-name' ),
					'archives'              => _x( 'Form archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'plugin-name' ),
					'insert_into_item'      => _x( 'Insert into Form', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'plugin-name' ),
					'uploaded_to_this_item' => _x( 'Uploaded to this Form', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'plugin-name' ),
					'filter_items_list'     => _x( 'Filter Forms list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'plugin-name' ),
					'items_list_navigation' => _x( 'Forms list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'plugin-name' ),
					'items_list'            => _x( 'Forms list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'plugin-name' ),
				),
				'public'              => true,
				'hierarchical'        => false,
				'exclude_from_search' => false,
				'publicly_queryable'  => true,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'show_in_nav_menus'   => true,
				'show_in_rest'        => true,
				'menu_icon'           => 'dashicons-awards',
				'supports'            => array(
					'title',
					'editor',
					'thumbnail',
					'custom-fields',
					'author',
					'page-attributes',
					'excerpt',
				),
				'taxonomies'          => \array_keys( $ctx_args['custom_form'] ),
				'has_archive'         => static::get_custom_form_cpt_archive_url(),
				'rewrite'             => array(
					'slug' => static::get_custom_form_cpt_archive_url(),
				),
				'template'            => array(
					array(
						'core/paragraph',
						array(
							'placeholder' => esc_html__( 'Start creating amazing content', 'plugin-name' ),
						),
					),
				),
			),
		);
	}

	/**
	 * Get the URL path of the custom_forms CPT archive.
	 *
	 * @return string A URL path without a website domain and without leading and trailing slashes.
	 */
	public static function get_custom_form_cpt_archive_url(): string {
		return _x( 'plugin-name', 'Post type archive slug', 'plugin-name' );
	}

	/**
	 * Date validator.
	 *
	 * @param string $date Date and time string. E.g.: '2034-01-01' or '2025-12-31 23:59:59'.
	 * @param string $format In which format the date is passed. Default 'Y-m-d H:i:s'.
	 *
	 * @return bool True if date valid, othervise false.
	 */
	public static function is_valid_date( string $date, string $format = 'Y-m-d H:i:s' ): bool {
		$d = \DateTime::createFromFormat( $format, $date );

		return ( $d && $d->format( $format ) === $date );
	}

	/**
	 * Shows error message or throws Exception depending on whether the 'WP_DEBUG' constant is set and current user can manage options.
	 *
	 * @throws \Exception If 'WP_DEBUG' constant is set to true.
	 *
	 * @param string $error_message Error message.
	 * @param int    $error_code Exception Error code. Default 1.
	 *
	 * @return void
	 */
	public static function maybe_display_error( string $error_message, int $error_code = 1 ): void {
		if ( \defined( '\WP_DEBUG' ) && true === \WP_DEBUG && \current_user_can( 'manage_options' ) ) {
			throw new \Exception( \esc_html( $error_message ), $error_code );
		}

		\printf(
			'<div class="error">%s</div>',
			esc_html__( 'Error. Please try again later or contact the site administrator.', 'plugin-name' )
		);
	}

}
