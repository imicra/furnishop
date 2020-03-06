<?php
/**
 * Displays top navigation
 *
 * @package komtech
 */

?>
<nav id="site-navigation" class="main-navigation">
    <div class="menu-header">
        <div class="close-menu">
          <span></span>
          <span></span>
        </div>
    </div>
    <?php
        wp_nav_menu( array(
            'theme_location' => 'top',
            'container'      => false,
            'menu_id'        => 'primary-menu',
            'menu_class'     => 'nav-menu'
        ) );
    ?>
</nav><!-- #site-navigation -->
