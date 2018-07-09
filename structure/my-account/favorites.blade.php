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
    if($role[0] == 'volunteer'){
    ?>
    <div id="favorites">
    <?php
    $posts = get_field('favorites', 'user_' . $user->ID);
    if ($posts){ ?>
        <ul>
        <?php foreach ($posts as $p){ // variable must NOT be called $post (IMPORTANT) ?>
                <li>
                    Favorited: <a href="<?php echo get_permalink($p->ID); ?>"><?php echo get_the_title($p->ID); ?></a>
                </li>
        <?php } ?>
        </ul>
    <?php }
    ?>
    </div>
    <?php
    } else{
        echo 'Uw account is geen vrijwilliger.';
    }
} else{
    echo 'Je moet ingelogd zijn om deze pagina te bekijken.';
}
?>

@endsection
