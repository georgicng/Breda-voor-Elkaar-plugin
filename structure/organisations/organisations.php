<?php
/**
 * This file contains all functionality regarding organisations as a customization to WordPress users.
 */

/**
  * Add Custom Fields on plugin init.
  */
function register_custom_fields_organisation(){
    if(function_exists("register_field_group")){
        register_field_group(array (
            'id' => 'acf_organisations',
            'title' => 'Organisations',
            'fields' => array (
                array (
                    'key' => 'field_5b06cc0343564',
                    'label' => 'Adres',
                    'name' => 'adres',
                    'type' => 'google_map',
                    'center_lat' => '',
                    'center_lng' => '',
                    'zoom' => '',
                    'height' => '',
                ),
                array (
                    'key' => 'field_5b06cc6d43567',
                    'label' => 'Categorie',
                    'name' => 'categorie',
                    'type' => 'checkbox',
                    'choices' => array (
                        'categorie1' => 'categorie1',
                        'categorie2' => 'categorie2',
                        'categorie3' => 'categorie3',
                        'categorie4' => 'categorie4',
                        'categorie5' => 'categorie5',
                        'categorie6' => 'categorie6',
                        'categorie7' => 'categorie7',
                        'categorie8' => 'categorie8',
                        'categorie9' => 'categorie9',
                    ),
                    'default_value' => '',
                    'layout' => 'vertical',
                ),
                array (
                    'key' => 'field_5b06cc8f43568',
                    'label' => 'Telefoonnummer',
                    'name' => 'telefoonnummer',
                    'type' => 'text',
                    'default_value' => '',
                    'placeholder' => '999-123-4567',
                    'prepend' => '',
                    'append' => '',
                    'formatting' => 'html',
                    'maxlength' => '',
                ),
                array (
                    'key' => 'field_5b06ccef43569',
                    'label' => 'Afbeelding',
                    'name' => 'afbeelding',
                    'type' => 'image',
                    'save_format' => 'url',
                    'preview_size' => 'thumbnail',
                    'library' => 'all',
                ),
            ),
            'location' => array (
                array (
                    array (
                        'param' => 'ef_user',
                        'operator' => '==',
                        'value' => 'organisation',
                        'order_no' => 0,
                        'group_no' => 0,
                    ),
                ),
            ),
            'options' => array (
                'position' => 'normal',
                'layout' => 'no_box',
                'hide_on_screen' => array (
                ),
            ),
            'menu_order' => 0,
        ));
    }
}
add_action( 'plugins_loaded', 'register_custom_fields_organisation' );

/**
 * Change template for this role
 */

