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
                    'center_lat' => '',
                    'center_lng' => '',
                    'zoom' => '',
                    'height' => '',
                ],
                [
                    'key' => 'field_5b0596351f565',
                    'label' => 'leeftijd',
                    'name' => 'leeftijd',
                    'type' => 'number',
                    'default_value' => 18,
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'min' => 10,
                    'max' => 150,
                    'step' => 1,
                ],
                [
                    'key' => 'field_5b05964e1f566',
                    'label' => 'Ervaring',
                    'name' => 'ervaring',
                    'type' => 'textarea',
                    'default_value' => '',
                    'placeholder' => '',
                    'maxlength' => '',
                    'rows' => '',
                    'formatting' => 'br',
                ],
                [
                    'key' => 'field_5b05966d1f567',
                    'label' => 'opleiding',
                    'name' => 'opleiding',
                    'type' => 'select',
                    'choices' => [
                        'opleiding1' => 'opleiding1',
                        'opleiding2' => 'opleiding2',
                        'opleiding3' => 'opleiding3',
                        'opleiding4' => 'opleiding4',
                        'opleiding5' => 'opleiding5',
                        'opleiding6' => 'opleiding6',
                        'opleiding7' => 'opleiding7',
                        'opleiding8' => 'opleiding8',
                        'opleiding9' => 'opleiding9',
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
