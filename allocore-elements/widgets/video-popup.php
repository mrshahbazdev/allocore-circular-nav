<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Video_Popup_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_video_popup';
    }

    public function get_title() {
        return esc_html__('Allocore Video Popup', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-play';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section('content_section', ['label' => 'Content', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT]);
        $this->add_control('image', ['label' => 'Cover Image', 'type' => \Elementor\Controls_Manager::MEDIA]);
        $this->add_control('video_url', ['label' => 'Video URL', 'type' => \Elementor\Controls_Manager::URL, 'placeholder' => 'https://youtube.com/...']);
        $this->add_control('color', ['label' => 'Play Button Color', 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#FF8C00']);
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $img_url = $settings['image']['url'] ?: 'https://via.placeholder.com/800x450';
        ?>
        <div class="relative rounded-2xl overflow-hidden group cursor-pointer aspect-video">
            <img src="<?php echo esc_url($img_url); ?>" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
            <div class="absolute inset-0 bg-black/30 flex items-center justify-center group-hover:bg-black/40 transition-colors">
                <a href="<?php echo esc_url($settings['video_url']['url']); ?>" target="_blank" class="w-16 h-16 rounded-full flex items-center justify-center bg-white shadow-lg transition-transform duration-300 group-hover:scale-110">
                    <svg class="w-6 h-6 ml-1" fill="<?php echo esc_attr($settings['color']); ?>" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                </a>
            </div>
        </div>
        <?php
    }
}
