<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Divider_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_divider';
    }

    public function get_title() {
        return esc_html__('Allocore Divider', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-divider';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section('content_section', ['label' => 'Content', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT]);
        $this->add_control('color', ['label' => 'Color', 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#FF8C00']);
        $this->add_control('style', ['label' => 'Style', 'type' => \Elementor\Controls_Manager::SELECT, 'default' => 'line', 'options' => ['line' => 'Line with Dot', 'gradient' => 'Gradient Fade']]);
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="py-8 flex items-center justify-center w-full">
            <?php if ($settings['style'] === 'line') : ?>
                <div class="h-px bg-border w-full relative">
                    <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-3 h-3 rounded-full" style="background-color: <?php echo esc_attr($settings['color']); ?>;"></div>
                </div>
            <?php else : ?>
                <div class="h-px w-full" style="background: linear-gradient(90deg, transparent, <?php echo esc_attr($settings['color']); ?>, transparent);"></div>
            <?php endif; ?>
        </div>
        <?php
    }
}
