<?php  
   $count = 1;
   $query_args = array('post_type' => 'bunch_testimonials' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
   
   if( $cat ) $query_args['testimonials_category'] = $cat;
   $query = new WP_Query($query_args) ; 
   
   ob_start() ;?>
   
<?php if($query->have_posts()):  ?>   
<!--Testimonials Section-->
<section class="testimonials-section no-padd-top">
    <div class="auto-container">
    
        <div class="slider-outer">
            <div class="quote-icon"><span class="icon flaticon-quotation4"></span></div>
            
            <h2><?php echo balanceTags($title);?></h2>
            
            <ul class="testimonials-slider">
                
                <?php while($query->have_posts()): $query->the_post();
						global $post ; 
						$testimonial_meta = _WSH()->get_meta();
				?>
                <li><div class="slide-content"><?php echo balanceTags(ecomanic_trim(get_the_excerpt(), $text_limit));?></div><div class="author"><?php the_title();?></div></li>
            	<?php endwhile;?>
            
            </ul>
        </div>
    
    </div>
</section>

<?php endif; ?>
<?php 
	wp_reset_postdata();
   $output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>