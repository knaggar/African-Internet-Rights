<?php
/**
 *  @package air
 *  @since 2.0
 *  @name template for Sidebar
 **/
 ?>
<div class="<?php if(!is_singular()):?>col4 <?php else: ?>col5<?php endif; ?> left">
 <div id="sidebar" class="sidebar clearfix">
   <?php if(is_post_type_archive('articles')):
      wp_nav_menu( array( 'theme_location' => 'side-nav', 'menu_class' => 'side-nav', 'container_id' => 'widget-nav', 'container_class'=> 'widget'));
    elseif(is_singular()): ?>
      <?php the_post_thumbnail(); ?>
      <?php $poster_id = get_field('article_poster');
            $poster_link = wp_get_attachment_url($poster_id);
            $poster_object = get_field_object($poster_id); ?>
            <?php if($poster_id): ?><img src="<?php echo $poster_link; ?>"><?php endif;?>
      <b><?php if(is_singular('articles')):?>Last Updated<?php else: ?>Published on<?php endif; ?>: </b> <?php the_time('d M Y'); ?>
      <?php if(has_term($term, 'country', $post)):
        echo $term->name;
      endif; ?>
            <?php if($poster_id): ?><a href="<?php echo $poster_link;?>">Download Poster</a><?php endif;?>
      <?php share_buttons(); ?>
    <?php else:
    dynamic_sidebar('left-sidebar');
  endif; ?>
 </div>
</div>
