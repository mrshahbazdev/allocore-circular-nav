<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Success_Stories_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_success_stories';
    }

    public function get_title() {
        return esc_html__('Allocore Success Stories', 'allocore-elements');
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
                'label' => esc_html__('Header Content', 'allocore-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'label',
            [
                'label' => esc_html__('Label', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'ERFOLGSGESCHICHTEN',
            ]
        );

        $this->add_control(
            'heading_start',
            [
                'label' => esc_html__('Heading Start', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Unternehmen, die mit',
            ]
        );

        $this->add_control(
            'heading_highlight',
            [
                'label' => esc_html__('Heading Highlight', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'allocore',
            ]
        );

        $this->add_control(
            'heading_end',
            [
                'label' => esc_html__('Heading End', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'gewachsen sind',
            ]
        );

        $this->add_control(
            'subheading',
            [
                'label' => esc_html__('Subheading', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Echte Ergebnisse von echten Kunden',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'cards_section',
            [
                'label' => esc_html__('Stories Cards', 'allocore-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'border_color',
            [
                'label' => esc_html__('Accent Color', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#FF8C00',
            ]
        );

        $repeater->add_control(
            'stat_number',
            [
                'label' => esc_html__('Stat Number', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '+150%',
            ]
        );

        $repeater->add_control(
            'stat_label',
            [
                'label' => esc_html__('Stat Label', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Umsatzsteigerung',
            ]
        );

        $repeater->add_control(
            'stat_subtext',
            [
                'label' => esc_html__('Stat Subtext', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'in 12 Monaten',
            ]
        );

        $repeater->add_control(
            'company_name',
            [
                'label' => esc_html__('Company Name', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'TechStart GmbH',
            ]
        );

        $repeater->add_control(
            'quote',
            [
                'label' => esc_html__('Quote', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => '"Die allocore-Methode hat uns geholfen..."',
            ]
        );

        $repeater->add_control(
            'author_name',
            [
                'label' => esc_html__('Author Name', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Michael Schmidt',
            ]
        );

        $repeater->add_control(
            'author_role',
            [
                'label' => esc_html__('Author Role', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Geschäftsführer',
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
                        'stat_number' => '+150%',
                        'stat_label' => 'Umsatzsteigerung',
                        'stat_subtext' => 'in 12 Monaten',
                        'company_name' => 'TechStart GmbH',
                        'border_color' => '#FF8C00',
                    ],
                    [
                        'stat_number' => '40%',
                        'stat_label' => 'Kostenreduktion',
                        'stat_subtext' => 'im ersten Quartal',
                        'company_name' => 'Handwerk Plus',
                        'border_color' => '#46B4B4',
                    ],
                    [
                        'stat_number' => '3x',
                        'stat_label' => 'mehr Leads',
                        'stat_subtext' => 'durch SEO-Optimierung',
                        'company_name' => 'Digital Solutions AG',
                        'border_color' => '#FF8C00',
                    ],
                ],
                'title_field' => '{{{ company_name }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="allocore-success-stories">
            <div class="text-center mb-12">
                <span class="text-xs font-bold tracking-[0.2em] text-[#FF8C00] uppercase mb-4 block">
                    <?php echo esc_html($settings['label']); ?>
                </span>
                <h2 class="text-3xl md:text-5xl mb-4 font-bold" style="font-family: 'Rajdhani', sans-serif;">
                    <span class="text-foreground"><?php echo esc_html($settings['heading_start']); ?></span>
                    <span class="text-[#FF8C00]"><?php echo esc_html($settings['heading_highlight']); ?></span>
                    <span class="text-foreground"><?php echo esc_html($settings['heading_end']); ?></span>
                </h2>
                <p class="text-lg text-muted-foreground">
                    <?php echo esc_html($settings['subheading']); ?>
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-7xl mx-auto">
                <?php foreach ($settings['cards'] as $card) : ?>
                    <div class="bg-card rounded-2xl p-8 border border-border shadow-sm hover:shadow-lg transition-all duration-300 relative overflow-hidden h-full flex flex-col justify-between">
                        <!-- Colored Left Border/Bar -->
                        <div class="absolute left-0 top-0 bottom-0 w-2 rounded-l-2xl" style="background-color: <?php echo esc_attr($card['border_color']); ?>;"></div>

                        <div class="pl-4">
                            <div class="mb-6">
                                <div class="flex items-baseline gap-2 mb-1">
                                    <span class="text-4xl font-bold" style="font-family: 'Rajdhani', sans-serif; color: <?php echo esc_attr($card['border_color']); ?>">
                                        <?php echo esc_html($card['stat_number']); ?>
                                    </span>
                                    <span class="text-sm font-semibold text-muted-foreground">
                                        <?php echo esc_html($card['stat_label']); ?>
                                    </span>
                                </div>
                                <div class="text-xs text-muted-foreground/80 mb-6">
                                    <?php echo esc_html($card['stat_subtext']); ?>
                                </div>

                                <h4 class="text-xl font-bold mb-4 text-foreground">
                                    <?php echo esc_html($card['company_name']); ?>
                                </h4>

                                <blockquote class="text-muted-foreground italic mb-6 leading-relaxed">
                                    "<?php echo esc_html($card['quote']); ?>"
                                </blockquote>
                            </div>

                            <div class="border-t border-border pt-4 mt-auto">
                                <div class="font-bold text-foreground"><?php echo esc_html($card['author_name']); ?></div>
                                <div class="text-xs text-muted-foreground uppercase tracking-wider"><?php echo esc_html($card['author_role']); ?></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
}
