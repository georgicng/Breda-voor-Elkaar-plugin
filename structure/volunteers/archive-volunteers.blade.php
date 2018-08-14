@extends('layouts.user')

@section('content')
  @include('partials.page-header')
        <section class="vacancy-list no-background">
            <div class="container">
                <div class="row">
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

                    <aside id="archive-filters" class="col-lg-4 vacancy-list__layered layered">
                        <a href="#filters" class="list-group-item d-lg-none layered__bar" data-toggle="collapse" aria-expanded="false">Filter</a>
                        <div id="filters" class="layered__form collapse dont-collapse-lg">
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
                                @if($key  == "ervaring" || $key  == "leeftijd")
                                    <section class="mb-4 layered__group">
                                        <h2 class="layered__group-header">{{$field['label']}}</h2>
                                        <div class="filter" data-filter="{{$key}}">
                                            <select name="acf[{{$acf_key}}]" id="acf-{{$acf_key}}" class="form-control w-50 layered__field">
                                                <option value="*">Alle</option>
                                            @foreach($field['choices'] as $value => $label)
                                                <option value="{{$value}}" @php echo ($value == $_GET[$key])? 'selected':'' @endphp>
                                                    {{$label}}
                                                </option>                                                    
                                            @endforeach
                                            </select>
                                        </div>
                                    </section>
                                @else
                                    <section class="mb-4 layered__group">
                                        <h2 class="layered__group-header">{{$field['label']}}</h2>
                                        <div class="filter" data-filter="{{$key}}">
                                            {!! render_field($field) !!}
                                        </div>
                                    </section>
                                @endif
                            @endforeach
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
                            <div class="card user-profile mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <img src="@asset('images/user.png')" class="img img-rounded img-fluid user-profile__avatar" alt="User Avatar"/>                                            
                                        </div>
                                        <div class="col-lg-10"> 
                                            <a href="{{get_author_posts_url($user->ID)}}">
                                                <h5 class="user-profile__name">{{$user->display_name}}</h5>
                                            </a>                                           
                                            <div class="user-profile__bio">{{$user->description}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>                             
                        @endforeach
                        {!! numeric_pagination($current_page, $num_pages) !!}
                    @else 
                        <div class="alert alert-dark">Geen vrijwilliger gevonden die aan uw zoekopdracht voldeed.</div>
                    @endif
                </main>
            </div>
        </div>
    </section>
    {!! filter_script('vrijwilligers')!!}
@endsection
