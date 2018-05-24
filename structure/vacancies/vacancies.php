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