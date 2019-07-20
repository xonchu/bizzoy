<?php
/**
 * bizzoy Theme Customizer
 *
 * @package bizzoy
 */


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */


function bizzoy_customize_register( $wp_customize ) {
	
	// bizzoy theme choice options
    if (!function_exists('bizzoy_section_choice_option')) :
        function bizzoy_section_choice_option()
        {
            $bizzoy_section_choice_option = array(
                'show' => esc_html__('Show', 'bizzoy'),
                'hide' => esc_html__('Hide', 'bizzoy')
            );
            return apply_filters('bizzoy_section_choice_option', $bizzoy_section_choice_option);
        }
    endif;
    
    /**
     * Sanitizing the select callback example
     *
    */
    if ( !function_exists('bizzoy_sanitize_select') ) :
        function bizzoy_sanitize_select( $input, $setting ) {

            // Ensure input is a slug.
            $input = sanitize_text_field( $input );

            // Get list of choices from the control associated with the setting.
            $choices = $setting->manager->get_control( $setting->id )->choices;

                // If the input is a valid key, return it; otherwise, return the default.
            return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
        }
    endif;


    if ( !function_exists('bizzoy_column_layout_sanitize_select') ) :
        function bizzoy_column_layout_sanitize_select( $input, $setting ) {

            // Ensure input is a slug.
            $input = sanitize_text_field( $input );

            // Get list of choices from the control associated with the setting.
            $choices = $setting->manager->get_control( $setting->id )->choices;

            // If the input is a valid key, return it; otherwise, return the default.
            return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
        }
    endif;
    
    /**
     * Drop-down Pages sanitization callback example.
     *
     * - Sanitization: dropdown-pages
     * - Control: dropdown-pages
     * 
     * Sanitization callback for 'dropdown-pages' type controls. This callback sanitizes `$page_id`
     * as an absolute integer, and then validates that $input is the ID of a published page.
     * 
     * @see absint() https://developer.wordpress.org/reference/functions/absint/
     * @see get_post_status() https://developer.wordpress.org/reference/functions/get_post_status/
     *
     * @param int                  $page    Page ID.
     * @param WP_Customize_Setting $setting Setting instance.
     * @return int|string Page ID if the page is published; otherwise, the setting default.
     */

    function bizzoy_sanitize_dropdown_pages( $page_id, $setting ) {
        // Ensure $input is an absolute integer.
        $page_id = absint( $page_id );
    
        // If $page_id is an ID of a published page, return it; otherwise, return the default.
        return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
    }


	
    /** Front Page Section Settings starts **/	

    $wp_customize->add_panel('frontpage', 
        array(
            'title'       => esc_html__('Bizzoy Theme Options', 'bizzoy'),        
		    'description' => '',                                        
		     'priority'   => 3,
        )
    );
	
require get_template_directory(). '/include/sections/top-header.php';

require get_template_directory(). '/include/sections/slider.php';

require get_template_directory(). '/include/sections/services.php';

require get_template_directory(). '/include/sections/blog.php';

require get_template_directory(). '/include/sections/callout.php';
 
require get_template_directory(). '/include/sections/footer.php';

    $wp_customize->add_section('bizzoy_preloader', 
        array(
            'title'       => esc_html__('Preloader section', 'bizzoy'),
            'description' => '',
            'panel'       => '',
             'priority'   => 50
        )
    );

 $wp_customize->add_setting('bizzoy_preloader_section_hideshow',
        array(
            'default'           => 'show',
            'sanitize_callback' => 'bizzoy_sanitize_select',
        )
    );

    $bizzoy_preloader_section_hideshow = bizzoy_section_choice_option();

    $wp_customize->add_control('bizzoy_preloader_section_hideshow',
        array(
            'type'        => 'radio',
            'label'       => esc_html__('Enable/disable Preloader Option', 'bizzoy'),
            'description' => esc_html__('Show/hide option for Blog Section.', 'bizzoy'),
            'section'     => 'bizzoy_preloader',
            'choices'     => $bizzoy_preloader_section_hideshow,
            'priority'    => 5
        )
    );


        $wp_customize->add_setting('bizzoy_color_scheme',array(
        'default' => esc_html__('#ff5722','bizzoy'),
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    
    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,'bizzoy_color_scheme',array(
            'label' => esc_html__('Color Scheme','bizzoy'),           
            'description' => esc_html__('Change Theme Color','bizzoy'),
            'section' => 'colors',
            'settings' => 'bizzoy_color_scheme'
        ))
    );  
    


}
add_action( 'customize_register', 'bizzoy_customize_register' );


function bizzoy_custom_css(){ 
?>
    <style type="text/css">                     
        
        .icon-boxes-type-2 .icon-box-wrapper h5>a,
        .blog-more-btn:hover, .blog-by-img:hover,
        .recent-posts .blog-card-wrapper .card-content .card-blog-body h5 a:hover,
        .navbar-fill .navbar-inner .navbar-menu .navbar-search .search-icon,
        .navbar-fill .navbar-inner .navbar-menu .navbar-additional .qoute-btn a,
        .footer-area .widget_archive li a:hover,
        .footer-area .widget_categories li a:hover,
        .footer-area .widget_meta li a:hover,
        .footer-area .widget_recent_comments a:hover,
        .footer-widget .menu li a:hover,
        .footer-area .widget_pages li a:hover,
        .swiper-button-prev-default:hover i, .swiper-button-next-default:hover i,
        .navbar-fill .navbar-inner .navbar-menu .navbar-menu-list li a:hover,
        .sidebar a:hover,
        .recent-posts .blog-card-wrapper .card-content .card-blog-body .card-blog-footer i,
        .navbar .navbar-inner .navbar-menu .navbar-menu-list .sub-menu li a:hover, .navbar .navbar-inner .navbar-menu .navbar-menu-list .megamenu li a:hover,
            .page-header .breadcrumbs-wrapper .breadcrumbs .breadcrumbs-list .active a,
             .comment-respond .form-submit input:hover,
             #today a,
             #prev a,
             .logged-in-as a
            { color:<?php echo esc_html( get_theme_mod('bizzoy_color_scheme','#c1331b')); ?>;}                     
            
        
           .button-default-color,
           #looking-consultant,
           .widget_calendar th,
           .swiper-pagination-bullets-default .swiper-pagination-bullet-active,
           .widget_tag_cloud .tagcloud a:hover,
           .footer-area .widget_categories li:before,
           form#searchform input[type="submit"],
           .widget_categories li:before,
           .nav-links .current,
            .comment-respond .form-submit input
            { background-color:<?php echo esc_html( get_theme_mod('bizzoy_color_scheme','#c1331b')); ?>;}
            
         .comment-respond .form-submit input,
        form#searchform input[type="submit"],
        blockquote          
            { border-color:<?php echo esc_html( get_theme_mod('bizzoy_color_scheme','#c1331b')); ?>;} 
            

            
            
    </style> 
<?php                   
}
         
add_action('wp_head','bizzoy_custom_css');