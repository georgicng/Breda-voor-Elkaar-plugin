<?php
/**
 * This file contains all functionality regarding courses as a custom post type in WordPress.
 */

/**
 * Post Type: Courses.
 */
function create_post_type_course()
{
    $labels = array(
        "name" => __("Courses", "sage"),
        "singular_name" => __("Course", "sage"),
    );

    $args = array(
        "label" => __("Courses", "sage"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => false,
        "rest_base" => "",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array("slug" => "course", "with_front" => true),
        "query_var" => true,
        "supports" => array("title", "editor", "thumbnail"),
    );

    register_post_type("course", $args);

}
add_action('init', 'create_post_type_course');

/**
 * Add Custom Fields on plugin init.
 */
function register_custom_fields_course()
{
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group(array(
            'key' => 'group_5b5722ba58a81',
            'title' => 'Course',
            'fields' => array(
                array(
                    'key' => 'field_5b5722cac4d7c',
                    'label' => 'Date',
                    'name' => 'date',
                    'type' => 'date_picker',
                    'instructions' => '',
                    'required' => 1,
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
                    'key' => 'field_5b572314c4d7d',
                    'label' => 'Lesson',
                    'name' => 'lesson',
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
                    'key' => 'field_5b572364c4d7e',
                    'label' => '',
                    'name' => '',
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
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'course',
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

    }
}
add_action('acf/init', 'register_custom_fields_course');
