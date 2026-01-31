<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Table_Of_Contents_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_table_of_contents';
    }

    public function get_title() {
        return esc_html__('Allocore TOC', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-table-of-contents';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section('content_section', ['label' => 'Content', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT]);
        $this->add_control('title', ['label' => 'Title', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Table of Contents']);
        $this->add_control('color', ['label' => 'Color', 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#FF8C00']);
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        // NOTE: A real TOC requires JS to parse the page content.
        // For this static implementation, we'll provide a placeholder or static list structure.
        // Users would typically use this with manual links or a JS library.
        // We will output a static styled container.
        ?>
        <div class="p-6 bg-muted/20 rounded-xl border border-border">
            <h4 class="font-bold mb-4 text-lg border-b pb-2" style="font-family: 'Rajdhani', sans-serif; border-color: <?php echo esc_attr($settings['color']); ?>;">
                <?php echo esc_html($settings['title']); ?>
            </h4>
            <nav>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:text-[<?php echo esc_attr($settings['color']); ?>]">1. Introduction</a></li>
                    <li><a href="#" class="hover:text-[<?php echo esc_attr($settings['color']); ?>]">2. Methodology</a></li>
                    <li>
                        <ul class="pl-4 mt-2 space-y-2 border-l border-border">
                            <li><a href="#" class="hover:text-[<?php echo esc_attr($settings['color']); ?>]">2.1 Analysis</a></li>
                            <li><a href="#" class="hover:text-[<?php echo esc_attr($settings['color']); ?>]">2.2 Strategy</a></li>
                        </ul>
                    </li>
                    <li><a href="#" class="hover:text-[<?php echo esc_attr($settings['color']); ?>]">3. Conclusion</a></li>
                </ul>
            </nav>
        </div>
        <style>
            .hover\:text-\[<?php echo esc_attr($settings['color']); ?>\]:hover { color: <?php echo esc_attr($settings['color']); ?> !important; }
        </style>
        <?php
    }
}
