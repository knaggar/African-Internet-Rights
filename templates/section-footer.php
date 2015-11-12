<?php
/**
 *  @package air
 *  @since 2.0
 *  @name Content template for content Footer section
 **/
 ?>
 <section class="footer">
   <?php if(is_post_type_archive('articles') || is_page('about') || is_child('about')): ?>
   <div class="container col12 clearfix">
   <?php else: ?>
   <div class="container col8 clearfix">
   <?php endif; ?>
   <?php if(is_post_type_archive('updates')): ?>
     <?php query_posts(array(
       'post_type' => 'news', 'post_per_page' => 5
     )); ?>
     <div class="header">
       <h2><?php post_type_archive_title(); ?></h2>
       <div class="section-bg"><i class="fa fa-newspaper-o"></i></div>
     </div>
     <div class="body">
       <div class="news-items">
         <?php if(have_posts()): while(have_posts()): the_post(); ?>
        <div class="item-wrap">
          <div><i class="fa fa-minus"></i></div>
          <span class="date"><?php the_time('d F Y'); ?></span>
          <span class="item-title"><?php the_title(); ?></span>
          <?php if (get_field('news-link')): ?>
          <span class="icon"><a target="_blank" href="<?php the_field('news-link'); ?>"><i class="fa fa-link"></i></a></span>
          <?php endif; ?>
        </div>
      <?php endwhile; endif; ?>
       </div>
     </div>
   <?php elseif (is_page('endorsements')): ?>
     <div class="header">
       <h2><?php echo _e('And The Content Talks', air); ?></h2>
       <div class="section-bg">
         <i class="fa fa-twitter"></i>
       </div>
     </div>
     <div class="body">
       <div class="twitter-items">
         <div class="item-wrap">
           <div><i class="fa fa-minus"></i></div>
           <div class="item-title">#AfricanInternetRights</div>
           <div class="item-body"><ul></ul></div>
         </div>
       </div>
     </div>
   <?php elseif(is_post_type_archive('faq')):
      $post_slug = 'more-info';
      $args = array('name' => $post_slug,'post_type' => 'yellows', 'numberposts' => 1);
      $single_post = query_posts($args); ?>
      <div class="header">
        <h2><?php echo $single_post[0]->post_title; ?></h2>
        <div class="section-bg"><i class="fa fa-i-cursor"></i></div>
      </div>
      <div class="body">
        <div class="contact-items">
          <?php if(have_posts()): while(have_posts()): the_post();
                  if(have_rows('footer-content')): while(have_rows('footer-content')): the_row(); ?>
          <div class="item-wrap" id="<?php if(get_row_layout() == 'contact'):?>contact-form<?php endif; ?>">
            <div><i class="fa fa-minus"></i></div>
            <?php if(get_row_layout() == 'info' || get_row_layout() == 'social'):?>
            <h6><?php the_sub_field('text-title'); the_sub_field('social-title'); ?></h6>
            <?php if(get_sub_field('text-body')): ?>
            <p><?php the_sub_field('text-body'); ?></p>
          <?php elseif(get_sub_field('social-item')): ?>
            <div class="social"><a href="<?php the_sub_field('social-item');?>"><i class="fa fa-twitter"></i></a></div>
          <?php endif; ?>
        <?php elseif(get_row_layout() == 'contact'): ?>
          <div class="item-title">
            <h4><?php the_sub_field('contact-title'); ?></h4>
            <p><?php the_sub_field('contact-body'); ?></p>
          </div>
          <div class="item-body"><div class="form">
            <?php the_sub_field('contact-form'); ?>
          </div></div>
        <?php endif;?>
          </div>
          <?php endwhile; endif; ?>
          <?php endwhile; endif; ?>
        </div>
      </div>
   <?php elseif(is_page('about') || is_child('about')):
     $post_slug = 'organizers';
     $args = array('name' => $post_slug,'post_type' => 'yellows', 'numberposts' => 1);
     $single_post = query_posts($args); ?>
     <div class="header">
       <h2><?php echo $single_post[0]->post_title; ?></h2>
     </div>
     <div class="body">
       <div class="org-items">
         <div class="controls">
             <i id="next" class="fa fa-angle-right"></i>
             <i id="prev" class="fa fa-angle-left"></i>
         </div>
         <?php if(have_posts()): while(have_posts()): the_post();
                 if(have_rows('footer-content')): while(have_rows('footer-content')): the_row(); ?>
               <?php if(get_row_layout() == 'gallery'):
                 $images = get_sub_field('gallery-body');
                 if($images): ?>
        <ul><?php foreach($images as $image): ?>
          <li>
            <a href="<?php echo $image['description']; ?>" target="_blank">
             <img src="<?php echo $image['url']; ?>" />
            </a>
          </li>
          <?php endforeach; ?>
        </ul><?php endif; endif; ?>
        <?php endwhile; endif; endwhile; endif; ?>
       </div>
     </div>
   <?php elseif(is_post_type_archive('articles')):
     $post_slug = 'keep-it-going';
     $args = array('name' => $post_slug, 'post_type' => 'yellows', 'numberposts' =>1);
     $single_post = query_posts($args); ?>
     <div class="header">
       <h2><?php echo $single_post[0]->post_title; ?></h2>
       <div class="section-bg"><i class="fa fa-location-arrow"></i></div>
     </div>
     <div class="body">
       <div class="col4 left">
         <div class="body">
       <?php if(have_posts()): while(have_posts()): the_post(); ?>
        <?php if(have_rows('footer-content')): while(have_rows('footer-content')): the_row(); ?>
             <?php if(get_row_layout() == 'downloads'): ?>
           <div class="item-wrap">
             <div><i class="fa fa-minus"></i></div>
               <?php $updated = get_sub_field('last-update');
               $updated_object = get_sub_field_object('last-update');
               $document = get_sub_field('pdf-document');
               $document_title = get_the_title($document);
               $document_link = wp_get_attachment_url($document);
               $document_object = get_sub_field_object('pdf-document');
               $document_size = filesize(get_attached_file($document));
               $document_size = size_format($document_size, 2);
              //  $document_others = get_sub_field('pdf-document');
              //  $others_link = wp_get_attachment_url($document_others);
                ?>
               <div class="item-download">
                 <h6><?php echo $updated_object['label'] . ': <b>' . $updated . '</b>'; ?></h6>
                 <div class="download">
                   <span class="down-icon"><a href="<?php echo $document_link; ?>"><i class="fa fa-cloud-download"></i></a></span>
                   <span class="down-info">
                     <div class="down-text"><a href="<?php echo $document_link; ?>"><?php echo _e('DOWNLOAD', 'air');?></a></div>
                     <div class="down-file"><?php echo $document_size; ?></div>
                     <div class="down-ext"><?php echo $document_object['label']; ?><a class="other-formats" href="#"><?php echo _e('For other formats', 'air');?></a></div>
                   </span>
                 </div>
               </div>
           </div>
             <?php endif; ?>
        <?php endwhile; endif; endwhile; endif; ?>
             <div class="item-wrap">
               <div><i class="fa fa-minus"></i></div>
               <div class="item-share">
                 <h6><?php echo _e('Share the Declaration') ?></h6>
                 <?php share_buttons(); ?>
               </div>
             </div>
        </div>
       </div>
       <div class="col8 right">
         <?php if(have_rows('footer-content')): while(have_rows('footer-content')): the_row(); ?>
           <div class="item-wrap">

           </div>
         <?php endwhile; endif; ?>
       </div>
     </div>
    <?php endif; ?>
    </div>
 </section>
