<?php
add_action('after_setup_theme', 'ecomanic_bunch_theme_setup');
function ecomanic_bunch_theme_setup()
{
	bunch_global_version_variable();
	
	if(!defined('ECOMANIC_VERSION')) define('ECOMANIC_VERSION', '1.0');
	if( !defined( 'ECOMANIC_ROOT' ) ) define('ECOMANIC_ROOT', get_template_directory().'/');
	if( !defined( 'ECOMANIC_URL' ) ) define('ECOMANIC_URL', get_template_directory_uri().'/');	
	include_once get_template_directory() . '/includes/loader.php';
	
	
	load_theme_textdomain('ecomanic', get_template_directory() . '/languages');
	
	//ADD THUMBNAIL SUPPORT
	add_theme_support('post-thumbnails');
	add_theme_support('woocommerce');
	add_theme_support('menus'); //Add menu support
	add_theme_support('automatic-feed-links'); //Enables post and comment RSS feed links to head.
	add_theme_support('widgets'); //Add widgets and sidebar support
	add_theme_support( "title-tag" );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
	/** Register wp_nav_menus */
	if(function_exists('register_nav_menu'))
	{
		register_nav_menus(
			array(
				/** Register Main Menu location header */
				'main_menu' => esc_html__('Main Menu', 'ecomanic'),
			)
		);
	}
	if ( ! isset( $content_width ) ) $content_width = 960;
	add_image_size( 'ecomanic_380x300', 380, 300, true ); // 'ecomanic_380x300 Gallery'
	add_image_size( 'ecomanic_371x226', 371, 226, true ); // 'ecomanic_371x226 Blog'
	add_image_size( 'ecomanic_80x65', 80, 65, true ); // 'ecomanic_80x65 gallery Widget'
	add_image_size( 'ecomanic_270x260', 270, 260, true ); // 'ecomanic_270x260 Team'
	add_image_size( 'ecomanic_1200x313', 1200, 313, true ); // 'ecomanic_1200x313 Blog Pages'
	add_image_size( 'ecomanic_190x120', 190, 120, true ); // 'ecomanic_190x120 product carousel'
	
}
function ecomanic_bunch_widget_init()
{
	global $wp_registered_sidebars;
	$theme_options = _WSH()->option();
	if( class_exists( 'Bunch_About_us' ) )register_widget( 'Bunch_About_us' );
	if( class_exists( 'Bunch_gallery' ) )register_widget( 'Bunch_gallery' );
	if( class_exists( 'Bunch_Recent_Post' ) )register_widget( 'Bunch_Recent_Post' );
	
	
	
	register_sidebar(array(
	  'name' => esc_html__( 'Default Sidebar', 'ecomanic' ),
	  'id' => 'default-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'ecomanic' ),
	  'before_widget'=>'<div id="%1$s" class="widget sidebar-widget %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<div class="sidebar-title"><h3>',
	  'after_title' => '</h3></div>'
	));
	register_sidebar(array(
	  'name' => esc_html__( 'Footer Sidebar', 'ecomanic' ),
	  'id' => 'footer-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown in Footer Area.', 'ecomanic' ),
	  'before_widget'=>'<div id="%1$s"  class="col-md-4 col-sm-6 col-xs-12 column footer-widget %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<h2>',
	  'after_title' => '</h2>'
	));
	
	register_sidebar(array(
	  'name' => esc_html__( 'Blog Listing', 'ecomanic' ),
	  'id' => 'blog-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'ecomanic' ),
	  'before_widget'=>'<div id="%1$s" class="widget sidebar-widget %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<div class="sidebar-title"><h3>',
	  'after_title' => '</h3></div>'
	));
	if( !is_object( _WSH() )  )  return;
	$sidebars = ecomanic_set(ecomanic_set( $theme_options, 'dynamic_sidebar' ) , 'dynamic_sidebar' ); 
	foreach( array_filter((array)$sidebars) as $sidebar)
	{
		if(ecomanic_set($sidebar , 'topcopy')) continue ;
		
		$name = ecomanic_set( $sidebar, 'sidebar_name' );
		
		if( ! $name ) continue;
		$slug = ecomanic_bunch_slug( $name ) ;
		
		register_sidebar( array(
			'name' => $name,
			'id' =>  $slug ,
			'before_widget' => '<div id="%1$s" class="side-bar widget sidebar_widget %2$s">',
			'after_widget' => "</div>",
			'before_title' => '<div class="sec-title"><h3 class="skew-lines">',
			'after_title' => '</h3></div>',
		) );		
	}
	
	update_option('wp_registered_sidebars' , $wp_registered_sidebars) ;
}
add_action( 'widgets_init', 'ecomanic_bunch_widget_init' );
add_filter( 'woocommerce_enqueue_styles', '__return_false' );
function ecomanic_bunch_animate_it( $atts, $contents = null )
{
	return get_template_part( 'includes/modules/shortcodes/animate_it' );
}
function ecomanic_load_head_scripts() {
	$options = _WSH()->option();
    if ( !is_admin() ) {
	$protocol = is_ssl() ? 'https://' : 'http://';
	$map_path = '?key='.ecomanic_set($options, 'map_api_key');	
	wp_enqueue_script( 'map_api', ''.$protocol.'maps.google.com/maps/api/js'.$map_path, array(), false, false );
	wp_enqueue_script( 'date_api', get_template_directory_uri().'/js/jquery-ui.js', array(), false, false );
	wp_enqueue_script( 'googlemap', get_template_directory_uri().'/js/googlemaps.js', array(), false, false );
	wp_enqueue_script( 'html5shiv', get_template_directory_uri().'/js/html5shiv.js', array(), false, false );
	wp_enqueue_script( 'respond-min', get_template_directory_uri().'/js/respond.min.js', array(), false, false );
	}
    }
    add_action( 'wp_enqueue_scripts', 'ecomanic_load_head_scripts' );
