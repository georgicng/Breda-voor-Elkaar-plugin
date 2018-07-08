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
    if(isset($_GET['id'])){
        $author_id = get_post_field('post_author',$_GET['id']);
        if($user->ID == $author_id){
            if(isset($_GET['trash']) && $_GET['trash'] == 'true'){
                wp_trash_post($_GET['id']);
                ?>
                <div>
                    <p class="succes">Post deleted!</p>
                </div>
                <?
            } else{
                ?>
                <div id="edit-vacancy-form">
                <?php $options = array(
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
                acf_form( $options );
                ?>
                </div>
                <?
            }
        } else{
            echo 'Uw account: '.$user->ID.' is niet de eigenaar'.$author_id.'van deze vacature.';
        }
    ?>
    <?php
    } else{
        echo 'Geen vacature geselecteerd';
    }
} else{
    echo 'Je moet ingelogd zijn om deze pagina te bekijken.';
}
?>

@endsection
