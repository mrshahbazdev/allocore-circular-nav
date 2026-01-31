<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Business_Hours_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_business_hours';
    }

    public function get_title() {
        return esc_html__('Allocore Business Hours', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-clock-o';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section('content_section', ['label' => 'Content', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT]);

        $repeater = new \Elementor\Repeater();
        $repeater->add_control('day', ['label' => 'Day', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Monday - Friday']);
        $repeater->add_control('hours', ['label' => 'Hours', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '9:00 AM - 5:00 PM']);
        $repeater->add_control('highlight', ['label' => 'Highlight?', 'type' => \Elementor\Controls_Manager::SWITCHER]);

        $this->add_control('items', [
            'label' => 'Days',
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [['day' => 'Mon-Fri', 'hours' => '9-17'], ['day' => 'Sat', 'hours' => 'Closed']],
        ]);

        $this->add_control('color', ['label' => 'Highlight Color', 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#FF8C00']);

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="bg-card border border-border rounded-xl p-6 shadow-sm">
            <ul class="space-y-3">
                <?php foreach ($settings['items'] as $item) :
                    $style = $item['highlight'] ? 'color: ' . esc_attr($settings['color']) . '; font-weight: bold;' : 'color: var(--muted-foreground);';
                ?>
                <li class="flex justify-between items-center border-b border-border/50 last:border-0 pb-2 last:pb-0">
                    <span class="font-medium" style="<?php echo $style; ?>"><?php echo esc_html($item['day']); ?></span>
                    <span style="<?php echo $style; ?>"><?php echo esc_html($item['hours']); ?></span>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php
    }
}
