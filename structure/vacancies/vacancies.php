<?php
/**
 * This file contains all functionality regarding vacancies as a custom post type in WordPress.
 */

/**
* Create the 'Vacancies' post type
*/
function create_post_type_vacancy() {
  register_post_type( 'vacancies',
    array(
      'labels' => array(
        'name' => __( 'Vacancies' ),
        'singular_name' => __( 'Vacancy' )
      ),
      'public' => true,
      'has_archive' => true,
      'taxonomies' => array( 'category' )
    )
  );
}
add_action( 'init', 'create_post_type_vacancy' );


/**
 * Add Custom Fields on plugin init.
 */
function register_custom_fields_vacancy(){
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5b06d03b9459b',
	'title' => 'Vacancies',
	'fields' => array(
		array(
			'key' => 'field_5b06d097c1efe',
			'label' => 'Frequentie',
			'name' => 'frequentie',
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
				'Dagelijks' => 'Dagelijks',
				'Wekelijks' => 'Wekelijks',
				'Maandelijks' => 'Maandelijks',
				'Jaarlijks' => 'Jaarlijks',
				'Eenmalig' => 'Eenmalig',
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
			'key' => 'field_5b06d0d3c1eff',
			'label' => 'Startdatum',
			'name' => 'Startdatum',
			'type' => 'date_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'display_format' => 'd/m/Y',
			'return_format' => 'd/m/Y',
			'first_day' => 1,
		),
		array(
			'key' => 'field_5b06d9f740f4d',
			'label' => 'Vervaldatum',
			'name' => 'vervaldatum',
			'type' => 'date_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'display_format' => 'd/m/Y',
			'return_format' => 'd/m/Y',
			'first_day' => 1,
		),
		array(
			'key' => 'field_5b06d0e7c1f00',
			'label' => 'Opleidingsniveau',
			'name' => 'opleidingsniveau',
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
				'opleiding1' => 'opleiding1',
				'opleiding2' => 'opleiding2',
				'opleiding3' => 'opleiding3',
				'opleiding4' => 'opleiding4',
				'opleiding5' => 'opleiding5',
				'opleiding6' => 'opleiding6',
				'opleiding7' => 'opleiding7',
				'opleiding8' => 'opleiding8',
				'opleiding9' => 'opleiding9',
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
			'key' => 'field_5b06d9e740f4c',
			'label' => 'Ervaring',
			'name' => 'ervaring',
			'type' => 'textarea',
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
			'maxlength' => '',
			'rows' => '',
			'new_lines' => '',
		),
		array(
			'key' => 'field_5b06da1440f4e',
			'label' => 'Vergoeding',
			'name' => 'vergoeding',
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
				'vergoeding1' => 'vergoeding1',
				'vergoeding2' => 'vergoeding2',
				'vergoeding3' => 'vergoeding3',
				'vergoeding4' => 'vergoeding4',
				'vergoeding5' => 'vergoeding5',
				'vergoeding6' => 'vergoeding6',
				'vergoeding7' => 'vergoeding7',
				'vergoeding8' => 'vergoeding8',
				'vergoeding9' => 'vergoeding9',
			),
			'allow_custom' => 0,
			'save_custom' => 0,
			'default_value' => array(
			),
			'layout' => 'vertical',
			'toggle' => 0,
			'return_format' => 'value',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'vacancies',
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
add_action( 'plugins_loaded', 'register_custom_fields_vacancy' );
