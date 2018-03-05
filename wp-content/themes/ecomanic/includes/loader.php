<?php

if( !class_exists( 'Bunch_Base' ) ) include_once get_template_directory() . '/includes/base.php';
add_action( 'init', 'ecomanic_bunch_theme_init');


if( !function_exists( 'ecomanic_set' ) ) {
	function ecomanic_set( $var, $key, $def = '' )
	{
		if( !$var ) return false;
	
		if( is_object( $var ) && isset( $var->$key ) ) return $var->$key;
		elseif( is_array( $var ) && isset( $var[$key] ) ) return $var[$key];
		elseif( $def ) return $def;
		else return false;
	}
}


if( !function_exists('ecomanic_printr' ) ) {
	function ecomanic_printr($data)
	{
		echo '<pre>'; print_r($data);exit;
	}
}

if( !function_exists('ecomanic__font_awesome' ) ) {
	function ecomanic_font_awesome( $index )
	{
		$array = array_values($GLOBALS['_font_awesome']);
		if( $font = ecomanic_set($array, $index )) return $font;
		else return false;
	}
}

if( !function_exists('ecomanic_load_class' ) ) {
	function ecomanic_load_class($class, $directory = 'libraries', $global = true, $prefix = 'Bunch_')
	{
		$obj = &$GLOBALS['_bunch_base'];
		$obj = is_object( $obj ) ? $obj : new stdClass;
	
		$name = FALSE;
	
		// Is the request a class extension?  If so we load it too
		$path = get_template_directory() . '/includes/'.$directory.'/'.$class.'.php';
		if( file_exists($path) )
		{
			$name = $prefix.ucwords( $class );
	
			if (class_exists($name) === FALSE)	require_once($path);
		}
	
		// Did we find the class?
		if ($name === FALSE) exit('Unable to locate the specified class in theme: '.$class.'.php');
	
		if( $global ) $GLOBALS['_bunch_base']->$class = new $name();
		else new $name();
	}
}


include_once get_template_directory() . '/includes/library/form_helper.php';
include_once get_template_directory() . '/includes/library/functions.php';
include_once get_template_directory() . '/includes/library/widgets.php';

//ecomanic_load_class( 'post_types', 'helpers', false );
//ecomanic_load_class( 'taxonomies', 'helpers', false );
//ecomanic_load_class( 'ajax', 'helpers', false );
//ecomanic_load_class( 'forms', 'helpers', false );
ecomanic_load_class( 'enqueue', 'helpers', false );
//ecomanic_load_class( 'validation', 'helpers', true );
ecomanic_load_class( 'seo', 'helpers', false );
//ecomanic_load_class( 'update_theme', 'update', false );

//ecomanic_load_class( 'shortcodes', 'helpers', true );
ecomanic_load_class( 'bootstrap_walker', 'helpers', false );
//ecomanic_load_class( 'mega_menu', 'helpers', false );


if( ecomanic_set( $_GET, 'bunch_shortcode_editor_action' ) ) {
	include_once get_template_directory() . '/ resource/shortcode_output.php';exit;
}

/**
 * Include Vafpress Framework
 */
	

if( is_admin() )
/** Plugin Activation */
get_template_part( 'includes/thirdparty/tgm-plugin-activation/plugins' );

function ecomanic_bunch_theme_init()
{
	
	global $pagenow;
	
	return;
	
	/**
	 * Include Custom Data Sources
	 */
	//require_once 'vafpress/admin/data_sources.php';
	
	/**
	 * Load options, metaboxes, and shortcode generator array templates.
	 */
	// metaboxes
	$tmpl_mb1  = include ECOMANIC_ROOT.'includes/vafpress/admin/metabox/meta_boxes.php';
	// * Create instances of Metaboxes
	foreach( $tmpl_mb1 as $tmb )  new VP_Metabox($tmb);
	
	$tmpl_mb1  = include ECOMANIC_ROOT.'includes/vafpress/admin/taxonomy/taxonomy.php';
	include_once get_template_directory() .  '/vp_new/taxonomy.php' ;
	foreach( $tmpl_mb1 as $tmb )  new Bunch_Metabox($tmb);
	
	
	// shortocode generators
	$tmpl_sg1  = ECOMANIC_ROOT.'includes/vafpress/admin/shortcode_generator/shortcodes1.php';
	$tmpl_sg2  = ECOMANIC_ROOT.'includes/vafpress/admin/shortcode_generator/shortcodes2.php';

	if( is_admin() ) {
		
		include_once get_template_directory() . '/helpers/backup_class.php';
		$backup = new Bunch_Backup_class;
		
		if( ecomanic_set( $_GET, 'page' ) == 'ecomanic'.'_option' ) 
		{
			if( ecomanic_set( $_GET, 'bunch_dummydata_export' ) ){
				
				$backup->export();
			}
			
			/*if( ecomanic_set( $_GET, 'bunch_dummydata_import' ) ){ 
				include_once get_template_directory() . '/helpers/backup_class.php';
				$backup = new Bunch_Backup_class;
				$backup->import();
			}*/
			
		}
	}	
	
	if( function_exists( 'ecomanic_vc_map' )) 
	include_once get_template_directory() .  '/vc_map.php' ;
	
	// options
	$tmpl_opt  = ECOMANIC_ROOT.'includes/vafpress/admin/option/option.php';
	
	
	/**
	 * Create instance of Options
	 */
	$theme_options = new VP_Option(array(
		'is_dev_mode'           => false,                                  // dev mode, default to false
		'option_key'            => 'ecomanic'.'_theme_options',                      // options key in db, required
		'page_slug'             => 'ecomanic'.'_option',                      // options page slug, required
		'template'              => $tmpl_opt,                              // template file path or array, required
		'menu_page'             => 'themes.php',                           // parent menu slug or supply `array` (can contains 'icon_url' & 'position') for top level menu
		'use_auto_group_naming' => true,                                   // default to true
		'use_util_menu'         => true,                                   // default to true, shows utility menu
		'minimum_role'          => 'edit_theme_options',                   // default to 'edit_theme_options'
		'layout'                => 'fluid',                                // fluid or fixed, default to fixed
		'page_title'            => esc_html__( 'Theme Options', 'ecomanic' ), // page title
		'menu_label'            => esc_html__( 'Theme Options', 'ecomanic' ), // menu label
	));
	
		_WSH()->user_extra( array('facebook'=>esc_html__('Facebook', 'ecomanic'), 'twitter'=>esc_html__('Twitter', 'ecomanic'), 'dribbble'=>esc_html__('Dribble', 'ecomanic'), 'github'=>esc_html__('Github', 'ecomanic'),
	'flickr'=>esc_html__('Flickr', 'ecomanic'), 'google-plus'=>esc_html__('Google+', 'ecomanic'), 'youtube'=>esc_html__('Youtube', 'ecomanic')) );
	
	$bunch_exlude_hooks = include_once get_template_directory() . '/resource/remove_action.php';

	foreach( $bunch_exlude_hooks as $k => $v )
	{
		foreach( $v as $value )
		remove_action( $k, $value[0], $value[1] );
	}

}