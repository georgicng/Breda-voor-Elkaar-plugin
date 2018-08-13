@extends('layouts.app')

@section('content')
  @include('partials.page-header')
    <section class="company">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    @php
                        $ID = get_queried_object()->ID;
                        $usermeta = get_user_meta($ID);
                        $userdata = get_userdata($ID);

                        global $post; 
                        $post = get_post( $ID, OBJECT );
                        setup_postdata( $post );
                    @endphp
                    <h1 class="company__name">{{ $userdata->display_name }}</h1>
                    <div class="d-flex company__profile">
                        <div class="company__logo-wrapper">
                            @php
                                $image = get_field('afbeelding', 'user_' . $user->ID);
                                $image = $image ? $image : '//placehold.it/144x76';
                            @endphp
                            <img src="{{ $image }}" class="w-100 img-fluid company__logo">
                        </div>
                        <div class="company__contact">
                            <div class="d-flex flex-column company__contact-group">
                                @if(get_field('adres', 'user_' . $ID))
                                <small class="company__address">{{ get_field('adres', 'user_' . $ID)['address'] }}</small>
                                @endif
                                @if(get_field('telefoonnummer', 'user_' . $ID))
                                <small class="company__phone">{{ get_field('telefoonnummer', 'user_' . $ID) }}</small>
                                @endif
                                @if($userdata->user_url)
                                <small class="company__website">{{$userdata->user_url}}</small>
                                @endif
                                @if($userdata->user_email)
                                <small class="company__email">{{$userdata->user_email}}</small>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row company__bio">
                        {{ $userdata->description }}
                    </div>
                    @if($categories = get_field('categorie', 'user_' . $ID))
                        <div class="d-flex flex-wrap text-dark company__categories">
                            @if(is_array($categories))
                                @foreach($categories as $category)
                                <span class="btn bg-transparent border border-dark company__category">{{$category}}</span>
                                @endforeach
                            @else
                                <span class="btn bg-transparent border border-dark company__category">{{$categories}}</span>
                            @endif
                        </div>
                    @endif

                    @php
                        $args = array(
                        'author' => $ID,
                        'post_type' => 'vacancies',
                        );
                        $posts = get_posts($args);
                    @endphp
                    @if ($posts)
                    <h1>Vacancies</h1>    
                        @foreach ($posts as $p)
                            @php
                                $vacancy = [
                                    'title' => $p->post_title,
                                    'link' => get_permalink($p->ID),
                                    'image_link' => get_the_post_thumbnail_url($p->ID, [200, 200]),
                                    'excerpt' => wp_kses_post(wp_trim_words($p->post_content, 25, '...')),
                                    'subtitle' => $p->post_title,
                                    'footer' => get_field("image_link", $p->ID),
                                ];
                            @endphp
                            <div class="card shadow border-light vacancy-list__item  vacancy-card">
                                <div class="row vacancy-card__header-wrapper">
                                    <div class="col-xxl-2 col-md-3 col-xs-12 vacancy-card__figure d-flex align-items-center">
                                    <img src="{{ $vacancy['image_link']? $vacancy['image_link'] : '//placehold.it/114x76' }}" class="vacancy-card__image">
                                    </div>
                                    <div class="col-xxl-10 col-md-9 col-xs-12 vacancy-card__header-group">
                                        <h2 class="card-title vacancy-card__header">{{ $vacancy['title'] }}</h2>
                                        <h3 class="card-subtitle vacancy-card__subheader">{{ $vacancy['subtitle'] }}</h3>
                                    </div>
                                </div>
                                <div class="card-body vacancy-card__body">
                                    <div class="vacancy-card__text">{!! $vacancy['excerpt'] !!}<a href="{{ $vacancy['link'] }}" class="card-link vacancy-card__link">lees meer ›</a></div>       
                                </div>
                                <div class="card-footer vacancy-card__footer">{{ $vacancy['footer'] }}</div>
                            </div>
                        @endforeach
                    @endif
                    @php
                        wp_reset_postdata();
                    @endphp
                </div>
                <aside class="col-sm-4 company__sidebar blog__sidebar sidebar">
                    {!! dynamic_sidebar('sidebar-primary') !!}
                </aside>
            </div>
        </div>
    </section>
@endsection
