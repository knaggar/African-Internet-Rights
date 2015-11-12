<?php
/**
 *  @package air
 *  @since 2.0
 *  @name Footer Template
 **/
?>
<?php if(!is_front_page()): ?>
<?php get_template_part('templates/section-footer', get_post_format()); ?>
</main>
<footer>
  <div class="header">
    <?php get_template_part('footer-header', get_post_format()); ?>
  </div>
  <div class="body">
    <div class="col12 container clearfix">
      <div class="v-center left">
        <div class="logo">
            <a href="./">African<br>Declaration<br>
            <div class="lighter">For Internet<br>Rights and Freedoms</div></a>
        </div>
      </div>
      <div class="v-center right">
        <div class="menu">
          <?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_class' => 'menu-foot')); ?>
        </div>
        <div class="credits"><p>Except for <a href="#">code</a>, this work is licensed under a Creative Commons Attribution 4.0 International License</p></div>
      </div>
    </div>
  </div>
</footer>
<?php endif; ?>
<?php wp_footer(); ?>
</body>
</html>
