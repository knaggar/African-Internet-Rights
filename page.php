<?php
/**
 *  @package air
 *  @since 2.0
 *  @name Static Page Template
 *  Template Name: Static Page Template
 **/
?>
<?php get_header(); ?>
  <?php get_template_part('page-header', get_post_format()); ?>
  <?php get_template_part('pre-body', get_post_format()); ?>
  <section class="body">
    <?php if(is_page('endorsements')):
            get_template_part('templates/endorse', get_post_format());
          elseif(is_page('about')):
            get_template_part('templates/about', get_post_format());
          else: ?>
          <div class="col8 container">
            <?php the_post(); ?>
            <div class="content">
              <?php if (has_post_thumbnail()): ?>
              <div class="header">
                <div class="thumb">
                  <?php the_post_thumbnail(); ?>
                </div>
              </div>
              <?php endif; ?>
              <div class="body">
                <?php the_content(); ?>
              </div>
            </div>
            </div>
          <?php endif; ?>
  </section>
<?php get_footer(); ?>
