<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Social_Icons_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_social_icons';
    }

    public function get_title() {
        return esc_html__('Allocore Social Icons', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-social-icons';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section('content_section', ['label' => 'Content', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT]);

        $repeater = new \Elementor\Repeater();
        $repeater->add_control('icon', ['label' => 'Icon', 'type' => \Elementor\Controls_Manager::ICONS, 'default' => ['value' => 'fab fa-facebook', 'library' => 'fa-brands']]);
        $repeater->add_control('link', ['label' => 'Link', 'type' => \Elementor\Controls_Manager::URL, 'default' => ['url' => '#']]);

        $this->add_control('items', [
            'label' => 'Icons',
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [['link' => ['url' => '#']], ['link' => ['url' => '#']]],
        ]);

        $this->add_control('color', ['label' => 'Hover Color', 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#FF8C00']);

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="flex gap-4">
            <?php foreach ($settings['items'] as $item) :
                $this->add_link_attributes('link_' . $item['_id'], $item['link']);
            ?>
            <a <?php echo $this->get_render_attribute_string('link_' . $item['_id']); ?> class="w-10 h-10 flex items-center justify-center rounded-full bg-muted/20 hover:bg-[<?php echo esc_attr($settings['color']); ?>] hover:text-white transition-all duration-300">
                <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true', 'class' => 'w-5 h-5' ] ); ?>
            </a>
            <?php endforeach; ?>
        </div>
        <style>
            .hover\:bg-\[<?php echo esc_attr($settings['color']); ?>\]:hover { background-color: <?php echo esc_attr($settings['color']); ?> !important; }
        </style>
        <?php
    }
}
