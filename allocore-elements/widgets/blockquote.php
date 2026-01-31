<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Blockquote_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_blockquote';
    }

    public function get_title() {
        return esc_html__('Allocore Blockquote', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-blockquote';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section('content_section', ['label' => 'Content', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT]);
        $this->add_control('quote', ['label' => 'Quote', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Design is not just what it looks like and feels like. Design is how it works.']);
        $this->add_control('author', ['label' => 'Author', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Steve Jobs']);
        $this->add_control('color', ['label' => 'Accent Color', 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#FF8C00']);
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <blockquote class="p-4 my-4 border-l-4 bg-muted/20 rounded-r-lg" style="border-color: <?php echo esc_attr($settings['color']); ?>;">
            <p class="text-xl italic font-medium leading-relaxed" style="font-family: 'Work Sans', sans-serif;">"<?php echo esc_html($settings['quote']); ?>"</p>
            <footer class="mt-2 text-sm font-bold uppercase tracking-wider" style="color: <?php echo esc_attr($settings['color']); ?>; font-family: 'Rajdhani', sans-serif;">
                — <?php echo esc_html($settings['author']); ?>
            </footer>
        </blockquote>
        <?php
    }
}
