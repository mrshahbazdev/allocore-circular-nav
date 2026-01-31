<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Alert_Box_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_alert_box';
    }

    public function get_title() {
        return esc_html__('Allocore Alert Box', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-alert';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section('content_section', ['label' => 'Content', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT]);
        $this->add_control('type', ['label' => 'Type', 'type' => \Elementor\Controls_Manager::SELECT, 'default' => 'info', 'options' => ['info' => 'Info', 'success' => 'Success', 'warning' => 'Warning', 'error' => 'Error']]);
        $this->add_control('title', ['label' => 'Title', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Notice']);
        $this->add_control('message', ['label' => 'Message', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'This is an important message.']);
        $this->add_control('dismissible', ['label' => 'Dismissible?', 'type' => \Elementor\Controls_Manager::SWITCHER, 'default' => 'yes']);
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $colors = [
            'info' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-800', 'border' => 'border-blue-200'],
            'success' => ['bg' => 'bg-green-100', 'text' => 'text-green-800', 'border' => 'border-green-200'],
            'warning' => ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-800', 'border' => 'border-yellow-200'],
            'error' => ['bg' => 'bg-red-100', 'text' => 'text-red-800', 'border' => 'border-red-200'],
        ];

        $c = $colors[$settings['type']];
        ?>
        <div class="allocore-alert-box p-4 rounded-md border <?php echo "{$c['bg']} {$c['border']} {$c['text']}"; ?> flex justify-between items-start">
            <div>
                <strong class="block font-bold"><?php echo esc_html($settings['title']); ?></strong>
                <span class="block mt-1 text-sm"><?php echo esc_html($settings['message']); ?></span>
            </div>
            <?php if ($settings['dismissible'] === 'yes') : ?>
            <button class="allocore-alert-close ml-4 opacity-70 hover:opacity-100 transition-opacity">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
            <?php endif; ?>
        </div>
        <?php
    }
}
