<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Radial_Progress_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_radial_progress';
    }

    public function get_title() {
        return esc_html__('Allocore Radial Progress', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-skill-bar';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section('content_section', ['label' => 'Content', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT]);
        $this->add_control('percentage', ['label' => 'Percentage', 'type' => \Elementor\Controls_Manager::SLIDER, 'range' => ['%' => ['min' => 0, 'max' => 100]], 'default' => ['unit' => '%', 'size' => 75]]);
        $this->add_control('label', ['label' => 'Label', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Efficiency']);
        $this->add_control('color', ['label' => 'Color', 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#FF8C00']);
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $percent = $settings['percentage']['size'];
        $radius = 40;
        $circumference = 2 * M_PI * $radius;
        $offset = $circumference - ($percent / 100) * $circumference;
        ?>
        <div class="flex flex-col items-center justify-center">
            <div class="relative w-32 h-32">
                <svg class="w-full h-full transform -rotate-90">
                    <circle cx="64" cy="64" r="<?php echo $radius; ?>" stroke="currentColor" stroke-width="8" fill="transparent" class="text-muted/20" />
                    <circle cx="64" cy="64" r="<?php echo $radius; ?>" stroke="<?php echo esc_attr($settings['color']); ?>" stroke-width="8" fill="transparent" stroke-dasharray="<?php echo $circumference; ?>" stroke-dashoffset="<?php echo $offset; ?>" stroke-linecap="round" class="transition-all duration-1000 ease-out" />
                </svg>
                <div class="absolute inset-0 flex items-center justify-center text-2xl font-bold" style="font-family: 'Rajdhani', sans-serif;">
                    <?php echo esc_html($percent); ?>%
                </div>
            </div>
            <p class="mt-4 font-bold text-lg"><?php echo esc_html($settings['label']); ?></p>
        </div>
        <?php
    }
}
