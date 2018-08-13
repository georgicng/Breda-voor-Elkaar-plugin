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
                    @endphp
                    <div class="card my-3">
                        <h5 class="card-header">Posted on</h5>
                        <div class="card-body">
                        <h5 class="card-title">{{date("d M Y", strtotime($userdata->user_registered))}}</h5>
                        </div>
                    </div>
                    <div class="card my-3">
                        <h5 class="card-header">Login name</h5>
                        <div class="card-body">
                        <h5 class="card-title">{{$usermeta['nickname'][0]}}</h5>
                        </div>
                    </div>
                    <div class="card my-3">
                        <h5 class="card-header">First name</h5>
                        <div class="card-body">
                        <h5 class="card-title">{{$usermeta['first_name'][0]}}</h5>
                        </div>
                    </div>
                    <div class="card my-3">
                        <h5 class="card-header">Last name</h5>
                        <div class="card-body">
                        <h5 class="card-title">{{$usermeta['last_name'][0]}}</h5>
                        </div>
                    </div>
                    @if (get_field('leeftijd', 'user_' . $ID))
                        <div class="card my-3">
                            <h5 class="card-header">Leeftijd</h5>
                            <div class="card-body">
                            <h5 class="card-title">{{get_field('leeftijd', 'user_' . $ID)}}</h5>
                            </div>
                        </div>
                    @endif
                    @if(get_field('adres', 'user_' . $ID))
                        <div class="card my-3">
                            <h5 class="card-header">Adres</h5>
                            <div class="card-body">
                            <h5 class="card-title">{{get_field('adres', 'user_' . $ID)['address']}}</h5>
                            </div>
                        </div>
                    @endif
                    @if(get_field('opleiding', 'user_' . $ID))
                        <div class="card my-3">
                            <h5 class="card-header">Opleiding</h5>
                            <div class="card-body">
                            <h5 class="card-title">{{get_field('opleiding', 'user_' . $ID)}}</h5>
                            </div>
                        </div>
                    @endif
                    @if(get_field('ervaring', 'user_' . $ID))
                        <div class="card my-3">
                            <h5 class="card-header">Ervaring</h5>
                            <div class="card-body">
                            <h5 class="card-title">{{get_field('ervaring', 'user_' . $ID)}}</h5>
                            </div>
                        </div>
                    @endif
                    @if(get_field('cv', 'user_' . $ID))
                        <div class="card my-3">
                            <h5 class="card-header">CV Downloadlink</h5>
                            <div class="card-body">
                            <h5 class="card-title">{{get_field('cv', 'user_' . $ID)}}</h5>
                            </div>
                        </div>
                    @endif

                    @php
                        $posts = get_field('applied', 'user_' . $ID);
                    @endphp
                    @if($posts)
                        <div class="row">
                            <h2>Applied to<h2>
                            @foreach ($posts as $p){{-- // variable must NOT be called $post (IMPORTANT) --}}                            
                                @php
                                    $more = '.<a href="' . get_permalink($p->ID) . '" class="card-link vacancy-card__link">lees meer ›</a>';
                                    $vacancy = [
                                        'title' => $p->post_title,
                                        'link' => get_permalink($p->ID),
                                        'image_link' => get_the_post_thumbnail_url($p->ID, [200, 200]),
                                        'excerpt' => wp_kses_post(wp_trim_words($p->post_content, 25, $more)),
                                        'subtitle' => $p->p_title,
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
                        </div>
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
