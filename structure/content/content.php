<?php
/**
 * This file contains all functionality regarding content-blocks as a custom post type in WordPress.
 */

/**
 * Post Type: Content Blocks.
 */
function create_post_type_content()
{
    $labels = array(
        "name" => __("Content Blocks", "sage"),
        "singular_name" => __("Content Block", "sage"),
    );

    $args = array(
        "label" => __("Content Blocks", "sage"),
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
        "rewrite" => array("slug" => "content", "with_front" => true),
        "query_var" => true,
        "supports" => array("title"),
    );

    register_post_type("content", $args);
}
add_action('init', 'create_post_type_content');

/**
 * Add Custom Fields on plugin init.
 */
function register_custom_fields_content()
{
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group(array(
            'key' => 'group_5b57472ee3eb9',
            'title' => 'Conten Block',
            'fields' => array(
                array(
                    'key' => 'field_5b574739a3848',
                    'label' => 'Snippet',
                    'name' => 'snippet',
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
                    'rows' => 4,
                    'new_lines' => '',
                ),
                array(
                    'key' => 'field_5b574763a3849',
                    'label' => 'Link',
                    'name' => 'link',
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
                        'value' => 'content',
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
add_action('acf/init', 'register_custom_fields_content');
