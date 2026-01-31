<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Image_Box_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_image_box';
    }

    public function get_title() {
        return esc_html__('Allocore Image Box', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-image-box';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section('content_section', ['label' => 'Content', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT]);
        $this->add_control('image', ['label' => 'Image', 'type' => \Elementor\Controls_Manager::MEDIA]);
        $this->add_control('title', ['label' => 'Title', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Title']);
        $this->add_control('description', ['label' => 'Description', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Description']);
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $img_url = $settings['image']['url'] ?: 'https://via.placeholder.com/400x300';
        ?>
        <div class="rounded-xl overflow-hidden shadow-lg bg-card">
            <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($settings['title']); ?>" class="w-full h-48 object-cover">
            <div class="p-6">
                <h3 class="text-xl font-bold mb-2" style="font-family: 'Rajdhani', sans-serif;"><?php echo esc_html($settings['title']); ?></h3>
                <p class="text-muted-foreground"><?php echo esc_html($settings['description']); ?></p>
            </div>
        </div>
        <?php
    }
}
