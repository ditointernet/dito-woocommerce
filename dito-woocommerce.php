<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://dito.com.br/
 * @since             1.0.0
 * @package           Dito_Woocommerce
 *
 * @wordpress-plugin
 * Plugin Name:       Dito WooCommerce
 * Plugin URI:        http://dito.com.br/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Tannus Esquerdo
 * Author URI:        http://dito.com.br/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       dito-woocommerce
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
define( 'DITO_WOOCOMMERCE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-dito-woocommerce-activator.php
 */
function activate_dito_woocommerce() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-dito-woocommerce-activator.php';
	Dito_Woocommerce_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-dito-woocommerce-deactivator.php
 */
function deactivate_dito_woocommerce() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-dito-woocommerce-deactivator.php';
	Dito_Woocommerce_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_dito_woocommerce' );
register_deactivation_hook( __FILE__, 'deactivate_dito_woocommerce' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-dito-woocommerce.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_dito_woocommerce() {

	$plugin = new Dito_Woocommerce();
	$plugin->run();

}
run_dito_woocommerce();
