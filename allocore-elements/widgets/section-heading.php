<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Section_Heading_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_section_heading';
    }

    public function get_title() {
        return esc_html__('Allocore Section Heading', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-heading';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'allocore-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__('Small Subtitle', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Die Herausforderung', 'allocore-elements'),
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Main Title', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Kennen Sie diese', 'allocore-elements'),
            ]
        );

        $this->add_control(
            'title_highlight',
            [
                'label' => esc_html__('Highlight Text', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Herausforderungen?', 'allocore-elements'),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Viele erfolgreiche Unternehmen kämpfen mit den gleichen strukturellen Problemen', 'allocore-elements'),
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => esc_html__('Subtitle Color', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#FF8C00',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="text-center mb-8">
            <p class="text-sm font-bold uppercase tracking-wider mb-4" style="color: <?php echo esc_attr($settings['subtitle_color']); ?>; font-family: 'Rajdhani', sans-serif;">
                <?php echo esc_html($settings['subtitle']); ?>
            </p>
            <h2 class="text-5xl md:text-6xl font-bold mb-6 leading-tight" style="font-family: 'Rajdhani', sans-serif;">
                <?php echo esc_html($settings['title']); ?>
                <span class="text-muted-foreground/60"><?php echo esc_html($settings['title_highlight']); ?></span>
            </h2>
            <p class="text-xl text-muted-foreground max-w-2xl mx-auto" style="font-family: 'Work Sans', sans-serif;">
                <?php echo esc_html($settings['description']); ?>
            </p>
        </div>
        <?php
    }
}
