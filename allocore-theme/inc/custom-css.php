<?php
if (!defined('ABSPATH')) {
    exit;
}

function allocore_output_custom_css() {
    // Colors
    $primary    = get_theme_mod('allocore_color_primary', '#FF8C00');
    $secondary  = get_theme_mod('allocore_color_secondary', '#0D9BA6');
    $bg         = get_theme_mod('allocore_color_background', '#FFFFFF');
    $text       = get_theme_mod('allocore_color_text', '#1A1A1A');

    // Typography
    $font_heading = get_theme_mod('allocore_font_heading', 'Rajdhani');
    $font_body    = get_theme_mod('allocore_font_body', 'Work Sans');

    // Header
    $header_bg  = get_theme_mod('allocore_header_bg_color', '#ffffff');

    // Footer
    $footer_bg  = get_theme_mod('allocore_footer_bg_color', '#0E1B2A');
    $footer_text = get_theme_mod('allocore_footer_text_color', '#ffffff');

    ?>
    <style type="text/css">
        :root {
            /* Global Colors */
            --background: <?php echo esc_attr($bg); ?>;
            --foreground: <?php echo esc_attr($text); ?>;
            --primary-color: <?php echo esc_attr($primary); ?>;
            --secondary-color: <?php echo esc_attr($secondary); ?>;

            /* Fonts */
            --font-heading: '<?php echo esc_attr($font_heading); ?>', sans-serif;
            --font-body: '<?php echo esc_attr($font_body); ?>', sans-serif;
        }

        body {
            background-color: var(--background);
            color: var(--foreground);
            font-family: var(--font-body);
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: var(--font-heading);
        }

        /* --- Utility Overrides (Tailwind) --- */
        .bg-\[\#FF8C00\], .bg-primary { background-color: <?php echo esc_attr($primary); ?> !important; }
        .text-\[\#FF8C00\], .text-primary { color: <?php echo esc_attr($primary); ?> !important; }
        .border-\[\#FF8C00\], .border-primary { border-color: <?php echo esc_attr($primary); ?> !important; }

        .bg-\[\#0D9BA6\], .bg-secondary { background-color: <?php echo esc_attr($secondary); ?> !important; }
        .text-\[\#0D9BA6\], .text-secondary { color: <?php echo esc_attr($secondary); ?> !important; }

        /* --- Header & Navigation --- */
        header.fixed {
            background-color: <?php echo esc_attr($header_bg); ?>e6;
        }
        @supports (backdrop-filter: blur(8px)) {
            header.fixed {
                background-color: <?php echo esc_attr($header_bg); ?>cc;
            }
        }

        /* Navigation Links Color */
        header nav .menu-item a,
        header nav a {
            color: var(--foreground); /* Default to body text color if no specific setting, or we can add a specific setting */
        }

        /* Force override specificity for muted text if user wants default body text color */
        header nav .menu-item a.text-muted-foreground,
        header nav a.text-muted-foreground {
             color: var(--foreground);
             opacity: 0.7; /* Keep visual hierarchy */
        }

        /* Hover State */
        header nav .menu-item a:hover,
        header nav a:hover {
            color: var(--primary-color) !important;
            opacity: 1;
        }

        /* --- Footer Styling --- */
        footer.bg-\[\#0E1B2A\] {
            background-color: <?php echo esc_attr($footer_bg); ?> !important;
            color: <?php echo esc_attr($footer_text); ?> !important;
        }

        /* Footer Links & Text */
        footer p,
        footer span,
        footer li,
        footer a {
            color: <?php echo esc_attr($footer_text); ?> !important;
        }

        footer a:hover {
            color: <?php echo esc_attr($primary); ?> !important;
        }

        /* Footer Headings */
        footer h1, footer h2, footer h3, footer h4, footer h5, footer h6 {
            color: <?php echo esc_attr($footer_text); ?> !important;
        }

        /* Opacity helpers in footer */
        footer .opacity-70 {
            opacity: 0.7;
        }
        footer .opacity-50 {
            opacity: 0.5;
        }
    </style>
    <?php
}
add_action('wp_head', 'allocore_output_custom_css');
