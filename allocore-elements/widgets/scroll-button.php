<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Scroll_Button_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_scroll_button';
    }

    public function get_title() {
        return esc_html__('Allocore Scroll Button', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-scroll';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section('content_section', ['label' => 'Content', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT]);
        $this->add_control('target_id', ['label' => 'Target Section ID', 'type' => \Elementor\Controls_Manager::TEXT, 'placeholder' => 'about-us']);
        $this->add_control('text', ['label' => 'Text', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Scroll Down']);
        $this->add_control('color', ['label' => 'Color', 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#FF8C00']);
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <a href="#<?php echo esc_attr($settings['target_id']); ?>" class="flex flex-col items-center gap-2 group cursor-pointer no-underline hover:no-underline">
            <span class="text-sm uppercase tracking-widest font-bold group-hover:text-[<?php echo esc_attr($settings['color']); ?>] transition-colors" style="font-family: 'Rajdhani', sans-serif;">
                <?php echo esc_html($settings['text']); ?>
            </span>
            <div class="w-6 h-10 border-2 rounded-full flex justify-center p-1 group-hover:border-[<?php echo esc_attr($settings['color']); ?>] transition-colors" style="border-color: currentColor;">
                <div class="w-1 h-2 rounded-full bg-current animate-bounce group-hover:bg-[<?php echo esc_attr($settings['color']); ?>]"></div>
            </div>
        </a>
        <?php
    }
}
