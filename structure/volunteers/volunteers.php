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
function register_custom_fields_volunteer() {
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group(
            array(
                'key' => 'group_5b7ef0eae6000',
                'title' => 'Volunteers',
                'fields' => array(
                    array(
                        'key' => 'field_5b7ef0fd9487f',
                        'label' => 'Upload profielfoto',
                        'name' => 'profile_image',
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => 'url',
                        'preview_size' => 'full',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => '',
                    ),
                    array(
                        'key' => 'field_5b7ef13794880',
                        'label' => 'Voornaam',
                        'name' => 'first-name',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_5b7ef15394881',
                        'label' => 'Tussenvoegsel',
                        'name' => 'initials',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_5b7ef16094882',
                        'label' => 'Achternaam',
                        'name' => 'last-name',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_5b7ef18394883',
                        'label' => 'E-mailadres',
                        'name' => 'e-mail',
                        'type' => 'email',
                        'instructions' => '',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                    ),
                    array(
                        'key' => 'field_5b7ef19394884',
                        'label' => 'Telefoonnummer',
                        'name' => 'phone',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_5b7ef1bf94885',
                        'label' => 'Je profiel tonen in de zoekresultaten',
                        'name' => 'searchable',
                        'type' => 'radio',
                        'instructions' => '',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'Yes' => 'Yes',
                            'Nee' => 'Nee',
                        ),
                        'allow_null' => 0,
                        'other_choice' => 0,
                        'save_other_choice' => 0,
                        'default_value' => '',
                        'layout' => 'vertical',
                        'return_format' => 'value',
                    ),
                    array(
                        'key' => 'field_5b7ef21994886',
                        'label' => 'Wat is je leeftijd',
                        'name' => 'age',
                        'type' => 'checkbox',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'Jonger dan 18 Yesar' => 'Jonger dan 18 Yesar',
                            '18 – 27 Yesar' => '18 – 27 Yesar',
                            '28 – 45 Yesar' => '28 – 45 Yesar',
                            '46 – 64 Yesar' => '46 – 64 Yesar',
                            'Ouder dan 65 Yesar' => 'Ouder dan 65 Yesar',
                        ),
                        'allow_custom' => 0,
                        'save_custom' => 0,
                        'default_value' => array(
                        ),
                        'layout' => 'vertical',
                        'toggle' => 0,
                        'return_format' => 'value',
                    ),
                    array(
                        'key' => 'field_5b7ef24e94887',
                        'label' => 'Wat is je opleiding of werk- en denkniveau',
                        'name' => 'qualification',
                        'type' => 'checkbox',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'Basisschool' => 'Basisschool',
                            'VMBO/MAVO/LBO' => 'VMBO/MAVO/LBO',
                            'HAVO/VWO' => 'HAVO/VWO',
                            'MBO' => 'MBO',
                            'HBO/Universiteit' => 'HBO/Universiteit',
                        ),
                        'allow_custom' => 0,
                        'save_custom' => 0,
                        'default_value' => array(
                        ),
                        'layout' => 'vertical',
                        'toggle' => 0,
                        'return_format' => 'value',
                    ),
                    array(
                        'key' => 'field_5b7ef28594888',
                        'label' => 'Waar wil je vrijwilligerswerk doen',
                        'name' => 'region',
                        'type' => 'checkbox',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'Geen voorkeur' => 'Geen voorkeur',
                            'Breda Centrum' => 'Breda Centrum',
                            'Breda Noordwest' => 'Breda Noordwest',
                            'Breda Noordoost' => 'Breda Noordoost',
                            'Breda Zuidwest' => 'Breda Zuidwest',
                            'Breda Zuidoost' => 'Breda Zuidoost',
                            'Bavel' => 'Bavel',
                            'Effen-Rith' => 'Effen-Rith',
                            'Prinsenbeek' => 'Prinsenbeek',
                            'Teteringen' => 'Teteringen',
                            'Ulvenhout' => 'Ulvenhout',
                        ),
                        'allow_custom' => 0,
                        'save_custom' => 0,
                        'default_value' => array(
                        ),
                        'layout' => 'vertical',
                        'toggle' => 0,
                        'return_format' => 'value',
                    ),
                    array(
                        'key' => 'field_5b7ef2f894889',
                        'label' => 'Hoe vaak wil je	vrijwilligerswerk doen',
                        'name' => 'frequency',
                        'type' => 'checkbox',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'Regelmatig (elke week, elke 2 weken, elke maand)' => 'Regelmatig (elke week, elke 2 weken, elke maand)',
                            'Eenmalig (een dag of dagdeel)' => 'Eenmalig (een dag of dagdeel)',
                            'Tijdelijk (maximaal 3 maanden, projectmatig)' => 'Tijdelijk (maximaal 3 maanden, projectmatig)',
                        ),
                        'allow_custom' => 0,
                        'save_custom' => 0,
                        'default_value' => array(
                        ),
                        'layout' => 'vertical',
                        'toggle' => 0,
                        'return_format' => 'value',
                    ),
                    array(
                        'key' => 'field_5b7ef3339488a',
                        'label' => 'Hoeveel uren per week of per keer ben je maximaal beschikbaar voor vrijwilligerswerk',
                        'name' => 'availability',
                        'type' => 'radio',
                        'instructions' => 'maximaal 1 antwoord mogelijk',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            '1 t/m 4 uur' => '1 t/m 4 uur', 
                            '5 t/m 8 uur' => '5 t/m 8 uur', 
                            '9 t/m 16 uur' => '9 t/m 16 uur', 
                            '17 uur of meer' => '9 t/m 16 uur'
                        ),
                        'allow_null' => 0,
                        'other_choice' => 0,
                        'save_other_choice' => 0,
                        'default_value' => '',
                        'layout' => 'vertical',
                        'return_format' => 'value',
                    ),
                    array(
                        'key' => 'field_5b7ef39d9488b',
                        'label' => 'Wat voor soort vrijwilligerswerk wil je doen',
                        'name' => 'interest',
                        'type' => 'checkbox',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'Activiteitenbegeleiding en recreatie' => 'Activiteitenbegeleiding en recreatie',
                            'Administratie, winkel en gastvrouw/heer' => 'Administratie, winkel en gastvrouw/heer',
                            'Begeleiding, coaching en maatjes' => 'Begeleiding, coaching en maatjes',
                            'Bestuur en organisatie' => 'Bestuur en organisatie',
                            'Computer en ICT' => 'Computer en ICT',
                            'Evenementen en festivals' => 'Evenementen en festivals',
                            'Financiën en boekhouding' => 'Financiën en boekhouding',
                            'Fondsenwerving' => 'Fondsenwerving',
                            'Horeca en catering' => 'Horeca en catering',
                            'Kunst, cultuur en creatief' => 'Kunst, cultuur en creatief',
                            'Natuur, milieu en dieren' => 'Natuur, milieu en dieren',
                            'PR, communicatie en media' => 'PR, communicatie en media',
                            'Sport, bewegen en spel' => 'Sport, bewegen en spel',
                            'Taalondersteuning' => 'Taalondersteuning',
                            'Techniek, klussen en onderhoud' => 'Techniek, klussen en onderhoud',
                            'Vervoer en logistiek' => 'Vervoer en logistiek',
                            'Voorlichting, lesgeven en huiswerkbegeleiding' => 'Voorlichting, lesgeven en huiswerkbegeleiding',
                        ),
                        'allow_custom' => 0,
                        'save_custom' => 0,
                        'default_value' => array(
                        ),
                        'layout' => 'vertical',
                        'toggle' => 0,
                        'return_format' => 'value',
                    ),
                    array(
                        'key' => 'field_5b7ef3fc9488c',
                        'label' => 'Waar ben je goed in',
                        'name' => 'competency',
                        'type' => 'checkbox',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'Adviseren' => 'Adviseren',
                            'Begeleiden' => 'Begeleiden',
                            'Besturen' => 'Besturen',
                            'Communiceren' => 'Communiceren',
                            'Coördineren' => 'Coördineren',
                            'Denken' => 'Denken',
                            'Doen' => 'Doen',
                            'Geordend werken' => 'Geordend werken',
                            'Handig zijn' => 'Handig zijn',
                            'Initiatief nemen' => 'Initiatief nemen',
                            'Ondernemen' => 'Ondernemen',
                            'Organiseren' => 'Organiseren',
                            'Presenteren' => 'Presenteren',
                            'Rekenen' => 'Rekenen',
                            'Samenwerken' => 'Samenwerken',
                            'Schrijven' => 'Schrijven',
                        ),
                        'allow_custom' => 0,
                        'save_custom' => 0,
                        'default_value' => array(
                        ),
                        'layout' => 'vertical',
                        'toggle' => 0,
                        'return_format' => 'value',
                    ),
                    array(
                        'key' => 'field_5b7ef4229488d',
                        'label' => 'Wil je met bepaalde doelgroepen werken',
                        'name' => 'preference',
                        'type' => 'checkbox',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'Geen voorkeur' => 'Geen voorkeur',
                            'Chronisch zieken' => 'Chronisch zieken',
                            'Dak- en thuislozen' => 'Dak- en thuislozen',
                            'Jeugd/jongeren' => 'Jeugd/jongeren',
                            'Kinderen' => 'Kinderen',
                            'Mensen met een lichamelijke beperking' => 'Mensen met een lichamelijke beperking',
                            'Mensen met een psychische/psychiatrische beperking' => 'Mensen met een psychische/psychiatrische beperking',
                            'Mensen met verstandelijke beperking' => 'Mensen met verstandelijke beperking',
                            'Mensen met en zintuiglijke beperking' => 'Mensen met en zintuiglijke beperking',
                            'Ouderen' => 'Ouderen',
                            'Vluchtelingen en statushouders' => 'Vluchtelingen en statushouders',
                        ),
                        'allow_custom' => 0,
                        'save_custom' => 0,
                        'default_value' => array(
                        ),
                        'layout' => 'vertical',
                        'toggle' => 0,
                        'return_format' => 'value',
                    ),
                    array(
                        'key' => 'field_5b7ef4639488e',
                        'label' => 'Vertel iets over jezelf',
                        'name' => 'bio',
                        'type' => 'wysiwyg',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'tabs' => 'all',
                        'toolbar' => 'full',
                        'media_upload' => 1,
                        'delay' => 0,
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
            )
        );

        if (!is_field_group_exists('Social Media') ) {
            acf_add_local_field_group(
                array (
                    'key' => 'group_5b7eeb2cb8b3e',
                    'title' => 'Social Media',
                    'fields' => array (
                        array (
                            'key' => 'field_5b7eeb458880a',
                            'label' => 'Facebook',
                            'name' => 'facebook',
                            'type' => 'url',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array (
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                        ),
                        array (
                            'key' => 'field_5b7eeb578880b',
                            'label' => 'Twitter',
                            'name' => 'twitter',
                            'type' => 'url',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array (
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                        ),
                        array (
                            'key' => 'field_5b7eeb668880c',
                            'label' => 'Linkedin',
                            'name' => 'linkedin',
                            'type' => 'url',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array (
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                        ),
                        array (
                            'key' => 'field_5b7eeb838880d',
                            'label' => 'Instagram',
                            'name' => 'instagram',
                            'type' => 'url',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array (
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                        ),
                    ),
                    'location' => array (
                        array (
                            array (
                                'param' => 'user_role',
                                'operator' => '==',
                                'value' => 'organisation',
                            ),
                        ),
                        array (
                            array (
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
                )
            );            
        }
    }
}
add_action('acf/init', 'register_custom_fields_volunteer');


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
