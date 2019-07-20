<?php 

/**
* bizzoy functions and definitions
* @package bizzoy
*/

if( ! function_exists( 'bizzoy_theme_setup' ) )
{

function bizzoy_theme_setup() {
	
    load_theme_textdomain( 'bizzoy', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	// Add default title support
	add_theme_support( 'title-tag' ); 		

	// Add default logo support		
    add_theme_support( 'custom-logo' );	

    // To use additional css
	    add_editor_style( 'css/editor-style.css' );		

	
    
	add_theme_support('post-thumbnails');
	

	/**
	* Set the content width in pixels, based on the theme's design and stylesheet.
	*/
	$GLOBALS['content_width'] = apply_filters( 'bizzoy_content_width', 980 );
	
	// Add theme support for Semantic Markup
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption'
	) );
	 
	 add_theme_support( 'customize-selective-refresh-widgets' );
	 
	// add excerpt support for pages
	add_post_type_support( 'page', 'excerpt' );
	
	if ( is_singular() && comments_open() ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	// Menus
	//add_theme_support( 'menus' );

    register_nav_menus(array(
   'primary' => esc_html__('primary Menu', 'bizzoy')
   ));


   add_theme_support( 'custom-background', apply_filters( 'bizzoy_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );		

}
add_action( 'after_setup_theme', 'bizzoy_theme_setup' );
}


// Register Nav Walker class_alias
require get_template_directory() . '/include/customizer.php';

require get_template_directory(). '/include/custom-header.php';

require get_template_directory(). '/include/template-tags.php';

require get_template_directory(). '/include/template-functions.php';

require get_template_directory(). '/include/breadcrumbs.php';