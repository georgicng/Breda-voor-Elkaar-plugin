<?php //get_header(); ?>

<?php
$ID = get_queried_object()->ID;
$usermeta = get_user_meta($ID);
$userdata = get_userdata($ID);
?>

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
        posted on: <?php echo date("d M Y", strtotime($userdata->user_registered)); ?>
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
    <?php if(get_field('adres', 'user_' . $ID)){ ?>
    <li>
        adres: <?php echo get_field('adres', 'user_' . $ID)['address']; ?>
    </li>
    <?php } ?>
    <?php if(get_field('adres', 'user_' . $ID)){ ?>
    <li>
        image: <img src="<?php echo get_field('afbeelding', 'user_' . $ID); ?>">
    </li>
    <?php } ?>
    <?php if(get_field('categorie', 'user_' . $ID)){ ?>
    <li>
        categories: <?php the_field('categorie', 'user_' . $ID); ?>
    </li>
    <?php } ?>

<?php
    $posts = get_field('vacancies', 'user_' . $ID);
    if ($posts): ?>
	<li>
        <ul>
	    <?php foreach ($posts as $p): // variable must NOT be called $post (IMPORTANT) ?>
            <li>
                Vacancies: <a href="<?php echo get_permalink($p->ID); ?>"><?php echo get_the_title($p->ID); ?></a>
            </li>
        <?php endforeach;?>
	    </ul>
    </li>
    <?php endif;
?>
<?
wp_reset_postdata();
?>

<!-- End body content -->

<?php //get_footer(); ?>