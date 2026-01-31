<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Timeline_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_timeline';
    }

    public function get_title() {
        return esc_html__('Allocore Timeline', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-time-line';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section('content_section', ['label' => 'Content', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT]);

        $repeater = new \Elementor\Repeater();
        $repeater->add_control('year', ['label' => 'Year/Date', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '2023']);
        $repeater->add_control('title', ['label' => 'Title', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Milestone']);
        $repeater->add_control('description', ['label' => 'Description', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Description here.']);

        $this->add_control('items', [
            'label' => 'Timeline Items',
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [['year' => '2023', 'title' => 'Start'], ['year' => '2024', 'title' => 'Growth']],
        ]);

        $this->add_control('color', ['label' => 'Color', 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#FF8C00']);

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="relative border-l-2 ml-4 md:ml-6 space-y-8" style="border-color: <?php echo esc_attr($settings['color']); ?>;">
            <?php foreach ($settings['items'] as $item) : ?>
            <div class="relative pl-8">
                <!-- Dot -->
                <div class="absolute -left-[9px] top-0 w-4 h-4 rounded-full border-2 bg-background" style="border-color: <?php echo esc_attr($settings['color']); ?>;"></div>

                <div class="flex flex-col sm:flex-row sm:items-baseline gap-2 mb-1">
                    <span class="text-xl font-bold" style="color: <?php echo esc_attr($settings['color']); ?>; font-family: 'Rajdhani', sans-serif;">
                        <?php echo esc_html($item['year']); ?>
                    </span>
                    <h4 class="text-lg font-bold"><?php echo esc_html($item['title']); ?></h4>
                </div>
                <p class="text-muted-foreground"><?php echo esc_html($item['description']); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
        <?php
    }
}
