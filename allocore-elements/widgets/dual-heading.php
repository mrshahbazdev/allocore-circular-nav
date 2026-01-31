<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Dual_Heading_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_dual_heading';
    }

    public function get_title() {
        return esc_html__('Allocore Dual Heading', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-heading';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section('content_section', ['label' => 'Content', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT]);
        $this->add_control('first_part', ['label' => 'First Part', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'We Build']);
        $this->add_control('second_part', ['label' => 'Second Part', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Future']);
        $this->add_control('color_1', ['label' => 'Color 1', 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0D9BA6']);
        $this->add_control('color_2', ['label' => 'Color 2', 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#FF8C00']);
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <h2 class="text-4xl md:text-5xl font-bold" style="font-family: 'Rajdhani', sans-serif;">
            <span style="color: <?php echo esc_attr($settings['color_1']); ?>;"><?php echo esc_html($settings['first_part']); ?></span>
            <span style="color: <?php echo esc_attr($settings['color_2']); ?>;"><?php echo esc_html($settings['second_part']); ?></span>
        </h2>
        <?php
    }
}
