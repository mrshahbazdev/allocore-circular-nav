<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Countdown_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_countdown';
    }

    public function get_title() {
        return esc_html__('Allocore Countdown', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-countdown';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section('content_section', ['label' => 'Content', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT]);
        $this->add_control('target_date', ['label' => 'Target Date', 'type' => \Elementor\Controls_Manager::DATE_TIME, 'default' => date('Y-m-d H:i', strtotime('+1 week'))]);
        $this->add_control('color', ['label' => 'Color', 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#FF8C00']);
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="allocore-countdown flex gap-4 justify-center" data-date="<?php echo esc_attr($settings['target_date']); ?>">
            <?php foreach (['Days', 'Hours', 'Minutes', 'Seconds'] as $unit) : ?>
            <div class="text-center p-4 bg-card border border-border rounded-xl min-w-[90px] shadow-sm">
                <div class="val text-3xl font-bold <?php echo strtolower($unit); ?>" style="font-family: 'Rajdhani', sans-serif; color: <?php echo esc_attr($settings['color']); ?>;">00</div>
                <div class="text-xs uppercase tracking-wider text-muted-foreground"><?php echo esc_html($unit); ?></div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php
    }
}
