<?php //get_header(); ?>

<?php
$ID = get_queried_object()->ID;
$usermeta = get_user_meta($ID);
$userdata = get_userdata($ID);
?>

<!-- Body content -->
    <li>
        ID: <?php echo $ID; ?>
    </li>
    <li>
        posted on: <?php echo date("d M Y", strtotime($userdata->user_registered)); ?>
    </li>
    <li>
        login name: <?php echo $usermeta['nickname'][0]; ?>
    </li>
    <li>
        first name: <?php echo $usermeta['first_name'][0]; ?>
    </li>
    <li>
        last name: <?php echo $usermeta['last_name'][0]; ?>
    </li>
    <?php if (get_field('leeftijd', 'user_' . $ID)) { ?>
    <li>
        leeftijd: <?php the_field('leeftijd', 'user_' . $ID); ?>
    </li>
    <?php }?>
    <?php if (get_field('adres', 'user_' . $ID)) { ?>
    <li>
        adres: <?php echo get_field('adres', 'user_' . $ID)['address']; ?>
    </li>
    <?php }?>
    <?php if (get_field('opleiding', 'user_' . $ID)) { ?>
    <li>
        opleiding: <?php the_field('opleiding', 'user_' . $ID); ?>
    </li>
    <?php }?>
    <?php if (get_field('ervaring', 'user_' . $ID)) { ?>
    <li>
        ervaring: <?php the_field('ervaring', 'user_' . $ID); ?>
    </li>
    <?php }?>
    <?php if (get_field('cv', 'user_' . $ID)) { ?>
    <li>
        cv downloadlink: <?php the_field('cv', 'user_' . $ID); ?>
    </li>
    <?php }?>

<?php
$posts = get_field('applied', 'user_' . $ID);
if ($posts): ?>
    <li>
        <ul>
        <?php foreach ($posts as $p): // variable must NOT be called $post (IMPORTANT) ?>
                <li>
                    Applied to: <a href="<?php echo get_permalink($p->ID); ?>"><?php echo get_the_title($p->ID); ?></a>
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
