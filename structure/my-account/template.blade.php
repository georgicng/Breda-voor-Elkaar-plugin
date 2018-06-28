<?php /* Template Name: Mijn Account */?>

@extends('layouts.app')

@section('content')
  @include('partials.page-header')

<?php
if(is_user_logged_in()){
    $user = wp_get_current_user();
    $role = ( array ) $user->roles;
    if($role[0] == 'organisation'){
    ?>
    <ul id="account-menu">
        <li class="active"><a href="/organisatie-account">Organisatieprofiel</a></li>
        <li><a href="/beheer-vacatures">Beheer vacatures</a></li>
        <li><a href="/nieuwe-vacature">Nieuwe vacature plaatsen</a></li>
        <li><a href="/wijzig-wachtwoord">Wijzig wachtwoord</a></li>
        <li><a href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a></li>
    </ul>
    <div id="organisation-profile">
    <?php $options = array(
	    'post_id' => 'user_'.$user->ID,
	    'form' => true, 
	    'html_before_fields' => '',
	    'html_after_fields' => '',
	    'submit_value' => 'Update' 
	);
	acf_form( $options );
	?>
    </div>
    <?php
    } else if($role[0] == 'volunteer'){
    ?>
    <ul id="account-menu">
        <li><a href="/wijzig-wachtwoord">Wijzig wachtwoord</a></li>
        <li><a href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a></li>
    </ul>
    <div id="volunteer-profile">
    <?php $options = array(
	    'post_id' => 'user_'.$user->ID,
	    'form' => true, 
	    'html_before_fields' => '',
	    'html_after_fields' => '',
	    'submit_value' => 'Update' 
	);
	acf_form( $options );
	?>
    </div>
    <?php
    } else{
        echo 'Uw account is geen vrijwilliger of organisatie.';
    }
} else{
    echo 'Je moet ingelogd zijn om deze pagina te bekijken.';
}
?>

@endsection
