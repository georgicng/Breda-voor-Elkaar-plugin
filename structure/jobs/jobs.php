<?php
/**
 * This file contains all functionality regarding jobs as a custom post type in WordPress.
 */

 /**
  * Create the 'Jobs' post type
  */
function create_post_type_jobs() {
    register_post_type( 'jobs',
      array(
        'labels' => array(
          'name' => __( 'Jobs' ),
          'singular_name' => __( 'Job' )
        ),
        'public' => true,
        'has_archive' => true,
        'taxonomies' => array( 'category' )
      )
    );
  }
  add_action( 'init', 'create_post_type_jobs' );