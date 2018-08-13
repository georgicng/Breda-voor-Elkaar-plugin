{{--
  Template Name: Reacties
--}}

@extends('layouts.user')

@section('content')
    @include('partials.page-header')
    <section @php post_class('member-page') @endphp>
        <div class="member-page__body container">
            <div class="row">
                <aside class="col-lg-4 sidebar">
                    <a href="#sidebarnav" class="list-group-item d-lg-none layered__bar" data-toggle="collapse" aria-expanded="false">Menu</a>
                    <div id="sidebarnav" class="member-page__menu sidebar__item collapse dont-collapse-lg">
                        {!! my_account_menu() !!}
                    </div>
                </aside>
                <div class="col-lg-8 member-page__content"> 
                    @if(is_user_logged_in())
                        @php 
                            $user = wp_get_current_user();
                            $role = ( array ) $user->roles;
                        @endphp
                        @if($role[0] == 'volunteer')  
                            <div id="applications">
                                @php
                                    $posts = get_field('applications', 'user_' . $user->ID);
                                @endphp
                                @if ($posts)
                                    <h1>Applied to</h1>
                                    @foreach ($posts as $p) {{-- variable must NOT be called $post (IMPORTANT) --}}
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
                                @else
                                    <div class="member-page__message alert alert-dark" role="alert">No Applications.</div>
                                @endif    
                            </div>
                        @else
                            <div class="member-page__message alert alert-dark" role="alert">Uw account is geen vrijwilliger.</div>
                        @endif
                    @else
                        <div class="member-page__message alert alert-dark" role="alert">Je moet ingelogd zijn om deze pagina te bekijken.</div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
