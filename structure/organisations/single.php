<?php //get_header(); ?>

<?php $ID = get_queried_object()->ID; ?>
<?php $usermeta = get_user_meta($ID); ?>

<!-- Body content -->

<?php
    global $post; 
    $post = get_post( $ID, OBJECT );
    setup_postdata( $post );
?>
    <li>
        ID: <?php echo $ID; ?>
    </li>
    <li>
        posted on: <?php the_time('d M Y'); ?>
    </li>
    <li>
        login name: <?php echo $usermeta['nickname'][0] ?>
    </li>
    <li>
        first name: <?php echo $usermeta['first_name'][0] ?>
    </li>
    <li>
        last name: <?php echo $usermeta['last_name'][0] ?>
    </li>
    <li>
        addres: <?php the_field('adres'); ?>
    </li>
    <li>
        categories: <?php the_field('categorie'); ?>
    </li>
<?
wp_reset_postdata();
?>

<!-- End body content -->

<?php //get_footer(); ?>