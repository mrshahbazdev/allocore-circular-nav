<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Before_After_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_before_after';
    }

    public function get_title() {
        return esc_html__('Allocore Before/After', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-image-before-after';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Images', 'allocore-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'before_image',
            [
                'label' => esc_html__('Before Image', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'after_image',
            [
                'label' => esc_html__('After Image', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'before_label',
            [
                'label' => esc_html__('Before Label', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Before',
            ]
        );

        $this->add_control(
            'after_label',
            [
                'label' => esc_html__('After Label', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'After',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        ?>
        <div class="allocore-before-after relative w-full overflow-hidden select-none group" style="--position: 50%;">
            <!-- After Image (Background) -->
            <div class="w-full h-auto">
                <img src="<?php echo esc_url($settings['after_image']['url']); ?>" alt="After" class="block w-full h-auto">
                <span class="absolute top-4 right-4 bg-black/50 text-white px-2 py-1 text-xs rounded uppercase font-bold"><?php echo esc_html($settings['after_label']); ?></span>
            </div>

            <!-- Before Image (Foreground, Clipped) -->
            <div class="absolute inset-0 w-full h-full overflow-hidden" style="width: var(--position, 50%); border-right: 2px solid white;">
                <img src="<?php echo esc_url($settings['before_image']['url']); ?>" alt="Before" class="block w-full h-auto max-w-none" style="width: 100vw; max-width: 100%;">
                <span class="absolute top-4 left-4 bg-black/50 text-white px-2 py-1 text-xs rounded uppercase font-bold"><?php echo esc_html($settings['before_label']); ?></span>
            </div>

            <!-- Slider Handle -->
            <div class="absolute inset-y-0 w-8 h-8 -ml-4 bg-white rounded-full shadow-lg flex items-center justify-center cursor-ew-resize z-20"
                 style="left: var(--position, 50%); top: 50%; transform: translateY(-50%);">
                <i class="fas fa-arrows-alt-h text-gray-800"></i>
            </div>

            <!-- Range Input -->
            <input type="range" min="0" max="100" value="50" class="absolute inset-0 w-full h-full opacity-0 cursor-ew-resize z-30 m-0 p-0"
                   oninput="this.parentElement.style.setProperty('--position', this.value + '%'); this.previousElementSibling.previousElementSibling.querySelector('img').style.width = this.parentElement.offsetWidth + 'px';">
                   <!-- Note: The img width fix is needed because max-w-none on the clipped image needs to match container width to stay aligned.
                        Let's refine the JS in a moment. Actually, if I set the inner img width to match the container width via JS, it stays aligned.
                        Or better: object-cover and absolute positioning. -->
        </div>
        <script>
            // Simple inline script to ensure correct image sizing on load/resize
            (function() {
                const containers = document.querySelectorAll('.allocore-before-after');
                containers.forEach(c => {
                    const updateWidth = () => {
                        const width = c.offsetWidth;
                        const beforeImg = c.querySelector('.absolute img');
                        if(beforeImg) beforeImg.style.width = width + 'px';
                    };
                    window.addEventListener('resize', updateWidth);
                    // Initial
                    setTimeout(updateWidth, 100);
                });
            })();
        </script>
        <?php
    }
}
