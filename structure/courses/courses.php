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
        "has_archive" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array("slug" => "course"),
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
        acf_add_local_field_group(
            array(
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
            )
        );

        acf_add_local_field_group(
            array(
                'key' => 'group_5b5a18ac28cdd',
                'title' => 'Front Page',
                'fields' => array(
                    array(
                        'key' => 'field_5b5a18eeaf710',
                        'label' => 'Course Title',
                        'name' => 'course_title',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => 'Cursussen',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_5b5a1929af711',
                        'label' => 'Sidebar Title',
                        'name' => 'course_subtitle',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => 'Intro over cursussen lorep ipsum Breda cras sectum',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_5b5a1955af712',
                        'label' => 'Description',
                        'name' => 'course_description',
                        'type' => 'wysiwyg',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '<p>In tempus pulvinar mattis. Sed sed feugiat metus. Nam sollicitudin risus sapien, id bibendum urna laoreet nec. Etiam efficitur libero eget nisl euismod, a rutrum leo sagittis. Mauris egestas diam purus. In tempus pulvinar mattis. Sed sed feugiat metus. Nam sollicitudin risus sapien, id bibendum urna laoreet nec. Etiam efficitur libero eget nisl euismod, a rutrum leo sagittis. Mauris egestas diam purus.</p>

        <p>In tempus pulvinar mattis. Sed sed feugiat metus. Nam sollicitudin risus sapien, id bibendum urna laoreet nec. Etiam efficitur libero eget nisl euismod. </p>',
                        'tabs' => 'all',
                        'toolbar' => 'full',
                        'media_upload' => 1,
                        'delay' => 0,
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'page_type',
                            'operator' => '==',
                            'value' => 'front_page',
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
add_action('acf/init', 'register_custom_fields_course');
