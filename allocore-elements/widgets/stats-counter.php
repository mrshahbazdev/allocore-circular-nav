<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Stats_Counter_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_stats_counter';
    }

    public function get_title() {
        return esc_html__('Allocore Stats Counter', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-counter';
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
            'stat_number',
            [
                'label' => esc_html__('Number/Value', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '+150%',
            ]
        );

        $this->add_control(
            'stat_label',
            [
                'label' => esc_html__('Label', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Umsatzsteigerung',
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Durch optimale Ressourcenallokation steigt die Profitabilität.',
            ]
        );

        $this->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-chart-line',
                    'library' => 'fa-solid',
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
        ?>
        <div class="group bg-card p-10 rounded-2xl border-2 border-border hover:border-[#FF8C00] transition-all duration-300 hover:shadow-2xl text-center relative overflow-hidden h-full">
            <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-[#FF8C00]/5 to-transparent rounded-bl-full"></div>

            <div class="w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-8 group-hover:scale-110 transition-transform duration-300 shadow-lg" style="background-color: <?php echo esc_attr($settings['color']); ?>20;">
                <div style="color: <?php echo esc_attr($settings['color']); ?>;">
                    <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true', 'class' => 'w-10 h-10' ] ); ?>
                </div>
            </div>

            <div class="mb-6">
                <div class="text-4xl font-bold mb-2" style="color: <?php echo esc_attr($settings['color']); ?>; font-family: 'Rajdhani', sans-serif;">
                    <?php echo esc_html($settings['stat_number']); ?>
                </div>
                <div class="text-xs text-muted-foreground uppercase tracking-wide">
                    <?php echo esc_html($settings['stat_label']); ?>
                </div>
            </div>

            <p class="text-muted-foreground leading-relaxed" style="font-family: 'Work Sans', sans-serif;">
                <?php echo esc_html($settings['description']); ?>
            </p>
        </div>
        <?php
    }
}
