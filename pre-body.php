<?php
/**
 *  @package air
 *  @since 2.0
 *  @name Pre-Body template for posts, pages or taxonomies
 **/
?>
<section class="pre-body">
  <?php if(is_page('about') || is_child('about')):?>
  <div class="container col12 clearfix">
    <div class="menu">
      <?php wp_nav_menu( array( 'theme_location' => 'sub-nav', 'menu_class' => 'sub-nav')); ?>
    </div>
  <?php elseif(is_post_type_archive('updates')): ?>
    <div class="slider-items container">
      <?php get_template_part('feature-content', get_post_format()); ?>
    </div>
  <!--?php elseif(is_singular('updates') || is_post_type_archive('articles')):?>
    <div class="container col12 clearfix">
    <div class="last-update">
      <p>
         if(is_post_type_archive('articles')): echo '<b>Last Updated: </b>'; else: echo '<b>Published on: </b>'; endif; the_time('d M Y'); ?>
      </p>
    </div>
  </div--->
  <?php endif; ?>
</section>
