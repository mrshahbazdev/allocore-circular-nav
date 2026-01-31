<?php
/**
 * Template Name: Narrow Content (Reading Mode)
 */

get_header(); ?>

<div class="container mx-auto px-4 py-12">
    <div class="max-w-2xl mx-auto">
        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                ?>
                <article class="prose prose-lg mx-auto">
                    <h1 class="text-4xl font-bold mb-6" style="font-family: 'Rajdhani', sans-serif;"><?php the_title(); ?></h1>
                    <div class="text-muted-foreground leading-relaxed" style="font-family: 'Work Sans', sans-serif;">
                        <?php the_content(); ?>
                    </div>
                </article>
                <?php
            endwhile;
        endif;
        ?>
    </div>
</div>

<?php get_footer(); ?>
