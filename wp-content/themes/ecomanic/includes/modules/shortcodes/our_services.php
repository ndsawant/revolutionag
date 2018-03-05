<?php  
   $count = 1;
   $query_args = array('post_type' => 'bunch_services' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
   
   if( $cat ) $query_args['services_category'] = $cat;
   $query = new WP_Query($query_args) ; 
   
   ob_start() ;?>
   
<?php if($query->have_posts()):  ?>   
<!--Services Section-->
<section class="services-section-one">
    <div class="auto-container">
    
        <div class="sec-title text-center">
            <div class="title-style-one"><h2><?php echo balanceTags($title);?></h2></div>
        </div>
        
        <div class="row clearfix">
        
            <?php while($query->have_posts()): $query->the_post();
					global $post ; 
					$services_meta = _WSH()->get_meta();
			?>
            <article class="col-md-4 col-sm-12 col-xs-12 icon-column">
                <div class="inner">
                    <div class="icon"><span class="<?php echo str_replace("icon ", "", ecomanic_set($services_meta, 'fontawesome'));?>"></span></div>
                    <h3><?php the_title();?></h3>
                    <div class="text"><?php echo balanceTags(ecomanic_trim(get_the_excerpt(), $text_limit));?></div>
                </div>
            </article>
            <?php endwhile;?>
            
        </div>
    </div>
</section>

<?php endif; ?>
<?php 
	wp_reset_postdata();
   $output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>