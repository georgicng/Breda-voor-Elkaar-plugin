<?php
/**
 * This file contains all functionality regarding organisations as a customization to WordPress users.
 */

/**
 * Add Custom Fields on plugin init.
 */
function register_custom_fields_organisation() {
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group([
            'key' => 'acf_organisations',
            'title' => 'Organisations',
            'fields' => [
                [
                    'key' => 'field_5b06cc0343564',
                    'label' => 'Adres',
                    'name' => 'adres',
                    'type' => 'google_map',
                    'center_lat' => '51.5598461',
                    'center_lng' => '4.624259',
                    'zoom' => '',
                    'height' => '',
                ],
                [
                    'key' => 'field_5b06cc6d43567',
                    'label' => 'Categorie',
                    'name' => 'categorie',
                    'type' => 'checkbox',
                    'choices' => [
                        '(huis)dieren' => '(huis)dieren',
                        'Administratie' => 'Administratie',
                        'Bar en kantine' => 'Bar en kantine',
                        'Bestuur en strategie' => 'Bestuur en strategie',
                        'Boodschappen' => 'Boodschappen',
                        'Collectie en fondsenwerving' => 'Collectie en fondsenwerving',
                        'Computer' => 'Computer',
                        'Coördineren en regelen' => 'Coördineren en regelen',
                        'Creatief en muziek' => 'Creatief en muziek',
                        'Digitaal en IT' => 'Digitaal en IT',
                        'Erop uit' => 'Erop uit',
                        'Evenementen' => 'Evenementen',
                        'Financieel en juridisch' => 'Financieel en juridisch',
                        'Gastvrouw-heer' => 'Gastvrouw-heer',
                        'Geschikt als team- of vriendenuitje' => 'Geschikt als team- of vriendenuitje',
                        'Gezelschap' => 'Gezelschap',
                        'Huishoudelijk' => 'Huishoudelijk',
                        'Huiswerkbegeleiding' => 'Huiswerkbegeleiding',
                        'Klussen en techniek' => 'Klussen en techniek',
                        'Maaltijden en koken' => 'Maaltijden en koken',
                        'Maatschappelijke stage' => 'Maatschappelijke stage',
                        'Mantelzorg ondersteuning' => 'Mantelzorg ondersteuning',
                        'Marketing, communicatie en PR' => 'Marketing, communicatie en PR',
                        'Oppas' => 'Oppas',
                        'Sporten' => 'Sporten',
                        'Taal en lezen' => 'Taal en lezen',
                        'Toezicht en beheer' => 'Toezicht en beheer',
                        'Tuin en natuur' => 'Tuin en natuur',
                        'Vervoer' => 'Vervoer',
                        'Vluchtelingenondersteuning' => 'Vluchtelingenondersteuning',
                        'Activiteitenbegeleiding' => 'Activiteitenbegeleiding',
                    ],
                    'default_value' => '',
                    'layout' => 'vertical',
                ],
                [
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
                ],
                [
                    'key' => 'field_5b06ccef43569',
                    'label' => 'Afbeelding',
                    'name' => 'afbeelding',
                    'type' => 'image',
                    'save_format' => 'url',
                    'preview_size' => 'thumbnail',
                    'library' => 'all',
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'ef_user',
                        'operator' => '==',
                        'value' => 'organisation',
                        'order_no' => 0,
                        'group_no' => 0,
                    ],
                ],
            ],
            'options' => [
                'position' => 'normal',
                'layout' => 'no_box',
                'hide_on_screen' => [
                ],
            ],
            'menu_order' => 0,
        ]);
    }
}
add_action('acf/init', 'register_custom_fields_organisation');

/**
 * Set template for archive page.
 */    
 function archive_organisation_template( $page_template ) {
     if ( is_page( 'Organisaties' ) ) {
         $page_template = plugin_dir_path( __FILE__ ) . '/archive-organisations.blade.php';
     }
     return $page_template;
 }
 add_filter( 'page_template', 'archive_organisation_template' );
 