<?php /* Template Name: Organisaties */?>

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
$users_per_page = 10; // ToDo: make this a _get variable

// Filters
$meta_query = array('relation' => 'AND'); // Array of arrays that individually store key/value pairs.
$filter_keys = array(
    'field_5b06cc6d43567' => 'categorie',
);
?>

<div id="archive-filters">
<?php
// Loop over all filter keys and check if they are set in the _Get variable.
foreach($filter_keys as $acf_key => $key){
    // get the field's settings without attempting to load a value
    $field = get_field_object($acf_key, false, false);

    if(isset($_GET[$key])){
        $field['value'] = explode(',', $_GET[$key]);
        add_to_meta_query_if_get_exists($key,$_GET[$key],$meta_query);
    }
    ?>
    <div class="filter" data-filter="<?php echo $key; ?>">
    <?php render_field($field); ?>
    </div>
    <?php
}
?>
</div>
<?php
/**
 * Add key, value pair to the post meta filters if it is set.
 */
function add_to_meta_query_if_get_exists($filter_key, $filter_value, &$query){
    if(isset($_GET[$filter_key])){
        $values_to_search = explode(',', $_GET[$filter_key]);
        foreach ($values_to_search as $value) {
            $meta_addition = array(
                'key' => rawurldecode($filter_key),
                'value' => rawurldecode($value),
                'compare' => 'LIKE'
            );
            array_push($query,$meta_addition);
        }
    }
}
// Arguments for out main query
$args = array(
    // Add filter and pagination arguments here later, and get them from ?= variables with default values.
    'role' => 'organisation',
    'number' => $users_per_page,
    'paged' => $current_page,
    'meta_query' => $meta_query
);

// The Query
$user_query = new WP_User_Query($args);

// Totals for pagination
$total_users = $user_query->get_total(); // How many users we have in total (beyond the current page)
$num_pages = ceil($total_users / $users_per_page); // How many pages of users we will need

// User Loop
if (!empty($user_query->get_results())) {
    foreach ($user_query->get_results() as $user) {
        ?>
        <ul>
            <li> <?php echo $user->ID ?> </li>
            <li> <?php echo $user->display_name ?> </li>
            <li> <?php the_field('afbeelding', 'user_' . $user->ID)?> </li>
            <li> <?php 
                if(get_field('vacancies', 'user_' . $user->ID) !== null){
                    echo count(get_field('vacancies', 'user_' . $user->ID));
                } else{
                    echo '0';
                }?> </li>
        </ul>
        <?php
    }
    numeric_pagination($current_page, $num_pages);
} else {
    echo 'Geen organisatie gevonden die aan uw zoekopdracht voldeed.';
}
filter_script('organisaties');
?>
@endsection