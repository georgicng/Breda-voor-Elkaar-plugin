@extends('layouts.app')

@section('content')
  @include('partials.page-header')

<?php
// Query posts for a relationship value.
$organisations = get_users(array(
    'role' => 'organisation',
    'meta_query' => array(
        array(
            'key' => 'vacancies',
            'value' => '"' . get_the_ID() . '"',
            'compare' => 'LIKE',
        ),
    ),
));
?>

<?php if ($organisations) {?>
    <ul>
    <?php
// We use the first organisation found, as this is the default way of handeling meta queries.
    $organisation = $organisations[0];
    $organisationmeta = get_user_meta($organisation->ID);
    ?>
        <div>
            <img style="max-width:100px;" src="<?php echo get_field('afbeelding', 'user_' . $organisation->ID); ?>">
            <a href="<?php echo get_author_posts_url($organisation->ID); ?>">
                <?php echo $organisationmeta['nickname'][0]; ?>
            </a>
        </div>
    </ul>
<?php }?>

<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
        ?>
        <ul>
            <li>
                Titel: <?php the_title(); ?>
            </li>
            <li>
                Plaatsingsdatum: <?php echo date("d M Y", strtotime(get_the_date())); ?>
            </li>
            <li>
                Organisatie: <?php echo '<a href="'.get_author_posts_url(get_the_author_meta('ID')).'">'.get_the_author().'</a>' ?>
            </li>
            <li>
                Vacature Overzicht: <?php echo strip_tags(get_the_content()); ?>
            </li>
            <ul>
                <h4>Extra informatie</h4>
                <li>
                    Opleidingsniveau: <?php the_field('opleidingsniveau'); ?>
                </li>
                <li>
                    Ervaring: <?php the_field('ervaring'); ?>
                </li>
                <li>
                    Vergoeding: <?php the_field('vergoeding'); ?>
                </li>
            </ul>
        </ul>
        <?
    }
}
?>

<?php
// Handle forms received
if(isset($_POST['Favoriet'])){
    $user_id = $_POST['user_id'];
    $post_id = $_POST['post_id'];
    $current_array = get_field('field_5b0frsad5dfc7','user_'.$user_id);
    $current_array = (array)$current_array;
    if(!in_array($post_id,$current_array)){
        $current_array[] = $post_id;
        update_field('field_5b0frsad5dfc7', $current_array, 'user_'.$user_id);
    }
} else if(isset($_POST['Reageer'])){
    $user_id = $_POST['user_id'];
    $post_id = $_POST['post_id'];
    $current_array = get_field('field_5b0fe6fd5dfc7','user_'.$user_id);
    $current_array = (array)$current_array;
    if(!in_array($post_id,$current_array)){
        $current_array[] = $post_id;
        update_field('field_5b0fe6fd5dfc7', $current_array, 'user_'.$user_id);
    }
}

// Display form
$user = wp_get_current_user();
$role = ( array ) $user->roles;
global $post;
if($role[0] == 'volunteer'){
    ?>
    <form method="post">
        <input type="hidden" name="user_id" value="<?php echo $user->ID ?>">
        <input type="hidden" name="post_id" value="<?php echo $post->ID?>">
        <input type="submit" name="Favoriet" value="Favoriet">
    </form>
    <form method="post">
        <input type="hidden" name="user_id" value="<?php echo $user->ID ?>">
        <input type="hidden" name="post_id" value="<?php echo $post->ID?>">
        <input type="submit" name="Reageer" value="Reageer">
    </form>
    <?
}
?>
@endsection
