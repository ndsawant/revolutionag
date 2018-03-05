<?php $options = _WSH()->option();
	get_header();
	$settings  = ecomanic_set(ecomanic_set(get_post_meta(get_the_ID(), 'bunch_page_meta', true) , 'bunch_page_options') , 0);
	$meta = _WSH()->get_meta('_bunch_layout_settings');
	$meta1 = _WSH()->get_meta('_bunch_header_settings');
	if(ecomanic_set($_GET, 'layout_style')) $layout = ecomanic_set($_GET, 'layout_style'); else
	$layout = ecomanic_set( $meta, 'layout', 'full' );
	$sidebar = ecomanic_set( $meta, 'sidebar', 'blog-sidebar' );
	$classes = ( !$layout || $layout == 'full' || ecomanic_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' col-lg-9 col-md-8 col-sm-12 col-xs-12 ' ;
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
                    <!--Blog Post-->
                    <?php while( have_posts() ): the_post();?>
                        <!-- blog post item -->
                        <?php the_content(); ?>
                        <?php comments_template(); ?><!-- end comments -->
                    <?php endwhile;?>
                    
                    <br><br>
                    <!--Pagination-->
                    <div class="pager-outer clearfix">
                        <div class="pagination text-right">
                            <?php ecomanic_the_pagination(); ?>
                        </div>
                    </div>
                </section>
            </div>
            <!--Content Side-->
            
            <!--Sidebar-->	
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
            <!--Sidebar-->
        </div>
    </div>
</div>

<?php get_footer(); ?>