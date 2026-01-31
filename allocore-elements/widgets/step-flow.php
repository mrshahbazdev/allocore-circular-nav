<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Step_Flow_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_step_flow';
    }

    public function get_title() {
        return esc_html__('Allocore Step Flow', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-history';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section('content_section', ['label' => 'Content', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT]);

        $repeater = new \Elementor\Repeater();
        $repeater->add_control('title', ['label' => 'Title', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Step 1']);
        $repeater->add_control('icon', ['label' => 'Icon', 'type' => \Elementor\Controls_Manager::ICONS, 'default' => ['value' => 'fas fa-check', 'library' => 'fa-solid']]);

        $this->add_control('steps', [
            'label' => 'Steps',
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [['title' => 'Audit'], ['title' => 'Strategy'], ['title' => 'Execution']],
        ]);

        $this->add_control('color', ['label' => 'Color', 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#FF8C00']);

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="flex flex-col md:flex-row items-center justify-between w-full relative">
            <!-- Connector Line -->
            <div class="hidden md:block absolute top-1/2 left-0 w-full h-1 bg-muted -z-10 transform -translate-y-1/2"></div>

            <?php foreach ($settings['steps'] as $index => $step) : ?>
            <div class="flex flex-col items-center bg-background p-4 z-10 w-full md:w-auto">
                <div class="w-16 h-16 rounded-full flex items-center justify-center text-white mb-4 shadow-lg transition-transform hover:scale-110" style="background-color: <?php echo esc_attr($settings['color']); ?>;">
                    <?php \Elementor\Icons_Manager::render_icon( $step['icon'], [ 'aria-hidden' => 'true', 'class' => 'w-8 h-8' ] ); ?>
                </div>
                <h4 class="font-bold text-lg" style="font-family: 'Rajdhani', sans-serif;"><?php echo esc_html($step['title']); ?></h4>
            </div>
            <?php endforeach; ?>
        </div>
        <?php
    }
}
