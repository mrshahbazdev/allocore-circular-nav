<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Icon_Box_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_icon_box';
    }

    public function get_title() {
        return esc_html__('Allocore Icon Box', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-icon-box';
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

        $this->add_control('icon', ['label' => 'Icon', 'type' => \Elementor\Controls_Manager::ICONS, 'default' => ['value' => 'fas fa-rocket', 'library' => 'fa-solid']]);
        $this->add_control('title', ['label' => 'Title', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Icon Box Title']);
        $this->add_control('description', ['label' => 'Description', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Short description here.']);
        $this->add_control('color', ['label' => 'Color', 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#FF8C00']);

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="flex flex-col items-start gap-4 p-6 rounded-lg border border-border bg-card hover:shadow-md transition-shadow duration-300">
            <div class="p-3 rounded-lg bg-opacity-10" style="background-color: <?php echo esc_attr($settings['color']); ?>20; color: <?php echo esc_attr($settings['color']); ?>;">
                <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true', 'class' => 'w-6 h-6' ] ); ?>
            </div>
            <div>
                <h4 class="font-bold text-lg mb-2" style="font-family: 'Rajdhani', sans-serif;"><?php echo esc_html($settings['title']); ?></h4>
                <p class="text-sm text-muted-foreground" style="font-family: 'Work Sans', sans-serif;"><?php echo esc_html($settings['description']); ?></p>
            </div>
        </div>
        <?php
    }
}
