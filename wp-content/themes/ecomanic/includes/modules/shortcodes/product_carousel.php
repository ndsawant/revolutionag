<?php  
   $count = 1;
   $query_args = array('post_type' => 'product' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
   
   if( $cat ) $query_args['product_cat'] = $cat;
   $query = new WP_Query($query_args) ; 
   
   ob_start() ;?>
   
<?php if($query->have_posts()):  ?>   
<!--Products Section-->
<section class="products-section slider-section woocommerce">
<div class="auto-container slider-outer">

	<div class="sec-title text-center">
		<h2><?php echo balanceTags($title);?></h2>
	</div>
	
	<br><br><br>
	
	<!--Carousel Outer-->
	<div class="carousel-slider five-column">
		<?php while($query->have_posts()): $query->the_post();
					global $post ; 
					$product_meta = _WSH()->get_meta();
		?>
		<?php 
			$post_thumbnail_id = get_post_thumbnail_id($post->ID);
			$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
		?>
		<article class="product-column">
			<div class="inner-box">
				<figure class="image"><a href="<?php echo esc_url($post_thumbnail_url);?>" class="lightbox-image" title="<?php esc_html_e('Image Caption Here', 'ecomanic');?>"><?php the_post_thumbnail('ecomanic_190x120', array('class' => 'img-responsive'));?></a></figure>
				<div class="prod-info">
					<h4 class="prod-cat"><?php the_terms( $post->ID, 'product_cat', '', ' , ' ); //without anchor?></h4>
					<div class="prod-title"><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title();?></a></div>
					<h3 class="prod-price"><?php woocommerce_template_loop_price(); ?></h3>
					<a href="<?php echo esc_url(get_permalink(get_the_id()));?>" class="theme-btn btn-style-four"><?php esc_html_e('VIEW DETAILS', 'ecomanic');?></a>
				</div>
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