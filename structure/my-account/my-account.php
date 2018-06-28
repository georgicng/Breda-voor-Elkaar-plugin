<?php
/**
 * This file contains all functionality regarding the my-account page.
 */

/**
 * Set template for my-account page.
 */    
 function my_account_template( $page_template ) {
     if ( is_page( 'Mijn Account' ) ) {
         $page_template = plugin_dir_path( __FILE__ ) . '/template.blade.php';
     }
     return $page_template;
 }
 add_filter( 'page_template', 'my_account_template' );
 