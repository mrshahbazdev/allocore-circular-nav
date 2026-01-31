<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Gradient_Button_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_gradient_button';
    }

    public function get_title() {
        return esc_html__('Allocore Button', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-button';
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
                'default' => 'Click Here',
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->add_control(
            'style',
            [
                'label' => esc_html__('Style', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'primary',
                'options' => [
                    'primary' => 'Primary (Orange Gradient/Solid)',
                    'outline' => 'Outline',
                ],
            ]
        );

        $this->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-arrow-right',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $this->add_link_attributes('button', $settings['link']);

        if ($settings['style'] === 'primary') {
            $class = "bg-[#FF8C00] hover:bg-[#FF8C00]/90 text-white font-bold text-lg px-10 py-7 shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-105 inline-flex items-center justify-center rounded-md hover:no-underline";
        } else {
            $class = "font-bold text-lg px-10 py-7 border-2 border-input hover:bg-muted/50 transition-all duration-300 inline-flex items-center justify-center rounded-md hover:no-underline text-foreground";
        }
        ?>
        <a <?php echo $this->get_render_attribute_string('button'); ?> class="<?php echo $class; ?>" style="font-family: 'Rajdhani', sans-serif;">
            <?php echo esc_html($settings['text']); ?>
            <?php if ( ! empty( $settings['icon']['value'] ) ) : ?>
                <span class="ml-2">
                    <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true', 'class' => 'w-5 h-5' ] ); ?>
                </span>
            <?php endif; ?>
        </a>
        <?php
    }
}
