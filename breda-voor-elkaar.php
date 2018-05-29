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
 * Description:       Adds all custom functionality for Breda voor Elkaar
 * Version:           1.0.0
 * Author:            Bytecode Digital Agency B.V.
 * Author URI:        https://bytecode.nl
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       breda-voor-elkaar
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * Currently plugin version.
 * Start at version 0.1.0 and use SemVer - https://semver.org
 */
define('PLUGIN_NAME_VERSION', '0.1.0');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-breda-voor-elkaar-activator.php
 */
function activate_breda_voor_elkaar() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-breda-voor-elkaar-activator.php';
    Breda_Voor_Elkaar_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-breda-voor-elkaar-deactivator.php
 */
function deactivate_breda_voor_elkaar() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-breda-voor-elkaar-deactivator.php';
    Breda_Voor_Elkaar_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_breda_voor_elkaar');
register_deactivation_hook(__FILE__, 'deactivate_breda_voor_elkaar');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-breda-voor-elkaar.php';

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

/**
 * Change author slug
 */
add_action('init', 'change_author_slug');
function change_author_slug() {
    global $wp_rewrite;
    $author_slug = 'profile'; // change slug name
    $wp_rewrite->author_base = $author_slug;
}

/**
 * Change author template single
 *
 * @param $template represents the template as it came in through the template_include hook
 */
function change_template_single_author($template) {
    if (is_author()) {
        $author_id = get_query_var('author');
        $author_meta = get_userdata($author_id);
        $author_roles = $author_meta->roles;
        if (in_array('organisation', $author_roles)) {
            $template = plugin_dir_path(__FILE__) . 'structure/organisations/single.php';
        } elseif (in_array('volunteer', $author_roles)) {
            $template = plugin_dir_path(__FILE__) . 'structure/volunteers/single.php';
        } else {
            echo 'user was not an organisation nor a volunteer';
        }
    }
    return $template;
}
add_filter('template_include', 'change_template_single_author');