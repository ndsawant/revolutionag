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
    
        <div class="sec-title">
            <div class="title-style-one icon-left"><h2><?php echo balanceTags($title);?></h2></div>
        </div>
        
        <div class="row clearfix">
            
            <!--Column-->
            <div class="col-md-7 col-sm-12 col-xs-12">
                
                <?php while($query->have_posts()): $query->the_post();
						global $post ; 
						$services_meta = _WSH()->get_meta();
				?>
                <article class="icon-column rect-icon">
                    <div class="inner-box">
                        <div class="icon"><span class="<?php echo str_replace("icon ", "", ecomanic_set($services_meta, 'fontawesome'));?>"></span></div>
                        <h3><?php the_title();?></h3>
                        <div class="text"><?php echo balanceTags(ecomanic_trim(get_the_excerpt(), $text_limit));?></div>
                    </div>
                </article>
                <?php endwhile;?>
                
            </div>
            
            <!--Column-->
            <div class="col-md-5 col-sm-12 col-xs-12">
                <figure class="image hanged-image text-right wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms"><img src="<?php echo esc_url(wp_get_attachment_url($img, 'full'));?>" alt="<?php esc_html_e('Image', 'ecomanic');?>"></figure>
            </div>
            
        </div>
    </div>
</section>

<?php endif; ?>
<?php 
	wp_reset_postdata();
   $output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>