//global variables
function bunch_global_variable() {
    global $wp_query;
}
//global variables
function bunch_global_version_variable() {
    global $wp_version;
}

function ecomanic_enqueue_scripts() {
    //styles
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'jquery-ui-css', get_template_directory_uri() . '/css/jquery-ui.css' );
	wp_enqueue_style( 'fontawesom', get_template_directory_uri() . '/css/font-awesome.css' );
	wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/css/flaticon.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css' );
	wp_enqueue_style( 'owl-theme', get_template_directory_uri() . '/css/owl.css' );
	wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/css/jquery.fancybox.css' );
	wp_enqueue_style( 'hover', get_template_directory_uri() . '/css/hover.css' );
	wp_enqueue_style( 'ecomanic_main-style', get_stylesheet_uri() );
	wp_enqueue_style( 'ecomanic_responsive', get_template_directory_uri() . '/css/responsive.css' );
	if(class_exists('woocommerce')) wp_enqueue_style( 'ecomanic_woocommerce', get_template_directory_uri() . '/css/woocommerce.css' );
	wp_enqueue_style( 'ecomanic_custom-style', get_template_directory_uri() . '/css/custom.css' );
	
	
    //scripts
	wp_enqueue_script( 'jquery-ui', get_template_directory_uri().'/js/jquery-ui.js', array(), false, true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array(), false, true );
	wp_enqueue_script( 'owl', get_template_directory_uri().'/js/owl.js', array(), false, true );
	wp_enqueue_script( 'fancybox', get_template_directory_uri().'/js/jquery.fancybox.pack.js', array(), false, true );
	wp_enqueue_script( 'wow', get_template_directory_uri().'/js/wow.js', array(), false, true );
	wp_enqueue_script( 'mixitup', get_template_directory_uri().'/js/jquery.mixitup.js', array(), false, true );
	wp_enqueue_script( 'gmap', get_template_directory_uri().'/js/googlemaps.js', array(), false, true );
	wp_enqueue_script( 'ecomanic_main_script', get_template_directory_uri().'/js/script.js', array(), false, true );
	if( is_singular() ) wp_enqueue_script('comment-reply');
	
}
add_action( 'wp_enqueue_scripts', 'ecomanic_enqueue_scripts' );

/*-------------------------------------------------------------*/
function ecomanic_theme_slug_fonts_url() {
    $fonts_url = '';
 
    /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
    $playfair = _x( 'on', 'Playfair font: on or off', 'ecomanic' );
	$montserrat = _x( 'on', 'Montserrat font: on or off', 'ecomanic' );
	$raleway = _x( 'on', 'Raleway font: on or off', 'ecomanic' );
	
    /* Translators: If there are characters in your language that are not
    * supported by Open Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $open_sans = _x( 'on', 'Open Sans font: on or off', 'ecomanic' );
 
    if ( 'off' !== $playfair || 'off' !== $open_sans || 'off' !== $montserrat || 'off' !== $raleway ) {
        $font_families = array();
 
        if ( 'off' !== $playfair ) {
            $font_families[] = 'Playfair Display:400,400italic,700,700italic';
        }
		
		if ( 'off' !== $montserrat ) {
            $font_families[] = 'Montserrat:400,700';
        }
		
		if ( 'off' !== $open_sans ) {
            $font_families[] = 'Open Sans:400,300,300italic,400italic,600,600italic,700,700italic';
        }
		
		if ( 'off' !== $raleway ) {
            $font_families[] = 'Raleway:400,500,600,700,800';
        }
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }
 
    return esc_url_raw( $fonts_url );
}
function ecomanic_theme_slug_scripts_styles() {
    wp_enqueue_style( 'ecomanic-theme-slug-fonts', ecomanic_theme_slug_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'ecomanic_theme_slug_scripts_styles' );
/*---------------------------------------------------------------------*/
function ecomanic_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'ecomanic_add_editor_styles' );
/**
 * WooCommerce Extra Feature
 * --------------------------
 *
 * Change number of related products on product page
 * Set your own value for 'posts_per_page'
 *
 */ 
function woo_related_products_limit() {
  global $product;
	
	$args['posts_per_page'] = 6;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
  function jk_related_products_args( $args ) {
	$args['posts_per_page'] = 3; // 4 related products
	$args['columns'] = 3; // arranged in 2 columns
	return $args;
}