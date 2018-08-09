{{--
  Template Name: Beheer Vacatures
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
            @if($role[0] == 'organisation')
            <div id="magage-vacancies">
                @php
                    $args = array(
                        'post_type' => 'vacancy',
                        'author'    => $user->ID,
                    );
                    $posts = get_posts( $args );
                @endphp
            
                @if ($posts)
                    <h1> {{count($posts)}} Vacature(s) geplaatst </h1>
                    @foreach ($posts as $p) {{-- // variable must NOT be called $post (IMPORTANT) --}}
                        @php        
                            $reactions = get_users(array(
                                'role' => 'volunteer',
                                'meta_query' => array(
                                    array(
                                        'key' => 'applications', // name of custom field
                                        'value' => '"' . $p->ID . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
                                        'compare' => 'LIKE'
                                    )
                                )
                            ));
                        @endphp
                        <div class="card">
                            <h5 class="card-header">{{get_the_title($p->ID)}}</h5>
                            <div class="card-body">
                                <h5 class="card-title">Aantal reacties: {{count($reactions)}}</h5>
                                <a href="/bewerk-vacature?id={{$p->ID}}" class="btn btn-primary">Edit</a>
                                <a href="/bewerk-vacature?id={{$p->ID}}&trash=true" class="btn btn-primary">Delete</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                @else
                    <div class="member-page__message alert alert-dark" role="alert">No vacancies yet. <a href="{{home_url('/nieuwe-vacature')}}" class="btn btn-primary">Create One Now</a></div>
                @endif
            @else
                <div class="member-page__message alert alert-dark" role="alert">Uw account is geen vrijwilliger.</div>
            @endif        
        @else
            <div class="member-page__message alert alert-dark" role="alert">Je moet ingelogd zijn om deze pagina te bekijken.</div>
        @endif
    </div>
    </section>

@endsection
