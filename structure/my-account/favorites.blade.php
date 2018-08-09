{{--
  Template Name: Favorieten
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
                    <div id="favorites">
                        @php
                            $posts = get_field('favorites', 'user_' . $user->ID);
                        @endphp
                        @if ($posts)
                            <ul>
                            @foreach ($posts as $p){{-- // variable must NOT be called $post (IMPORTANT) --}}
                                    <li>
                                        Favorited: <a href="{{get_permalink($p->ID)}}">{{get_the_title($p->ID)}}</a>
                                    </li>
                            @endforeach
                            </ul>
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
