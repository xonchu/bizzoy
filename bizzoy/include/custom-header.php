<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
 * <?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Canyon Themes
 * @subpackage Canyon
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses bizzoy_header_style()
 */
if (!function_exists('bizzoy_custom_header_setup')) :
    function bizzoy_custom_header_setup()
    {
        add_theme_support('custom-header', apply_filters('bizzoy_custom_header_args', array(
            'default-image'      => '',
            'default-text-color' => '#ff5722',
            'width'              => 1000,
            'height'             => 250,
            'flex-height'        => true,
            'wp-head-callback'   => 'bizzoy_header_style',
        )));
    }

    add_action( 'after_setup_theme', 'bizzoy_custom_header_setup' );

endif;

if ( !function_exists('bizzoy_header_style') ) :
    /**
     * Styles the header image and text displayed on the blog.
     *
     * @see bizzoy_custom_header_setup().
     */
    function bizzoy_header_style()
    {
        $header_text_color = get_header_textcolor();

       
        // If we get this far, we have custom styles. Let's do this.
        ?>
        <style type="text/css">
            <?php
                // Has the text been hidden?
                if (  display_header_text() ) :
            ?>
            .page-header
           {
            background-image:url('<?php header_image(); ?>');

           }
           
            .blogtitle,
            .site-description {
                color: #<?php echo esc_attr( $header_text_color ); ?>;
            }

            <?php endif; ?>
        </style>
        <?php
    }
endif;