<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Philosophy_Section_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_philosophy_section';
    }

    public function get_title() {
        return esc_html__('Allocore Philosophy Section', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-text-area';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Header Content', 'allocore-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'label',
            [
                'label' => esc_html__('Label', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'ÜBER ALLOCORE',
            ]
        );

        $this->add_control(
            'heading_prefix',
            [
                'label' => esc_html__('Heading Prefix (Bold)', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Unsere',
            ]
        );

        $this->add_control(
            'heading_suffix',
            [
                'label' => esc_html__('Heading Suffix', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Philosophie',
            ]
        );

        $this->add_control(
            'quote',
            [
                'label' => esc_html__('Quote', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => '"Mache die Dinge so einfach wie möglich — aber nicht einfacher."',
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => 'Wir sind spezialisiert auf KMUs und Berater...',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'cards_section',
            [
                'label' => esc_html__('Cards', 'allocore-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'card_title',
            [
                'label' => esc_html__('Title', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Betriebswirtschaft',
            ]
        );

        $repeater->add_control(
            'card_subtitle',
            [
                'label' => esc_html__('Subtitle', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Fundierte BWL-Expertise',
            ]
        );

        $repeater->add_control(
            'card_icon',
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
            'cards',
            [
                'label' => esc_html__('Cards', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'card_title' => 'Betriebswirtschaft',
                        'card_subtitle' => 'Fundierte BWL-Expertise',
                    ],
                    [
                        'card_title' => 'SaaS-Expertise',
                        'card_subtitle' => 'Digitale Skalierung',
                    ],
                    [
                        'card_title' => 'Praxiserfahrung',
                        'card_subtitle' => 'Bewährte Methoden',
                    ],
                ],
                'title_field' => '{{{ card_title }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="allocore-philosophy-section text-center">
            <!-- Header -->
            <div class="mb-12">
                <span class="text-xs font-bold tracking-[0.2em] text-[#46B4B4] uppercase mb-4 block">
                    <?php echo esc_html($settings['label']); ?>
                </span>
                <h2 class="text-4xl md:text-5xl mb-8" style="font-family: 'Rajdhani', sans-serif;">
                    <span class="font-bold text-foreground"><?php echo esc_html($settings['heading_prefix']); ?></span>
                    <span class="text-muted-foreground font-medium"><?php echo esc_html($settings['heading_suffix']); ?></span>
                </h2>

                <div class="max-w-3xl mx-auto">
                    <h3 class="text-2xl md:text-3xl italic font-bold text-[#FF8C00] mb-8 leading-tight">
                        <?php echo esc_html($settings['quote']); ?>
                    </h3>
                    <div class="text-muted-foreground leading-relaxed text-lg max-w-2xl mx-auto">
                        <?php echo $settings['description']; ?>
                    </div>
                </div>
            </div>

            <!-- Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-6xl mx-auto mt-16">
                <?php foreach ($settings['cards'] as $card) : ?>
                    <div class="bg-card rounded-[2rem] p-10 border border-border/50 hover:shadow-lg transition-all duration-300">
                        <div class="w-16 h-16 rounded-2xl bg-[#FFE4C4]/30 flex items-center justify-center mx-auto mb-6 text-[#FF8C00]">
                            <?php \Elementor\Icons_Manager::render_icon($card['card_icon'], ['aria-hidden' => 'true', 'class' => 'w-8 h-8']); ?>
                        </div>
                        <h4 class="text-xl font-bold mb-2 text-foreground" style="font-family: 'Rajdhani', sans-serif;">
                            <?php echo esc_html($card['card_title']); ?>
                        </h4>
                        <p class="text-sm text-muted-foreground">
                            <?php echo esc_html($card['card_subtitle']); ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
}
