<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Challenges_Section_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_challenges_section';
    }

    public function get_title() {
        return esc_html__('Allocore Challenges Section', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-alert';
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
                'default' => 'DIE HERAUSFORDERUNG',
            ]
        );

        $this->add_control(
            'heading_start',
            [
                'label' => esc_html__('Heading Start (Bold)', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Kennen Sie diese',
            ]
        );

        $this->add_control(
            'heading_end',
            [
                'label' => esc_html__('Heading End (Light)', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Herausforderungen?',
            ]
        );

        $this->add_control(
            'subheading',
            [
                'label' => esc_html__('Subheading', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Viele erfolgreiche Unternehmen kämpfen mit den gleichen strukturellen Problemen',
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
            'icon',
            [
                'label' => esc_html__('Icon', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'far fa-clock',
                    'library' => 'fa-regular',
                ],
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Verstreute Ressourcen',
            ]
        );

        $repeater->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Zeit und Geld fließen in zu viele Richtungen ohne klaren Fokus.',
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
                        'title' => 'Verstreute Ressourcen',
                        'description' => 'Zeit und Geld fließen in zu viele Richtungen ohne klaren Fokus auf das Wesentliche',
                        'icon' => ['value' => 'far fa-clock', 'library' => 'fa-regular'],
                    ],
                    [
                        'title' => 'Ineffiziente Prozesse',
                        'description' => 'Komplexe Abläufe bremsen das Wachstum und kosten unnötig Energie und Kapital',
                        'icon' => ['value' => 'fas fa-bolt', 'library' => 'fa-solid'],
                    ],
                    [
                        'title' => 'Unklare Positionierung',
                        'description' => 'Zu breites Angebot verwässert die Botschaft und erschwert die Kundengewinnung erheblich',
                        'icon' => ['value' => 'far fa-comment', 'library' => 'fa-regular'],
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
        <div class="allocore-challenges-section text-center">
            <div class="mb-12">
                <span class="text-xs font-bold tracking-[0.1em] text-[#FF8C00] uppercase mb-4 block">
                    <?php echo esc_html($settings['label']); ?>
                </span>
                <h2 class="text-4xl md:text-5xl mb-6 text-foreground" style="font-family: 'Rajdhani', sans-serif;">
                    <span class="font-bold"><?php echo esc_html($settings['heading_start']); ?></span>
                    <span class="text-muted-foreground/60 font-medium"><?php echo esc_html($settings['heading_end']); ?></span>
                </h2>
                <div class="max-w-2xl mx-auto">
                    <p class="text-lg text-muted-foreground">
                        <?php echo esc_html($settings['subheading']); ?>
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <?php foreach ($settings['cards'] as $card) : ?>
                    <div class="bg-[#FFF5F5] rounded-2xl p-8 border border-[#FFEAEA] text-left hover:shadow-lg transition-all duration-300 h-full">
                        <div class="w-14 h-14 rounded-2xl bg-[#FFDADA] flex items-center justify-center mb-6 text-[#DC2626]">
                            <?php \Elementor\Icons_Manager::render_icon($card['icon'], ['aria-hidden' => 'true', 'class' => 'w-7 h-7']); ?>
                        </div>

                        <h3 class="text-xl font-bold mb-4 text-foreground" style="font-family: 'Rajdhani', sans-serif;">
                            <?php echo esc_html($card['title']); ?>
                        </h3>

                        <p class="text-muted-foreground leading-relaxed text-sm">
                            <?php echo esc_html($card['description']); ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
}
