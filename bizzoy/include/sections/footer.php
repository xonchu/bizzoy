<?php
/**
 * slider customizer options for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package bizzoy
 */

    /** Footer Section Settings Start **/

     $wp_customize->add_section('bizzoy_footer',
        array(
            'title'       => esc_html__('Footer Section', 'bizzoy'),
            'description' => '',
            'panel' => 'frontpage',
            'priority'    => 180
        )
    );
    $wp_customize->add_setting('bizzoy_footer_section_hideshow',
        array(
            'default'           => 'show',
            'sanitize_callback' => 'bizzoy_sanitize_select',
        )
    );
    $bizzoy_footer_section_hide_show_option = bizzoy_section_choice_option();
    $wp_customize->add_control('bizzoy_footer_section_hideshow',
        array(
            'type'        => 'radio',
            'label'       => esc_html__('Footer Option', 'bizzoy'),
            'description' => esc_html__('Show/hide option for Footer Section.', 'bizzoy'),
            'section'     => 'bizzoy_footer',
            'choices'     => $bizzoy_footer_section_hide_show_option,
            'priority'    => 1
        ) 
    );
    $wp_customize->add_setting('bizzoy_footer_text',
        array(
            'default'             => '',
            'type'                => 'theme_mod',
            'sanitize_callback'   => 'wp_kses_post'
        )
    );
    $wp_customize->add_control('bizzoy_footer_text',
        array(
            'label'    => esc_html__('Copyright', 'bizzoy'),
            'section'  => 'bizzoy_footer',
            'type'     => 'textarea',
            'priority' => 2
        )
    ); 
    $social_icon_no = 5;
    for( $i = 1; $i <= $social_icon_no; $i++ )
    {
        $bizzoy_social_icon_url = 'bizzoy_social_icon_url_' . $i;
        $wp_customize->add_setting( $bizzoy_social_icon_url, array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw'
        ));
        $wp_customize->add_control( $bizzoy_social_icon_url, 
            array(
                'label'             => esc_html__( 'Social icon ', 'bizzoy' ) .$i,
                'section'           => 'bizzoy_footer',
                'priority'          => 100
        ));
    }