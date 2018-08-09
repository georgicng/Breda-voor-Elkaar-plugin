@extends('layouts.user')

@section('content')
  @include('partials.page-header')
    <section @php post_class('member-page') @endphp>
        <div class="member-page__body container">
            <div class="member-page__menu row">{!! my_account_menu() !!}</div>
            @if(is_user_logged_in())
                @php
                    $user = wp_get_current_user();
                    $role = ( array ) $user->roles;
                @endphp
                @if($role[0] == 'organisation')
                    <div id="organisation-profile">
                        <form id="acf-form" class="acf-form" action="" method="post">
                            @php 
                            $options = array(
                                'post_id' => 'user_'.$user->ID,
                                'form' => false, 
                                'fields' => array(
                                    'field_acf_form_first_name', // Name
                                    'field_acf_form_email', // Email
                                    'field_5b06cc6d43567', // Category
                                    'field_5b06cc8f43568', // Phone number
                                    'field_5b06ccef43569', // Image
                                    'field_5b06cc0343564', // Address
                                ),
                                'html_before_fields' => '',
                                'html_after_fields' => '',
                            );
                            @endphp
                            {!! acf_form( $options ) !!}
                            <div class="acf-form-submit">
                                <input type="submit" class="acf-button button button-primary button-large" value="Update"><span class="acf-spinner"></span>			
                            </div>
                        </form>
                    </div>
                @elseif($role[0] == 'volunteer')
                    <div id="volunteer-profile">
                        <form id="acf-form" class="acf-form" action="" method="post">
                            @php $options = array(
                                'post_id' => 'user_'.$user->ID,
                                'form' => false, 
                                'fields' => array(
                                    'field_acf_form_first_name', // Name
                                    'field_acf_form_email', // Email
                                    'field_5b06xx6d43567', // Category
                                    'field_5c05966d1f567', // Experience
                                    'field_5c05963d1f567', // Age
                                    'field_5b05966d1f567', // Education
                                    'field_5b0596ba1f568', // CV
                                    'field_5b0596121f564', // Address
                                ),
                                'html_before_fields' => '',
                                'html_after_fields' => '',
                            );
                            @endphp
                            {!! acf_form( $options ) !!}
                            <div class="acf-form-submit">
                                <input type="submit" class="acf-button button button-primary button-large" value="Update"><span class="acf-spinner"></span>			
                            </div>
                        </form>
                    </div>
                @else
                    <div class="member-page__message alert alert-dark" role="alert">Uw account is geen vrijwilliger of organisatie.</div>
                @endif
            @else
                <div class="member-page__message alert alert-dark" role="alert">Je moet ingelogd zijn om deze pagina te bekijken.</div>
            @endif
        </div>
    </section>
@endsection
