<?php
/**
 * slider customizer options for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package bizzoy
 */

    /** Blog Section Settings Start **/

    $wp_customize->add_section('bizzoy_blog_info', 
        array(
            'title'       => esc_html__('Home Blog Section', 'bizzoy'),
            'description' => '',
            'panel'       => 'frontpage',
            'priority'    => 160
        )
     );
    
    $wp_customize->add_setting('bizzoy_blog_section_hideshow',
        array(
            'default'           => 'show',
            'sanitize_callback' => 'bizzoy_sanitize_select',
        )
    );

    $bizzoy_blog_section_hide_show_option = bizzoy_section_choice_option();

    $wp_customize->add_control('bizzoy_blog_section_hideshow',
        array(
            'type'        => 'radio',
            'label'       => esc_html__('Blog Option', 'bizzoy'),
            'description' => esc_html__('Show/hide option for Blog Section.', 'bizzoy'),
            'section'     => 'bizzoy_blog_info',
            'choices'     => $bizzoy_blog_section_hide_show_option,
            'priority'    => 1
        )
    );
    
    $wp_customize->add_setting('bizzoy_blog_title', 
         array(
            'default'            => '',
            'type'               => 'theme_mod',
            'sanitize_callback'  => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control('bizzoy_blog_title', 
        array(
            'label'    => esc_html__('Blog Title', 'bizzoy'),
            'section'  => 'bizzoy_blog_info',
            'priority' => 1
        )
    );
    