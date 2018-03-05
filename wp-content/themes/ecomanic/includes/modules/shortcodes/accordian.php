<?php  
   $count = 1;
   $query_args = array('post_type' => 'bunch_services' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
   
   if( $cat ) $query_args['services_category'] = $cat;
   $query = new WP_Query($query_args) ; 
   
   ob_start() ;?>
   
<?php if($query->have_posts()):  ?>   
<div class="column text-column">
                
    <h2 class="default-title text-uppercase"><?php echo balanceTags($title);?></h2>
    
    <!-- Accordion Box -->
    <div class="accordion-box">
        
        <?php while($query->have_posts()): $query->the_post();
				global $post ; 
				$services_meta = _WSH()->get_meta();
		?>
        <!-- Accordion -->
        <article class="accordion">
            <div class="acc-btn <?php if($active == 1) echo "active";?>"><?php the_title();?><div class="toggle-icon"><span class="plus flaticon-add30"></span><span class="minus flaticon-minus42"></span></div></div>
            <div class="acc-content <?php if($active == 1) echo "collapsed";?>">
                <p><?php echo balanceTags(ecomanic_trim(get_the_excerpt(), $text_limit));?></p>
            </div>
        </article>
        <?php $active++; endwhile;?>
        
    </div>
    
</div>

<?php endif; ?>
<?php 
	wp_reset_postdata();
   $output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>