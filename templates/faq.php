<?php
/**
 *  @package air
 *  @since 2.0
 *  @name Content template for Declaration page
 **/
?>
<div class="container col8 clearfix">
  <div class="content">
    <div class="header">
      <?php $post_slug = 'faq';
            $args = array('name' => $post_slug,'post_type' =>'post',);
            $custom_post = get_posts($args); ?>
        <p><?php echo $custom_post[0]->post_content; ?></p>
    </div>
      <?php query_posts(array(
        'post_type' => 'faq',
      ));?>
    <div class="body">
      <div class="qs-items" id="qs-items">
        <?php while(have_posts()): the_post(); ?>
          <div class="item-wrap">
            <div class="item-title"><?php the_title();?></div>
            <div class="item-body">
              <?php the_content();?>
              <div class="item-share">
                <span class="share-text">share</span>
                <?php share_buttons();?>
              </div>
            </div>
          </div>
        <?php endwhile; wp_reset_query(); ?>
      </div>
    </div>
  </div>
</div>
