<?php $options = _WSH()->option();
	get_header(); 
	$settings  = ecomanic_set(ecomanic_set(get_post_meta(get_the_ID(), 'bunch_page_meta', true) , 'bunch_page_options') , 0);
	$meta = _WSH()->get_meta('_bunch_layout_settings');
	$meta1 = _WSH()->get_meta('_bunch_header_settings');
	$meta2 = _WSH()->get_meta();
	_WSH()->page_settings = $meta;
	if(ecomanic_set($_GET, 'layout_style')) $layout = ecomanic_set($_GET, 'layout_style'); else
	$layout = ecomanic_set( $meta, 'layout', 'full' );
	if( !$layout || $layout == 'full' || ecomanic_set($_GET, 'layout_style')=='full' ) $sidebar = ''; else
	$sidebar = ecomanic_set( $meta, 'sidebar', 'blog-sidebar' );
	$classes = ( !$layout || $layout == 'full' || ecomanic_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' col-lg-9 col-md-8 col-sm-12 col-xs-12 ' ;
	_WSH()->post_views( true );
?>
<!--Page Title-->
<section class="page-title">
    <div class="auto-container">
        <!--Bread Crumb-->
        <div class="bread-crumb">
            <div class="links-outer">
            	<?php echo balanceTags(ecomanic_get_the_breadcrumb()); ?>
            </div>
        </div>
    </div>
</section>

<!--Sidebar Page-->
<div class="sidebar-page no-padd-top">
    <div class="auto-container">
        <div class="row clearfix">
            
            <!-- sidebar area -->
			<?php if( $layout == 'left' ): ?>
			<?php if ( is_active_sidebar( $sidebar ) ) { ?>
			<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">        
				<aside class="sidebar">
					<?php dynamic_sidebar( $sidebar ); ?>
				</aside>
            </div>
			<?php } ?>
			<?php endif; ?>
            
            <!--Content Side-->	
            <div class="<?php echo esc_attr($classes);?>">
                
                <!--Default Section-->
                <section class="default-section blog-section no-padd-top no-padd-bottom">
                    <?php while( have_posts() ): the_post(); 
						$post_meta = _WSH()->get_meta();
					?>
                    <!--Blog Post-->
                    <div class="featured-blog-post wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <article class="inner-box">
                            <figure class="image">
                                <a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_post_thumbnail('ecomanic_1200x313', array('class' => 'img-responsive'));?></a>
                            </figure>
                            <div class="post-lower">
                                <div class="post-header">
                                    <div class="date"><span class="day"><?php echo get_the_date('d');?></span><br><?php echo get_the_date('M');?></div>
                                    <h3><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title();?></a></h3>
                                    <ul class="post-info">
                                        <li><span class="icon fa fa-user"></span> <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"><?php the_author();?></a></li>
                                        <li><span class="icon fa fa-tag"></span> <?php the_category(', '); ?></li>
                                        <li><span class="icon fa fa-comment-o"></span> <a href="<?php echo esc_url(get_permalink(get_the_id()).'#comments');?>"> <?php comments_number( '0 comment', '1 comment', '% comments' ); ?></a></li>
                                        <li><span class="icon fa fa-calendar-o"></span> <a href="<?php echo esc_url(get_month_link(get_the_date('Y'), get_the_date('m'))); ?>"><?php echo get_the_date('d M, Y');?></a></li>
                                    </ul>
                                </div>
                                <div class="post-desc">
                                	<?php the_content();?>
									<span class="tags"><?php the_tags();?></span>
                                </div>
                            </div>
                        </article>
                        
                        <br><br><br>
                        
                        <!--Comments Area-->
                    	<!-- comment area -->
		            	<?php wp_link_pages(array('before'=>'<div class="paginate-links">'.esc_html__('Pages: ', 'ecomanic'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>
						<?php comments_template(); ?><!-- end comments -->    
                    </div>
                    <?php endwhile;?>
                </section>
            </div>
            <!--Content Side-->
            
            <!-- sidebar area -->
			<?php if( $layout == 'right' ): ?>
			<?php if ( is_active_sidebar( $sidebar ) ) { ?>
			<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">        
				<aside class="sidebar">
					<?php dynamic_sidebar( $sidebar ); ?>
				</aside>
            </div>
			<?php } ?>
			<?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>