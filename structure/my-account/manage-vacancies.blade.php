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
    <div id="magage-vacancies">
    <?php
    $args = array(
        'post_type' => 'vacancy',
        'author'    => $user->ID,
    );
    $posts = get_posts( $args );
    
    if ($posts){ ?>
        <ul>
            <li> <? echo count($posts) ?> Vacature(s) geplaatst </li>

        <?php foreach ($posts as $p){ // variable must NOT be called $post (IMPORTANT)
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
        ?>
                <li>
                    <ul>
                        <li> Vacancy: <?php echo get_the_title($p->ID); ?> </li>
                        <li> <a href="/bewerk-vacature?id=<?php echo $p->ID ?>">Edit</a> </li>
                        <li> Aantal reacties: <?php echo count($reactions) ?> </li>
                    </ul>
                </li>
        <?php } ?>
        </ul>
    <?php 
    }
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
