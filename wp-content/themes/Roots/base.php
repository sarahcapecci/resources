<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->

  <?php
    do_action('get_header');
    get_template_part('templates/header');
  ?>

  <div class="wrap container" role="document">
    <div class="content">
      <main class="main" role="main">
        <?php include roots_template_path(); ?>
      </main><!-- /.main -->
    </div><!-- /.content -->
  </div><!-- /.wrap -->

  <?php get_template_part('templates/footer'); ?>
  <?php wp_footer(); ?>

</body>
<!-- Modal for upload DOCUMENT -->
<div class="all-modal resource-modal document">
  <h4>Add a Document</h4>
  <button id="close-doc"><i class="fa fa-close"></i></button>
  <p>Ensure your title is very clear for others to understand and find.</p>
  <?php echo do_shortcode("[contact-form-7 id='40' title='Upload Document']"); ?>
</div>

<!-- Modal for upload LINK -->
<div class="all-modal resource-modal links">
  <h4>Add a link</h4>
  <button id="close-link"><i class="fa fa-close"></i></button>
  <?php echo do_shortcode('[contact-form-7 id="41" title="Upload link"]'); ?>
</div>

<!-- Modal for upload CONTACT -->
<div class="all-modal resource-modal contact">
  <h4>Add a Contact</h4>
  <button id="close-contact"><i class="fa fa-close"></i></button>
  <?php echo do_shortcode('[contact-form-7 id="17" title="Upload Contact"]'); ?>
</div>
</html>
