<?php
/**
 *  @package air
 *  @since 2.0
 *  @name Front page Template
 **/
?>
<?php get_header(); ?>
<div class="col12 container">
  <div class="caution-items clearfix">
    <div class="col6 left">
      <div class="header">
        <div class="logo">
            <a class="show-content active" href="#caution-background">African<br>Declaration<br>
            <div class="lighter">For Internet<br>Rights and Freedoms</div></a>
        </div>
      </div>
      <div class="body">
        <h5>The Website is currently under development, and will be available shortly.</h5>
        <p>To download the last version of the Declaration, <a class="show-content" href="#download">click here</a>. And for the full text version <a class="show-content" href="#text-content">click here</a>.</p>
        <p>And to endorse the declaration <a class="show-content" href="#endorse-form">click here</a>.</p>
      </div>
    </div>
    <div class="col6 right">
      <div class="body">
        <div id="caution-background">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/develop.png">
        </div>
        <div id="download" class="hidden-column">
          <?php if (get_field('footer-content')):  while(has_sub_field('footer-content')): ?>
          <div class="files">
            <?php if(get_row_layout() == 'downloads'):
              $document = get_sub_field('pdf-document');
              $document_title = get_the_title($document);
              $document_link = wp_get_attachment_url($document);
              $document_object = get_sub_field_object('pdf-document');
              $document_size = filesize(get_attached_file($document));
              $document_size = size_format($document_size, 2); ?>
            <div class="file-icon">
              <a href="<?php echo $document_link; ?>"><span></span></a>
            </div>
            <div class="file-text"><?php echo $document_size; ?></div>
          <?php endif; ?>
          </div>
        <?php endwhile; endif; ?>
        </div>
        <div id="endorse-form" class="hidden-column">
          <div class="form">
          <?php echo do_shortcode('[contact-form-7 id="25" title="endorse"]'); ?>
          </div>
        </div>
        <div id="text-content" class="hidden-column">
          <div class="text">
          <?php $post_slug = 'caution-text';
                $args = array('name' => $post_slug, 'post_type' => 'post');
                $custom_post = get_posts($args);
          ?>
          <p><?php echo wpautop($custom_post[0]->post_content); ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
