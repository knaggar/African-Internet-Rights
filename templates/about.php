<?php
/**
 *  @package air
 *  @since 2.0
 *  @name Content template for About page and its children pages
 **/
 ?>
<div class="container clearfix col8">
  <?php if(have_posts()): while(have_posts()):
    the_post();
    $thispage=$post->ID;
  endwhile; endif;
  $childpages = query_posts('post_per_page=3&orderby=menu_order&order=asc&post_type=page&post_parent='.$thispage);
    if($childpages):
      foreach ($childpages as $post):
        setup_postdata($post);
        $post_slug=$post->post_name;
        $post_order=$post->menu_order; ?>
  <div class="content<?php if ($post_order != 1):?> hidden-content<?php endif; ?>" id="<?php echo $post_slug; ?>">
    <div class="header"><?php the_title('<h3>', '</h3>');?></div>
    <div class="body"><?php the_content(); ?></div>
    <?php $repeater = get_field_object('doc-repeat');
      if( have_rows('doc-repeat') ): ?>
    <div class="footer">
      <div class="doc-items" id="doc-items">
        <div class="header"><h5><?php echo $repeater['label']; ?></h5></div>
        <div class="body">
          <?php while (have_rows('doc-repeat')) : the_row();
                $doc_id = get_sub_field('doc-link');
                $doc_title = get_the_title($doc_id);
                $doc_link = wp_get_attachment_url($doc_id);
                $doc_object = get_field_object($doc_id);
                $doc_size = filesize(get_attached_file($doc_id));
                $doc_size = size_format($doc_size, 2);
                $doc_ext =  pathinfo( get_attached_file( $doc_id ));
          ?>
            <div class="item-wrap">
              <?php if($doc_link): ?>
              <span class="down-icon">
                <a href="<?php echo $doc_link; ?>"><i class="fa fa-file-pdf-o"></i></a>
              </span>
            <?php endif; if($doc_link || $doc_title): ?>
              <span class="down-info">
                <div class="down-text">
                <a href="<?php echo $doc_link; ?>"><?php echo $doc_title; ?></a>
                <div class="down-file"><?php echo $doc_size; $doc_ext['extension']; ?></div>
                </div>
            </span>
          <?php endif; ?>
            </div>
      <?php endwhile ;?>
        </div>
      </div>
    </div>
    <?php endif; ?>
  </div>
  <?php endforeach; endif; ?>
</div>
