<?php
/**
 * Plugin Name: PowerPack Lite for Beaver Builder
 * Plugin URI: https://wpbeaveraddons.com
 * Description: The most powerful, flexible, and light-weight add-on for Beaver Builder.
 * Version: 1.0.0
 * Author: Team IdeaBox - WP Beaver Addons
 * Author URI: https://wpbeaveraddons.com
 * Copyright: (c) 2016 IdeaBox Creations
 * License: GNU General Public License v2.0
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: bb-powerpack
 * Domain Path: /languages
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class BB_PowerPack_Lite {
	/**
     * Holds the class object.
     *
     * @since 1.0.0
     *
     * @var object
     */
    public static $instance;

	/**
	 * Primary class constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		register_activation_hook( __FILE__, array( $this, 'plugin_activation' ) );
		add_action( 'init', array( $this, 'load_files' ) );
		add_action( 'plugins_loaded', array( $this, 'function_files' ) );
		add_action( 'network_admin_notices', array( $this, 'admin_notices' ) );
		add_action( 'admin_notices', array( $this, 'admin_notices' ) );
		add_filter( 'body_class', array( $this, 'body_class' ) );
	}

	/**
	 * Load language files.
	 *
	 * @since 1.1.4
	 *
	 * @return null
	 */

	public function bb_powerpack_textdomain() {
    	load_plugin_textdomain( 'bb-powerpack', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
	}


	/**
	 * Modules and Fields.
	 *
	 * @since 1.0.0
	 *
	 * @return null
	 */
	public function load_files() {
		if ( class_exists( 'FLBuilder' ) && ! class_exists( 'BB_PowerPack' ) ) {
			require_once 'fields.php';
		}
	}

	/**
	 * Include row and column setting extendor.
	 *
	 * @since 1.0.0
	 *
	 * @return null
	 */
	public function function_files() {

		if ( class_exists( 'FLBuilder' ) && ! class_exists( 'BB_PowerPack' ) ) {
			require_once 'extensions/row.php';
			require_once 'extensions/column.php';
		}

		$this->bb_powerpack_textdomain();
	}

	/**
	 * Admin notices.
	 *
	 * @since 1.0.0
	 *
	 * @return null
	 */
	public function admin_notices() {
		if ( ! is_admin() ) {
			return;
		}
		else if ( ! is_user_logged_in() ) {
			return;
		}
		else if ( ! current_user_can( 'update_core' ) ) {
			return;
		}
		if ( !is_plugin_active( 'bb-plugin/fl-builder.php' ) ) {
			if ( !is_plugin_active( 'beaver-builder-lite-version/fl-builder.php' ) ) {
				echo sprintf('<div class="notice notice-error"><p>%s</p></div>', __('Please install and activate <a href="https://wordpress.org/plugins/beaver-builder-lite-version/" target="_blank">Beaver Builder Lite</a> or <a href="https://www.wpbeaverbuilder.com/pricing/" target="_blank">Beaver Builder Pro</a> to use PowerPack add-on.', 'bb-powerpack'));
			}
		}
		if ( class_exists( 'BB_PowerPack' ) ) {
			echo sprintf('<div class="notice notice-error"><p>%s</p></div>', __('You already have PowerPack Pro version. PowerPack Lite cannot be used with the Pro version.', 'bb-powerpack'));
		}
		/* Check transient, if available display notice */
    	if ( get_transient( 'bb-powerpack-lite-admin-notices' ) ) {
			if ( ! class_exists( 'BB_PowerPack' ) && ( is_plugin_active( 'bb-plugin/fl-builder.php' ) || is_plugin_active( 'beaver-builder-lite-version/fl-builder.php' ) ) ) {
				echo sprintf('<div class="notice notice-info is-dismissible"><p>%s</p></div>', __('Thank you for choosing PowerPack Lite for Beaver Builder. Checkout <a href="https://wpbeaveraddons.com/?utm_medium=powerpack-lite&utm_source=plugin-page&utm_campaign=activation-message" target="_blank">Pro version</a> for more features.', 'bb-powerpack'));
				delete_transient( 'bb-powerpack-lite-admin-notices' );
			}
		}
	}

	/**
	 * Check for PowerPack pro version.
	 *
	 * @since 1.0.0
	 *
	 * @return null
	 */
	function plugin_activation() {
		/* Create transient data */
    	set_transient( 'bb-powerpack-lite-admin-notices', true, 0 );
	}


	/**
	 * Add CSS class to body.
	 *
	 * @since 1.0.0
	 *
	 * @return array Array of CSS classes for body tag.
	 */
	public function body_class( $classes ) {
		if ( class_exists( 'FLBuilder' ) && class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_active() ) {
			$classes[] = 'bb-powerpack';
		}

		return $classes;
	}

	/**
	 * Returns the singleton instance of the class.
	 *
	 * @since 1.0.0
	 *
	 * @return object The BB_PowerPack object.
	 */
	public static function get_instance() {

		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof BB_PowerPack_Lite ) ) {
			self::$instance = new BB_PowerPack_Lite();
		}

		return self::$instance;

	}

}

// Load the PowerPack class.
$bb_powerpack_lite = BB_PowerPack_Lite::get_instance();
