<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Text_Marquee_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_text_marquee';
    }

    public function get_title() {
        return esc_html__('Allocore Text Marquee', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-scroll';
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
            'text',
            [
                'label' => esc_html__('Text', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'BREAKING NEWS • SPECIAL OFFER • LIMITED TIME • ',
            ]
        );

        $this->add_control(
            'speed',
            [
                'label' => esc_html__('Speed (s)', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 20,
            ]
        );

        $this->add_control(
            'direction',
            [
                'label' => esc_html__('Direction', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'left',
                'options' => [
                    'left' => 'Left',
                    'right' => 'Right',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $text = str_repeat($settings['text'] . '&nbsp;&nbsp;&nbsp;', 10); // Repeat enough times
        $anim_name = 'marquee-' . $settings['direction'];

        ?>
        <style>
            @keyframes marquee-left {
                0% { transform: translateX(0); }
                100% { transform: translateX(-50%); }
            }
            @keyframes marquee-right {
                0% { transform: translateX(-50%); }
                100% { transform: translateX(0); }
            }
        </style>
        <div class="allocore-marquee overflow-hidden whitespace-nowrap bg-primary text-primary-foreground py-4 relative">
            <div class="inline-block" style="animation: <?php echo $anim_name; ?> <?php echo esc_attr($settings['speed']); ?>s linear infinite;">
                <span class="text-4xl font-bold uppercase tracking-wider px-4"><?php echo $text; ?></span>
            </div>
        </div>
        <?php
    }
}
