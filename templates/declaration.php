<?php
/**
 *  @package air
 *  @since 2.0
 *  @name Content template for Declaration page
 **/
?>
<?php get_sidebar(); ?>
<div class="col8 right">
  <div class="content">
    <div class="body">
      <div class="da-items" id="da-items">
      <?php $articles_types = get_terms('type', array('orderby' => 'id', 'hide-empty' =>0));
            foreach ($articles_types as $article_type) {
              $article_query = new WP_Query( array(
                'post_type' => 'articles','tax_query' => array(
                  array(
                    'taxonomy' => 'type','field' => 'slug','terms' => array($article_type->slug),'operator' => 'IN'
                  ))
              )); ?>
                <div id="<?php echo $article_type->slug ?>" class="da-section">
                  <div class="header">
                    <h4><?php echo $article_type->name; ?></h4>
                  </div>
                  <?php if($article_query->have_posts()): while ($article_query->have_posts()): $article_query->the_post();?>
                  <div class="body">
                    <div class="item-wrap" id="<?php echo $post->post_name; ?>">
                      <div class="item-title">
                        <h5><?php the_title(); ?></h5>
                      </div>
                      <div class="item-body">
                        <?php the_content(); ?>
                      </div>
                      <!--div class="item-tools">
                        <ul class="vote">
                          <li class="up">
                            <a href="#" data-post-id=""><i class="fa fa-thumbs-up" title="Like"></i></a>
                            <span class="count"></span>
                          </li>
                          <li class="down">
                            <a href="#" data-post-id=""><i class="fa fa-thumbs-down" title="Dislike"></i></a>
                            <span class="count"></span>
                          </li>
                        </ul>
                      </div-->
                      <?php if($article_type->slug != 'preample'): ?>
                      <div class="item-share">
                        <?php share_buttons(); ?>
                      </div>
                    <?php endif; ?>
                    </div>
                  </div>
                <?php endwhile; endif; ?>
              </div>

           <?php } ?>
     </div>
    </div>
  </div>
</div>
