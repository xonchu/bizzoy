<?php
/**
 * slider customizer options for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package bizzoy
 */


 /** Slider Section Settings Start **/

    // Panel - Slider Section 1
    $wp_customize->add_section('bizzoy_sliderinfo', 
        array(
            'title'       => esc_html__('Home Slider Section', 'bizzoy'),
            'description' => '',
            'panel'       => 'frontpage',
             'priority'   => 130
        )
    );

    // hide show
    
    $wp_customize->add_setting('bizzoy_slider_section_hideshow',
        array(
            'default'           => 'hide',
            'sanitize_callback' => 'bizzoy_sanitize_select',
        )
    );

    $bizzoy_slider_section_hide_show_option = bizzoy_section_choice_option();

    $wp_customize->add_control('bizzoy_slider_section_hideshow',
        array(
            'type'        => 'radio',
            'label'       => esc_html__('Slider Option', 'bizzoy'),
            'description' => esc_html__('Show/hide option for Slider Section.', 'bizzoy'),
            'section'     => 'bizzoy_sliderinfo',
            'choices'     => $bizzoy_slider_section_hide_show_option,
            'priority'    => 1
        )
    );
  
    $slider_no = 3;
        for( $i = 1; $i <= $slider_no; $i++ ) {
            $bizzoy_slider_page   = 'bizzoy_slider_page_' .$i;
            $bizzoy_slider_btntxt = 'bizzoy_slider_btntxt_' . $i;
            $bizzoy_slider_btnurl = 'bizzoy_slider_btnurl_' .$i;
            $bizzoy_slider_btntxt2 = 'bizzoy_slider_btntxt2_' . $i;
            $bizzoy_slider_btnurl2 = 'bizzoy_slider_btnurl2_' .$i;


    $wp_customize->add_setting( $bizzoy_slider_page,
        array(
            'default'           => 1,
            'sanitize_callback' => 'bizzoy_sanitize_dropdown_pages',
        )
    );

    $wp_customize->add_control( $bizzoy_slider_page,
        array(
            'label'     => esc_html__( 'Slider Page ', 'bizzoy' ) .$i,
            'section'   => 'bizzoy_sliderinfo',
            'type'      => 'dropdown-pages',
            'priority'  => 100,
        )
    );


    $wp_customize->add_setting( $bizzoy_slider_btntxt,
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control( $bizzoy_slider_btntxt,
        array(
            'label'        => esc_html__( 'Button - Text','bizzoy' ),
            'section'      => 'bizzoy_sliderinfo',
            'type'         => 'text',
            'priority'     => 100,
        )
    );
        
    $wp_customize->add_setting( $bizzoy_slider_btnurl,
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control( $bizzoy_slider_btnurl,
        array(
            'label'       => esc_html__( 'Button - URL', 'bizzoy' ),
            'section'     => 'bizzoy_sliderinfo',
            'type'        => 'text',
            'priority'    => 100,
        )
    );


$wp_customize->add_setting( $bizzoy_slider_btntxt2,
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control( $bizzoy_slider_btntxt2,
        array(
            'label'        => esc_html__( 'Button - Text2','bizzoy' ),
            'section'      => 'bizzoy_sliderinfo',
            'type'         => 'text',
            'priority'     => 100,
        )
    );
        
    $wp_customize->add_setting( $bizzoy_slider_btnurl2,
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control( $bizzoy_slider_btnurl2,
        array(
            'label'       => esc_html__( 'Button - URL2', 'bizzoy' ),
            'section'     => 'bizzoy_sliderinfo',
            'type'        => 'text',
            'priority'    => 100,
        )
    );

                
    }	