<?php
/**
 * This file contains all functionality regarding the my-account page.
 */

/**
 * Set templates for my-account pages.
 */    
function my_account_template( $page_template ) {
    if ( is_page( 'Mijn Account' ) ) {
        $page_template = plugin_dir_path( __FILE__ ) . '/template.blade.php';
    } else if ( is_page( 'Wijzig Wachtwoord' ) ) {
        $page_template = plugin_dir_path( __FILE__ ) . '/change-password.blade.php';
    } else if ( is_page( 'Nieuwe Vacature' ) ) {
        $page_template = plugin_dir_path( __FILE__ ) . '/new-vacancy.blade.php';
    } else if ( is_page( 'Favorieten' ) ) {
        $page_template = plugin_dir_path( __FILE__ ) . '/favorites.blade.php';
    } else if ( is_page( 'Reacties' ) ) {
        $page_template = plugin_dir_path( __FILE__ ) . '/applications.blade.php';
    }
    return $page_template;
}
add_filter( 'page_template', 'my_account_template' );
 
/**
 * Output the my account menu.
 */

// We do this with a function because blade templating can't do relative pathing.
function my_account_menu(){
    if(is_user_logged_in()){
        $user = wp_get_current_user();
        $role = ( array ) $user->roles;
        if($role[0] == 'organisation'){
        ?>
        <ul id="account-menu">
            <li><a href="/mijn-account">Profiel</a></li>
            <li><a href="/organisatie-account">Organisatieprofiel</a></li>
            <li><a href="/beheer-vacatures">Beheer vacatures</a></li>
            <li><a href="/nieuwe-vacature">Nieuwe vacature plaatsen</a></li>
            <li><a href="/wijzig-wachtwoord">Wijzig wachtwoord</a></li>
            <li><a href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a></li>
        </ul>
        <?php
        } else if($role[0] == 'volunteer'){
        ?>
        <ul id="account-menu">
            <li><a href="/mijn-account">Profiel</a></li>
            <li><a href="/reacties">Reacties</a></li>
            <li><a href="/favorieten">Favorieten</a></li>
            <li><a href="/wijzig-wachtwoord">Wijzig wachtwoord</a></li>
            <li><a href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a></li>
        </ul>
        <?php
        } else{
            echo 'Uw account is geen vrijwilliger of organisatie.';
        }
    } else{
        echo 'Je moet ingelogd zijn om deze pagina te bekijken.';
    }
}
