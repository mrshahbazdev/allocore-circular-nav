<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Info_List_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_info_list';
    }

    public function get_title() {
        return esc_html__('Allocore Info List', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-bullet-list';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section('content_section', ['label' => 'Content', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT]);

        $repeater = new \Elementor\Repeater();
        $repeater->add_control('text', ['label' => 'Text', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'List Item']);
        $repeater->add_control('icon', ['label' => 'Icon', 'type' => \Elementor\Controls_Manager::ICONS, 'default' => ['value' => 'fas fa-check', 'library' => 'fa-solid']]);

        $this->add_control('items', [
            'label' => 'List Items',
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [['text' => 'Item 1'], ['text' => 'Item 2']],
        ]);

        $this->add_control('color', ['label' => 'Icon Color', 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#FF8C00']);

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <ul class="space-y-3">
            <?php foreach ($settings['items'] as $item) : ?>
            <li class="flex items-start gap-3">
                <div class="mt-1 flex-shrink-0" style="color: <?php echo esc_attr($settings['color']); ?>;">
                    <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true', 'class' => 'w-5 h-5' ] ); ?>
                </div>
                <span class="text-foreground text-lg"><?php echo esc_html($item['text']); ?></span>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php
    }
}
