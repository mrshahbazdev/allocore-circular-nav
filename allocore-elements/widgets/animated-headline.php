<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Animated_Headline_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_animated_headline';
    }

    public function get_title() {
        return esc_html__('Allocore Animated Headline', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-animated-headline';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section('content_section', ['label' => 'Content', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT]);
        $this->add_control('before_text', ['label' => 'Before Text', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'We create']);
        $this->add_control('animated_text', ['label' => 'Animated Text', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Solutions']);
        $this->add_control('after_text', ['label' => 'After Text', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'for you.']);
        $this->add_control('color', ['label' => 'Highlight Color', 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#FF8C00']);
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <h2 class="text-4xl md:text-6xl font-bold text-center" style="font-family: 'Rajdhani', sans-serif;">
            <?php echo esc_html($settings['before_text']); ?>
            <span class="relative inline-block px-2">
                <span class="relative z-10" style="color: <?php echo esc_attr($settings['color']); ?>;"><?php echo esc_html($settings['animated_text']); ?></span>
                <span class="absolute bottom-1 left-0 w-full h-3 -rotate-1 opacity-30" style="background-color: <?php echo esc_attr($settings['color']); ?>;"></span>
            </span>
            <?php echo esc_html($settings['after_text']); ?>
        </h2>
        <?php
    }
}
