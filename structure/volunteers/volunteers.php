<?php
/**
 * This file contains all functionality regarding volunteers as a customization to WordPress users.
 */

/**
 * Make volunteer the default user-role
 */
add_filter('pre_option_default_role', function ($default_role) {
    return 'volunteer'; // This is changed
});

/**
 * Add Custom Fields on plugin init.
 */
function register_custom_fields_volunteer()
{
    if (function_exists('register_field_group')) {
        register_field_group([
            'id' => 'acf_vrijwilliger',
            'title' => 'Vrijwilliger Custom Fields',
            'fields' => [
                [
                    'key' => 'field_5b0596121f564',
                    'label' => 'adres',
                    'name' => 'adres',
                    'type' => 'google_map',
                    'center_lat' => '51.5598461',
                    'center_lng' => '4.624259',
                    'zoom' => '',
                    'height' => '',
                ],
                [
                    'key' => 'field_5b06xx6d43567',
                    'label' => 'Soort vrijwilligerswerk',
                    'name' => 'soort_vrijwilligerswerk',
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
                    'key' => 'field_5c05966d1f567',
                    'label' => 'ervaring',
                    'name' => 'ervaring',
                    'type' => 'select',
                    'choices' => [
                        '0 tot 2 jaar' => '0 tot 2 jaar',
                        '3 tot 5 jaar' => '3 tot 5 jaar',
                        '6 tot 7 jaar' => '6 tot 7 jaar',
                        '8 tot 10 jaar' => '8 tot 10 jaar',
                        '11 tot 15 jaar' => '11 tot 15 jaar',
                        '16 tot 20 jaar' => '16 tot 20 jaar',
                        '21 tot 25 jaar' => '21 tot 25 jaar',
                        '26 tot 30 jaar' => '26 tot 30 jaar',
                        '31 tot 35 jaar' => '31 tot 35 jaar',
                        'Meer dan 35 jaar' => 'Meer dan 35 jaar',
                    ],
                    'default_value' => '',
                    'allow_null' => 0,
                    'multiple' => 0,
                ],
                [
                    'key' => 'field_5c05963d1f567',
                    'label' => 'leeftijd',
                    'name' => 'leeftijd',
                    'type' => 'select',
                    'choices' => [
                        'Jonger dan 18 jaar' => 'Jonger dan 18 jaar',
                        '18 tot 22 jaar' => '18 tot 22 jaar',
                        '23 tot 27 jaar' => '23 tot 27 jaar',
                        '28 tot 32 jaar' => '28 tot 32 jaar',
                        '33 tot 37 jaar' => '33 tot 37 jaar',
                        '38 tot 42 jaar' => '38 tot 42 jaar',
                        '43 tot 47 jaar' => '43 tot 47 jaar',
                        '48 tot 52 jaar' => '48 tot 52 jaar',
                        '53 tot 57 jaar' => '53 tot 57 jaar',
                    ],
                    'default_value' => '',
                    'allow_null' => 0,
                    'multiple' => 0,
                ],
                [
                    'key' => 'field_5b05966d1f567',
                    'label' => 'opleiding',
                    'name' => 'opleiding',
                    'type' => 'select',
                    'choices' => [
                        'Voortgezet onderwijs' => 'Voortgezet onderwijs',
                        'MBO' => 'MBO',
                        'HBO' => 'HBO',
                        'Universitair' => 'Universitair',
                        'Student' => 'Student',
                        'Anders' => 'Anders',
                    ],
                    'default_value' => '',
                    'allow_null' => 0,
                    'multiple' => 0,
                ],
                [
                    'key' => 'field_5b0596ba1f568',
                    'label' => 'cv',
                    'name' => 'cv',
                    'type' => 'file',
                    'save_format' => 'url',
                    'library' => 'all',
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'ef_user',
                        'operator' => '==',
                        'value' => 'volunteer',
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
add_action('plugins_loaded', 'register_custom_fields_volunteer');

/**
 * Register Custom Relationship Fields on init.
 */
function register_relationships_volunteer()
{
    if (function_exists('acf_add_local_field_group')):
        acf_add_local_field_group(array(
            'key' => 'group_5b0fe690c85d2',
            'title' => 'Apply',
            'fields' => array(
                array(
                    'key' => 'field_5b0fe6fd5dfc7',
                    'label' => 'Applied',
                    'name' => 'applied',
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
                        'value' => 'volunteer',
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
add_action('plugins_loaded', 'register_relationships_volunteer');

/**
 * Set template for archive page.
 */    
 function archive_volunteer_template( $page_template ) {
     if ( is_page( 'Vrijwilligers' ) ) {
         $page_template = plugin_dir_path( __FILE__ ) . '/archive-volunteers.blade.php';
     }
     return $page_template;
 }
 add_filter( 'page_template', 'archive_volunteer_template' );
