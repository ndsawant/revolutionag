<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$meta = _WSH()->get_meta('_bunch_layout_settings');
$meta1 = _WSH()->get_meta('_bunch_header_settings');
$layout = ecomanic_set( $meta, 'layout', 'right' );
$sidebar = ecomanic_set( $meta, 'sidebar', 'blog-sidebar' );
$classes = ( !$layout || $layout == 'full' || ecomanic_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' col-lg-9 col-md-9 col-sm-12 col-xs-12 ' ;
//$bg = ecomanic_set($meta1, 'header_img');
//$title = ecomanic_set($meta1, 'header_title');
get_header( 'shop' ); ?>

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

<div class="sidebar-page no-padd-top">
    <div class="auto-container">
        <div class="row clearfix">
			
            <!-- sidebar area -->
			<?php if( $layout == 'left' ): ?>
			<?php if ( is_active_sidebar( $sidebar ) ) { ?>
			<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">        
				<aside class="sidebar">
					<?php dynamic_sidebar( $sidebar ); ?>
                    <?php
							/**
							 * woocommerce_sidebar hook
							 *
							 * @hooked woocommerce_get_sidebar - 10
							 */
							do_action( 'woocommerce_sidebar' );
						?>
				</aside>
            </div>
			<?php } ?>
			<?php endif; ?>
			
	<div class="<?php echo esc_attr($classes);?> shop-page-content product-details-page-content">
	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php wc_get_template_part( 'content', 'single-product' ); ?>
		<?php endwhile; // end of the loop. ?>
	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>
	
	</div>
		
        <!-- sidebar area -->
			<?php if( $layout == 'right' ): ?>
			<?php if ( is_active_sidebar( $sidebar ) ) { ?>
			<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">        
				<aside class="sidebar">
					<?php dynamic_sidebar( $sidebar ); ?>
                    <?php
						/**
						 * woocommerce_sidebar hook
						 *
						 * @hooked woocommerce_get_sidebar - 10
						 */
						do_action( 'woocommerce_sidebar' );
					?>
				</aside>
            </div>
			<?php } ?>
			<?php endif; ?>
	</div>
	</div>
</div>
<?php get_footer( 'shop' ); ?>
