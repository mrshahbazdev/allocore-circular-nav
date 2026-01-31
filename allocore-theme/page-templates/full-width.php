<?php
/**
 * Template Name: Full Width (Default)
 */

get_header(); ?>

<div class="w-full">
    <?php
    if (have_posts()) :
        while (have_posts()) :
            the_post();
            the_content();
        endwhile;
    endif;
    ?>
</div>

<?php get_footer(); ?>
