<?php
/*
Template Name: Resources Template
*/
?>



<?php
if ( is_user_logged_in() ) {
	while (have_posts()) : the_post();
	 get_template_part('templates/page', 'header'); 
	 get_template_part('templates/content', 'page');
	endwhile;

} else {
	echo "hello!";
}
?>