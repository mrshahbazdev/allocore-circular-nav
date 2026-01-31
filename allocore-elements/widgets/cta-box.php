<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_CTA_Box_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_cta_box';
    }

    public function get_title() {
        return esc_html__('Allocore CTA Box', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-call-to-action';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section('content_section', ['label' => 'Content', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT]);

        $this->add_control('title', ['label' => 'Title', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Ready to start?']);
        $this->add_control('description', ['label' => 'Description', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Get in touch with us today.']);
        $this->add_control('btn_text', ['label' => 'Button Text', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Contact Us']);
        $this->add_control('btn_link', ['label' => 'Button Link', 'type' => \Elementor\Controls_Manager::URL, 'default' => ['url' => '#']]);
        $this->add_control('bg_color', ['label' => 'Background Color', 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0E1B2A']);

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="rounded-2xl p-8 md:p-12 text-center text-white relative overflow-hidden" style="background-color: <?php echo esc_attr($settings['bg_color']); ?>;">
            <div class="absolute inset-0 bg-white/5 opacity-20" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 32px 32px;"></div>
            <div class="relative z-10">
                <h2 class="text-3xl md:text-4xl font-bold mb-4" style="font-family: 'Rajdhani', sans-serif;"><?php echo esc_html($settings['title']); ?></h2>
                <p class="text-white/80 text-lg mb-8 max-w-2xl mx-auto"><?php echo esc_html($settings['description']); ?></p>
                <a href="<?php echo esc_url($settings['btn_link']['url']); ?>" class="inline-flex items-center justify-center px-8 py-4 bg-[#FF8C00] hover:bg-[#FF8C00]/90 text-white font-bold rounded-md transition-all hover:scale-105" style="font-family: 'Rajdhani', sans-serif;">
                    <?php echo esc_html($settings['btn_text']); ?>
                    <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>
        </div>
        <?php
    }
}
