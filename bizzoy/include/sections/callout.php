<?php
/**
 * slider customizer options for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package bizzoy
 */

  

   
    /** Blog Section Settings End **/

/**callout**/

$wp_customize->add_section(
        'bizzoy_footer_contact', 
        array(
            'title'   => esc_html__('Home Callout Section', 'bizzoy'),
            'description' => '',
            'panel' => 'frontpage',
            'priority'    => 170
        )
    );
    
    $wp_customize->add_setting(
        'bizzoy_contact_section_hideshow',
        array(
            'default' => 'hide',
            'sanitize_callback' => 'bizzoy_sanitize_select',
        )
    );

    $bizzoy_section_choice_option = bizzoy_section_choice_option();
    $wp_customize->add_control(
        'bizzoy_contact_section_hideshow',
        array(
            'type' => 'radio',
            'label' => esc_html__('Home Callout', 'bizzoy'),
            'description' => esc_html__('Show/hide option for Footer Callout Section.', 'bizzoy'),
            'section' => 'bizzoy_footer_contact',
            'choices' => $bizzoy_section_choice_option,
            'priority' => 5
        )
    );

    $wp_customize->add_setting(
        'bizzoy_ctah_heading', 
        array(
            'default'   => '',
            'type'      => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'bizzoy_ctah_heading', 
        array(
            'label'   => esc_html__('Callout Text', 'bizzoy'),
            'section' => 'bizzoy_footer_contact',
            'priority'  => 8
        )
    );

 
    $wp_customize->add_setting(
        'bizzoy_ctah_btn_url1', 
        array(
            'default'   =>'',
            'type'      => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control(
        'bizzoy_ctah_btn_url1', 
        array(
            'label'   => esc_html__('Button URL', 'bizzoy'),
            'section' => 'bizzoy_footer_contact',
            'priority'  => 10
        )
    );

    $wp_customize->add_setting(
        'bizzoy_ctah_btn_text1', 
        array(
            'default'   => '',
            'type'      => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'bizzoy_ctah_btn_text1', 
        array(
            'label'   => esc_html__('Button Text', 'bizzoy'),
            'section' => 'bizzoy_footer_contact',
            'priority'  => 12
        )
    );