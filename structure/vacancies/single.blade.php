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
                        $category = '';
                        //date("d M Y", strtotime(get_the_date()))
                        $time = date("d M Y", strtotime(get_the_date())) . ' - Breda, Nederland';

                        $acf = [
                            'opleidingsniveau' => get_field('opleidingsniveau'),
                            'ervaring' => get_field('ervaring'),
                            'vergoeding' => get_field('vergoeding')
                        ];
                    @endphp                    
                    <div class="row">
                        @include('partials.content-vacancy-title')
                        @include('partials.content-vacancy-socialbar')
                    </div>
                    <div class="row cv__content">    
                        <article class="col-lg-8 cv__profile">
                                {!! get_the_content() !!}
                        </article>
                        <aside class="col-lg-4 cv__sidebar sidebar">
                                @include('partials.content-vacancy-extra')                            
                                @include('partials.content-contact-form')
                        </aside>
                    </div>
                @endwhile
            @endif
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

            @if($role[0] == 'volunteer')
                <form method="post">
                    <input type="hidden" name="user_id" value="{{ $user->ID  }}">
                    <input type="hidden" name="post_id" value="{{ $post->ID }}">
                    <input type="submit" name="Favoriet" value="Favoriet">
                </form>
                <form method="post">
                    <input type="hidden" name="user_id" value="{{ $user->ID  }}">
                    <input type="hidden" name="post_id" value="{{ $post->ID }}">
                    <input type="submit" name="Reageer" value="Reageer">
                </form>
            @endif 
        </div>            
    </main>
@endsection
