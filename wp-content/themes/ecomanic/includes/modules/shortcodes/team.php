<?php  
   $count = 1;
   $query_args = array('post_type' => 'bunch_team' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
   
   if( $cat ) $query_args['team_category'] = $cat;
   $query = new WP_Query($query_args) ; 
   
   ob_start() ;?>
   
<?php if($query->have_posts()):  ?>   
<!--Team Section-->
<section class="team-section no-padd-top">
    <div class="auto-container">
    
        <div class="sec-title text-center">
            <div class="title-style-one"><h2><?php echo balanceTags($title);?></h2></div>
        </div>
        
        <div class="row clearfix">
            
            <?php while($query->have_posts()): $query->the_post();
					global $post ; 
					$team_meta = _WSH()->get_meta();
			?>
            <!--Member-->
            <article class="col-md-3 col-sm-6 col-xs-12 member-column wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                <div class="inner-box">
                    <figure class="image">
                        <a href="<?php echo esc_url(ecomanic_set($teams_meta, 'team_link'));?>"><?php the_post_thumbnail('ecomanic_270x260', array('class' => 'img-responsive'));?></a>
                    </figure>
                    <div class="member-title">
                        <h4><?php the_title();?></h4>
                        <p><?php echo balanceTags(ecomanic_set($team_meta, 'designation'));?></p>
                    </div>
                    <div class="member-desc">
                        <p><?php echo balanceTags(ecomanic_trim(get_the_excerpt(), $text_limit));?></p>
                    </div>
                    <?php if($socials = ecomanic_set($team_meta, 'bunch_team_social')):?>
                        <ul class="social-links clearfix">
                            <?php foreach($socials as $key => $value):?>
                                
                                <li><a href="<?php echo esc_url(ecomanic_set($value, 'social_link'));?>" class="fa <?php echo esc_attr(ecomanic_set($value, 'social_icon'));?>"></a></li>
                            
                            <?php endforeach;?>
                        </ul>
                    <?php endif;?>
                    
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