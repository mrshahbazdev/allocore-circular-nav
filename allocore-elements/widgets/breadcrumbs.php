<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Breadcrumbs_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_breadcrumbs';
    }

    public function get_title() {
        return esc_html__('Allocore Breadcrumbs', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-product-breadcrumbs';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section('style_section', ['label' => 'Style', 'tab' => \Elementor\Controls_Manager::TAB_STYLE]);
        $this->add_control('color', ['label' => 'Active Color', 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#FF8C00']);
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // Simple static breadcrumb for now or use Yoast if available
        // We'll output a styled structure
        ?>
        <nav aria-label="Breadcrumb" class="flex">
            <ol class="flex items-center space-x-2 text-sm text-muted-foreground">
                <li><a href="<?php echo home_url(); ?>" class="hover:text-foreground">Home</a></li>
                <li><span class="opacity-50">/</span></li>
                <?php if (is_single() || is_page()) : ?>
                    <li class="font-bold" style="color: <?php echo esc_attr($settings['color']); ?>;"><?php the_title(); ?></li>
                <?php else : ?>
                    <li class="font-bold" style="color: <?php echo esc_attr($settings['color']); ?>;">Current Page</li>
                <?php endif; ?>
            </ol>
        </nav>
        <?php
    }
}
