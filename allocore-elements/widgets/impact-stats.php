<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Impact_Stats_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_impact_stats';
    }

    public function get_title() {
        return esc_html__('Allocore Impact Stats', 'allocore-elements');
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
            'heading_prefix',
            [
                'label' => esc_html__('Heading Prefix (Bold)', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Messbare',
            ]
        );

        $this->add_control(
            'heading_suffix',
            [
                'label' => esc_html__('Heading Suffix', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Verbesserungen',
            ]
        );

        $this->add_control(
            'subheading',
            [
                'label' => esc_html__('Subheading', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'In allen Bereichen Ihres Unternehmens',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'cards_section',
            [
                'label' => esc_html__('Stats Cards', 'allocore-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
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

        $repeater->add_control(
            'number',
            [
                'label' => esc_html__('Number', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '+150%',
            ]
        );

        $repeater->add_control(
            'number_color',
            [
                'label' => esc_html__('Number Color', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#FF8C00',
            ]
        );

        $repeater->add_control(
            'label',
            [
                'label' => esc_html__('Label (Small)', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'DURCHSCHN. UMSATZSTEIGERUNG',
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Mehr Profit',
            ]
        );

        $repeater->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Durch optimale Ressourcenallokation steigt die Profitabilität nachhaltig und planbar',
            ]
        );

        $this->add_control(
            'cards',
            [
                'label' => esc_html__('Cards', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'number' => '+150%',
                        'label' => 'DURCHSCHN. UMSATZSTEIGERUNG',
                        'title' => 'Mehr Profit',
                        'number_color' => '#FF8C00',
                    ],
                    [
                        'number' => '100%',
                        'label' => 'STRATEGISCHE AUSRICHTUNG',
                        'title' => 'Mehr Klarheit',
                        'number_color' => '#46B4B4',
                    ],
                    [
                        'number' => '-40%',
                        'label' => 'PROZESSKOSTEN',
                        'title' => 'Weniger Komplexität',
                        'number_color' => '#FF8C00',
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="allocore-impact-stats text-center">
            <div class="mb-12">
                <h2 class="text-4xl md:text-5xl mb-4 font-bold" style="font-family: 'Rajdhani', sans-serif;">
                    <span class="text-foreground"><?php echo esc_html($settings['heading_prefix']); ?></span>
                    <span class="text-muted-foreground/60"><?php echo esc_html($settings['heading_suffix']); ?></span>
                </h2>
                <p class="text-lg text-muted-foreground">
                    <?php echo esc_html($settings['subheading']); ?>
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-6xl mx-auto">
                <?php foreach ($settings['cards'] as $card) : ?>
                    <div class="bg-card rounded-2xl p-8 border border-border shadow-sm hover:shadow-xl transition-all duration-300 h-full flex flex-col items-center justify-between">
                        <div class="mb-6">
                            <div class="w-20 h-20 rounded-2xl bg-muted/30 flex items-center justify-center mx-auto mb-6" style="color: <?php echo esc_attr($card['number_color']); ?>">
                                <?php \Elementor\Icons_Manager::render_icon($card['icon'], ['aria-hidden' => 'true', 'class' => 'w-10 h-10']); ?>
                            </div>

                            <div class="text-4xl font-bold mb-2" style="font-family: 'Rajdhani', sans-serif; color: <?php echo esc_attr($card['number_color']); ?>">
                                <?php echo esc_html($card['number']); ?>
                            </div>

                            <div class="text-[10px] uppercase tracking-widest text-muted-foreground font-semibold mb-6">
                                <?php echo esc_html($card['label']); ?>
                            </div>

                            <h3 class="text-xl font-bold mb-4 text-foreground">
                                <?php echo esc_html($card['title']); ?>
                            </h3>

                            <p class="text-sm text-muted-foreground leading-relaxed">
                                <?php echo esc_html($card['description']); ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
}
