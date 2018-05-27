<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://bytecode.nl
 * @since      1.0.0
 *
 * @package    Breda_Voor_Elkaar
 * @subpackage Breda_Voor_Elkaar/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Breda_Voor_Elkaar
 * @subpackage Breda_Voor_Elkaar/includes
 * @author     Bytecode Digital Agency B.V. <support@bytecode.nl>
 */
class Breda_Voor_Elkaar_i18n {
    /**
     * Load the plugin text domain for translation.
     *
     * @since    1.0.0
     */
    public function load_plugin_textdomain() {
        load_plugin_textdomain(
            'breda-voor-elkaar',
            false,
            dirname(dirname(plugin_basename(__FILE__))) . '/languages/'
        );
    }
}
