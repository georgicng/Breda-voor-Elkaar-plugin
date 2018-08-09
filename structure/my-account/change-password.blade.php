{{--
  Template Name: Wijzig Wachtwoord
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
                    $user_id = $user->ID;  
                    $meta = get_user_meta($user_id, 'profile', true);
                    $output='';
                    if(isset($_POST['changepass']) && isset($_POST['opass'])){
                        if(wp_check_password($_POST['opass'], $user->data->user_pass,  $user->ID)){
                            if($_POST['npass']!=$_POST['cpass']){
                                $output='Uw wachtwoorden kwamen niet overeen';    
                            } else{
                            if($_POST['npass']==''){
                                $password=$_POST['password'];
                            }  
                            else{
                                $password=$_POST['npass'];
                            }
                            wp_set_password( $password, $user_id );
                            wp_set_auth_cookie($user->ID);
                            wp_set_current_user($user->ID);
                            do_action('wp_login', $user->user_login, $user);
                            $output='Uw wachtwoord is veranderd';
                            } 
                        } else{
                            $output = 'Uw oude wachtwoord was incorrect';
                        }
                    }
                @endphp
                <form class="password_change"  method="post" enctype="multipart/form-data" action="#" onsubmit="return change_password();">
                    <h2>Wachtwoord Aanpassen</h2>
                    <div class="form-field">
                        <label>Oude Wachtwoord</label>
                        <input type="password" name="opass" id="opass" />
                    </div>
                    <div class="form-field">
                        <label>Nieuw Wachtwoord</label>
                        <input type="password" name="npass" id="pass" />
                    </div>
                    <div class="form-field">
                        <label>Bevestig Wachtwoord</label>
                        <input type="password" name="cpass" id="cpass" />
                    </div>
                    <div id="error">{{$output}}</div>
                    <input type="submit" name="changepass"  value="Submit" />
                </form>
            @else
                <div class="member-page__message alert alert-dark" role="alert">Je moet ingelogd zijn om deze pagina te bekijken.</div>
            @endif
        </div>
    </section>
@endsection
