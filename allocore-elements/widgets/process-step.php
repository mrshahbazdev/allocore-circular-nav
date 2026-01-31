<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Process_Step_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_process_step';
    }

    public function get_title() {
        return esc_html__('Allocore Process Step', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-number';
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

        $this->add_control('number', ['label' => 'Step Number', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '01']);
        $this->add_control('title', ['label' => 'Title', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Step Title']);
        $this->add_control('description', ['label' => 'Description', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Step description...']);
        $this->add_control('color', ['label' => 'Color', 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#FF8C00']);

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="relative pl-12 md:pl-0 md:text-center group">
            <div class="absolute left-0 top-0 md:static md:mx-auto md:mb-4 w-10 h-10 rounded-full flex items-center justify-center font-bold text-white shadow-lg group-hover:scale-110 transition-transform duration-300" style="background-color: <?php echo esc_attr($settings['color']); ?>; font-family: 'Rajdhani', sans-serif;">
                <?php echo esc_html($settings['number']); ?>
            </div>
            <h3 class="text-xl font-bold mb-2" style="font-family: 'Rajdhani', sans-serif;"><?php echo esc_html($settings['title']); ?></h3>
            <p class="text-muted-foreground" style="font-family: 'Work Sans', sans-serif;"><?php echo esc_html($settings['description']); ?></p>
        </div>
        <?php
    }
}
