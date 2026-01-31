<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Content_Toggle_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_content_toggle';
    }

    public function get_title() {
        return esc_html__('Allocore Content Toggle', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-code';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section('content_section', ['label' => 'Content', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT]);

        $this->add_control('label_a', ['label' => 'Label A', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Monthly']);
        $this->add_control('content_a', ['label' => 'Content A', 'type' => \Elementor\Controls_Manager::WYSIWYG, 'default' => 'Monthly Pricing Content']);

        $this->add_control('label_b', ['label' => 'Label B', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Yearly']);
        $this->add_control('content_b', ['label' => 'Content B', 'type' => \Elementor\Controls_Manager::WYSIWYG, 'default' => 'Yearly Pricing Content']);

        $this->add_control('color', ['label' => 'Color', 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#FF8C00']);

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="allocore-toggle-wrapper flex flex-col items-center">
            <div class="flex items-center gap-4 mb-8">
                <span class="allocore-toggle-label-a text-lg font-bold text-primary transition-colors" style="font-family: 'Rajdhani', sans-serif; color: <?php echo esc_attr($settings['color']); ?>;">
                    <?php echo esc_html($settings['label_a']); ?>
                </span>

                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" class="sr-only peer allocore-toggle-switch">
                    <div class="w-14 h-7 bg-muted peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-[<?php echo esc_attr($settings['color']); ?>]" style="background-color: var(--muted);"></div>
                </label>

                <span class="allocore-toggle-label-b text-lg font-bold text-muted-foreground transition-colors" style="font-family: 'Rajdhani', sans-serif;">
                    <?php echo esc_html($settings['label_b']); ?>
                </span>
            </div>

            <div class="w-full">
                <div class="allocore-toggle-content-a animate-in fade-in zoom-in-95 duration-300">
                    <?php echo $settings['content_a']; ?>
                </div>
                <div class="allocore-toggle-content-b hidden animate-in fade-in zoom-in-95 duration-300">
                    <?php echo $settings['content_b']; ?>
                </div>
            </div>
        </div>
        <style>
            .peer:checked ~ div { background-color: <?php echo esc_attr($settings['color']); ?> !important; }
        </style>
        <?php
    }
}
