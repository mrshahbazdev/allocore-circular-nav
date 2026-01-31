<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Testimonial_Card_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_testimonial_card';
    }

    public function get_title() {
        return esc_html__('Allocore Testimonial Card', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-testimonial';
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
            'result',
            [
                'label' => esc_html__('Result Value', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '+150%',
            ]
        );

        $this->add_control(
            'result_label',
            [
                'label' => esc_html__('Result Label', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Umsatzsteigerung',
            ]
        );

        $this->add_control(
            'metric',
            [
                'label' => esc_html__('Metric / Timeframe', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'in 12 Monaten',
            ]
        );

        $this->add_control(
            'company',
            [
                'label' => esc_html__('Company Name', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'TechStart GmbH',
            ]
        );

        $this->add_control(
            'testimonial',
            [
                'label' => esc_html__('Testimonial Text', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Die allocore-Methode hat uns geholfen, unsere Prozesse zu optimieren.',
            ]
        );

        $this->add_control(
            'author_name',
            [
                'label' => esc_html__('Author Name', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Michael Schmidt',
            ]
        );

        $this->add_control(
            'author_position',
            [
                'label' => esc_html__('Author Position', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Geschäftsführer',
            ]
        );

        $this->add_control(
            'accent_color',
            [
                'label' => esc_html__('Accent Color', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#FF8C00',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="group bg-card p-10 rounded-2xl border-2 border-border hover:shadow-2xl transition-all duration-300 hover:border-[#FF8C00] relative overflow-hidden h-full">
            <div class="absolute top-0 left-0 w-1 h-full" style="background-color: <?php echo esc_attr($settings['accent_color']); ?>"></div>

            <div class="mb-8">
                <div class="inline-flex items-baseline gap-2 mb-3">
                    <div class="text-5xl font-bold" style="color: <?php echo esc_attr($settings['accent_color']); ?>; font-family: 'Rajdhani', sans-serif;">
                        <?php echo esc_html($settings['result']); ?>
                    </div>
                    <div class="text-lg font-semibold text-muted-foreground" style="font-family: 'Rajdhani', sans-serif;">
                        <?php echo esc_html($settings['result_label']); ?>
                    </div>
                </div>
                <p class="text-sm text-muted-foreground mb-6"><?php echo esc_html($settings['metric']); ?></p>
                <h3 class="text-2xl font-bold mb-2" style="font-family: 'Rajdhani', sans-serif;">
                    <?php echo esc_html($settings['company']); ?>
                </h3>
            </div>

            <p class="text-muted-foreground mb-8 italic leading-relaxed text-lg" style="font-family: 'Work Sans', sans-serif;">
                "<?php echo esc_html($settings['testimonial']); ?>"
            </p>

            <div class="border-t-2 border-border pt-6">
                <p class="font-bold text-lg mb-1" style="font-family: 'Rajdhani', sans-serif;"><?php echo esc_html($settings['author_name']); ?></p>
                <p class="text-sm text-muted-foreground"><?php echo esc_html($settings['author_position']); ?></p>
            </div>
        </div>
        <?php
    }
}
