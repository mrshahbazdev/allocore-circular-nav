<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Post_Grid_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_post_grid';
    }

    public function get_title() {
        return esc_html__('Allocore Post Grid', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-posts-grid';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Query', 'allocore-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'posts_per_page',
            [
                'label' => esc_html__('Posts Per Page', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 3,
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $args = [
            'post_type' => 'post',
            'posts_per_page' => $settings['posts_per_page'],
            'post_status' => 'publish',
        ];

        $query = new \WP_Query($args);

        if ($query->have_posts()) :
            ?>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <article class="group bg-card rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-border">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" class="block overflow-hidden h-48">
                                <?php the_post_thumbnail('medium_large', ['class' => 'w-full h-full object-cover transition-transform duration-500 group-hover:scale-110']); ?>
                            </a>
                        <?php endif; ?>

                        <div class="p-6">
                            <div class="flex items-center gap-2 text-xs text-muted-foreground mb-3">
                                <span class="uppercase tracking-wide font-bold text-primary"><?php echo get_the_date(); ?></span>
                                <span>•</span>
                                <span><?php the_author(); ?></span>
                            </div>

                            <h3 class="text-xl font-bold mb-3 leading-tight">
                                <a href="<?php the_permalink(); ?>" class="text-foreground hover:text-primary transition-colors">
                                    <?php the_title(); ?>
                                </a>
                            </h3>

                            <div class="text-sm text-muted-foreground mb-4 line-clamp-3">
                                <?php the_excerpt(); ?>
                            </div>

                            <a href="<?php the_permalink(); ?>" class="inline-flex items-center text-sm font-bold text-primary hover:text-primary/80 transition-colors">
                                Read More <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
            <?php
        else :
            echo '<p class="text-center text-muted-foreground">No posts found.</p>';
        endif;
    }
}
