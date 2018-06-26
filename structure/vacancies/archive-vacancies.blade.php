<?php /* Template Name: Vacatures */?>

@extends('layouts.app')

@section('content')
  @include('partials.page-header')

<?php
// Pagination
if (get_query_var('paged')) {
    $current_page = get_query_var('paged');
} elseif (get_query_var('page')) {
    $current_page = get_query_var('page');
} else {
    $current_page = 1;
}
$posts_per_page = 10; // ToDo: make this a _get variable

// Filters
$meta_query = array('relation' => 'AND'); // Array of arrays that individually store key/value pairs.
$filter_keys = array(
    'categorie', // Enter possible filter values here.
);

// Loop over all filter keys and check if they are set in the _Get variable.
foreach($filter_keys as $key){
    if(isset($_GET[$key])){
        add_to_meta_query_if_get_exists($key,$_GET[$key],$meta_query);
    }
}

/**
 * Add key, value pair to the post meta filters if it is set.
 */
function add_to_meta_query_if_get_exists($filter_key, $filter_value, &$query){
    if(isset($_GET[$filter_key])){
        $values_to_search = explode(',', $_GET[$filter_key]);
        foreach ($values_to_search as $value) {
            $meta_addition = array(
                'key' => $filter_key,
                'value' => $value,
                'compare' => 'LIKE'
            );
            array_push($query,$meta_addition);
        }
    }
}
// Arguments for out main query
$args = array(
    // Add filter and pagination arguments here later, and get them from ?= variables with default values.
    'post_type' => 'vacancies',
    'number' => $posts_per_page,
    'paged' => $current_page,
    'meta_query' => $meta_query
);

// The Query
$query = new WP_Query($args);
$posts = $query->posts;

// Totals for pagination
$total_posts = $query->get_total(); // How many posts we have in total (beyond the current page)
$num_pages = ceil($total_posts / $posts_per_page); // How many pages of posts we will need

// Post Loop
if (!empty($posts)) {
    foreach($posts as $p) {
        echo '<li> ID: '.$p->ID.'</li>';
    }
    numeric_pagination($current_page, $num_pages);
} else {
    echo 'Geen vacature gevonden die aan uw zoekopdracht voldeed.';
}
?>
@endsection