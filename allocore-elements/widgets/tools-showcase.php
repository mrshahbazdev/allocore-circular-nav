<?php
if (!defined('ABSPATH')) {
    exit;
}

class Allocore_Tools_Showcase_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_tools_showcase';
    }

    public function get_title() {
        return esc_html__('Allocore Tools Showcase', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-apps';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section('content_section', [
            'label' => esc_html__('Content', 'allocore-elements'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control('section_badge', [
            'label' => esc_html__('Badge Text', 'allocore-elements'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '14 Premium SaaS Tools',
        ]);

        $this->add_control('section_title', [
            'label' => esc_html__('Section Title', 'allocore-elements'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Das allocore Tool-Ökosystem',
        ]);

        $this->add_control('section_subtitle', [
            'label' => esc_html__('Subtitle', 'allocore-elements'),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'Alle Tools, die Sie brauchen, um Ihr Unternehmen effizient zu führen — von Strategie über Marketing bis Finanzen',
        ]);

        $this->add_control('show_filters', [
            'label' => esc_html__('Show Category Filters', 'allocore-elements'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'yes',
        ]);

        $this->add_control('max_features', [
            'label' => esc_html__('Max Features per Card', 'allocore-elements'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 5,
            'min' => 3,
            'max' => 10,
        ]);

        $this->add_control('detail_page_base', [
            'label' => esc_html__('Detail Page URL Base', 'allocore-elements'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '/tools/',
            'description' => 'Base URL for tool detail pages (e.g. /tools/ → /tools/focusmatrix)',
        ]);

        $this->end_controls_section();

        // Tools Repeater
        $this->start_controls_section('tools_section', [
            'label' => esc_html__('Tools', 'allocore-elements'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $repeater = new \Elementor\Repeater();

        $repeater->add_control('tool_id', [
            'label' => esc_html__('Tool ID (slug)', 'allocore-elements'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'tool-name',
        ]);

        $repeater->add_control('tool_name', [
            'label' => esc_html__('Tool Name', 'allocore-elements'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Tool Name',
        ]);

        $repeater->add_control('tagline', [
            'label' => esc_html__('Tagline', 'allocore-elements'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Tool tagline here',
        ]);

        $repeater->add_control('description', [
            'label' => esc_html__('Description', 'allocore-elements'),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'Tool description here.',
        ]);

        $repeater->add_control('category', [
            'label' => esc_html__('Category', 'allocore-elements'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'business-strategy',
            'options' => [
                'business-strategy' => 'Business & Strategie',
                'sales-marketing' => 'Sales & Marketing',
                'finance-compliance' => 'Finanzen & Compliance',
                'productivity' => 'Produktivität',
            ],
        ]);

        $repeater->add_control('status', [
            'label' => esc_html__('Status', 'allocore-elements'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'live',
            'options' => [
                'live' => 'Live',
                'beta' => 'Beta',
                'coming-soon' => 'Coming Soon',
            ],
        ]);

        $repeater->add_control('icon', [
            'label' => esc_html__('Icon', 'allocore-elements'),
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => ['value' => 'fas fa-cog', 'library' => 'fa-solid'],
        ]);

        $repeater->add_control('features', [
            'label' => esc_html__('Features (one per line)', 'allocore-elements'),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => "Feature 1\nFeature 2\nFeature 3",
        ]);

        $repeater->add_control('tech_stack', [
            'label' => esc_html__('Tech Stack (comma separated)', 'allocore-elements'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Laravel 11, Vue 3, Tailwind CSS',
        ]);

        $this->add_control('tools', [
            'label' => esc_html__('Tools List', 'allocore-elements'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => $this->get_default_tools(),
            'title_field' => '{{{ tool_name }}}',
        ]);

        $this->end_controls_section();

        // Style Section
        $this->start_controls_section('style_section', [
            'label' => esc_html__('Style', 'allocore-elements'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);

        $this->add_control('primary_color', [
            'label' => esc_html__('Primary Color', 'allocore-elements'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#FF8C00',
        ]);

        $this->add_control('secondary_color', [
            'label' => esc_html__('Secondary Color', 'allocore-elements'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#0D9BA6',
        ]);

        $this->end_controls_section();
    }

    private function get_default_tools() {
        return [
            ['tool_id' => 'focusmatrix', 'tool_name' => 'FocusMatrix', 'tagline' => 'Entscheiden statt abarbeiten', 'description' => 'SaaS für Manager, das das Only-You-Prinzip in ein tägliches Betriebssystem verwandelt.', 'category' => 'business-strategy', 'status' => 'live', 'features' => "Triage Inbox mit Entscheidungs-Wizard\nDecision Matrix mit Auto-Kategorisierung\nDelegations-Cockpit mit Anti-Mikromanagement\nWöchentlicher Self-Check mit Focus Score\nAI Co-Pilot für heuristische Vorschläge", 'tech_stack' => 'Laravel 11, Vue 3, Inertia.js'],
            ['tool_id' => 'visionflow', 'tool_name' => 'VisionFlow', 'tagline' => 'Value-to-Mission Operating System', 'description' => 'Enterprise-Plattform für die Co-Creation von Unternehmenswerten.', 'category' => 'business-strategy', 'status' => 'live', 'features' => "Values Workshop mit anonymer Abstimmung\nPrinciples Builder mit Konsens-Tracking\nStrategic Goals Canvas mit Traceability\nVision Co-Creation mit Resonanz-Voting\nMission Generator mit Ownership Assignment", 'tech_stack' => 'Laravel 11, Vue 3, Inertia.js'],
            ['tool_id' => 'innovation-hub', 'tool_name' => 'Innovation Hub', 'tagline' => 'Innovationen systematisch managen', 'description' => 'Dual-Interface-Plattform für die Verwaltung interner Innovations-Workflows.', 'category' => 'business-strategy', 'status' => 'live', 'features' => "Global Team Browser mit Join/Leave\nIdeen-Pipeline mit Team-Zuordnung\nRollenbasierte Bearbeitungsrechte\nFilament Admin Panel für Super Admins\nJetstream Team-Rollen und Permissions", 'tech_stack' => 'Laravel 11, Livewire 3, Filament 3'],
            ['tool_id' => 'ideenpipeline', 'tool_name' => 'IdeenPipeline', 'tagline' => 'Ideen strukturiert entwickeln', 'description' => 'Pipeline-Management für Ideen und Projekte mit strukturiertem Workflow.', 'category' => 'business-strategy', 'status' => 'beta', 'features' => "Ideen-Erfassung und -Bewertung\nProjekt-Pipeline mit Aufgaben\nTeam-Kollaboration\nDomain-Management\nStatus-Tracking und Fortschritt", 'tech_stack' => 'Laravel 11, Livewire 3, Tailwind CSS'],
            ['tool_id' => 'leados', 'tool_name' => 'LeadOS', 'tagline' => 'B2B Lead Generation & AI CRM', 'description' => 'Vollständige B2B-Lead-Generierung mit AI-getriebenem Lead Scoring.', 'category' => 'sales-marketing', 'status' => 'live', 'features' => "AI Lead-Analyse und ICP-Scoring\nAutomatisierte Multi-Step Drip-Kampagnen\nIntelligenter Inbox-Scanner\nVisual Kanban Deal-Pipeline\nChrome Extension für LinkedIn-Leads", 'tech_stack' => 'Laravel 11, Vue 3, Inertia.js'],
            ['tool_id' => 'seostory', 'tool_name' => 'SEOStory', 'tagline' => 'SEO Content Intelligence', 'description' => 'AI-gestützte Content-Strategie und Keyword-Research Plattform.', 'category' => 'sales-marketing', 'status' => 'live', 'features' => "AI Content-Strategie Generator\nKeyword-Research mit Clustering\nContent-Kalender mit Team-Workflow\nSERP-Analyse und Wettbewerber-Tracking\nPerformance-Dashboard mit Rankings", 'tech_stack' => 'Laravel 11, Livewire 3, Alpine.js'],
            ['tool_id' => 'seo-site', 'tool_name' => 'SEO Multi-Tool', 'tagline' => 'Technisches SEO Toolkit', 'description' => 'Umfassendes technisches SEO-Analyse und Monitoring Tool.', 'category' => 'sales-marketing', 'status' => 'live', 'features' => "Site-Audit mit Crawler\nBacklink-Analyse und Monitoring\nRank-Tracking für Keywords\nTechnische SEO-Checks\nCompetitor-Analyse", 'tech_stack' => 'Laravel 11, Vue 3, Tailwind CSS'],
            ['tool_id' => 'clusterforge', 'tool_name' => 'ClusterForge', 'tagline' => 'Keyword Clustering Engine', 'description' => 'Automatisiertes Keyword-Clustering für Content-Strategie.', 'category' => 'sales-marketing', 'status' => 'live', 'features' => "Automatisches Keyword-Clustering\nSERP-basierte Gruppierung\nContent-Gap-Analyse\nExport und Dokumentation\nTeam-basierte Auswertung", 'tech_stack' => 'Laravel 12, Livewire 4, Alpine.js'],
            ['tool_id' => 'financial', 'tool_name' => 'Financial', 'tagline' => 'Profit-First Finanzsteuerung', 'description' => 'Finanzmanagement nach dem Profit-First-Prinzip.', 'category' => 'finance-compliance', 'status' => 'live', 'features' => "Profit-First Kontenmodell\nAutomatische Allokationsberechnung\nCashflow-Prognosen\nFinanzbericht-Generator\nMulti-Mandanten-Fähigkeit", 'tech_stack' => 'Laravel 11, Vue 3, Inertia.js'],
            ['tool_id' => 'invoicemaker', 'tool_name' => 'InvoiceMaker', 'tagline' => 'Rechnungen erstellen & verwalten', 'description' => 'Professionelle Rechnungserstellung mit automatischer Nummerierung.', 'category' => 'finance-compliance', 'status' => 'live', 'features' => "Professionelle PDF-Rechnungen\nAutomatische Rechnungsnummern\nKunden-Verwaltung\nProdukt-/Leistungskatalog\nZahlungs-Tracking", 'tech_stack' => 'Laravel 11, Livewire 3, Tailwind CSS'],
            ['tool_id' => 'compliancetermine', 'tool_name' => 'ComplianceTermine', 'tagline' => 'Compliance-Fristen managen', 'description' => 'Fristenmanagement für regulatorische Compliance-Anforderungen.', 'category' => 'finance-compliance', 'status' => 'live', 'features' => "Fristenkalender mit Erinnerungen\nCompliance-Checklisten\nDokumenten-Management\nAudit-Trail und Protokollierung\nTeam-Zuweisungen", 'tech_stack' => 'Laravel 11, Livewire 3, Alpine.js'],
            ['tool_id' => 'auditpro', 'tool_name' => 'AuditPro', 'tagline' => 'Interne Audits durchführen', 'description' => 'Strukturiertes Audit-Management für interne Prüfungen.', 'category' => 'finance-compliance', 'status' => 'live', 'features' => "Audit-Vorlagen und Checklisten\nFinding-Management\nMaßnahmen-Tracking\nRisiko-Bewertung\nBericht-Generator", 'tech_stack' => 'Laravel 11, Livewire 3, Tailwind CSS'],
            ['tool_id' => 'brainvault', 'tool_name' => 'BrainVault', 'tagline' => 'Wissen intelligent verwalten', 'description' => 'Knowledge-Management mit AI-Summaries und Knowledge Graph.', 'category' => 'productivity', 'status' => 'live', 'features' => "Web-Highlighting mit Chrome Extension\nAI Summaries mit GPT-4\nKnowledge Graph mit D3.js\nTeam-Kollaboration und Sharing\nVolltextsuche über alle Inhalte", 'tech_stack' => 'Laravel 11, Livewire 3, PostgreSQL'],
            ['tool_id' => 'sweetspot', 'tool_name' => 'Sweet-Spot', 'tagline' => 'Den profitabelsten Fokus finden', 'description' => 'Datengetriebene Analyse zur Identifikation des profitabelsten Geschäftsbereichs.', 'category' => 'productivity', 'status' => 'live', 'features' => "Geschäftsfeld-Analyse\nProfitabilitäts-Scoring\nVisualisierung der Ergebnisse\nVergleichsanalysen\nExport und Dokumentation", 'tech_stack' => 'Laravel 12, Livewire 4, Alpine.js'],
        ];
    }

    private function get_category_labels() {
        return [
            'business-strategy' => 'Business & Strategie',
            'sales-marketing' => 'Sales & Marketing',
            'finance-compliance' => 'Finanzen & Compliance',
            'productivity' => 'Produktivität',
        ];
    }

    private function get_category_descriptions() {
        return [
            'business-strategy' => 'Strategische Tools für Unternehmensführung, Vision und Innovation',
            'sales-marketing' => 'Lead-Generierung, SEO-Optimierung und Content-Marketing Tools',
            'finance-compliance' => 'Finanzsteuerung, Rechnungsstellung und Compliance-Management',
            'productivity' => 'Wissensmanagement und Analyse-Tools für mehr Effizienz',
        ];
    }

    private function get_status_badge($status) {
        $badges = [
            'live' => '<span class="allocore-badge allocore-badge--live">Live</span>',
            'beta' => '<span class="allocore-badge allocore-badge--beta">Beta</span>',
            'coming-soon' => '<span class="allocore-badge allocore-badge--soon">Bald</span>',
        ];
        return $badges[$status] ?? '';
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $tools = $settings['tools'];
        $primary = $settings['primary_color'];
        $secondary = $settings['secondary_color'];
        $max_features = intval($settings['max_features']);
        $detail_base = $settings['detail_page_base'];
        $cat_labels = $this->get_category_labels();
        $cat_descs = $this->get_category_descriptions();

        // Group tools by category
        $grouped = [];
        foreach ($tools as $tool) {
            $grouped[$tool['category']][] = $tool;
        }

        $total = count($tools);
        ?>
        <div class="allocore-tools-showcase">
            <!-- Header -->
            <div class="allocore-tools-showcase__header">
                <?php if ($settings['section_badge']) : ?>
                    <div class="allocore-tools-showcase__badge">
                        <svg class="allocore-tools-showcase__badge-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                        <?php echo esc_html($settings['section_badge']); ?>
                    </div>
                <?php endif; ?>
                <h2 class="allocore-tools-showcase__title">
                    <?php
                    $title_parts = explode(' ', $settings['section_title'], -1);
                    $last_word = end(explode(' ', $settings['section_title']));
                    $words = explode(' ', $settings['section_title']);
                    $last = array_pop($words);
                    echo esc_html(implode(' ', $words)) . ' ';
                    ?>
                    <span style="color: <?php echo esc_attr($primary); ?>;"><?php echo esc_html($last); ?></span>
                </h2>
                <p class="allocore-tools-showcase__subtitle"><?php echo esc_html($settings['section_subtitle']); ?></p>
            </div>

            <!-- Filters -->
            <?php if ($settings['show_filters'] === 'yes') : ?>
            <div class="allocore-tools-showcase__filters" id="allocore-tool-filters">
                <button class="allocore-filter-btn allocore-filter-btn--active" data-filter="all" style="--filter-color: <?php echo esc_attr($primary); ?>;">
                    Alle (<?php echo $total; ?>)
                </button>
                <?php foreach ($cat_labels as $cat_id => $cat_label) :
                    $count = isset($grouped[$cat_id]) ? count($grouped[$cat_id]) : 0;
                    if ($count > 0) :
                ?>
                    <button class="allocore-filter-btn" data-filter="<?php echo esc_attr($cat_id); ?>" style="--filter-color: <?php echo esc_attr($primary); ?>;">
                        <?php echo esc_html($cat_label); ?> (<?php echo $count; ?>)
                    </button>
                <?php endif; endforeach; ?>
            </div>
            <?php endif; ?>

            <!-- Tool Categories -->
            <?php foreach ($grouped as $cat_id => $cat_tools) : ?>
            <div class="allocore-tools-category" data-category="<?php echo esc_attr($cat_id); ?>">
                <div class="allocore-tools-category__header">
                    <span class="allocore-tools-category__label" style="color: <?php echo esc_attr($primary); ?>;">
                        <?php echo esc_html(strtoupper($cat_labels[$cat_id] ?? $cat_id)); ?>
                    </span>
                    <p class="allocore-tools-category__desc"><?php echo esc_html($cat_descs[$cat_id] ?? ''); ?></p>
                </div>

                <div class="allocore-tools-grid">
                    <?php foreach ($cat_tools as $tool) :
                        $features = array_filter(explode("\n", $tool['features']));
                        $tech = array_filter(array_map('trim', explode(',', $tool['tech_stack'])));
                        $shown_features = array_slice($features, 0, $max_features);
                        $remaining = count($features) - count($shown_features);
                        $detail_url = rtrim($detail_base, '/') . '/' . $tool['tool_id'];
                    ?>
                    <a href="<?php echo esc_url($detail_url); ?>" class="allocore-tool-card" style="--card-accent: <?php echo esc_attr($primary); ?>;">
                        <div class="allocore-tool-card__header">
                            <div class="allocore-tool-card__icon">
                                <?php \Elementor\Icons_Manager::render_icon($tool['icon'], ['aria-hidden' => 'true']); ?>
                            </div>
                            <?php echo $this->get_status_badge($tool['status']); ?>
                        </div>

                        <h3 class="allocore-tool-card__name"><?php echo esc_html($tool['tool_name']); ?></h3>
                        <p class="allocore-tool-card__tagline" style="color: <?php echo esc_attr($primary); ?>;"><?php echo esc_html($tool['tagline']); ?></p>
                        <p class="allocore-tool-card__desc"><?php echo esc_html($tool['description']); ?></p>

                        <ul class="allocore-tool-card__features">
                            <?php foreach ($shown_features as $feat) : ?>
                                <li>
                                    <svg viewBox="0 0 24 24" fill="none" stroke="<?php echo esc_attr($secondary); ?>" stroke-width="2"><path d="M5 13l4 4L19 7"/></svg>
                                    <?php echo esc_html(trim($feat)); ?>
                                </li>
                            <?php endforeach; ?>
                            <?php if ($remaining > 0) : ?>
                                <li class="allocore-tool-card__more" style="color: <?php echo esc_attr($primary); ?>;">
                                    +<?php echo $remaining; ?> weitere Features →
                                </li>
                            <?php endif; ?>
                        </ul>

                        <div class="allocore-tool-card__footer">
                            <div class="allocore-tool-card__tech">
                                <?php foreach (array_slice($tech, 0, 3) as $t) : ?>
                                    <span><?php echo esc_html($t); ?></span>
                                <?php endforeach; ?>
                            </div>
                            <span class="allocore-tool-card__link" style="color: <?php echo esc_attr($primary); ?>;">Details →</span>
                        </div>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endforeach; ?>

            <!-- Bottom CTA -->
            <div class="allocore-tools-showcase__cta">
                <div class="allocore-tools-showcase__cta-badge">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    Sparen Sie mit unseren Bundles
                </div>
                <h3 class="allocore-tools-showcase__cta-title">Alle Tools. <span style="color: <?php echo esc_attr($primary); ?>;">Ein Preis.</span></h3>
                <p class="allocore-tools-showcase__cta-subtitle">Wählen Sie das Bundle, das zu Ihrem Unternehmen passt</p>
                <div class="allocore-tools-showcase__cta-buttons">
                    <a href="/pricing" class="allocore-btn allocore-btn--primary" style="background-color: <?php echo esc_attr($primary); ?>;">Preise ansehen →</a>
                    <a href="/" class="allocore-btn allocore-btn--outline">Zur Startseite</a>
                </div>
            </div>
        </div>
        <?php
    }
}
