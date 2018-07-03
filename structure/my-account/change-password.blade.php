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
              $output='Uw wachtwoord is veranderd';
            } 
        } else{
            $output = 'Uw oude wachtwoord was incorrect';
        }
    }
    ?>
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
        <div id="error"><?php echo $output; ?></div>
        <input type="submit" name="changepass"  value="Submit" />
    </form>
    <?php
} else{
    echo 'Je moet ingelogd zijn om deze pagina te bekijken.';
}
?>

@endsection
