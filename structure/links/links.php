<?php
/**
 * This file contains all functionality regarding clinks as a custom post type in WordPress.
 */

/**
 * Post Type: Links.
 */
function create_post_type_link()
{
    $labels = array(
        "name" => __("Links", "sage"),
        "singular_name" => __("Link", "sage"),
    );

    $args = array(
        "label" => __("Links", "sage"),
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
        "rewrite" => array("slug" => "link", "with_front" => true),
        "query_var" => true,
        "supports" => array("title"),
    );

    register_post_type("link", $args);
}
add_action('init', 'create_post_type_link');

/**
 * Add Custom Fields on plugin init.
 */
function register_custom_fields_link()
{
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group(array(
            'key' => 'group_5b573cb2243c8',
            'title' => 'Links',
            'fields' => array(
                array(
                    'key' => 'field_5b573cc145a27',
                    'label' => 'Url',
                    'name' => 'url',
                    'type' => 'url',
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
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'link',
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
add_action('acf/init', 'register_custom_fields_link');
