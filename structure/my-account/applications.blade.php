{{--
  Template Name: Reacties
--}}

@extends('layouts.user')

@section('content')
    @include('partials.page-header')
    <section @php post_class('member-page') @endphp>
        <div class="member-page__body  container">
            <div class="member-page__menu row">{!! my_account_menu() !!}</div>
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
                                @include('partials.content-vacancy')
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
    </section>
@endsection
