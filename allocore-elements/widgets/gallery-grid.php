<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Gallery_Grid_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_gallery_grid';
    }

    public function get_title() {
        return esc_html__('Allocore Gallery Grid', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-gallery-grid';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section('content_section', ['label' => 'Content', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT]);
        $this->add_control('images', ['label' => 'Images', 'type' => \Elementor\Controls_Manager::GALLERY]);
        $this->add_control('columns', ['label' => 'Columns', 'type' => \Elementor\Controls_Manager::SELECT, 'default' => '3', 'options' => ['2' => '2', '3' => '3', '4' => '4']]);
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $cols = $settings['columns'];
        $gridClass = "grid-cols-2 md:grid-cols-$cols";
        ?>
        <div class="grid <?php echo $gridClass; ?> gap-4">
            <?php foreach ($settings['images'] as $image) : ?>
            <div class="aspect-square rounded-xl overflow-hidden group">
                <img src="<?php echo esc_url($image['url']); ?>" alt="" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
            </div>
            <?php endforeach; ?>
        </div>
        <?php
    }
}
