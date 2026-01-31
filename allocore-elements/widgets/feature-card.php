<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Feature_Card_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_feature_card';
    }

    public function get_title() {
        return esc_html__('Allocore Feature Card', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-info-box';
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
            'title',
            [
                'label' => esc_html__('Title', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Feature Title',
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Description of the feature.',
            ]
        );

        $this->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $this->add_control(
            'style',
            [
                'label' => esc_html__('Style', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default' => 'Default (Problem Section)',
                    'boxed' => 'Boxed (About Us Section)',
                ],
            ]
        );

        $this->add_control(
            'color',
            [
                'label' => esc_html__('Color', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#FF8C00',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        if ($settings['style'] === 'default') {
            ?>
            <div class="group bg-card p-8 rounded-2xl border-2 border-destructive/10 hover:border-destructive/30 transition-all duration-300 hover:shadow-xl h-full">
                <div class="w-14 h-14 rounded-xl bg-destructive/10 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                     <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true', 'class' => 'w-7 h-7 text-destructive' ] ); ?>
                </div>
                <h3 class="text-2xl font-bold mb-4 leading-tight" style="font-family: 'Rajdhani', sans-serif;">
                    <?php echo esc_html($settings['title']); ?>
                </h3>
                <p class="text-muted-foreground leading-relaxed" style="font-family: 'Work Sans', sans-serif;">
                    <?php echo esc_html($settings['description']); ?>
                </p>
            </div>
            <?php
        } else {
            // Boxed style (About Us)
            ?>
            <div class="bg-card p-8 rounded-2xl border-2 border-border text-center hover:shadow-xl transition-all duration-300 hover:border-[#FF8C00] h-full">
                <div class="w-16 h-16 rounded-xl flex items-center justify-center mx-auto mb-6" style="background-color: <?php echo esc_attr($settings['color']); ?>20;">
                    <?php
                        $icon_html = \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true', 'class' => 'w-8 h-8' ], 'div' );
                        // Note: Elementor renders icon directly, we might need to style it via CSS or wrap it.
                        // The render_icon output usually doesn't accept arbitrary classes easily for SVG in all contexts without buffer manipulation, but standard FontAwesome works.
                        // Ideally we inject style="color: ..." to the icon.
                    ?>
                    <div style="color: <?php echo esc_attr($settings['color']); ?>;">
                         <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true', 'class' => 'w-8 h-8' ] ); ?>
                    </div>
                </div>
                <h3 class="text-xl font-bold mb-2" style="font-family: 'Rajdhani', sans-serif;">
                    <?php echo esc_html($settings['title']); ?>
                </h3>
                <p class="text-sm text-muted-foreground">
                    <?php echo esc_html($settings['description']); ?>
                </p>
            </div>
            <?php
        }
    }
}
