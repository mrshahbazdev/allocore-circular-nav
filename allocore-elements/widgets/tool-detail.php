<?php
if (!defined('ABSPATH')) {
    exit;
}

class Allocore_Tool_Detail_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_tool_detail';
    }

    public function get_title() {
        return esc_html__('Allocore Tool Detail', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-single-post';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        // Hero Section
        $this->start_controls_section('hero_section', [
            'label' => esc_html__('Hero', 'allocore-elements'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control('tool_name', [
            'label' => 'Tool Name',
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'FocusMatrix',
        ]);

        $this->add_control('tagline', [
            'label' => 'Tagline',
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Entscheiden statt abarbeiten',
        ]);

        $this->add_control('long_description', [
            'label' => 'Long Description',
            'type' => \Elementor\Controls_Manager::WYSIWYG,
            'default' => 'Detailed description of the tool...',
        ]);

        $this->add_control('status', [
            'label' => 'Status',
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'live',
            'options' => ['live' => 'Live', 'beta' => 'Beta', 'coming-soon' => 'Coming Soon'],
        ]);

        $this->add_control('icon', [
            'label' => 'Icon',
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => ['value' => 'fas fa-crosshairs', 'library' => 'fa-solid'],
        ]);

        $this->add_control('highlights', [
            'label' => 'Highlights (one per line)',
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => "8 vollständige Module\nAI-Ready (OpenAI Drop-in)\nJetstream Teams + 2FA\nBilingual DE/EN",
        ]);

        $this->add_control('back_link', [
            'label' => 'Back Link URL',
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '/tools',
        ]);

        $this->end_controls_section();

        // Features Section
        $this->start_controls_section('features_section', [
            'label' => esc_html__('Features', 'allocore-elements'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control('features', [
            'label' => 'Features (one per line)',
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => "Triage Inbox mit Entscheidungs-Wizard\nDecision Matrix mit Auto-Kategorisierung\nDelegations-Cockpit mit Anti-Mikromanagement\nWöchentlicher Self-Check mit Focus Score\nAI Co-Pilot für heuristische Vorschläge\nOrganisations-Check für Team-Klarheit\nGuiding Principle Widget (Always-Visible)\nBilingual: Deutsch & Englisch",
        ]);

        $this->end_controls_section();

        // Modules Section
        $this->start_controls_section('modules_section', [
            'label' => esc_html__('Modules', 'allocore-elements'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $mod_repeater = new \Elementor\Repeater();
        $mod_repeater->add_control('module_name', [
            'label' => 'Module Name',
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Module Name',
        ]);
        $mod_repeater->add_control('module_desc', [
            'label' => 'Description',
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'Module description.',
        ]);

        $this->add_control('modules', [
            'label' => 'Modules',
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $mod_repeater->get_controls(),
            'default' => [
                ['module_name' => 'Principle Dashboard', 'module_desc' => 'Focus Score, wöchentliche Statistiken, Self-Check-Streak und Leitprinzip auf einen Blick'],
                ['module_name' => 'Triage Inbox', 'module_desc' => 'Schnelle Aufgabenerfassung mit dem \'Kann nur ich das?\'-Wizard für sofortige Kategorisierung'],
                ['module_name' => 'Decision Matrix', 'module_desc' => 'Auto-Kategorisierung in die vier Only-You-Kategorien für klare Priorisierung'],
                ['module_name' => 'Delegations-Cockpit', 'module_desc' => 'Ziel, Rahmen, Deadline, Entscheidungsspielraum, Ressourcen — mit Anti-Mikromanagement-Schutz'],
                ['module_name' => 'Drop/Omit Lever', 'module_desc' => 'Aufgaben, Meetings und Reports mutig eliminieren — mit strukturierter Checkliste'],
                ['module_name' => 'Weekly Self-Check', 'module_desc' => 'Freitags-Ritual mit 4 Reflexionsfragen und Focus Score Berechnung'],
            ],
            'title_field' => '{{{ module_name }}}',
        ]);

        $this->end_controls_section();

        // Workflow Section
        $this->start_controls_section('workflow_section', [
            'label' => esc_html__('How It Works', 'allocore-elements'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control('workflow_steps', [
            'label' => 'Steps (one per line)',
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => "Aufgabe in die Triage Inbox eingeben\nOnly-You-Wizard beantwortet: 'Kann nur ich das tun?'\nAutomatische Kategorisierung: Keep, Delegate, Drop\nDelegierte Aufgaben erhalten Rahmen im Cockpit\nWöchentlicher Self-Check misst Ihren Focus Score\nPrinciple Dashboard zeigt Gesamtbild",
        ]);

        $this->end_controls_section();

        // Use Cases Section
        $this->start_controls_section('usecases_section', [
            'label' => esc_html__('Use Cases', 'allocore-elements'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control('use_cases', [
            'label' => 'Use Cases (one per line)',
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => "Geschäftsführer, die ihre Aufgabenlast reduzieren wollen\nTeamleiter, die effektiver delegieren möchten\nManager, die von operativer zu strategischer Arbeit wechseln\nUnternehmer, die sich auf Kernaufgaben fokussieren wollen",
        ]);

        $this->end_controls_section();

        // Tech Stack Section
        $this->start_controls_section('tech_section', [
            'label' => esc_html__('Tech Stack', 'allocore-elements'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control('tech_stack', [
            'label' => 'Tech Stack (comma separated)',
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Laravel 11, Vue 3, Inertia.js, Tailwind CSS, Jetstream',
        ]);

        $this->end_controls_section();

        // Related Tools
        $this->start_controls_section('related_section', [
            'label' => esc_html__('Related Tools', 'allocore-elements'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control('category_label', [
            'label' => 'Category Label',
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Business & Strategie',
        ]);

        $rel_repeater = new \Elementor\Repeater();
        $rel_repeater->add_control('rel_name', ['label' => 'Name', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Related Tool']);
        $rel_repeater->add_control('rel_tagline', ['label' => 'Tagline', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Tagline']);
        $rel_repeater->add_control('rel_desc', ['label' => 'Description', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Description']);
        $rel_repeater->add_control('rel_link', ['label' => 'Link', 'type' => \Elementor\Controls_Manager::URL, 'default' => ['url' => '#']]);
        $rel_repeater->add_control('rel_icon', ['label' => 'Icon', 'type' => \Elementor\Controls_Manager::ICONS, 'default' => ['value' => 'fas fa-cog', 'library' => 'fa-solid']]);

        $this->add_control('related_tools', [
            'label' => 'Related Tools',
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $rel_repeater->get_controls(),
            'default' => [],
            'title_field' => '{{{ rel_name }}}',
        ]);

        $this->end_controls_section();

        // Style Section
        $this->start_controls_section('style_section', [
            'label' => esc_html__('Style', 'allocore-elements'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);

        $this->add_control('primary_color', [
            'label' => 'Primary Color',
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#FF8C00',
        ]);

        $this->add_control('secondary_color', [
            'label' => 'Secondary Color',
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#0D9BA6',
        ]);

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        $primary = $s['primary_color'];
        $secondary = $s['secondary_color'];
        $features = array_filter(explode("\n", $s['features']));
        $highlights = array_filter(explode("\n", $s['highlights']));
        $steps = array_filter(explode("\n", $s['workflow_steps']));
        $use_cases = array_filter(explode("\n", $s['use_cases']));
        $tech = array_filter(array_map('trim', explode(',', $s['tech_stack'])));
        $status_badges = ['live' => 'Live', 'beta' => 'Beta', 'coming-soon' => 'Bald'];
        $status_class = 'allocore-badge--' . str_replace('coming-', '', $s['status']);
        ?>
        <div class="allocore-tool-detail">
            <!-- Back Link -->
            <a href="<?php echo esc_url($s['back_link']); ?>" class="allocore-tool-detail__back">← Alle Tools</a>

            <!-- Hero -->
            <div class="allocore-tool-detail__hero">
                <div class="allocore-tool-detail__hero-icon" style="background: <?php echo esc_attr($primary); ?>15;">
                    <?php \Elementor\Icons_Manager::render_icon($s['icon'], ['aria-hidden' => 'true', 'style' => 'color:' . $primary . ';font-size:2rem;']); ?>
                </div>
                <div class="allocore-tool-detail__hero-content">
                    <div class="allocore-tool-detail__hero-title-row">
                        <h1><?php echo esc_html($s['tool_name']); ?></h1>
                        <span class="allocore-badge <?php echo esc_attr($status_class); ?>"><?php echo esc_html($status_badges[$s['status']] ?? 'Live'); ?></span>
                    </div>
                    <p class="allocore-tool-detail__tagline" style="color: <?php echo esc_attr($primary); ?>;"><?php echo esc_html($s['tagline']); ?></p>
                </div>
            </div>

            <!-- Description -->
            <div class="allocore-tool-detail__description"><?php echo wp_kses_post($s['long_description']); ?></div>

            <!-- Highlights -->
            <?php if (!empty($highlights)) : ?>
            <div class="allocore-tool-detail__highlights">
                <?php foreach ($highlights as $h) : ?>
                    <span class="allocore-highlight-pill" style="border-color: <?php echo esc_attr($primary); ?>30; color: <?php echo esc_attr($primary); ?>;">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <?php echo esc_html(trim($h)); ?>
                    </span>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <!-- CTA -->
            <a href="/pricing" class="allocore-btn allocore-btn--primary" style="background-color: <?php echo esc_attr($primary); ?>;">Im Bundle kaufen →</a>

            <!-- Features -->
            <?php if (!empty($features)) : ?>
            <div class="allocore-tool-detail__section">
                <span class="allocore-section-label" style="color: <?php echo esc_attr($primary); ?>;">FEATURES</span>
                <h2>Was <?php echo esc_html($s['tool_name']); ?> <span style="color: <?php echo esc_attr($primary); ?>;">kann</span></h2>
                <div class="allocore-features-grid">
                    <?php foreach ($features as $feat) : ?>
                        <div class="allocore-feature-item">
                            <svg viewBox="0 0 24 24" fill="none" stroke="<?php echo esc_attr($secondary); ?>" stroke-width="2.5" width="20" height="20"><path d="M5 13l4 4L19 7"/></svg>
                            <?php echo esc_html(trim($feat)); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- Modules -->
            <?php if (!empty($s['modules'])) : ?>
            <div class="allocore-tool-detail__section">
                <div class="allocore-section-badge" style="background: <?php echo esc_attr($secondary); ?>15; color: <?php echo esc_attr($secondary); ?>;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                    <?php echo count($s['modules']); ?> Module
                </div>
                <h2>Module & <span style="color: <?php echo esc_attr($primary); ?>;">Komponenten</span></h2>
                <div class="allocore-modules-grid">
                    <?php foreach ($s['modules'] as $i => $mod) : ?>
                        <div class="allocore-module-card">
                            <span class="allocore-module-num" style="color: <?php echo esc_attr($primary); ?>;"><?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?></span>
                            <h4><?php echo esc_html($mod['module_name']); ?></h4>
                            <p><?php echo esc_html($mod['module_desc']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- Workflow -->
            <?php if (!empty($steps)) : ?>
            <div class="allocore-tool-detail__section">
                <div class="allocore-section-badge" style="background: <?php echo esc_attr($primary); ?>15; color: <?php echo esc_attr($primary); ?>;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><path d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z"/></svg>
                    Workflow
                </div>
                <h2>So funktioniert's</h2>
                <div class="allocore-workflow-steps">
                    <?php foreach ($steps as $i => $step) : ?>
                        <div class="allocore-workflow-step">
                            <span class="allocore-workflow-num" style="background: <?php echo esc_attr($primary); ?>;"><?php echo $i + 1; ?></span>
                            <span class="allocore-workflow-text"><?php echo esc_html(trim($step)); ?></span>
                        </div>
                        <?php if ($i < count($steps) - 1) : ?>
                            <div class="allocore-workflow-connector" style="border-color: <?php echo esc_attr($primary); ?>30;"></div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- Use Cases -->
            <?php if (!empty($use_cases)) : ?>
            <div class="allocore-tool-detail__section">
                <div class="allocore-section-badge" style="background: <?php echo esc_attr($secondary); ?>15; color: <?php echo esc_attr($secondary); ?>;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    Anwendungsfälle
                </div>
                <h2>Perfekt für</h2>
                <div class="allocore-usecases-grid">
                    <?php foreach ($use_cases as $uc) : ?>
                        <div class="allocore-usecase-item">
                            <svg viewBox="0 0 24 24" fill="none" stroke="<?php echo esc_attr($secondary); ?>" stroke-width="2.5" width="22" height="22"><path d="M5 13l4 4L19 7"/></svg>
                            <span><?php echo esc_html(trim($uc)); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- Tech Stack -->
            <?php if (!empty($tech)) : ?>
            <div class="allocore-tool-detail__section">
                <div class="allocore-section-badge" style="background: <?php echo esc_attr($secondary); ?>15; color: <?php echo esc_attr($secondary); ?>;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                    Technologie
                </div>
                <h2>Tech Stack</h2>
                <div class="allocore-tech-pills">
                    <?php foreach ($tech as $t) : ?>
                        <span class="allocore-tech-pill"><?php echo esc_html(trim($t)); ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- Related Tools -->
            <?php if (!empty($s['related_tools'])) : ?>
            <div class="allocore-tool-detail__section">
                <span class="allocore-section-label" style="color: <?php echo esc_attr($primary); ?>;"><?php echo esc_html(strtoupper($s['category_label'])); ?></span>
                <h2>Weitere Tools</h2>
                <div class="allocore-related-grid">
                    <?php foreach ($s['related_tools'] as $rel) : ?>
                        <a href="<?php echo esc_url($rel['rel_link']['url']); ?>" class="allocore-related-card">
                            <div class="allocore-related-card__header">
                                <div class="allocore-related-card__icon">
                                    <?php \Elementor\Icons_Manager::render_icon($rel['rel_icon'], ['aria-hidden' => 'true']); ?>
                                </div>
                                <div>
                                    <h4><?php echo esc_html($rel['rel_name']); ?></h4>
                                    <span style="color: <?php echo esc_attr($primary); ?>; font-size: 0.8rem;"><?php echo esc_html($rel['rel_tagline']); ?></span>
                                </div>
                            </div>
                            <p><?php echo esc_html($rel['rel_desc']); ?></p>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- Bottom CTA -->
            <div class="allocore-tool-detail__bottom-cta">
                <h2><?php echo esc_html($s['tool_name']); ?> <span style="color: <?php echo esc_attr($primary); ?>;">jetzt nutzen</span></h2>
                <p>Verfügbar in unseren Bundles — 14 Tage kostenlos testen</p>
                <div class="allocore-tool-detail__cta-buttons">
                    <a href="/pricing" class="allocore-btn allocore-btn--primary" style="background-color: <?php echo esc_attr($primary); ?>;">Bundles ansehen →</a>
                    <a href="/tools" class="allocore-btn allocore-btn--outline">Alle Tools ansehen</a>
                </div>
            </div>
        </div>
        <?php
    }
}
