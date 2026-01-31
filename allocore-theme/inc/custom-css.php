<?php
if (!defined('ABSPATH')) {
    exit;
}

function allocore_output_custom_css() {
    $primary    = get_theme_mod('allocore_color_primary', '#FF8C00');
    $secondary  = get_theme_mod('allocore_color_secondary', '#0D9BA6');
    $bg         = get_theme_mod('allocore_color_background', '#FFFFFF');
    $text       = get_theme_mod('allocore_color_text', '#1A1A1A');
    $font_heading = get_theme_mod('allocore_font_heading', 'Rajdhani');
    $font_body    = get_theme_mod('allocore_font_body', 'Work Sans');

    $header_bg  = get_theme_mod('allocore_header_bg_color', '#ffffff');
    $footer_bg  = get_theme_mod('allocore_footer_bg_color', '#0E1B2A');
    $footer_text = get_theme_mod('allocore_footer_text_color', '#ffffff');

    ?>
    <style type="text/css">
        :root {
            /* Global Colors */
            --background: <?php echo esc_attr($bg); ?>;
            --foreground: <?php echo esc_attr($text); ?>;

            /* Custom mappings for Tailwind overrides if mapped in main.css via variables */
            /* Or we target specific elements if variables aren't pervasive yet */
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

        /* Utility overrides */
        .bg-\[\#FF8C00\], .bg-primary { background-color: <?php echo esc_attr($primary); ?> !important; }
        .text-\[\#FF8C00\], .text-primary { color: <?php echo esc_attr($primary); ?> !important; }
        .border-\[\#FF8C00\], .border-primary { border-color: <?php echo esc_attr($primary); ?> !important; }

        .bg-\[\#0D9BA6\], .bg-secondary { background-color: <?php echo esc_attr($secondary); ?> !important; }
        .text-\[\#0D9BA6\], .text-secondary { color: <?php echo esc_attr($secondary); ?> !important; }

        /* Header Specifics */
        header.fixed {
            background-color: <?php echo esc_attr($header_bg); ?>e6; /* 90% opacity hex approximation or fallback */
        }
        @supports (backdrop-filter: blur(8px)) {
            header.fixed {
                background-color: <?php echo esc_attr($header_bg); ?>cc; /* 80% for backdrop blur */
            }
        }

        /* Footer Specifics */
        footer.bg-\[\#0E1B2A\] {
            background-color: <?php echo esc_attr($footer_bg); ?> !important;
            color: <?php echo esc_attr($footer_text); ?> !important;
        }
    </style>
    <?php
}
add_action('wp_head', 'allocore_output_custom_css');
