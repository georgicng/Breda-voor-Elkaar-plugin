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
        add_role('organisation', 'Organisatie', ['read' => true, 'level_0' => true]);
        add_role('volunteer', 'Vrijwilliger', ['read' => true, 'level_0' => true]);
        
        create_page('Organisaties');
        create_page('Vrijwilligers');
        create_page('Vacatures');

        create_page('Mijn Account');
        create_page('Nieuwe Vacature');
        create_page('Wijzig Wachtwoord');
    }
}

/**
 * Create a WordPress page.
 */
function create_page($name) {
    if(get_page_by_title($name) == NULL){
        $post = array(
            'comment_status' => 'closed',
            'ping_status' =>  'closed' ,
            'post_author' => 1,
            'post_date' => date('Y-m-d H:i:s'),
            'post_name' => $name,
            'post_status' => 'publish' ,
            'post_title' => $name,
            'post_type' => 'page'
        );
        wp_insert_post( $post ); 
    }
}
