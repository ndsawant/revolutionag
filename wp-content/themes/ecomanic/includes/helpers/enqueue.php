<?php
/**
 * Enqueu Class include functions which are necessary for enqueuing styles and scripts..
 *
 * @package   Enqueue-Package
 * @version   1.0
 * @link      http://themeforest.net/user/template_path
 * @author    Amir
 * @copyright Copyright (c) 2015, Amir
 * @license   GPL-2.0+
*/
class Bunch_Enqueue
{
	
	function __construct()
	{
		add_action( 'wp_enqueue_scripts', array( $this, 'bunch_enqueue_scripts' ) );
		add_action( 'wp_head', array( $this, 'wp_head' ) );
		add_action( 'wp_footer', array( $this, 'wp_footer' ) );
		
		// Apply filter
		add_filter('body_class', array( $this, 'custom_body_classes') );
		
		add_action( 'ecomanic_bunch_body_id', array( $this, 'body_id' ) );
		
	}
	function bunch_enqueue_scripts()
	{
		global $post, $wp_query;
		$options = _WSH()->option();
		$current_theme = wp_get_theme();
		$header_style = ecomanic_set( $options, 'header_style' );
		
 
		$version = $current_theme->get( 'Version' );
		
		$dark_color = ( ecomanic_set( $options, 'website_theme' ) == 'dark' ) ? true : false;
		
		$dark_color = ( ecomanic_set( $_GET, 'color_style' ) == 'dark' ) ? true : $dark_color;
		
		if(ecomanic_set($options, 'color_scheme') == 'color2') : $color = 'css/color2.css'; else: $color = 'css/color1.css'; endif;	
		
		$protocol = is_ssl() ? 'https' : 'http';
		$styles = array();
		
		$styles = $this->custom_fonts($styles); //Load google fonts that user choose from theme options
		
							
		foreach( $styles as $name => $style )
		{
			if( !$style ) continue;
			if(strstr($style, 'http') || strstr($style, 'https') ) wp_enqueue_style( $name, $style);
			else wp_enqueue_style( $name, _WSH()->includes( $style, true ), '', $version );
		}
		
		$scripts = array();
		
		if( is_single() ) {
			$format = get_post_format();
			if( $format == 'gallery' ) wp_enqueue_script( array( 'ecomanic_jquery-flexslider' ) );
			if( $format == 'video' || $format == 'audio' ) wp_enqueue_script( array( 'ecomanic_jquery-fitvids' ) );
		}
		if( is_singular( 'bunch_projects' ) || $wp_query->is_posts_page || is_search() || is_tag() || is_category() || is_author() || is_archive() ) 
  		wp_enqueue_script( array('ecomanic_jquery-flexslider', 'ecomanic_owl.carousel', 'ecomanic_jquery-fitvids') );
		wp_enqueue_script( array('ecomanic_custom_script') );
		
		
	}
	
	function wp_head()
	{
		$opt = _WSH()->option();
		$boxed = ecomanic_set( $opt, 'boxed_layout' );
		$boxed_style = ( $boxed && ecomanic_set( $opt, 'bg_boxed' ) ) ? ' body { background: url('.ecomanic_set( $opt, 'bg_boxed').') repeat center center; }' : '';
		
		if( is_page() ) {
			$meta = _WSH()->get_meta();//ecomanic_printr($meta);
			$boxed = (ecomanic_set( $meta, 'boxed' )) ? true : $boxed;
			$boxed_style = ( $boxed && ecomanic_set( $meta, 'bg_boxed' ) ) ? ' body { background: url('.ecomanic_set( $meta, 'bg_boxed').') repeat center center; }' : '';
		}
		
		echo '<script type="text/javascript"> if( ajaxurl === undefined ) var ajaxurl = "'.admin_url('admin-ajax.php').'";</script>';?>
		<style type="text/css">
			<?php
			if( ecomanic_set( $opt, 'body_custom_font') )
			echo balanceTags(ecomanic_bunch_get_font_settings( array( 'body_font_size' => 'font-size', 'body_font_family' => 'font-family', 'body_font_style' => 'font-style', 'body_font_color' => 'color', 'body_line_height' => 'line-height' ), 'body, p {', '}' ));
			
			if( ecomanic_set( $opt, 'use_custom_font' ) ){
				echo balanceTags(ecomanic_bunch_get_font_settings( array( 'h1_font_size' => 'font-size', 'h1_font_family' => 'font-family', 'h1_font_style' => 'font-style', 'h1_font_color' => 'color', 'h1_line_height' => 'line-height' ), 'h1 {', '}' ));
				echo balanceTags(ecomanic_bunch_get_font_settings( array( 'h2_font_size' => 'font-size', 'h2_font_family' => 'font-family', 'h2_font_style' => 'font-style', 'h2_font_color' => 'color', 'h2_line_height' => 'line-height' ), 'h2 {', '}' ));
				echo balanceTags(ecomanic_bunch_get_font_settings( array( 'h3_font_size' => 'font-size', 'h3_font_family' => 'font-family', 'h3_font_style' => 'font-style', 'h3_font_color' => 'color', 'h3_line_height' => 'line-height' ), 'h3 {', '}' ));
				echo balanceTags(ecomanic_bunch_get_font_settings( array( 'h4_font_size' => 'font-size', 'h4_font_family' => 'font-family', 'h4_font_style' => 'font-style', 'h4_font_color' => 'color', 'h4_line_height' => 'line-height' ), 'h4 {', '}' ));
				echo balanceTags(ecomanic_bunch_get_font_settings( array( 'h5_font_size' => 'font-size', 'h5_font_family' => 'font-family', 'h5_font_style' => 'font-style', 'h5_font_color' => 'color', 'h5_line_height' => 'line-height' ), 'h5 {', '}' ));
				echo balanceTags(ecomanic_bunch_get_font_settings( array( 'h6_font_size' => 'font-size', 'h6_font_family' => 'font-family', 'h6_font_style' => 'font-style', 'h6_font_color' => 'color', 'h6_line_height' => 'line-height' ), 'h6 {', '}' ));
			}
			echo balanceTags($boxed_style);			
			echo balanceTags(ecomanic_set( $opt, 'header_css' ));
			?>
		</style>
        
        <?php if(function_exists('bunch_theme_color_scheme')) bunch_theme_color_scheme(); ?>
		
		<?php if( ecomanic_set( $opt, 'header_js' ) ): ?>
			<script type="text/javascript">
                <?php echo esc_js(ecomanic_set( $opt, 'header_js' ));?>
            </script>
        <?php endif;?>
        <?php
	}
	
	function wp_footer()
	{
		$analytics = ecomanic_set( _WSH()->option(), 'footer_analytics');
		
		echo balanceTags($analytics);
		
		$theme_options = _WSH()->option();
		
		if( ecomanic_set( $theme_options, 'footer_js' ) ): ?>
			<script type="text/javascript">
                <?php echo esc_js(ecomanic_set( $theme_options, 'footer_js' ));?>
            </script>
        <?php endif;
	}
	
	function custom_fonts( $styles )
	{
		$opt = _WSH()->option();
		$protocol = ( is_ssl() ) ? 'https' : 'http';
		$font = array();
		
		if( ecomanic_set( $opt, 'use_custom_font' ) ){
			
			if( $h1 = ecomanic_set( $opt, 'h1_font_family' ) ) $font[$h1] = urlencode( $h1 ).':400,300,600,700,800';
			if( $h2 = ecomanic_set( $opt, 'h2_font_family' ) ) $font[$h2] = urlencode( $h2 ).':400,300,600,700,800';
			if( $h3 = ecomanic_set( $opt, 'h3_font_family' ) ) $font[$h3] = urlencode( $h3 ).':400,300,600,700,800';
		}
		
		if( ecomanic_set( $opt, 'body_custom_font' ) ){
			if( $body = ecomanic_set( $opt, 'body_font_family' ) ) $font[$body] = urlencode( $body ).':400,300,600,700,800';
		}
		
		if( $font ) $styles['bunch_google_custom_font'] = $protocol.'://fonts.googleapis.com/css?family='.implode('|', $font);
		
		return $styles;
	}
	
	function custom_body_classes( $classes )
	{
		$options = _WSH()->option();
		
		$dark_color = ( ecomanic_set( $options, 'website_theme' ) == 'dark' ) ? true : false;
		
		$dark_color = ( ecomanic_set( $_GET, 'color_style' ) == 'dark' ) ? true : $dark_color;
		
		if( $dark_color ) $classes[] = 'dark-style';
	
		return $classes;
	}
	
	function body_id() 
	{
		$options = _WSH()->option();
		
		$boxed = ecomanic_set( $options, 'boxed_layout' );
		
		$boxed_layout = ( $boxed && !$nobg ) ? ' id="boxed" ' : ''; 
		
		echo balanceTags($boxed_layout);
	}
}