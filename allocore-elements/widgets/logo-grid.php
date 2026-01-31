<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Logo_Grid_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_logo_grid';
    }

    public function get_title() {
        return esc_html__('Allocore Logo Grid', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-gallery-grid';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section('content_section', ['label' => 'Content', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT]);

        $repeater = new \Elementor\Repeater();
        $repeater->add_control('image', ['label' => 'Logo', 'type' => \Elementor\Controls_Manager::MEDIA]);
        $repeater->add_control('name', ['label' => 'Company Name', 'type' => \Elementor\Controls_Manager::TEXT]);

        $this->add_control('logos', [
            'label' => 'Logos',
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
        ]);

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8 items-center justify-items-center opacity-70 grayscale hover:grayscale-0 transition-all duration-500">
            <?php foreach ($settings['logos'] as $logo) :
                $img_url = $logo['image']['url'];
                if (!$img_url) continue;
            ?>
            <div class="p-4 w-full flex items-center justify-center">
                <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($logo['name']); ?>" class="max-h-12 w-auto object-contain transition-transform hover:scale-110">
            </div>
            <?php endforeach; ?>
        </div>
        <?php
    }
}
