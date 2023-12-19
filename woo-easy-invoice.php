<?php
/**
 * Plugin Name:       Woo Easy Invoice
 * Plugin URI:        https://bestwpdeveloper.com/woo-easy-invoice/
 * Description:       Effortless invoice printing on WooCommerce my-account and thank-you pages  for simplified order tracking.
 * Version:           1.0
 * Author:            Best WP Developer
 * Author URI:        https://bestwpdeveloper.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       woo-easy-invoice
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once ( plugin_dir_path(__FILE__) ) . '/inc/requires-check.php';
final class FinalWCLSRShop{
	const VERSION = '1.0';
	const MINIMUM_PHP_VERSION = '7.0';
	public function __construct() {
		add_action( 'woeic_init', array( $this, 'woeic_loaded_textdomain' ) );
		add_action( 'plugins_loaded', array( $this, 'woeic_init' ) );
		// For woocommerce install check
		if ( ! did_action( 'woocommerce/loaded' ) ) {
			add_action( 'admin_notices', 'woeic_WooCommerce_register_required_plugins' );
			return;
		}
	}

	public function woeic_loaded_textdomain() {
		load_plugin_textdomain( 'woo-easy-invoice', false, basename(dirname(__FILE__)).'/languages' );
	}

	public function woeic_init() {
		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', array( $this, 'woeic_admin_notice_minimum_php_version' ) );
			return;
		}
		// Once we get here, We have passed all validation checks so we can safely include our plugin
		require_once( 'inc/prod-ready.php' );
	}

	public function woeic_admin_notice_minimum_php_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}
		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'woo-easy-invoice' ),
			'<strong>' . esc_html__( 'WooEasy Invoice', 'woo-easy-invoice' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'woo-easy-invoice' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);
		printf( '<div class="notice notice-warning is-dismissible"><p>' . esc_html__('%1$s', 'woo-easy-invoice') . '</p></div>', $message );
	}
}

new FinalWCLSRShop();
remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );