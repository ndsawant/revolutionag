<?php

add_action( 'widgets_init', 'add_ecomanic_widgets' );
function add_ecomanic_widgets() {
    
    register_sidebar( array(
    'name' => 'Copyright',
    'id' => 'copyright',
    'description' => 'Appears in the bottom area',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
    ) );
}

function wpdocs_theme_name_scripts() {
    wp_enqueue_style( 'animations', get_stylesheet_directory_uri() . '/css/animations.css' );
    wp_enqueue_style( 'animations-ie', get_stylesheet_directory_uri() . '/css/animations-ie-fix.css' );
    wp_enqueue_style( 'videopopup', get_stylesheet_directory_uri() . '/css/videopopup.css' );
   // wp_enqueue_style( 'isotope-css', get_stylesheet_directory_uri() . '/css/isotope-docs.css' );
    //wp_enqueue_style( 'fancybox-css', get_stylesheet_directory_uri() . '/css/jquery.fancybox.min.css' );
    

    wp_enqueue_script( 'jquery', get_stylesheet_directory_uri() . '/js/jquery.min.js', '1.11.1', array(), true );
    wp_enqueue_script( 'animate-it', get_stylesheet_directory_uri() . '/js/css3-animate-it.js', array(), true );
    wp_enqueue_script( 'image-maps', get_stylesheet_directory_uri() . '/js/jquery.rwdImageMaps.min.js', array(), true );
    wp_enqueue_script( 'video-popup', get_stylesheet_directory_uri() . '/js/videopopup.js', array(), true );
    // wp_enqueue_script( 'isotope-docs-js', get_stylesheet_directory_uri() . '/js/isotope-docs.min.js', array(), true );
    // wp_enqueue_script( 'fancybox-js', get_stylesheet_directory_uri() . '/js/jquery.fancybox.min.js', array(), true );

}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

function ra_change_translate_text( $translated_text ) {
    if ( $translated_text == 'All Projects' ) {
        $translated_text = 'General Gallery';
    }
    return $translated_text;
}
add_filter( 'gettext', 'ra_change_translate_text', 20 );

add_action( 'after_setup_theme', 'ecomanic_setup' );

function ecomanic_setup() {
//add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
//add_theme_support( 'wc-product-gallery-slider' );
}



/*-------------------------------------------------------------------------------
    Custom Columns
-------------------------------------------------------------------------------*/

function my_page_columns($columns)
{
    $columns = array(
        'title'     => 'Title',
        'pageheading' =>  'Page Heading',
        'author'    =>  'Author',
        'date'      =>  'Date',
    );
    return $columns;
}

function my_custom_columns($column)
{
    global $post;
    if($column == 'pageheading')
    {
        echo get_field('page_title', $post->ID);
    }
    else {
         echo '';
    }
}

add_action("manage_pages_custom_column", "my_custom_columns");
add_filter("manage_edit-page_columns", "my_page_columns");

add_action('admin_head', 'my_column_width');

function my_column_width() {
    echo '<style type="text/css">';
    echo '#post-12 .pageheading.column-pageheading { width:200px !important;}';
    echo '</style>';
}