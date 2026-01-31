<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function allocore_theme_scripts() {
    // Enqueue Google Fonts
    wp_enqueue_style('allocore-fonts', 'https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;500;600;700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap', array(), null);

    // Enqueue Main Styles
    // Note: In a real deployment, we might want to put the extracted CSS in a separate file or inline it if it's small enough.
    // I will put the extracted CSS into assets/css/main.css
    wp_enqueue_style('allocore-main-style', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0');

    // Enqueue Theme Styles
    wp_enqueue_style('allocore-style', get_stylesheet_uri(), array('allocore-main-style'), '1.0.0');

    // Enqueue React/Scripts if needed (for the circular nav mostly)
    // We will handle the circular nav in the plugin, so we might not need much JS here globally,
    // but we should include jQuery just in case.
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'allocore_theme_scripts');

function allocore_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
}
add_action('after_setup_theme', 'allocore_theme_setup');
