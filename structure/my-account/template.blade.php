<?php /* Template Name: Mijn Account */?>

<?php acf_form_head() ?>

@extends('layouts.app')

@section('content')
  @include('partials.page-header')

<?php
    my_account_menu();
?>

<?php
if(is_user_logged_in()){
    $user = wp_get_current_user();
    $role = ( array ) $user->roles;
    if($role[0] == 'organisation'){
    ?>
    <div id="organisation-profile">
	<form id="acf-form" class="acf-form" action="" method="post">
    <?php $options = array(
	    'post_id' => 'user_'.$user->ID,
        'form' => false, 
        'fields' => array(
            'field_5b06cc6d43567', // Category
            'field_5b06cc8f43568', // Phone number
            'field_5b06ccef43569', // Image
            'field_5b06cc0343564', // Address
        ),
	    'html_before_fields' => '',
	    'html_after_fields' => '',
	);
	acf_form( $options );
	?>
    <div class="acf-form-submit">
        <input type="submit" class="acf-button button button-primary button-large" value="Update">			<span class="acf-spinner"></span>			
    </div>
    </form>
    </div>
    <?php
    } else if($role[0] == 'volunteer'){
    ?>
    <div id="volunteer-profile">
	<form id="acf-form" class="acf-form" action="" method="post">
    <?php $options = array(
	    'post_id' => 'user_'.$user->ID,
        'form' => false, 
        'fields' => array(
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
	acf_form( $options );
	?>
    <div class="acf-form-submit">
        <input type="submit" class="acf-button button button-primary button-large" value="Update">			<span class="acf-spinner"></span>			
    </div>
    </form>
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
