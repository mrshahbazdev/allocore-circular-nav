<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Device_Mockup_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_device_mockup';
    }

    public function get_title() {
        return esc_html__('Allocore Device Mockup', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-device-mobile';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'allocore-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__('Screen Image', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'device_type',
            [
                'label' => esc_html__('Device Type', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'laptop',
                'options' => [
                    'laptop' => 'Laptop',
                    'mobile' => 'Mobile',
                    'tablet' => 'Tablet',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $image_url = $settings['image']['url'];
        $device = $settings['device_type'];

        ?>
        <div class="allocore-device-mockup flex justify-center">
            <?php if ($device === 'laptop') : ?>
                <!-- Laptop Frame -->
                <div class="relative w-full max-w-4xl">
                    <!-- Screen -->
                    <div class="bg-gray-800 rounded-t-xl p-[2%] pb-0 shadow-xl">
                        <div class="bg-black rounded-lg overflow-hidden aspect-video relative">
                             <?php if ($image_url) : ?>
                                <img src="<?php echo esc_url($image_url); ?>" alt="Screen" class="w-full h-full object-cover">
                             <?php endif; ?>
                        </div>
                    </div>
                    <!-- Keyboard/Base -->
                    <div class="bg-gray-700 h-[10px] sm:h-[16px] w-full rounded-b-xl relative z-10 shadow-lg"></div>
                    <div class="bg-gray-600 h-[4px] w-[15%] mx-auto rounded-b-md"></div>
                </div>

            <?php elseif ($device === 'mobile') : ?>
                <!-- Mobile Frame -->
                <div class="relative w-[300px] h-[600px] bg-gray-900 rounded-[3rem] border-[14px] border-gray-900 shadow-xl overflow-hidden">
                    <!-- Notch -->
                    <div class="absolute top-0 inset-x-0 h-6 bg-gray-900 z-20 w-32 mx-auto rounded-b-xl"></div>

                    <!-- Screen -->
                    <div class="w-full h-full bg-white rounded-[2rem] overflow-hidden relative">
                         <?php if ($image_url) : ?>
                            <img src="<?php echo esc_url($image_url); ?>" alt="Screen" class="w-full h-full object-cover">
                         <?php endif; ?>
                    </div>
                </div>

            <?php else : // Tablet ?>
                 <!-- Tablet Frame -->
                 <div class="relative w-full max-w-xl aspect-[3/4] bg-gray-900 rounded-[2rem] border-[14px] border-gray-900 shadow-xl overflow-hidden">
                     <!-- Screen -->
                    <div class="w-full h-full bg-white rounded-xl overflow-hidden relative">
                         <?php if ($image_url) : ?>
                            <img src="<?php echo esc_url($image_url); ?>" alt="Screen" class="w-full h-full object-cover">
                         <?php endif; ?>
                    </div>
                 </div>
            <?php endif; ?>
        </div>
        <?php
    }
}
