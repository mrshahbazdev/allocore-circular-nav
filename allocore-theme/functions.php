<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Enqueue Scripts and Styles
 */
function allocore_theme_scripts() {
    // Enqueue Google Fonts
    wp_enqueue_style('allocore-fonts', 'https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;500;600;700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap', array(), null);

    // Enqueue Main Styles
    wp_enqueue_style('allocore-main-style', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0');

    // Enqueue Theme Styles
    wp_enqueue_style('allocore-style', get_stylesheet_uri(), array('allocore-main-style'), '1.0.0');

    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'allocore_theme_scripts');

/**
 * Theme Setup
 */
function allocore_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('custom-logo', array(
        'height'      => 50,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Register Navigation Menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'allocore-theme'),
    ));
}
add_action('after_setup_theme', 'allocore_theme_setup');

/**
 * Register Widget Areas
 */
function allocore_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Footer Column 1', 'allocore-theme'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Add widgets here.', 'allocore-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s mb-6">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="font-bold text-lg mb-6" style="font-family: \'Rajdhani\', sans-serif;">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Column 2', 'allocore-theme'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Add widgets here.', 'allocore-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s mb-6">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="font-bold text-lg mb-6" style="font-family: \'Rajdhani\', sans-serif;">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Column 3', 'allocore-theme'),
        'id'            => 'footer-3',
        'description'   => esc_html__('Add widgets here.', 'allocore-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s mb-6">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="font-bold text-lg mb-6" style="font-family: \'Rajdhani\', sans-serif;">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Column 4', 'allocore-theme'),
        'id'            => 'footer-4',
        'description'   => esc_html__('Add widgets here.', 'allocore-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s mb-6">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="font-bold text-lg mb-6" style="font-family: \'Rajdhani\', sans-serif;">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'allocore-theme'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'allocore-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s mb-8 p-6 bg-card border border-border rounded-xl">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="font-bold text-xl mb-4" style="font-family: \'Rajdhani\', sans-serif;">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'allocore_widgets_init');

/**
 * Customizer Settings
 */
function allocore_customize_register($wp_customize) {
    // Header CTA Section
    $wp_customize->add_section('allocore_header_section', array(
        'title'    => __('Header Settings', 'allocore-theme'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('header_cta_text', array(
        'default'   => 'Beratung anfragen',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('header_cta_text', array(
        'label'    => __('CTA Button Text', 'allocore-theme'),
        'section'  => 'allocore_header_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('header_cta_link', array(
        'default'   => '#kontakt',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('header_cta_link', array(
        'label'    => __('CTA Button Link', 'allocore-theme'),
        'section'  => 'allocore_header_section',
        'type'     => 'url',
    ));

    // Footer Copyright
    $wp_customize->add_section('allocore_footer_section', array(
        'title'    => __('Footer Settings', 'allocore-theme'),
        'priority' => 31,
    ));

    $wp_customize->add_setting('footer_copyright_text', array(
        'default'   => 'allocore. Alle Rechte vorbehalten.',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('footer_copyright_text', array(
        'label'    => __('Copyright Text', 'allocore-theme'),
        'section'  => 'allocore_footer_section',
        'type'     => 'text',
    ));
}
add_action('customize_register', 'allocore_customize_register');
