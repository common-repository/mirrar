<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://mirrar.com/
 * @since             1.1.0
 * @package           Mirrar
 *
 * @wordpress-plugin
 * Plugin Name:       mirrAR
 * Plugin URI:        http://mirrar.com/
 * Description:       We, at mirrAR, are creating new-age shopping experiences. We have built the world’s first real-time Augmented Reality (AR) tech platform that lets shoppers virtually try-on jewellery without physically wearing it before making a purchase. This has helped jewellers sell products without even having physical inventory & creating a unique & immersive experience for their customers, both online & offline.
 * Version:           2.1.1
 * Author:            mirrAR.com
 * Author URI:        http://mirrar.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mirrar
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
define( 'MIRRAR_VERSION', '2.1.1' );
define( 'MIRRAR_PRODUCT_SKU_KEY', 'mirrar_custom_sku' );
define( 'MIRRAR_BRAND_API_URL', 'https://m.mirrar.com/api/v1/brands/id-login');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-mirrar-activator.php
 */
function activate_mirrar() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mirrar-activator.php';
	Mirrar_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-mirrar-deactivator.php
 */
function deactivate_mirrar() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mirrar-deactivator.php';
	Mirrar_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_mirrar' );
register_deactivation_hook( __FILE__, 'deactivate_mirrar' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-mirrar.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_mirrar() {

	$plugin = new Mirrar();
	$plugin->run();

}
run_mirrar(); 
