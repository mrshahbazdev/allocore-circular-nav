<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Services_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_services';
    }

    public function get_title() {
        return esc_html__('Allocore Services', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-gallery-grid';
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
            'section_title',
            [
                'label' => esc_html__('Section Title', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Unsere Leistungen', 'allocore-elements'),
            ]
        );

        $this->add_control(
            'section_heading',
            [
                'label' => esc_html__('Main Heading', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Ganzheitliche Beratung', 'allocore-elements'),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Service Title', 'allocore-elements'),
            ]
        );

        $repeater->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Service Description', 'allocore-elements'),
            ]
        );

        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'focus',
                'options' => [
                    'focus' => 'Focus',
                    'dollar' => 'Finanz (Dollar)',
                    'package' => 'Package',
                    'search' => 'Search',
                    'globe' => 'Globe',
                    'network' => 'Network',
                ],
            ]
        );

        $repeater->add_control(
            'cta_text',
            [
                'label' => esc_html__('CTA Text', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Mehr erfahren', 'allocore-elements'),
            ]
        );

        $repeater->add_control(
            'cta_link',
            [
                'label' => esc_html__('CTA Link', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->add_control(
            'services',
            [
                'label' => esc_html__('Services List', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => 'Kerngeschäft-Fokus',
                        'description' => 'Identifikation und Konzentration auf Ihr profitabelstes Geschäftsfeld mit datenbasierter Analyse',
                        'icon' => 'focus',
                        'cta_text' => 'Focus-Audit buchen',
                    ],
                    [
                        'title' => 'Finanzallokation',
                        'description' => 'Optimale Verteilung von Ressourcen nach dem bewährten Profit-First-Prinzip',
                        'icon' => 'dollar',
                        'cta_text' => 'Mehr erfahren',
                    ],
                    [
                        'title' => 'Angebots-Vereinfachung',
                        'description' => 'StoryBrand-basierte Positionierung für klare und überzeugende Kundenansprache',
                        'icon' => 'package',
                        'cta_text' => 'Angebot prüfen lassen',
                    ],
                    [
                        'title' => 'SEO-Optimierung',
                        'description' => 'Suchmaschinenoptimierung als effizientestes und nachhaltigstes Akquisesystem für organische Sichtbarkeit',
                        'icon' => 'search',
                        'cta_text' => 'SEO-Audit anfragen',
                    ],
                    [
                        'title' => 'Website-Entwicklung',
                        'description' => 'Intent-basierte Website-Struktur für maximale Conversion und optimale Nutzerführung',
                        'icon' => 'globe',
                        'cta_text' => 'Website analysieren',
                    ],
                    [
                        'title' => 'Networking-System',
                        'description' => 'Strukturiertes 2/2/2-System für systematische und effiziente Kundengewinnung',
                        'icon' => 'network',
                        'cta_text' => 'System starten',
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();
    }

    private function get_icon_svg($name) {
        switch ($name) {
            case 'focus':
                return '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M3 7V5a2 2 0 0 1 2-2h2"/><path d="M17 3h2a2 2 0 0 1 2 2v2"/><path d="M21 17v2a2 2 0 0 1-2 2h-2"/><path d="M7 21H5a2 2 0 0 1-2-2v-2"/></svg>';
            case 'dollar':
                return '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" x2="12" y1="2" y2="22"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>';
            case 'package':
                return '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m7.5 4.27 9 5.15"/><path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"/><path d="m3.3 7 8.7 5 8.7-5"/><path d="M12 22v-10"/></svg>';
            case 'search':
                return '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>';
            case 'globe':
                return '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg>';
            case 'network':
                return '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="16" y="16" width="6" height="6" rx="1"/><rect x="2" y="16" width="6" height="6" rx="1"/><rect x="9" y="2" width="6" height="6" rx="1"/><path d="M5 16v-3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3"/><path d="M12 12V8"/></svg>';
            default:
                return '';
        }
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <section id="leistungen" class="py-10 relative overflow-hidden bg-background">
            <div class="absolute inset-0 bg-gradient-to-b from-muted/20 to-background"></div>
            <div class="container relative z-10 mx-auto px-4">
                <div class="text-center mb-20">
                    <p class="text-sm font-bold text-[#0D9BA6] uppercase tracking-wider mb-4" style="font-family: 'Rajdhani', sans-serif;">
                        <?php echo esc_html($settings['section_title']); ?>
                    </p>
                    <h2 class="text-5xl md:text-6xl font-bold mb-6 leading-tight" style="font-family: 'Rajdhani', sans-serif;">
                        <?php echo $settings['section_heading']; ?>
                    </h2>
                    <p class="text-xl text-muted-foreground max-w-2xl mx-auto" style="font-family: 'Work Sans', sans-serif;">
                        Für nachhaltigen Erfolg in allen Unternehmensbereichen
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
                    <?php foreach ($settings['services'] as $index => $service) :
                        $isOrange = $index % 2 === 0;
                        $color = $isOrange ? '#FF8C00' : '#0D9BA6';
                        $bgColor = $isOrange ? '#FF8C0020' : '#0D9BA620';
                    ?>
                    <div class="group bg-card p-8 rounded-2xl border-2 border-border hover:shadow-2xl transition-all duration-300 hover:border-[#FF8C00] relative overflow-hidden">
                        <div class="absolute top-4 right-4 text-6xl font-bold opacity-5" style="font-family: 'Rajdhani', sans-serif;">
                            <?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?>
                        </div>

                        <div class="w-14 h-14 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-md" style="background-color: <?php echo $bgColor; ?>;">
                            <div class="w-7 h-7" style="color: <?php echo $color; ?>;">
                                <?php echo $this->get_icon_svg($service['icon']); ?>
                            </div>
                        </div>

                        <h3 class="text-2xl font-bold mb-4 leading-tight" style="font-family: 'Rajdhani', sans-serif;">
                            <?php echo esc_html($service['title']); ?>
                        </h3>
                        <p class="text-muted-foreground mb-6 leading-relaxed" style="font-family: 'Work Sans', sans-serif;">
                            <?php echo esc_html($service['description']); ?>
                        </p>

                        <a href="<?php echo esc_url($service['cta_link']['url']); ?>" class="text-sm font-bold text-[#FF8C00] group-hover:underline flex items-center group-hover:translate-x-1 transition-transform duration-300 hover:no-underline" style="font-family: 'Rajdhani', sans-serif;">
                            <?php echo esc_html($service['cta_text']); ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2 w-4 h-4"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    }
}
