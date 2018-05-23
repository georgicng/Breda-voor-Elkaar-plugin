<?php

/**
 * Fired during plugin activation
 *
 * @link       https://bytecode.nl
 * @since      1.0.0
 *
 * @package    Breda_Voor_Elkaar
 * @subpackage Breda_Voor_Elkaar/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Breda_Voor_Elkaar
 * @subpackage Breda_Voor_Elkaar/includes
 * @author     Bytecode Digital Agency B.V. <support@bytecode.nl>
 */
class Breda_Voor_Elkaar_Activator {

	/**
	 * Function called on activation.
	 *
	 * Creates user roles.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
        /**
         * Add User Roles
         */
        add_role('organisation', 'Organisatie', array('read' => true, 'level_0' => true));
        add_role('volunteer', 'Vrijwilliger', array('read' => true, 'level_0' => true));

	}

}
