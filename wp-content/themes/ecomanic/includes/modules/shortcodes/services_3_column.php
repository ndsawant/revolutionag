<?php  
   $count = 1;
   $query_args = array('post_type' => 'bunch_services' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
   
   if( $cat ) $query_args['services_category'] = $cat;
   $query = new WP_Query($query_args) ; 
   
   ob_start() ;?>
   
<?php if($query->have_posts()):  ?>   
<!--Default Section-->
<section class="default-section <?php if($no_padding == true) echo 'no-padd-top';?>">
    <div class="auto-container">
    	<?php if($title || $text):?>
        <div class="sec-title text-center">
            <div class="title-style-one"><h2><?php echo balanceTags($title);?></h2></div>
            <div class="text"><?php echo balanceTags($text);?></div>
        </div>
        <?php endif;?>
        <div class="row clearfix">
            
            <?php while($query->have_posts()): $query->the_post();
                    global $post ; 
                    $services_meta = _WSH()->get_meta();
            ?>
            <article class="col-md-4 col-sm-12 col-xs-12 icon-column boxed-column wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                <div class="inner-box">
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