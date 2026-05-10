<?php
if (!defined('ABSPATH')) {
    exit;
}

class Allocore_Pricing_Bundles_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_pricing_bundles';
    }

    public function get_title() {
        return esc_html__('Allocore Pricing Bundles', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-price-list';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        // Header
        $this->start_controls_section('header_section', [
            'label' => esc_html__('Header', 'allocore-elements'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control('badge_text', [
            'label' => 'Badge',
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Transparente Preise',
        ]);

        $this->add_control('title', [
            'label' => 'Title',
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Wählen Sie Ihr Bundle',
        ]);

        $this->add_control('subtitle', [
            'label' => 'Subtitle',
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'Alle allocore Tools in einem Paket — sparen Sie bis zu 60% gegenüber Einzellizenzen',
        ]);

        $this->end_controls_section();

        // Bundles Repeater
        $this->start_controls_section('bundles_section', [
            'label' => esc_html__('Bundles', 'allocore-elements'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $bundle_rep = new \Elementor\Repeater();

        $bundle_rep->add_control('bundle_name', ['label' => 'Name', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Starter']);
        $bundle_rep->add_control('bundle_subtitle', ['label' => 'Subtitle', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Perfekt zum Einstieg']);
        $bundle_rep->add_control('bundle_desc', ['label' => 'Description', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Die wichtigsten Tools für kleine Unternehmen.']);
        $bundle_rep->add_control('price', ['label' => 'Price', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '€499']);
        $bundle_rep->add_control('period', ['label' => 'Period', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'pro Monat / bis 5 Nutzer']);
        $bundle_rep->add_control('is_featured', ['label' => 'Featured?', 'type' => \Elementor\Controls_Manager::SWITCHER, 'default' => '']);
        $bundle_rep->add_control('featured_label', ['label' => 'Featured Label', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Meistverkauft']);
        $bundle_rep->add_control('tools_label', ['label' => 'Tools Label', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '5 TOOLS INKLUSIVE']);
        $bundle_rep->add_control('tools_list', ['label' => 'Tools (one per line)', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => "FocusMatrix\nSweet-Spot\nInvoiceMaker\nFinancial\nBrainVault"]);
        $bundle_rep->add_control('button_text', ['label' => 'Button Text', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Bundle wählen']);
        $bundle_rep->add_control('button_link', ['label' => 'Button Link', 'type' => \Elementor\Controls_Manager::URL, 'default' => ['url' => '#']]);
        $bundle_rep->add_control('icon', ['label' => 'Icon', 'type' => \Elementor\Controls_Manager::ICONS, 'default' => ['value' => 'fas fa-bolt', 'library' => 'fa-solid']]);

        $this->add_control('bundles', [
            'label' => 'Bundles',
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $bundle_rep->get_controls(),
            'default' => [
                ['bundle_name' => 'Starter', 'bundle_subtitle' => 'Perfekt zum Einstieg', 'bundle_desc' => 'Die wichtigsten Tools für kleine Unternehmen und Solopreneure, die ihre Effizienz steigern wollen.', 'price' => '€499', 'period' => 'pro Monat / bis 5 Nutzer', 'is_featured' => '', 'tools_label' => '5 TOOLS INKLUSIVE', 'tools_list' => "FocusMatrix\nSweet-Spot\nInvoiceMaker\nFinancial\nBrainVault", 'button_text' => 'Bundle wählen'],
                ['bundle_name' => 'Professional', 'bundle_subtitle' => 'Meistverkauft', 'bundle_desc' => 'Das komplette Paket für wachsende Unternehmen mit SEO, Leads und vollständigem Business-Management.', 'price' => '€999', 'period' => 'pro Monat / bis 25 Nutzer', 'is_featured' => 'yes', 'featured_label' => 'Meistverkauft', 'tools_label' => '10 TOOLS INKLUSIVE', 'tools_list' => "FocusMatrix\nVisionFlow\nLeadOS\nSEOStory\nClusterForge\nFinancial\nInvoiceMaker\nAuditPro\nBrainVault\nSweet-Spot", 'button_text' => 'Bundle wählen'],
                ['bundle_name' => 'Enterprise', 'bundle_subtitle' => 'Alles inklusive', 'bundle_desc' => 'Alle 14 Tools mit Enterprise-Features, dediziertem Support und maßgeschneiderter Integration.', 'price' => '€2.499', 'period' => 'pro Monat / unbegrenzte Nutzer', 'is_featured' => '', 'tools_label' => '14 TOOLS INKLUSIVE', 'tools_list' => "FocusMatrix\nVisionFlow\nInnovation Hub\nIdeenPipeline\nLeadOS\nSEOStory\nSEO Multi-Tool\nClusterForge\nFinancial\nInvoiceMaker\nComplianceTermine\nAuditPro\nBrainVault\nSweet-Spot", 'button_text' => 'Bundle wählen'],
            ],
            'title_field' => '{{{ bundle_name }}}',
        ]);

        $this->end_controls_section();

        // Comparison Table
        $this->start_controls_section('comparison_section', [
            'label' => esc_html__('Comparison Table', 'allocore-elements'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control('show_comparison', [
            'label' => 'Show Comparison Table',
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'yes',
        ]);

        $this->add_control('comparison_title', [
            'label' => 'Table Title',
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Bundle-Vergleich',
        ]);

        $this->end_controls_section();

        // FAQ
        $this->start_controls_section('faq_section', [
            'label' => esc_html__('FAQ', 'allocore-elements'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $faq_rep = new \Elementor\Repeater();
        $faq_rep->add_control('question', ['label' => 'Question', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'FAQ Question']);
        $faq_rep->add_control('answer', ['label' => 'Answer', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'FAQ Answer']);

        $this->add_control('faqs', [
            'label' => 'FAQs',
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $faq_rep->get_controls(),
            'default' => [
                ['question' => 'Kann ich zwischen Bundles wechseln?', 'answer' => 'Ja, Sie können jederzeit upgraden oder downgraden. Die Differenz wird anteilig berechnet.'],
                ['question' => 'Gibt es eine kostenlose Testphase?', 'answer' => 'Ja, alle Bundles können 14 Tage kostenlos getestet werden. Keine Kreditkarte erforderlich.'],
                ['question' => 'Wie funktioniert die Nutzer-Verwaltung?', 'answer' => 'Jedes Bundle enthält eine bestimmte Anzahl an Nutzern. Zusätzliche Nutzer können jederzeit hinzugebucht werden.'],
                ['question' => 'Sind Updates inklusive?', 'answer' => 'Ja, alle Updates und neue Features sind in jedem Bundle inklusive. Enterprise-Kunden erhalten zusätzlich früheren Zugang zu neuen Tools.'],
            ],
            'title_field' => '{{{ question }}}',
        ]);

        $this->end_controls_section();

        // Style
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

        // Build a list of all tools across bundles for comparison table
        $all_tools = [];
        foreach ($s['bundles'] as $bundle) {
            $tools = array_filter(explode("\n", $bundle['tools_list']));
            foreach ($tools as $t) {
                $all_tools[trim($t)] = true;
            }
        }
        $all_tool_names = array_keys($all_tools);
        ?>
        <div class="allocore-pricing">
            <!-- Header -->
            <div class="allocore-pricing__header">
                <?php if ($s['badge_text']) : ?>
                    <div class="allocore-pricing__badge" style="background: <?php echo esc_attr($primary); ?>15; color: <?php echo esc_attr($primary); ?>;">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <?php echo esc_html($s['badge_text']); ?>
                    </div>
                <?php endif; ?>
                <?php
                $words = explode(' ', $s['title']);
                $last = array_pop($words);
                ?>
                <h2 class="allocore-pricing__title"><?php echo esc_html(implode(' ', $words)); ?> <span style="color: <?php echo esc_attr($primary); ?>;"><?php echo esc_html($last); ?></span></h2>
                <p class="allocore-pricing__subtitle"><?php echo esc_html($s['subtitle']); ?></p>
            </div>

            <!-- Bundle Cards -->
            <div class="allocore-pricing__grid">
                <?php foreach ($s['bundles'] as $bundle) :
                    $is_featured = $bundle['is_featured'] === 'yes';
                    $tools = array_filter(explode("\n", $bundle['tools_list']));
                ?>
                <div class="allocore-bundle-card<?php echo $is_featured ? ' allocore-bundle-card--featured' : ''; ?>" style="<?php echo $is_featured ? 'border-color:' . esc_attr($primary) . ';' : ''; ?>">
                    <?php if ($is_featured && $bundle['featured_label']) : ?>
                        <div class="allocore-bundle-card__badge" style="background: <?php echo esc_attr($primary); ?>;"><?php echo esc_html($bundle['featured_label']); ?></div>
                    <?php endif; ?>

                    <div class="allocore-bundle-card__icon">
                        <?php \Elementor\Icons_Manager::render_icon($bundle['icon'], ['aria-hidden' => 'true']); ?>
                    </div>

                    <h3 class="allocore-bundle-card__name"><?php echo esc_html($bundle['bundle_name']); ?></h3>
                    <p class="allocore-bundle-card__subtitle" style="color: <?php echo esc_attr($primary); ?>;"><?php echo esc_html($bundle['bundle_subtitle']); ?></p>
                    <p class="allocore-bundle-card__desc"><?php echo esc_html($bundle['bundle_desc']); ?></p>

                    <div class="allocore-bundle-card__price" style="color: <?php echo esc_attr($primary); ?>;"><?php echo esc_html($bundle['price']); ?></div>
                    <p class="allocore-bundle-card__period"><?php echo esc_html($bundle['period']); ?></p>

                    <hr class="allocore-bundle-card__divider">

                    <div class="allocore-bundle-card__tools-label" style="color: <?php echo esc_attr($primary); ?>;"><?php echo esc_html($bundle['tools_label']); ?></div>
                    <ul class="allocore-bundle-card__tools-list">
                        <?php foreach ($tools as $t) : ?>
                            <li>
                                <svg viewBox="0 0 24 24" fill="none" stroke="<?php echo esc_attr($secondary); ?>" stroke-width="2" width="16" height="16"><path d="M5 13l4 4L19 7"/></svg>
                                <?php echo esc_html(trim($t)); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <a href="<?php echo esc_url($bundle['button_link']['url'] ?? '#'); ?>" class="allocore-btn <?php echo $is_featured ? 'allocore-btn--primary' : 'allocore-btn--outline'; ?>" style="<?php echo $is_featured ? 'background-color:' . esc_attr($primary) . ';' : ''; ?>">
                        <?php echo esc_html($bundle['button_text']); ?> →
                    </a>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Comparison Table -->
            <?php if ($s['show_comparison'] === 'yes' && !empty($all_tool_names)) : ?>
            <div class="allocore-pricing__comparison">
                <?php
                $comp_words = explode(' ', $s['comparison_title']);
                $comp_last = array_pop($comp_words);
                ?>
                <h3>
                    <?php echo esc_html(implode(' ', $comp_words)); ?>
                    <span style="color: <?php echo esc_attr($primary); ?>;"><?php echo esc_html($comp_last); ?></span>
                </h3>
                <p class="allocore-pricing__comparison-sub">Welche Tools sind in welchem Bundle enthalten?</p>

                <table class="allocore-comparison-table">
                    <thead>
                        <tr>
                            <th>Tool</th>
                            <?php foreach ($s['bundles'] as $bundle) : ?>
                                <th style="color: <?php echo esc_attr($primary); ?>;"><?php echo esc_html($bundle['bundle_name']); ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($all_tool_names as $tool_name) : ?>
                        <tr>
                            <td><?php echo esc_html($tool_name); ?></td>
                            <?php foreach ($s['bundles'] as $bundle) :
                                $bundle_tools = array_map('trim', explode("\n", $bundle['tools_list']));
                                $has = in_array($tool_name, $bundle_tools);
                            ?>
                            <td>
                                <?php if ($has) : ?>
                                    <svg viewBox="0 0 24 24" fill="none" stroke="<?php echo esc_attr($secondary); ?>" stroke-width="2.5" width="20" height="20"><path d="M5 13l4 4L19 7"/></svg>
                                <?php else : ?>
                                    <span class="allocore-comparison-dash">—</span>
                                <?php endif; ?>
                            </td>
                            <?php endforeach; ?>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php endif; ?>

            <!-- FAQ -->
            <?php if (!empty($s['faqs'])) : ?>
            <div class="allocore-pricing__faq">
                <h3>Häufige <span style="color: <?php echo esc_attr($primary); ?>;">Fragen</span></h3>
                <div class="allocore-faq-list">
                    <?php foreach ($s['faqs'] as $faq) : ?>
                        <div class="allocore-faq-item">
                            <h4><?php echo esc_html($faq['question']); ?></h4>
                            <p><?php echo esc_html($faq['answer']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- Bottom CTA -->
            <div class="allocore-pricing__bottom-cta">
                <h3>Bereit zu <span style="color: <?php echo esc_attr($primary); ?>;">starten?</span></h3>
                <p>14 Tage kostenlos testen — keine Kreditkarte nötig</p>
                <div class="allocore-pricing__cta-buttons">
                    <a href="/tools" class="allocore-btn allocore-btn--outline">Alle Tools ansehen</a>
                    <a href="#kontakt" class="allocore-btn allocore-btn--primary" style="background-color: <?php echo esc_attr($primary); ?>;">Beratung buchen →</a>
                </div>
            </div>
        </div>
        <?php
    }
}
