{{--
  Template Name: Bewerk Vacature
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
                @endphp
                @if(isset($_GET['id']))
                    @php
                        $author_id = get_post_field('post_author',$_GET['id']);
                    @endphp
                    @if($user->ID == $author_id){
                        @if(isset($_GET['trash']) && $_GET['trash'] == 'true')
                            @php wp_trash_post($_GET['id']); @endphp
                            <div class="member-page__message alert alert-success" role="alert">
                                Post deleted!
                            </div>
                        @else
                            <div id="edit-vacancy-form">
                            @php 
                                $options = array(
                                    'post_id' => $_GET['id'],
                                    'post_title' => true,
                                    'post_content' => true,
                                    'fields' => array(
                                        'field_5b06d097c1efe', // Frequency
                                        'field_5b06d0d3c1eff', // Start date
                                        'field_5b06d9f740f4d', // End date
                                        'field_5b06d0e7c1f00', // Education
                                        'field_5b06d9e740f4c', // Experience
                                        'field_5b06da1440f4e', // Compensation
                                    ),
                                    'new_post'		=> array(
                                        'post_type'		=> 'vacancies',
                                        'post_status'	=> 'publish' // You could change the status to a custom review status here
                                    )
                                );
                            @endphp
                            {!! acf_form( $options ) !!}
                            </div>
                        @endif
                    @else
                        <div class="member-page__message alert alert-dark" role="alert">Uw account: {{$user->ID}} is niet de eigenaar {{$author_id}} van deze vacature.</div>
                    @endif
                @else
                    <div class="member-page__message alert alert-dark" role="alert">Geen vacature geselecteerd</div>
                @endif
            @else
                <div class="member-page__message alert alert-dark" role="alert">Je moet ingelogd zijn om deze pagina te bekijken.</div>
            @endif
        </div>
    </section>

@endsection
