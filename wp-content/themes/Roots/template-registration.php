<?php
/*
Template Name: Registration Template
*/
?>

<?php while (have_posts()) : the_post(); ?>
   <h1><?php the_title(); ?></h1>
<?php endwhile; ?>

<p>aadashdiaushdiuashd</p>
<?php echo do_shortcode('[pie_register_form]') ?>