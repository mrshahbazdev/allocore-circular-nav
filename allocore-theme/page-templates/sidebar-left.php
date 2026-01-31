<?php
/**
 * Template Name: Sidebar Left
 */

get_header(); ?>

<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row gap-8">
        <aside class="w-full md:w-1/4 order-2 md:order-1">
            <?php dynamic_sidebar('sidebar-1'); ?>
        </aside>
        <div class="w-full md:w-3/4 order-1 md:order-2">
            <?php
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
                    the_content();
                endwhile;
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
