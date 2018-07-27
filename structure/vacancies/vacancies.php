<?php
/**
 * This file contains all functionality regarding vacancies as a custom post type in WordPress.
 */

/**
 * Create the 'Vacancies' post type
 */
function create_post_type_vacancy()
{
    register_post_type(
        'vacancies',
        [
            'labels' => [
                'name' => __('Vacancies'),
                'singular_name' => __('Vacancy'),
            ],
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'vacatures'),
        ]
    );
}
add_action('init', 'create_post_type_vacancy');

/**
 * Add Custom Fields on plugin init.
 */
function register_custom_fields_vacancy()
{
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group([
            'key' => 'group_5b06d03b9459b',
            'title' => 'Vacancies',
            'fields' => [
                [
                    'key' => 'field_5b06cc6d43567',
                    'label' => 'Soort Vrijwilligerswerk',
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
                    'key' => 'field_5b06d097c1efe',
                    'label' => 'Frequentie',
                    'name' => 'frequentie',
                    'type' => 'checkbox',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ],
                    'choices' => [
                        'Eenmalig' => 'Eenmalig',
                        'Soms' => 'Soms',
                        'Regelmatig' => 'Regelmatig',
                        'Structureel' => 'Structureel',
                    ],
                    'allow_custom' => 0,
                    'save_custom' => 0,
                    'default_value' => [
                    ],
                    'layout' => 'vertical',
                    'toggle' => 0,
                    'return_format' => 'value',
                ],
                [
                    'key' => 'field_5b06d0d3c1eff',
                    'label' => 'Startdatum',
                    'name' => 'Startdatum',
                    'type' => 'date_picker',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ],
                    'display_format' => 'd/m/Y',
                    'return_format' => 'd/m/Y',
                    'first_day' => 1,
                ],
                [
                    'key' => 'field_5b06d9f740f4d',
                    'label' => 'Vervaldatum',
                    'name' => 'vervaldatum',
                    'type' => 'date_picker',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ],
                    'display_format' => 'd/m/Y',
                    'return_format' => 'd/m/Y',
                    'first_day' => 1,
                ],
                [
                    'key' => 'field_5b06d0e7c1f00',
                    'label' => 'Opleidingsniveau',
                    'name' => 'opleidingsniveau',
                    'type' => 'checkbox',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ],
                    'choices' => [
                        'Voortgezet Onderwijs' => 'Voortgezet Onderwijs',
                        'MBO' => 'MBO',
                        'HBO' => 'HBO',
                        'Universitair' => 'Universitair',
                        'Student' => 'Student',
                        'Anders' => 'Anders',
                    ],
                    'allow_custom' => 0,
                    'save_custom' => 0,
                    'default_value' => [
                    ],
                    'layout' => 'vertical',
                    'toggle' => 0,
                    'return_format' => 'value',
                ],
                [
                    'key' => 'field_5b06d9e740f4c',
                    'label' => 'Ervaring',
                    'name' => 'ervaring',
                    'type' => 'checkbox',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ],
                    'choices' => [
                        'Geen ervaring' => 'Geen ervaring',
                        'minder dan 1 jaar' => 'minder dan 1 jaar',
                        '2 jaar' => '2 jaar',
                        '3 jaar' => '2 jaar',
                        '4 jaar' => '2 jaar',
                        '5 jaar' => '2 jaar',
                        '6 jaar' => '2 jaar',
                        '7 jaar' => '2 jaar',
                        '8 jaar of meer' => '8 jaar of meer',
                    ],
                    'allow_custom' => 0,
                    'save_custom' => 0,
                    'default_value' => [
                    ],
                    'layout' => 'vertical',
                    'toggle' => 0,
                    'return_format' => 'value',
                ],
                [
                    'key' => 'field_5b06da1440f4e',
                    'label' => 'Vergoeding',
                    'name' => 'vergoeding',
                    'type' => 'checkbox',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ],
                    'choices' => [
                        'Met vergoeding' => 'Met vergoeding',
                        'Geen vergoeding' => 'Geen vergoeding',
                    ],
                    'allow_custom' => 0,
                    'save_custom' => 0,
                    'default_value' => [
                    ],
                    'layout' => 'vertical',
                    'toggle' => 0,
                    'return_format' => 'value',
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'vacancies',
                    ],
                ],
            ],
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => 1,
            'description' => '',
        ]);
    }
}
add_action('acf/init', 'register_custom_fields_vacancy');

/**
 * Set template for archive page.
 */
function archive_vacancy_template($page_template)
{
    if (is_post_type_archive('vacancies')) {
        $page_template = plugin_dir_path(__FILE__) . '/archive-vacancies.blade.php';
    }
    return $page_template;
}
//add_filter( 'archive_template', 'archive_vacancy_template' );

/**
 * Set template for single page.
 */
function single_vacancy_template($page_template)
{
    if (is_singular('vacancies')) {
        $page_template = plugin_dir_path(__FILE__) . '/single.blade.php';
    }
    return $page_template;
}
//add_filter( 'single_template', 'single_vacancy_template' );
