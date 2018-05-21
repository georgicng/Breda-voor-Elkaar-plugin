<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://bytecode.nl
 * @since             1.0.0
 * @package           Breda_Voor_Elkaar
 *
 * @wordpress-plugin
 * Plugin Name:       Breda voor Elkaar
 * Plugin URI:        https://bytecode.nl
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Bytecode Digital Agency B.V.
 * Author URI:        https://bytecode.nl
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       breda-voor-elkaar
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
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-breda-voor-elkaar-activator.php
 */
function activate_breda_voor_elkaar() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-breda-voor-elkaar-activator.php';
	Breda_Voor_Elkaar_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-breda-voor-elkaar-deactivator.php
 */
function deactivate_breda_voor_elkaar() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-breda-voor-elkaar-deactivator.php';
	Breda_Voor_Elkaar_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_breda_voor_elkaar' );
register_deactivation_hook( __FILE__, 'deactivate_breda_voor_elkaar' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-breda-voor-elkaar.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_breda_voor_elkaar() {

	$plugin = new Breda_Voor_Elkaar();
	$plugin->run();

}
run_breda_voor_elkaar();
