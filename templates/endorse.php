<?php
/**
 *  @package air
 *  @since 2.0
 *  @name Content template for Endorsement page
 **/
 ?>
 <div class="container clearfix col12">
   <?php the_post(); ?>
   <div class="content">
     <div class="header"><?php the_content(); ?></div>
     <div class="body clearfix">
       <div class="col6 left">
         <div class="lse-items" id="lse-items">
           <div class="body">
             <?php endorse_db(); ?>
           </div>
         </div>
       </div>
       <div class="col6 right">
         <div class="af-map" id="af-map"></div>
       </div>
     </div>
   </div>
 </div>
