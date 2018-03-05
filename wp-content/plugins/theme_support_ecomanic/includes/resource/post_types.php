<?php
$theme_option = get_option(BUNCH_NAME.'_theme_options');  //printr($options);
$service_slug = bunch_set($theme_option , 'service_permalink' , 'services') ;
$gallery_slug = bunch_set($theme_option , 'gallery_permalink' , 'gallery') ;
$team_slug = bunch_set($theme_option , 'team_permalink' , 'teams') ;
$testimonial_slug = bunch_set($theme_option , 'testimonial_permalink' , 'testimonials') ;
$faqs_slug = bunch_set($theme_option , 'faqs_permalink' , 'faqs') ;
$options = array();
$options['bunch_services'] = array(
								'labels' => array(__('Service', BUNCH_NAME), __('Service', BUNCH_NAME)),
								'slug' => $service_slug ,
								'label_args' => array('menu_name' => __('Services', BUNCH_NAME)),
								'supports' => array( 'title' , 'editor' , 'thumbnail' ),
								'label' => __('Service', BUNCH_NAME),
								'args'=>array(
										'menu_icon'=>'dashicons-products' , 
										'taxonomies'=>array('services_category')
								)
							);
$options['bunch_gallery'] = array(
								'labels' => array(__('Gallery', BUNCH_NAME), __('Gallery', BUNCH_NAME)),
								'slug' => $gallery_slug ,
								'label_args' => array('menu_name' => __('Gallery', BUNCH_NAME)),
								'supports' => array( 'title' , 'editor' , 'thumbnail'),
								'label' => __('Gallery', BUNCH_NAME),
								'args'=>array(
											'menu_icon'=>'dashicons-format-gallery' , 
											'taxonomies'=>array('gallery_category')
								)
							);							
							
$options['bunch_team'] = array(
								'labels' => array(__('Member', BUNCH_NAME), __('Member', BUNCH_NAME)),
								'slug' => $team_slug ,
								'label_args' => array('menu_name' => __('Teams', BUNCH_NAME)),
								'supports' => array( 'title', 'editor' , 'thumbnail'),
								'label' => __('Member', BUNCH_NAME),
								'args'=>array(
											'menu_icon'=>'dashicons-groups' , 
											'taxonomies'=>array('team_category')
								)
							);
$options['bunch_testimonials'] = array(
								'labels' => array(__('Testimonial', BUNCH_NAME), __('Testimonial', BUNCH_NAME)),
								'slug' => $testimonial_slug ,
								'label_args' => array('menu_name' => __('Testimonials', BUNCH_NAME)),
								'supports' => array( 'title' , 'editor' , 'thumbnail' ),
								'label' => __('Testimonial', BUNCH_NAME),
								'args'=>array(
										'menu_icon'=>'dashicons-testimonial' , 
										'taxonomies'=>array('testimonials_category')
								)
							);
$options['bunch_faqs'] = array(
								'labels' => array(__('FAQ', BUNCH_NAME), __('FAQ', BUNCH_NAME)),
								'slug' => $faqs_slug ,
								'label_args' => array('menu_name' => __('FAQs', BUNCH_NAME)),
								'supports' => array( 'title' , 'editor' , 'thumbnail' ),
								'label' => __('FAQ', BUNCH_NAME),
								'args'=>array(
										'menu_icon'=>'dashicons-testimonial' , 
										'taxonomies'=>array('faqs_category')
								)
							);
