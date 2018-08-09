@extends('layouts.user')

@section('content')
  @include('partials.page-header')
    <section @php post_class('volunteer-archive') @endphp>
        <div class="volunteer-archive__body">
            @php
                // Start session to save posts per page
                if (!session_id()) {
                    session_start();
                }
                if(isset($_GET['nr'])){
                    $_SESSION['nr'] = $_GET['nr'];
                }

                // Pagination
                if (get_query_var('paged')) {
                    $current_page = get_query_var('paged');
                } elseif (get_query_var('page')) {
                    $current_page = get_query_var('page');
                } else {
                    $current_page = 1;
                }
                $users_per_page = 10;
                if(isset($_SESSION['nr'])){
                    $users_per_page = $_SESSION['nr'];
                }

                // Filters
                $meta_query = array('relation' => 'OR'); // Array of arrays that individually store key/value pairs.
                $filter_keys = array(
                    'field_5b06xx6d43567' => 'soort_vrijwilligerswerk',
                    'field_5c05966d1f567' => 'ervaring',
                    'field_5c05963d1f567' => 'leeftijd',
                    'field_5b05966d1f567' => 'opleiding',
                );
            @endphp

            <div id="archive-filters">
                {{--// Loop over all filter keys and check if they are set in the _Get variable.--}}
                @foreach($filter_keys as $acf_key => $key)
                    @php
                        // get the field's settings without attempting to load a value
                        $field = get_field_object($acf_key, false, false);

                        if(isset($_GET[$key])){
                            $field['value'] = explode(',', $_GET[$key]);
                            add_to_meta_query_if_get_exists($key,$_GET[$key],$meta_query);
                        } else{
                            $field['value'] = array();
                        }
                    @endphp
                    <div class="filter" data-filter="{{$key}}">
                        {!! render_field($field) !!}
                    </div>
                @endforeach
            </div>
            @php
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
                    'role' => 'volunteer',
                    'number' => $users_per_page,
                    'paged' => $current_page,
                    'meta_query' => $meta_query
                );

                // Add search term to wp-query if it is set in the url.
                if(isset($_GET['search'])){
                    $search_term = $wpdb->esc_like($_GET['search']);
                    $args['search'] = '*'.$search_term.'*';
                    $args['search_columns'] = array(
                        'user_login',
                        'user_nicename',
                        'user_email',
                        'user_url',
                    );
                }

                // The Query
                $user_query = new WP_User_Query($args);

                // Totals for pagination
                $total_users = $user_query->get_total(); // How many users we have in total (beyond the current page)
                $num_pages = ceil($total_users / $users_per_page); // How many pages of users we will need
            @endphp
            {{--// User Loop--}}
            @if(!empty($user_query->get_results()))
                @foreach ($user_query->get_results() as $user)                
                    <ul>
                        <li> {{$user->ID}} </li>
                        <a href="{{get_author_posts_url($user->ID)}}">
                        <li> {{$user->display_name}} </li>
                        </a>
                    </ul>
                @endforeach
                {!! numeric_pagination($current_page, $num_pages) !!}
            @else 
                <div class="alert">Geen vrijwilliger gevonden die aan uw zoekopdracht voldeed.</div>
            @endif
            {!! filter_script('vrijwilligers')!!}
        </div>
    </section>
@endsection
