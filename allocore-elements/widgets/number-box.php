<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Number_Box_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_number_box';
    }

    public function get_title() {
        return esc_html__('Allocore Number Box', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-number';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section('content_section', ['label' => 'Content', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT]);
        $this->add_control('number', ['label' => 'Number', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '01']);
        $this->add_control('title', ['label' => 'Title', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Step Title']);
        $this->add_control('description', ['label' => 'Description', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Description...']);
        $this->add_control('color', ['label' => 'Color', 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#FF8C00']);
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="relative p-8 border border-border rounded-xl group hover:border-[<?php echo esc_attr($settings['color']); ?>] transition-colors">
            <div class="text-6xl font-bold opacity-10 absolute top-4 right-4 group-hover:opacity-20 transition-opacity" style="color: <?php echo esc_attr($settings['color']); ?>; font-family: 'Rajdhani', sans-serif;">
                <?php echo esc_html($settings['number']); ?>
            </div>
            <h3 class="text-2xl font-bold mb-4 relative z-10" style="font-family: 'Rajdhani', sans-serif;">
                <span class="text-lg mr-2" style="color: <?php echo esc_attr($settings['color']); ?>;">#<?php echo esc_html($settings['number']); ?></span>
                <?php echo esc_html($settings['title']); ?>
            </h3>
            <p class="text-muted-foreground relative z-10"><?php echo esc_html($settings['description']); ?></p>
        </div>
        <?php
    }
}
