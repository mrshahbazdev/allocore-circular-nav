<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Typewriter_Text_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_typewriter_text';
    }

    public function get_title() {
        return esc_html__('Allocore Typewriter Text', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-animation-text';
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
            'prefix',
            [
                'label' => esc_html__('Prefix', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'We are ',
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'text',
            [
                'label' => esc_html__('Text', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Awesome',
            ]
        );

        $this->add_control(
            'strings',
            [
                'label' => esc_html__('Rotating Strings', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    ['text' => 'Innovators'],
                    ['text' => 'Creators'],
                    ['text' => 'Allocore'],
                ],
            ]
        );

        $this->add_control(
            'suffix',
            [
                'label' => esc_html__('Suffix', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '.',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $strings = [];
        foreach ($settings['strings'] as $item) {
            $strings[] = $item['text'];
        }
        $id = $this->get_id();

        ?>
        <div class="allocore-typewriter text-4xl font-bold font-heading">
            <span><?php echo esc_html($settings['prefix']); ?></span>
            <span class="text-primary inline-block min-w-[10px]" id="typewriter-<?php echo esc_attr($id); ?>"></span>
            <span><?php echo esc_html($settings['suffix']); ?></span>
            <span class="animate-pulse">|</span>
        </div>

        <script>
            (function() {
                const el = document.getElementById('typewriter-<?php echo esc_attr($id); ?>');
                const strings = <?php echo json_encode($strings); ?>;
                if (!el || strings.length === 0) return;

                let strIndex = 0;
                let charIndex = 0;
                let isDeleting = false;
                let typeSpeed = 100;

                function type() {
                    const currentStr = strings[strIndex];

                    if (isDeleting) {
                        el.textContent = currentStr.substring(0, charIndex - 1);
                        charIndex--;
                        typeSpeed = 50;
                    } else {
                        el.textContent = currentStr.substring(0, charIndex + 1);
                        charIndex++;
                        typeSpeed = 150;
                    }

                    if (!isDeleting && charIndex === currentStr.length) {
                        isDeleting = true;
                        typeSpeed = 2000; // Pause at end
                    } else if (isDeleting && charIndex === 0) {
                        isDeleting = false;
                        strIndex = (strIndex + 1) % strings.length;
                        typeSpeed = 500; // Pause before next
                    }

                    setTimeout(type, typeSpeed);
                }

                type();
            })();
        </script>
        <?php
    }
}
