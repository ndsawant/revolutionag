<?php /* Template Name: VC Page */
	get_header() ;
	$meta = _WSH()->get_meta('_bunch_header_settings');
	$bg = ecomanic_set($meta, 'header_img');
	$title = ecomanic_set($meta, 'header_title');
?>
<?php if(ecomanic_set($meta, 'breadcrumb')):?>
	<!--Page Title-->
    <section class="page-title" <?php if($bg):?>style="background-image:url('<?php echo esc_attr($bg)?>');"<?php endif;?>>
    	<div class="auto-container">
        	<!--Bread Crumb-->
		    <div class="bread-crumb">
            	<div class="links-outer"><?php echo balanceTags(ecomanic_get_the_breadcrumb()); ?></div>
            </div>
        </div>
    </section>
<?php endif;?>
<?php while( have_posts() ): the_post(); ?>
    <?php the_content(); ?>
<?php endwhile;  ?>
<?php get_footer() ; ?>