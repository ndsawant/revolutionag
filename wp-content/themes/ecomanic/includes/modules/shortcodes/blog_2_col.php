<?php  
   global $post ;
   $count = 0;
   $paged = get_query_var('paged');
   $query_args = array('post_type' => 'post' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order, 'paged'=>$paged);
   if( $cat ) $query_args['category_name'] = $cat;
   $query = new WP_Query($query_args) ; 
   
   ob_start() ;?>
   
<?php if($query->have_posts()):  ?>   
<section class="default-section blog-section no-padd-top no-padd-bottom">
                    
    <div class="row clearfix">
    	
        <?php while($query->have_posts()): $query->the_post();
			global $post ; 
			$post_meta = _WSH()->get_meta();
		?>
        <!--Blog Post-->
        <div class="col-md-6 col-sm-6 col-xs-12 featured-blog-post">
            <article class="inner-box hvr-float-shadow">
                <figure class="image">
                    <a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_post_thumbnail('ecomanic_371x226', array('class' => 'ecomanic'));?></a>
                </figure>
                <div class="post-lower">
                    <div class="post-header">
                        <div class="date"><span class="day"><?php echo get_the_date('d')?></span><br><?php echo get_the_date('M')?></div>
                        <h3><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title();?></a></h3>
                        <ul class="post-info">
                            <li><span class="icon fa fa-user"></span> <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"><?php the_author();?></a></li>
                            <li><span class="icon fa fa-tag"></span> <?php the_category(', '); ?></li>
                        </ul>
                    </div>
                    <div class="post-desc">
                        <p><?php echo balanceTags(ecomanic_trim(get_the_excerpt(), $text_limit));?></p>
                        <div class="text-right"><a href="<?php echo esc_url(get_permalink(get_the_id()));?>" class="theme-btn"><span class="flaticon-right11"></span></a></div>
                    </div>
                </div>
            </article>
        </div>
        
		<?php endwhile;?>
    </div>
                                
    <br><br>
    <!--Pagination-->
    <div class="pager-outer clearfix">
        <div class="pagination text-right">
            <?php ecomanic_the_pagination(array('total'=>$query->max_num_pages, 'next_text' => '<i class="fa fa-angle-double-right"></i>', 'prev_text' => '<i class="fa fa-angle-double-left"></i>')); ?>
        </div>
    </div>
</section>

<?php endif; ?>
<?php 
	wp_reset_postdata();
   $output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>