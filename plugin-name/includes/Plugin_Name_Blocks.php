<?php
/**
 * The file that defines the Plugin_Name_Blocks class file
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
 * Define the WordPress Gutenberg Blocks functionality.
 *
 * @since      1.0.0
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 * @author     Your Name <email@example.com>
 */
class Plugin_Name_Blocks {

	/**
	 * Singleton class instance with collection of helpers methods.
	 *
	 * @since  1.0.0
	 * @access private
	 *
	 * @var \Plugin_Name\Plugin_Name_Helpers $helpers Singleton class instance with collection of helpers methods.
	 */
	private \Plugin_Name\Plugin_Name_Helpers $helpers;

	/**
	 * Initialize the class.
	 */
	public function __construct() {}

	/**
	 * Registers the block using the metadata loaded from the `block.json` file.
	 * Behind the scenes, it registers also all assets so they can be enqueued
	 * through the block editor in the corresponding context.
	 *
	 * @see https://developer.wordpress.org/reference/functions/register_block_type/
	 */
	public function action_register_block_types() {
		$this->helpers = \Plugin_Name\Plugin_Name_Helpers::get_instance();

		// \register_block_type( $this->helpers::get_file_path( '/blocks/plugin-name-form/' ) );
	}

}
