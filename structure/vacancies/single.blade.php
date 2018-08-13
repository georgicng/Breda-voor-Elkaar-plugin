@extends('layouts.app')

@section('content')
  @include('partials.page-header-image')
    <main class="cv">
        <div class="container">
            @if(have_posts())
                @while (have_posts()) 
                    @php
                        the_post();
                        $title = get_the_title();
                        $category = implode(', ',get_field('categorie'));
                        //date("d M Y", strtotime(get_the_date()))
                        $time = date("d M Y", strtotime(get_the_date())) . ' - Breda, Nederland';

                        $acf = [
                            'opleidingsniveau' => implode(', ',get_field('opleidingsniveau')),
                            'ervaring' => implode(', ',get_field('ervaring')),
                            'vergoeding' => implode(', ',get_field('vergoeding'))
                        ];
                    @endphp                 
                    <div class="row">
                        <div class="col-sm-10  cv__header">
                            <h1 class="cv__name"> {{ $title }}</h1>
                            <p class="cv__detail">{{ $category }}</p>
                            <p class="cv__detail"> {{ $time }}</p>
                        </div>
                    </div>
                    <div class="row">
                        @php
                            // Handle forms received
                            if(isset($_POST['Favoriet'])){
                                $user_id = $_POST['user_id'];
                                $post_id = $_POST['post_id'];
                                $current_array = get_field('field_5b0frsad5dfc7','user_'.$user_id);
                                $current_array = (array)$current_array;
                                if(!in_array($post_id,$current_array)){
                                    $current_array[] = $post_id;
                                    update_field('field_5b0frsad5dfc7', $current_array, 'user_'.$user_id);
                                }
                            } else if(isset($_POST['Reageer'])){
                                $user_id = $_POST['user_id'];
                                $post_id = $_POST['post_id'];
                                $current_array = get_field('field_5b0fe6fd5dfc7','user_'.$user_id);
                                $current_array = (array)$current_array;
                                if(!in_array($post_id,$current_array)){
                                    $current_array[] = $post_id;
                                    update_field('field_5b0fe6fd5dfc7', $current_array, 'user_'.$user_id);
                                }
                            }
                        
                            // Display form
                            $user = wp_get_current_user();
                            $role = ( array ) $user->roles;
                            global $post;
                        @endphp
                        @include('partials.content-vacancy-socialbar')
                    </div>
                    <div class="row cv__content">    
                        <article class="col-lg-8 cv__profile">
                                {!! get_the_content() !!}
                        </article>
                        <aside class="col-lg-4 cv__sidebar sidebar">
                                @include('partials.content-vacancy-extra')                            
                                {!! dynamic_sidebar('sidebar-primary') !!}
                        </aside>
                    </div>
                @endwhile
            @endif           
        </div>            
    </main>
@endsection
