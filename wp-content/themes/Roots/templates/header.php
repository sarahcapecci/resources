<header class="header" role="banner">
    <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/torch_logo_gray.png" alt=""></a>
    <a id="YRT_logo" href="http://youthroundtable.ca/"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/youth_small_logo.png" alt="Youth Roundtable Logo"></a>
    <nav class="tablet-hide" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'main-navbar'));
        endif;
      ?>
    </nav>
    <nav class="tablet-show" role="navigation">
      <ul class="mobile-nav">
        <li id="current-page" class="active"></li>
        <li class="dropdown"><a id="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><i class="fa fa-bars pointer"></a></i>
          <ul id="mobile-dropdown" class="mobile-dropdown dropdown-menu">
            <li class="menu-about"><a href="http://youthroundtable.ca/">updates</a></li>
            <li class="menu-about"><a href="<?php echo esc_url(home_url('/')); ?>">bulletin</a></li>
            <li class="menu-about"><a href="<?php echo esc_url(home_url('/')); ?>resources/documents">resources</a></li>
            <li class="menu-about"><a href="http://youthroundtable.ca/about/">about</a></li>
            <li class="menu-about"><a href="<?php echo esc_url(home_url('/')); ?>events">events</a></li>
            <li class="menu-members"><a href="http://youthroundtable.ca/members/">members</a></li>
          </ul>
        </li>
      </ul>
    </nav>
</header>
