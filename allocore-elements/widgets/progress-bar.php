<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Progress_Bar_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_progress_bar';
    }

    public function get_title() {
        return esc_html__('Allocore Progress Bar', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-skill-bar';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section('content_section', ['label' => 'Content', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT]);
        $this->add_control('title', ['label' => 'Title', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Skill Name']);
        $this->add_control('percentage', ['label' => 'Percentage', 'type' => \Elementor\Controls_Manager::SLIDER, 'size_units' => ['%'], 'range' => ['%' => ['min' => 0, 'max' => 100]], 'default' => ['unit' => '%', 'size' => 80]]);
        $this->add_control('color', ['label' => 'Color', 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#FF8C00']);
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $percent = $settings['percentage']['size'] . '%';
        ?>
        <div class="mb-4">
            <div class="flex justify-between mb-1">
                <span class="font-bold" style="font-family: 'Rajdhani', sans-serif;"><?php echo esc_html($settings['title']); ?></span>
                <span class="text-sm text-muted-foreground"><?php echo esc_html($percent); ?></span>
            </div>
            <div class="w-full bg-muted rounded-full h-2.5">
                <div class="h-2.5 rounded-full transition-all duration-1000 ease-out" style="width: <?php echo esc_attr($percent); ?>; background-color: <?php echo esc_attr($settings['color']); ?>;"></div>
            </div>
        </div>
        <?php
    }
}
