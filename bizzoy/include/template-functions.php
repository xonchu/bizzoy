<?php
    /**
     * Functions which enhance the theme by hooking into WordPress
     *
     * @package Bizzoy
     */

    
if ( ! function_exists( 'bizzoy_fonts_url' ) ) {
/**
 * Register Google fonts for bizzoy.
 * Create your own bizzoy_fonts_url() function to override in a child theme.
 * @return string Google fonts URL for the theme.
 */
function bizzoy_fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = 'latin,latin-ext';

    /* translators: If there are characters in your language that are not supported by Poppins, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== _x( 'on', 'Montserrat: on or off', 'bizzoy' ) ) {
        $fonts[] = 'Montserrat:300,400,500';
    }
    /* translators: If there are characters in your language that are not supported by Roboto, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== _x( 'on', 'Poppins: on or off', 'bizzoy' ) ) {
        $fonts[] = 'Poppins:400,500,600,700,800';
    }

    if ( $fonts ) {
        $fonts_url = add_query_arg( array(
            'family' => urlencode( implode( '|', $fonts ) ),
            'subset' => urlencode( $subsets ),
        ), 'https://fonts.googleapis.com/css' );
    }

    return $fonts_url;
}
}       
    /**
    * Enqueue CSS stylesheets
    */

    if( ! function_exists( 'bizzoy_enqueue_styles' ) ) {
    function bizzoy_enqueue_styles() {
        
    // Bootstrap CSS 
    wp_enqueue_style( 'bizzoy-fonts', bizzoy_fonts_url(), array(), null );


    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css');
    wp_enqueue_style('swiper', get_template_directory_uri() . '/assets/css/swiper.css');
    wp_enqueue_style( 'bizzoy-style', get_stylesheet_uri() );

    }
    add_action( 'wp_enqueue_scripts', 'bizzoy_enqueue_styles' );
    }

    /**
    * Enqueue JS scripts
    */

if( ! function_exists( 'bizzoy_enqueue_scripts' ) ) {
    function bizzoy_enqueue_scripts() {   
     wp_enqueue_script('jquery.hover3d', get_template_directory_uri() . '/assets/js/jquery.hover3d.js', array('jquery'), '', true);
     wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/js/swiper.js', array(), '', true); 
     wp_enqueue_script('bizzoy-main', get_template_directory_uri() . '/assets/js/main.js', array(), '', true);

    }
    add_action( 'wp_enqueue_scripts', 'bizzoy_enqueue_scripts' );   
    }


function bizzoy_sidebars() {

    // Blog Sidebar

    register_sidebar(array(
        'name' => esc_html__( 'Blog Sidebar', "bizzoy"),
        'id' => 'blog-sidebar',
        'description' => esc_html__( 'Sidebar on the blog layout.', "bizzoy"),
        'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-heading">',
        'after_title' => '</h2>',
    ));
        

    // Footer Sidebar

    register_sidebar(array(
        'name' => esc_html__( 'Footer Widget Area', "bizzoy"),
        'id' => 'bizzoy-footer-widget-area',
        'description' => esc_html__( 'The footer widget area', "bizzoy"),
        'before_widget' => '<div class="%2$s footer-widget col-md-4 col-sm-6 col-xs-12">',
        'after_widget' => '</div>',
        'before_title' => ' <h4 class="widget_title">',
        'after_title' => '</h4>',
    )); 

}
add_action( 'widgets_init', 'bizzoy_sidebars' );


function bizzoy_archive_page_title(){
    if( is_archive() )
    {
        $archive_text = get_theme_mod('archive_prefix', __('Archive','bizzoy'));
        
        echo '<h3>';
        
        if ( is_day() ) :
        
          printf( esc_html__( '%1$s %2$s', 'bizzoy' ), esc_html($archive_text), esc_html(get_the_date()) );
          
        elseif ( is_month() ) :
        
          printf( esc_html__( '%1$s %2$s', 'bizzoy' ), esc_html($archive_text), esc_html(get_the_date( 'F Y' )) );
          
        elseif ( is_year() ) :
        
          printf( esc_html__( '%1$s %2$s', 'bizzoy' ), esc_html($archive_text), esc_html(get_the_date( 'Y' )) );
          
        elseif( is_category() ):
        
            $category_text = get_theme_mod('category_prefix',__('Category','bizzoy'));
            
            printf( esc_html__( '%1$s %2$s', 'bizzoy' ), esc_html($category_text), single_cat_title( '', false ) );
            
        elseif( is_author() ):
            
            $author_text = get_theme_mod('author_prefix',__('All posts by','bizzoy'));
        
            printf( esc_html__( '%1$s %2$s', 'bizzoy' ), esc_html($author_text), esc_html(get_the_author() ));
            
        elseif( is_tag() ):
            
            $tag_text = get_theme_mod('tag_prefix',__('Tag','bizzoy'));
            
            printf( esc_html__( '%1$s %2$s', 'bizzoy' ), esc_html($tag_text), single_tag_title( '', false ) );
            
        elseif( class_exists( 'WooCommerce' ) && is_shop() ):
            
        $shop_text = get_theme_mod('shop_prefix',__('Shop','bizzoy'));
            
        printf( esc_html__( '%1$s %2$s', 'bizzoy' ), esc_html($shop_text), single_tag_title( '', false ));
            
        elseif( is_archive() ): 
        the_archive_title( '<h1>', '</h1>' ); 
        
        endif;
        

        echo '</h3>';
    }
    elseif( is_search() )
    {
        $search_text = get_theme_mod('search_prefix',__('Search results for','bizzoy'));
        
        echo '<h3>';
        
        printf( esc_html__( '%1$s %2$s', 'bizzoy' ), esc_html($search_text), get_search_query() );
        
        echo '</h3>';
    }
    elseif( is_404() )
    {
        $breadcrumbs_text = get_theme_mod('404_prefix',__('404','bizzoy'));
        
        echo '<h3>';
        
        printf( esc_html( '%1$s ', 'bizzoy' ) , esc_html($breadcrumbs_text) );
        
        echo '</h3>';
    }
    else
    {
$allowed_html = array(
                    'br'     => array(),
                    'em'     => array(),
                    'strong' => array(),
                    'i'      => array(
                        'class' => array(),
                    ),
                    'span'   => array(),
                );  
        
        echo '<h3>'.wp_kses( force_balance_tags( get_the_title()), $allowed_html ).'</h3>';
    }
}