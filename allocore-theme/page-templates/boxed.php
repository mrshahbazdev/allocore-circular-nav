<?php
/**
 * Template Name: Boxed Content
 */

get_header(); ?>

<div class="container mx-auto px-4 py-8">
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
