<?php
/**
 * This file contains all functionality regarding organisations as a customization to WordPress users.
 */

/**
 * Add Custom Fields on plugin init.
 */
function register_custom_fields_organisation() {
    if (function_exists('register_field_group')) {
        register_field_group([
            'id' => 'acf_organisations',
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
                        'Bar & kantine' => 'Bar & kantine',
                        'Bestuur & strategie' => 'Bestuur & strategie',
                        'Boodschappen' => 'Boodschappen',
                        'Collectie & fondsenwerving' => 'Collectie & fondsenwerving',
                        'Computer' => 'Computer',
                        'Coördineren & regelen' => 'Coördineren & regelen',
                        'Creatief & muziek' => 'Creatief & muziek',
                        'Digitaal & IT' => 'Digitaal & IT',
                        'Erop uit' => 'Erop uit',
                        'Evenementen' => 'Evenementen',
                        'Financieel & juridisch' => 'Financieel & juridisch',
                        'Gastvrouw-heer' => 'Gastvrouw-heer',
                        'Geschikt als team- of vriendenuitje' => 'Geschikt als team- of vriendenuitje',
                        'Gezelschap' => 'Gezelschap',
                        'Huishoudelijk' => 'Huishoudelijk',
                        'Huiswerkbegeleiding' => 'Huiswerkbegeleiding',
                        'Klussen & techniek' => 'Klussen & techniek',
                        'Maaltijden en koken' => 'Maaltijden en koken',
                        'Maatschappelijke stage' => 'Maatschappelijke stage',
                        'Mantelzorg ondersteuning' => 'Mantelzorg ondersteuning',
                        'Marketing, communicatie & PR' => 'Marketing, communicatie & PR',
                        'Oppas' => 'Oppas',
                        'Sporten' => 'Sporten',
                        'Taal & lezen' => 'Taal & lezen',
                        'Toezicht & beheer' => 'Toezicht & beheer',
                        'Tuin & natuur' => 'Tuin & natuur',
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
add_action('plugins_loaded', 'register_custom_fields_organisation');

/**
 * Register Custom Relationship Fields on init.
 */
function register_relationships_organisation()
{
    if (function_exists('acf_add_local_field_group')):
        acf_add_local_field_group(array(
            'key' => 'group_5b0fe690c85d2',
            'title' => 'Vacancy',
            'fields' => array(
                array(
                    'key' => 'field_5b0fe6fd5dfc7',
                    'label' => 'Vacancies',
                    'name' => 'vacancies',
                    'type' => 'relationship',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'post_type' => array(
                        0 => 'vacancies',
                    ),
                    'taxonomy' => array(
                    ),
                    'filters' => array(
                        0 => 'search',
                        1 => 'post_type',
                        2 => 'taxonomy',
                    ),
                    'elements' => '',
                    'min' => '',
                    'max' => '',
                    'return_format' => 'object',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'user_role',
                        'operator' => '==',
                        'value' => 'organisation',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => 1,
            'description' => '',
        ));

    endif;
}
add_action('plugins_loaded', 'register_relationships_organisation');

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