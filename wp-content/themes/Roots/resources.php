<?php
/*
Template Name: Resources Template
*/
?>

<?php
// Check if user is logged in 
if ( !is_user_logged_in() ){
    header("Location: http://sarahcapecci.com/torch/wp-login.php");
} else {
    // Show content
    get_template_part('templates/content', 'resources');
}
?>
