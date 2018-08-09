@extends('layouts.user')

@section('content')
    @include('partials.page-header')
    <section class="vacancy-list">
        <div class="container">
            <div class="row">
            @php
                global $wpdb;
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
                $posts_per_page = 10;
                if(isset($_SESSION['nr'])){
                    $posts_per_page = $_SESSION['nr'];
                }

                // Filters
                $meta_query = array('relation' => 'OR'); // Array of arrays that individually store key/value pairs.
                $filter_keys = array(
                    'field_5b06d097c1efe' => 'frequentie',
                    'field_5b06d0e7c1f00' => 'opleidingsniveau',
                    'field_5b06da1440f4e' => 'vergoeding',
                );
            @endphp
                <aside class="col-lg-4 vacancy-list__layered layered">
                    <a href="#archive-filters" class="list-group-item d-lg-none layered__bar" data-toggle="collapse" aria-expanded="false">Filter</a>
                    <div id="archive-filters layered__form collapse dont-collapse-lg">
                        <section class="layered__group">
                        {{--// Loop over all filter keys and check if they are set in the _Get variable. --}}

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
                            <section class="mb-4 layered__group filter" data-filter="{{$field['name']}}">
                                <h2 class="layered__group-header">{{$field['label']}}</h2>
                                <div class="filter" data-filter="{{ $key }}">
                                    {!! render_field($field) !!}
                                </div>
                            </section>
                        @endforeach
                        </section>
                    </div>
                </aside>
                <main class="col-lg-8 vacancy-list__items">
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
                        'post_type' => 'vacancies',
                        'posts_per_page' => $posts_per_page,
                        'paged' => $current_page,
                        'meta_query' => $meta_query
                    );


                    // Add search term to wp-query if it is set in the url.
                    if(isset($_GET['search'])){
                        $search_term = $wpdb->esc_like($_GET['search']);
                        $args['s'] = $search_term;
                    }

                    // The Query
                    $query = new WP_Query($args);
                    $posts = $query->posts;

                    // Totals for pagination
                    $total_posts = $query->found_posts; // How many posts we have in total (beyond the current page)
                    $num_pages = ceil($total_posts / $posts_per_page); // How many pages of posts we will need
                @endphp
                {{--// Post Loop--}}
                @if (!empty($posts))
                    @foreach($posts as $post)
                        @php
                        $more = '.<a href="' . get_permalink($post->ID) . '" class="card-link vacancy-card__link">lees meer ›</a>';
                        $time = human_time_diff(get_post_time('U', true, $post), current_time('timestamp')) . ' ago';
                            $vacancy = [
                                'title' => $post->post_title,
                                'link' => get_permalink($post->ID),
                                'image_link' => get_the_post_thumbnail_url($post->ID, [200, 200]),
                                'excerpt' => wp_kses_post(wp_trim_words($post->post_content, 25, $more)),
                                'subtitle' => $post->post_title,
                                'footer' => $time . ' - Breda, Nederland',
                            ];
                        @endphp
                        @include('partials.content-vacancy')
                    @endforeach
                    {!! numeric_pagination($current_page, $num_pages) !!}
                @else 
                    <div class="alert">Geen vacature gevonden die aan uw zoekopdracht voldeed.</div>
                @endif                
                </main>
            </div>
        </div>
    </section>
    {!! filter_script('vacatures') !!}
@endsection
