<?php
/**
 *  @package air
 *  @since 2.0
 *  @name Feature content template for updates page
 **/
?>
<div class="header">
  <div class="controls">
    <i id="next" class="fa fa-angle-right right"></i>
    <i id="prev" class="fa fa-angle-left left"></i>
  </div>
</div>
<?php $query = new WP_Query(
    array( "post_type" => "updates", "posts_per_page" => 4, "feature" => 'featured')
  );?>
<div class="body">
<?php while($query->have_posts()): $query->the_post(); ?>
  <article class="slide clearfix">
    <div class="slide-content">
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <div class="date"><?php the_time('d F Y'); ?></div>
    </div>
    <?php the_post_thumbnail(); ?>
  </article>
<?php endwhile; ?>
</div>
