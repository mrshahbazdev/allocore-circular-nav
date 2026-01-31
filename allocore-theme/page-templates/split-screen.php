<?php
/**
 * Template Name: Split Screen
 */

get_header(); ?>

<div class="flex flex-col md:flex-row min-h-screen">
    <!-- Left Side: Featured Image or Color -->
    <div class="w-full md:w-1/2 bg-muted relative min-h-[50vh] md:min-h-screen">
        <?php if (has_post_thumbnail()) : ?>
            <div class="absolute inset-0">
                <?php the_post_thumbnail('full', ['class' => 'w-full h-full object-cover']); ?>
            </div>
        <?php else : ?>
            <div class="absolute inset-0 bg-gradient-to-br from-[#FF8C00]/20 to-[#0D9BA6]/20 flex items-center justify-center">
                <h1 class="text-4xl font-bold opacity-20" style="font-family: 'Rajdhani', sans-serif;"><?php the_title(); ?></h1>
            </div>
        <?php endif; ?>
    </div>

    <!-- Right Side: Content -->
    <div class="w-full md:w-1/2 p-8 md:p-16 lg:p-24 flex flex-col justify-center">
        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                ?>
                <h1 class="text-4xl md:text-5xl font-bold mb-8" style="font-family: 'Rajdhani', sans-serif;"><?php the_title(); ?></h1>
                <div class="text-lg text-muted-foreground leading-relaxed" style="font-family: 'Work Sans', sans-serif;">
                    <?php the_content(); ?>
                </div>
                <?php
            endwhile;
        endif;
        ?>
    </div>
</div>

<?php get_footer(); ?>
