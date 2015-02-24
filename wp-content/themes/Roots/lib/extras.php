<?php
/**
 * Clean up the_excerpt()
 */
function roots_excerpt_more($more) {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'roots') . '</a>';
}
add_filter('excerpt_more', 'roots_excerpt_more');

/**
 * Manage output of wp_title()
 */
function roots_wp_title($title) {
  if (is_feed()) {
    return $title;
  }

  $title .= get_bloginfo('name');

  return $title;
}
add_filter('wp_title', 'roots_wp_title', 10);

// function shortcodes_in_cf7( $form ) {
//   $form = do_shortcode( $form );
//   return $form;
// }
// add_filter( 'wpcf7_form_elements', 'shortcodes_in_cf7' );

// add_action( 'wpcf7_before_send_mail', 'CF7_pre_send' );
 
// function CF7_pre_send($cf7) {
//   $_POST['avatar'] = $avatar; 
// }
