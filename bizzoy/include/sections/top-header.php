<?php
/**
 * slider customizer options for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package bizzoy
 */


    $wp_customize->add_section('bizzoy_header_info', 
        array(
            'title'       => esc_html__('Header Section', 'bizzoy'),
            'description' => '',
            'panel'       => 'frontpage',
            'priority'    => 100
        )
    );
  
    $wp_customize->add_setting(
    'bizzoy_header_section_hideshow',
    array(
        'default'           => 'hide',
        'sanitize_callback' => 'bizzoy_sanitize_select',
    )
    );

    $bizzoy_header_section_hide_show_option = bizzoy_section_choice_option();

    $wp_customize->add_control('bizzoy_header_section_hideshow',
        array(
            'type'        => 'radio',
            'label'       => esc_html__('Header Option', 'bizzoy'),
            'description' => esc_html__('Show/hide option for Header Section.', 'bizzoy'),
            'section'     => 'bizzoy_header_info',
            'choices'     => $bizzoy_header_section_hide_show_option,
            'priority'    => 1
        )
    );
  
  
   
  
  
    $wp_customize->add_setting('bizzoy_ctah_btn_url', 
        array(
            'default'           => '',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw'
        )
    );


    $wp_customize->add_control('bizzoy_ctah_btn_url', 
        array(
            'label'    => esc_html__('Quote URL', 'bizzoy'),
            'section'  => 'bizzoy_header_info',
            'priority' => 3
        )
    );

    $wp_customize->add_setting('bizzoy_ctah_btn_text',
         array(
            'default'           => '',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control('bizzoy_ctah_btn_text',
        array(
            'label'    => esc_html__('quote Text', 'bizzoy'),
            'section'  => 'bizzoy_header_info',
            'priority' => 4
        )
    );  