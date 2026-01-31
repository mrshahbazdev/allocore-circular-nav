<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Image_Hotspots_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_image_hotspots';
    }

    public function get_title() {
        return esc_html__('Allocore Image Hotspots', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-image-hotspot';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Image', 'allocore-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__('Image', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'hotspots_section',
            [
                'label' => esc_html__('Hotspots', 'allocore-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'left',
            [
                'label' => esc_html__('Horizontal Position (%)', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 50,
                ],
            ]
        );

        $repeater->add_control(
            'top',
            [
                'label' => esc_html__('Vertical Position (%)', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 50,
                ],
            ]
        );

        $repeater->add_control(
            'content',
            [
                'label' => esc_html__('Tooltip Content', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Hotspot details here.',
            ]
        );

        $this->add_control(
            'hotspots',
            [
                'label' => esc_html__('Hotspots', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'left' => ['size' => 30, 'unit' => '%'],
                        'top' => ['size' => 40, 'unit' => '%'],
                        'content' => 'Point 1',
                    ],
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        ?>
        <div class="allocore-image-hotspots relative inline-block w-full">
            <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="Hotspot Image" class="w-full h-auto rounded-lg shadow-md">

            <?php foreach ($settings['hotspots'] as $index => $item) : ?>
                <div class="absolute w-8 h-8 -ml-4 -mt-4 bg-primary rounded-full cursor-pointer group z-10 flex items-center justify-center text-white shadow-lg border-2 border-white hover:scale-110 transition-transform"
                     style="left: <?php echo esc_attr($item['left']['size']); ?>%; top: <?php echo esc_attr($item['top']['size']); ?>%;">
                    <i class="fas fa-plus text-xs"></i>

                    <!-- Tooltip -->
                    <div class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 w-48 bg-black/90 text-white text-xs p-3 rounded opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 text-center pointer-events-none">
                        <?php echo esc_html($item['content']); ?>
                        <div class="absolute top-full left-1/2 -translate-x-1/2 border-8 border-transparent border-t-black/90"></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
    }
}
