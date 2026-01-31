<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Dual_Button_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_dual_button';
    }

    public function get_title() {
        return esc_html__('Allocore Dual Buttons', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-dual-button';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'btn1_section',
            [
                'label' => esc_html__('Button 1', 'allocore-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control('btn1_text', ['label' => 'Text', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Primary Action']);
        $this->add_control('btn1_link', ['label' => 'Link', 'type' => \Elementor\Controls_Manager::URL, 'default' => ['url' => '#']]);
        $this->end_controls_section();

        $this->start_controls_section(
            'btn2_section',
            [
                'label' => esc_html__('Button 2', 'allocore-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control('btn2_text', ['label' => 'Text', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Secondary Action']);
        $this->add_control('btn2_link', ['label' => 'Link', 'type' => \Elementor\Controls_Manager::URL, 'default' => ['url' => '#']]);
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $this->add_link_attributes('btn1', $settings['btn1_link']);
        $this->add_link_attributes('btn2', $settings['btn2_link']);
        ?>
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a <?php echo $this->get_render_attribute_string('btn1'); ?> class="bg-[#FF8C00] hover:bg-[#FF8C00]/90 text-white font-bold text-lg px-10 py-7 shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-105 inline-flex items-center rounded-md hover:no-underline" style="font-family: 'Rajdhani', sans-serif;">
                <?php echo esc_html($settings['btn1_text']); ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2 w-5 h-5"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </a>
            <a <?php echo $this->get_render_attribute_string('btn2'); ?> class="font-bold text-lg px-10 py-7 border-2 border-input hover:bg-muted/50 transition-all duration-300 inline-flex items-center justify-center rounded-md hover:no-underline text-foreground" style="font-family: 'Rajdhani', sans-serif;">
                <?php echo esc_html($settings['btn2_text']); ?>
            </a>
        </div>
        <?php
    }
}
