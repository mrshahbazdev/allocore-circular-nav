<?php
/**
 * Template Name: Sidebar Right
 */

get_header(); ?>

<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row gap-8">
        <div class="w-full md:w-3/4">
            <?php
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
                    the_content();
                endwhile;
            endif;
            ?>
        </div>
        <aside class="w-full md:w-1/4">
            <?php dynamic_sidebar('sidebar-1'); ?>
        </aside>
    </div>
</div>

<?php get_footer(); ?>
