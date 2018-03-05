<?php $options = _WSH()->option();
	Global $wp_query;
	$icon_href = (ecomanic_set( $options, 'site_favicon' )) ? ecomanic_set( $options, 'site_favicon' ) : get_template_directory_uri().'/images/favicon.png';
 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		 <!-- Basic -->
	    <meta charset="<?php bloginfo( 'charset' ); ?>">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<!-- Favcon -->
		<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ):?>
			<link rel="shortcut icon" type="image/png" href="<?php echo esc_url($icon_href);?>">
		<?php endif;?>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	
    <div class="page-wrapper">
 	<?php if(ecomanic_set($options, 'preloader')):?>
    <!-- Preloader -->
    <div class="preloader"></div>
 	<?php endif;?>
    <!-- Main Header -->
    <header class="main-header">
    	<!-- Header Top -->
    	<div class="header-top">
        	<div class="auto-container clearfix">
            	<!-- Top Left -->
            	<div class="top-left">
                	<?php if(ecomanic_set($options, 'welcome')):?>
                	<ul class="clearfix">
                    	<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo balanceTags(ecomanic_set($options, 'welcome'));?></a></li>
                    </ul>
                    <?php endif;?>
                </div>
                
                <!-- Top Right -->
                <div class="top-right">
                	<ul class="clearfix">
                    	<?php if(ecomanic_set($options, 'phone')):?><li><a href="tel:<?php echo esc_attr(ecomanic_set($options, 'phone'));?>"><span class="icon fa fa-phone"></span> <?php esc_html_e('Call us', 'ecomanic')?> <?php echo balanceTags(ecomanic_set($options, 'phone'));?></a></li><?php endif;?>
                        <?php if(ecomanic_set($options, 'quote_link')):?><li><a href="<?php echo esc_url(ecomanic_set($options, 'quote_link'));?>"><span class="icon fa fa-caret-right"></span> <?php esc_html_e('Get a Quote', 'ecomanic');?></a></li><?php endif;?>
                    </ul>
                </div>
                
            </div>
        </div><!-- Header Top End -->
        
    	<!--Header-Lower-->
        <div class="header-lower">
        	<div class="auto-container">
            	<div class="clearfix">
                	
                	<div class="pull-left logo-outer">
                    	<div class="logo">
                        	<?php if(ecomanic_set($options, 'logo_image')):?>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(ecomanic_set($options, 'logo_image'));?>" alt="" title="<?php esc_html_e('Ecomanic', 'ecomanic');?>"></a>
                            <?php else:?>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(get_template_directory_uri().'/images/logo.png');?>" alt="<?php esc_html_e('Ecomanic', 'ecomanic');?>"></a>
                            <?php endif;?>
                            
                        </div>
                    </div>
                    
                    <div class="pull-right upper-right clearfix">
                        <!-- Main Menu -->
                        <nav class="main-menu">
                            <div class="navbar-header">
                                <!-- Toggle Button -->    	
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                </button>
                            </div>
                            
                            <div class="navbar-collapse collapse clearfix">
                                <ul class="navigation clearfix">
                                    <?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'container_id' => 'navbar-collapse-1',
												'container_class'=>'navbar-collapse collapse navbar-right',
												'menu_class'=>'nav navbar-nav',
												'fallback_cb'=>false, 
												'items_wrap' => '%3$s', 
												'container'=>false,
												'walker'=> new Bunch_Bootstrap_walker()  
									) ); ?>
                                </ul>
                            </div>
                        </nav><!-- Main Menu End-->
                    </div>
                    
                </div>
            </div>
        </div>
    
    </header>
    <!--End Main Header -->