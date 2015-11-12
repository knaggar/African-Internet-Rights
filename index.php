<?php
/**
 *  @package air
 *  @since 2.0
 *  @name Front page Template
 **/
?>
<?php get_header(); ?>
<section class="landing">
  <div class="container clearfix col12">
    <div class="body">
      <?php $post_slug = 'landing';
            $args = array('name' => $post_slug,'post_type' =>'post',);
            $custom_post = get_posts($args); ?>
        <p><?php echo $custom_post[0]->post_content; ?></p>
    </div>
    <div class="footer">
      <svg>
        <image xlink:href="<?php echo get_template_directory_uri(); ?>/assets/img/af-map.svg" width="100%" height="100%">
      </svg>
    </div>
  </div>
</section>
<section class="articles">
  <div class="cotainer clearfix">
    <?php query_posts(array('post_type' => 'articles', 'type' => 'key-principles')); ?>
    <div class="header">
      <h2><?php single_cat_title(); ?></h2>
      <div class="controls">
        <i id="prev" class="fa fa-angle-right"></i>
        <i id="next" class="fa fa-angle-left"></i>
      </div>
    </div>
    <div class="body">
      <div class="titles-items">
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
          <article class="clearfix <?php echo $post->post_name; ?>">
            <div class="col6 left">
              <div class="title">
                <?php the_title('<h3>','</h3>'); ?>
              </div>
              <div class="content">
                <?php the_content(); ?>
                <a href="<?php the_permalink(); ?>" class="read-more"><i class="fa fa-long-arrow-right"></i></a>
              </div>
            </div>
            <div class="col6 right">
              <?php the_post_thumbnail(); ?>
            </div>
          </article>
        <?php endwhile; endif; ?>
      </div>
    </div>
  </div>
</section>
<section class="endorser">
  <div class="container col12 clearfix">
    <div class="header col7">
      <?php $post_slug = 'endorser';
            $args = array('name' => $post_slug,'post_type' =>'post',);
            $custom_post = get_posts($args); ?>
      <?php echo $custom_post[0]->post_content; ?>
    </div>
    <div class="body col5">
      <div class="form">
        <?php echo do_shortcode('[contact-form-7 id="51" title="endorse"]'); ?>
      </div>
    </div>
  </div>
</section>
<section class="updates">
  <div class="container col12 clearfix">
    <?php query_posts(array('post_type' => 'updates', 'posts_per_page' => 2, 'feature' => 'featured')); ?>
    <div class="header">
      <h2><?php post_type_archive_title(); ?></h2>
      <div class="read-more"><a href="<?php echo get_post_type_archive_link('updates'); ?>">Find more updates</a></div>
    </div>
      <div class="body">
      <div class="update-items">
      <?php if(have_posts()): while (have_posts()): the_post(); ?>
        <article class="col4 has-thumb">
          <div class="thumb">
            <div class="img-hover">
              <a href="<?php the_permalink(); ?>"><i class="fa fa-minus"></i></a>
            </div>
            <?php the_post_thumbnail('updates-front'); ?>
          </div>
          <div class="content">
            <div class="date"><?php the_time('d F Y'); ?></div>
            <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
            <div class="button read-more">
              <a href="<?php the_permalink(); ?>"><i class="fa fa-minus"></i></a>
            </div>
          </div>
        </article>
      <?php endwhile; endif; ?>
      </div>
      <div class="twitter-items col4">
        <div class="header">
          <i class="fa fa-twitter v-center"></i>
          <div class="widget-title v-center">
            <span>#</span>AfricanInternetrights</div>
        </div>
        <div class="body"></div>
      </div>
      </div>
      </div>
  </div>
</section>

<?php get_footer(); ?>
