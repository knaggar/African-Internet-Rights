<?php
/**
 *  @package air
 *  @since 2.0
 *  @name Archive Page Template
 *  Template Name: Taxonomy Posts Template
 **/
 ?>
 <?php get_header(); ?>
   <?php get_template_part('page-header', get_post_format()); ?>
   <?php if(is_post_type_archive('updates')): get_template_part('pre-body', get_post_format()); endif; ?>
   <section class="body">
     <div class="col12 container clearfix">
     <?php if(is_post_type_archive('updates')): ?>
       <div class="content">
         <?php query_posts(array(
           'post_type' => 'updates',
         ));?>
           <div class="body">
             <div class="updates-items" id="updates-items">
               <?php while(have_posts()): the_post(); ?>
               <article class="<?php if(has_post_thumbnail()) {?>has-thumb <?php }else{ ?>no-thumb <?php } if(has_term($tag,'feature', $post)){ ?>col6 focus<?php }else{ ?>col3<?php }?>">
                 <div class="thumb">
                   <div class="img-hover">
                     <a href="<?php the_permalink(); ?>"><i class="fa fa-minus"></i></a>
                   </div>
                   <?php if(has_term($tag, 'feature', $post)){
                    the_post_thumbnail('updates-featured');
                   } else {
                    the_post_thumbnail('updates-thumb');
                   } ?>
                 </div>
                 <div class="content">
                   <div class="date"><?php the_time('d F Y'); ?></div>
                   <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                   <?php if (!has_post_thumbnail() || has_term($tag, 'feature', $post)) {
                      the_excerpt();
                   } ?>
                   <div class="button read-more">
                     <a href="<?php the_permalink(); ?>"><i class="fa fa-minus"></i></a>
                   </div>
                 </div>
               </article>
             <?php endwhile;?>
             </div>
           </div>
       </div>
     </div>
   <?php elseif(is_post_type_archive('articles')):
     get_template_part('templates/declaration', get_post_format());
     elseif(is_post_type_archive('faq')):
     get_template_part('templates/faq', get_post_format());
   endif; ?>
   </section>
<?php get_footer(); ?>
