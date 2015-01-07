<?php
/*
Template Name: Bulletin Template
*/
?>

<?php
// Check if user is logged in 
if ( !is_user_logged_in() ){

    get_template_part('templates/content', 'not-logged');
    wp_login_form( array( 'echo' => true ) );
} else {
    // Show content
    get_template_part('templates/content', 'feed');
}
?>