<?php
/**
 * Template Name: Canvas (No Header/Footer)
 */

// We still get header/footer functions for scripts/styles,
// but we suppress the visual output in the template files via logic or by not calling them if we modified them to accept args.
// However, the cleanest way in a theme is usually:
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class('bg-background min-h-screen'); ?>>
<?php wp_body_open(); ?>

<div class="w-full h-full">
    <?php
    if (have_posts()) :
        while (have_posts()) :
            the_post();
            the_content();
        endwhile;
    endif;
    ?>
</div>

<?php wp_footer(); ?>
</body>
</html>
