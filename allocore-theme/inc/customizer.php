<?php
if (!defined('ABSPATH')) {
    exit;
}

function allocore_advanced_customizer($wp_customize) {

    // --- Panel: Global Styling ---
    $wp_customize->add_panel('allocore_styling_panel', array(
        'title'       => __('Global Styling', 'allocore-theme'),
        'description' => 'Manage global colors and typography.',
        'priority'    => 20,
    ));

    // Section: Colors
    $wp_customize->add_section('allocore_colors_section', array(
        'title'    => __('Colors', 'allocore-theme'),
        'panel'    => 'allocore_styling_panel',
    ));

    // Primary Color (Orange)
    $wp_customize->add_setting('allocore_color_primary', array('default' => '#FF8C00', 'transport' => 'refresh'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'allocore_color_primary', array(
        'label'    => __('Primary Color', 'allocore-theme'),
        'section'  => 'allocore_colors_section',
    )));

    // Secondary Color (Teal)
    $wp_customize->add_setting('allocore_color_secondary', array('default' => '#0D9BA6', 'transport' => 'refresh'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'allocore_color_secondary', array(
        'label'    => __('Secondary Color', 'allocore-theme'),
        'section'  => 'allocore_colors_section',
    )));

    // Background Color
    $wp_customize->add_setting('allocore_color_background', array('default' => '#FFFFFF', 'transport' => 'refresh'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'allocore_color_background', array(
        'label'    => __('Body Background', 'allocore-theme'),
        'section'  => 'allocore_colors_section',
    )));

    // Text Color
    $wp_customize->add_setting('allocore_color_text', array('default' => '#1A1A1A', 'transport' => 'refresh'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'allocore_color_text', array(
        'label'    => __('Body Text Color', 'allocore-theme'),
        'section'  => 'allocore_colors_section',
    )));

    // Section: Typography (Simple)
    $wp_customize->add_section('allocore_typography_section', array(
        'title'    => __('Typography', 'allocore-theme'),
        'panel'    => 'allocore_styling_panel',
    ));

    $wp_customize->add_setting('allocore_font_heading', array('default' => 'Rajdhani', 'transport' => 'refresh'));
    $wp_customize->add_control('allocore_font_heading', array(
        'label'    => __('Heading Font Family', 'allocore-theme'),
        'section'  => 'allocore_typography_section',
        'type'     => 'select',
        'choices'  => [
            'Rajdhani' => 'Rajdhani (Default)',
            'Work Sans' => 'Work Sans',
            'Inter' => 'Inter',
            'Roboto' => 'Roboto',
            'Open Sans' => 'Open Sans',
            'Montserrat' => 'Montserrat'
        ]
    ));

    $wp_customize->add_setting('allocore_font_body', array('default' => 'Work Sans', 'transport' => 'refresh'));
    $wp_customize->add_control('allocore_font_body', array(
        'label'    => __('Body Font Family', 'allocore-theme'),
        'section'  => 'allocore_typography_section',
        'type'     => 'select',
        'choices'  => [
            'Work Sans' => 'Work Sans (Default)',
            'Rajdhani' => 'Rajdhani',
            'Inter' => 'Inter',
            'Roboto' => 'Roboto',
            'Open Sans' => 'Open Sans',
            'Lato' => 'Lato'
        ]
    ));

    // --- Panel: Header Options ---
    $wp_customize->add_panel('allocore_header_panel', array(
        'title'    => __('Header Options', 'allocore-theme'),
        'priority' => 30,
    ));

    $wp_customize->add_section('allocore_header_layout_section', array(
        'title'    => __('Layout', 'allocore-theme'),
        'panel'    => 'allocore_header_panel',
    ));

    $wp_customize->add_setting('allocore_header_style', array('default' => 'default', 'transport' => 'refresh'));
    $wp_customize->add_control('allocore_header_style', array(
        'label'    => __('Header Layout Style', 'allocore-theme'),
        'section'  => 'allocore_header_layout_section',
        'type'     => 'select',
        'choices'  => [
            'default'  => 'Default (Logo Left, Nav Right)',
            'centered' => 'Centered (Logo Center, Nav Below)',
            'split'    => 'Split (Logo Center, Nav Split)',
            'minimal'  => 'Minimal (Hamburger Only)',
        ]
    ));

    $wp_customize->add_setting('allocore_header_bg_color', array('default' => '#ffffff', 'transport' => 'refresh'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'allocore_header_bg_color', array(
        'label'    => __('Header Background', 'allocore-theme'),
        'section'  => 'allocore_header_layout_section',
    )));

    // --- Panel: Footer Options ---
    $wp_customize->add_panel('allocore_footer_panel', array(
        'title'    => __('Footer Options', 'allocore-theme'),
        'priority' => 32,
    ));

    $wp_customize->add_section('allocore_footer_layout_section', array(
        'title'    => __('Layout', 'allocore-theme'),
        'panel'    => 'allocore_footer_panel',
    ));

    $wp_customize->add_setting('allocore_footer_style', array('default' => '4-col', 'transport' => 'refresh'));
    $wp_customize->add_control('allocore_footer_style', array(
        'label'    => __('Footer Column Layout', 'allocore-theme'),
        'section'  => 'allocore_footer_layout_section',
        'type'     => 'select',
        'choices'  => [
            '4-col'    => '4 Columns',
            '3-col'    => '3 Columns',
            '2-col'    => '2 Columns',
            'centered' => 'Centered Stack',
        ]
    ));

    $wp_customize->add_setting('allocore_footer_bg_color', array('default' => '#0E1B2A', 'transport' => 'refresh'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'allocore_footer_bg_color', array(
        'label'    => __('Footer Background', 'allocore-theme'),
        'section'  => 'allocore_footer_layout_section',
    )));

    $wp_customize->add_setting('allocore_footer_text_color', array('default' => '#ffffff', 'transport' => 'refresh'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'allocore_footer_text_color', array(
        'label'    => __('Footer Text Color', 'allocore-theme'),
        'section'  => 'allocore_footer_layout_section',
    )));
}
add_action('customize_register', 'allocore_advanced_customizer');
