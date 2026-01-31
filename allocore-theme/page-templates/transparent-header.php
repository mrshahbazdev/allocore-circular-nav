<?php
/**
 * Template Name: Transparent Header (Hero Overlay)
 */

get_header(); ?>

<!-- Negative margin to pull content up behind header -->
<div class="w-full -mt-20">
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
