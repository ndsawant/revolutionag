<?php /* Template Name: custom gallery */ ?>
<?php get_header(); ?>

<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri(); ?>/css/isotope-docs.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri(); ?>/css/lightbox.min.css" />

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

<div class="gallery-section full-width no-padd-top">
			 <div class="big-demo" data-js="combination-filters">

			        <div class="ui-group">
			          <ul class="filter-tabs button-group js-radio-button-group" data-filter-group="main">
					  
							<?php
							$taxonomies = array('taxonomy' => 'gallery_category' );
							$terms = get_terms('gallery_category');
							//$terms = get_terms(array( 'taxonomy' => 'gallery_category', 'parent' => 0 ) );
							$count = count($terms);
							echo '<li class="button filter filter-all active is-checked" data-filter=""><a data-toggle="tab" href="#all">All</a></li>';
							if ( $count > 0 ){ 
							foreach ( $terms as $term ) { 
								$parent = $term->parent;
									if ( $parent=='0' ) {
									$termname = strtolower($term->name);
									$termname = str_replace(' ', '-', $termname);
									echo '<li class="button filter" data-filter=".'.$termname.'"><a data-toggle="tab" href="#parent_id_'.$term->term_id.'">'.$term->name.'</a></li>';
									}
								}
							}
							?>
			          </ul>
					  <div class="tab-content button-group js-radio-button-group" data-filter-group="main">
					  
							<?php
							$taxonomies = array('taxonomy' => 'gallery_category' );
							$terms = get_terms('gallery_category');
							$count = count($terms);
							echo '<div class="child-gallery_cat" id="all">';
											/*foreach ( $childCategories as $child ) {
												$childtermname = strtolower($child->name);
												$childtermname = str_replace(' ', '-', $childtermname);
												echo '<button class="button filter" data-filter=".'.$childtermname.'">'.$child->name.'</button>';
											}*/
										echo '</div>';
							if ( $count > 0 ){ 
								foreach ( $terms as $term ) { 
									$parent = $term->parent;
									if ( $parent=='0' ) {
										$termname = strtolower($term->name);
										$termname = str_replace(' ', '-', $termname);
										$parent_cat_id = $term->term_id;
										
										$args = array( 'child_of' => $parent_cat_id);
										$childCategories = get_terms($taxonomies, $args);
										echo '<div class="child-gallery_cat" id="parent_id_'.$term->term_id.'">';
											foreach ( $childCategories as $child ) {
												$childtermname = strtolower($child->name);
												$childtermname = str_replace(' ', '-', $childtermname);
												echo '<button class="button filter" data-filter=".'.$childtermname.'">'.$child->name.'</button>';
											}
										echo '</div>';
									}
								}
							}
							?>
			          </div>
			        </div>
					
				

			        <!-- <pre class="code-display"><code>$grid.isotope({...})</code></pre> -->

			        <div class="grid">
					<?php 
						$args = array( 'post_type' => 'bunch_gallery', 'posts_per_page' => -1 );
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post();
						$terms = get_the_terms( $post->ID, 'gallery_category' );						
						if ( $terms && ! is_wp_error( $terms ) ) : 
						$links = array();

						foreach ( $terms as $term ) {
						$links[] = $term->name;
						}

						$tax_links = join( " ", str_replace(' ', '-', $links));          
						$tax = strtolower($tax_links);
						else :	
						$tax = '';					
						endif; 

						echo '<div class="color-shape '. $tax .'" data-title=" '. $tax .'" data-fancybox="gallery">';
						echo '<div class="background-cover background-overlay" style="background-image: url('.get_the_post_thumbnail_url().');"></div>';
						echo '<img class="hidden" src="'.get_the_post_thumbnail_url().'" alt="featured-image"/>';
						echo '<a class="example-image-link btn-zoom" href="'.get_the_post_thumbnail_url().'" data-lightbox="example-set"><span class="icon flaticon-round69"></span></a>';
						//echo '<h2>'. the_title() .'</h2>';
						echo '</div>'; 
						endwhile; ?>
					
              
			        </div>
			 </div>
		</div>
		
		
<?php wp_deregister_script('jquery.min');?>
<script src='<?php echo get_stylesheet_directory_uri();?>/js/jquery-1.11.3.min.js'></script>
<script src='<?php echo get_stylesheet_directory_uri();?>/js/isotope-docs.min.js'></script>
<script src='<?php echo get_stylesheet_directory_uri();?>/js/lightbox-plus-jquery.min.js'></script>

<script>
jQuery(function($){
	
});
</script>
<?php get_footer(); ?>
