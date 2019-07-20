<?php
/**
 * slider customizer options for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package bizzoy
 */


/** Service Section Settings Start **/

    $wp_customize->add_section('bizzoy_services',              
        array(
            'title'       => esc_html__('Home Service Section', 'bizzoy'),          
            'description' => '',             
            'panel'       => 'frontpage',      
            'priority'    => 140,
        )
    );
    
    $wp_customize->add_setting('bizzoy_services_section_hideshow',
        array(
            'default'           => 'hide',
            'sanitize_callback' => 'bizzoy_sanitize_select',
        )
    );

    $bizzoy_services_section_hide_show_option = bizzoy_section_choice_option();

    $wp_customize->add_control(
        'bizzoy_services_section_hideshow',
        array(
            'type'        => 'radio',
            'label'       => esc_html__('Services Option', 'bizzoy'),
            'description' => esc_html__('Show/hide option Section.', 'bizzoy'),
            'section'     => 'bizzoy_services',
            'choices'     => $bizzoy_services_section_hide_show_option,
            'priority'    => 1
        )
    );


    // Services title
    $wp_customize->add_setting('bizzoy_services_title', 
        array(
            'default'           => '',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );


    $wp_customize->add_control('bizzoy_services_title',
        array(
           'label'    => esc_html__('service Title', 'bizzoy'),
           'section'  => 'bizzoy_services',
           'priority' => 1
        )
    );

  


    // Services 
   
    $service_no = 6;
        for( $i = 1; $i <= $service_no; $i++ ) {
            $bizzoy_servicepage = 'bizzoy_service_page_' . $i;
            $bizzoy_serviceicon = 'bizzoy_page_service_icon_' . $i;
        
    // Setting - Feature Icon
    $wp_customize->add_setting( $bizzoy_serviceicon,
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control( $bizzoy_serviceicon,
        array(
            'label'         => esc_html__( 'Service Icon ', 'bizzoy' ).$i,
            
            'section'       => 'bizzoy_services',
            'type'          => 'text',
            'priority'      => 100,
        )
    );
        
    $wp_customize->add_setting( $bizzoy_servicepage,
        array(
            'default'           => 1,
            'sanitize_callback' => 'bizzoy_sanitize_dropdown_pages',
        )
    );

    $wp_customize->add_control( $bizzoy_servicepage,
        array(
            'label'        => esc_html__( 'Service Page ', 'bizzoy' ) .$i,
            'section'      => 'bizzoy_services',
            'type'         => 'dropdown-pages',
            'priority'     => 100,
        )
    );
    }