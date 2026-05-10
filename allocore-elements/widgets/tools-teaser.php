<?php
if (!defined('ABSPATH')) {
    exit;
}

class Allocore_Tools_Teaser_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_tools_teaser';
    }

    public function get_title() {
        return esc_html__('Allocore Tools Teaser', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-preview-medium';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section('content_section', [
            'label' => esc_html__('Content', 'allocore-elements'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control('badge_text', [
            'label' => 'Badge',
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '14 Premium SaaS Tools',
        ]);

        $this->add_control('title', [
            'label' => 'Title',
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Das allocore Tool-Ökosystem',
        ]);

        $this->add_control('subtitle', [
            'label' => 'Subtitle',
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'Alle Tools, die Sie brauchen — von Strategie über Marketing bis Finanzen — in einem Ökosystem',
        ]);

        $this->add_control('tools_link', [
            'label' => 'All Tools Link',
            'type' => \Elementor\Controls_Manager::URL,
            'default' => ['url' => '/tools'],
        ]);

        $this->add_control('pricing_link', [
            'label' => 'Pricing Link',
            'type' => \Elementor\Controls_Manager::URL,
            'default' => ['url' => '/pricing'],
        ]);

        $this->end_controls_section();

        // Categories
        $this->start_controls_section('categories_section', [
            'label' => esc_html__('Categories', 'allocore-elements'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $cat_rep = new \Elementor\Repeater();
        $cat_rep->add_control('cat_name', ['label' => 'Name', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Category']);
        $cat_rep->add_control('cat_count', ['label' => 'Tool Count', 'type' => \Elementor\Controls_Manager::NUMBER, 'default' => 4]);
        $cat_rep->add_control('cat_desc', ['label' => 'Description', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Category description']);
        $cat_rep->add_control('cat_tools', ['label' => 'Tool Names (comma separated)', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Tool1, Tool2, Tool3']);

        $this->add_control('categories', [
            'label' => 'Categories',
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $cat_rep->get_controls(),
            'default' => [
                ['cat_name' => 'Business & Strategie', 'cat_count' => 4, 'cat_desc' => 'Strategische Tools für Unternehmensführung, Vision und Innovation', 'cat_tools' => 'FocusMatrix, VisionFlow, Innovation Hub, IdeenPipeline'],
                ['cat_name' => 'Sales & Marketing', 'cat_count' => 4, 'cat_desc' => 'Lead-Generierung, SEO-Optimierung und Content-Marketing Tools', 'cat_tools' => 'LeadOS, SEOStory, SEO Multi-Tool, ClusterForge'],
                ['cat_name' => 'Finanzen & Compliance', 'cat_count' => 4, 'cat_desc' => 'Finanzsteuerung, Rechnungsstellung und Compliance-Management', 'cat_tools' => 'Financial, InvoiceMaker, ComplianceTermine, AuditPro'],
                ['cat_name' => 'Produktivität', 'cat_count' => 2, 'cat_desc' => 'Wissensmanagement und Analyse-Tools für mehr Effizienz', 'cat_tools' => 'BrainVault, Sweet-Spot'],
            ],
            'title_field' => '{{{ cat_name }}}',
        ]);

        $this->end_controls_section();

        // Featured Tools
        $this->start_controls_section('featured_section', [
            'label' => esc_html__('Featured Tools', 'allocore-elements'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $feat_rep = new \Elementor\Repeater();
        $feat_rep->add_control('feat_name', ['label' => 'Name', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Tool Name']);
        $feat_rep->add_control('feat_tagline', ['label' => 'Tagline', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Tagline']);
        $feat_rep->add_control('feat_desc', ['label' => 'Description', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Description']);
        $feat_rep->add_control('feat_features', ['label' => 'Features (one per line)', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => "Feature 1\nFeature 2\nFeature 3"]);
        $feat_rep->add_control('feat_icon', ['label' => 'Icon', 'type' => \Elementor\Controls_Manager::ICONS, 'default' => ['value' => 'fas fa-cog', 'library' => 'fa-solid']]);
        $feat_rep->add_control('feat_link', ['label' => 'Link', 'type' => \Elementor\Controls_Manager::URL, 'default' => ['url' => '#']]);

        $this->add_control('featured_tools', [
            'label' => 'Featured Tools',
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $feat_rep->get_controls(),
            'default' => [
                ['feat_name' => 'FocusMatrix', 'feat_tagline' => 'Entscheiden statt abarbeiten', 'feat_desc' => 'SaaS für Manager, das das Only-You-Prinzip in ein tägliches Betriebssystem verwandelt.', 'feat_features' => "Triage Inbox mit Entscheidungs-Wizard\nDecision Matrix mit Auto-Kategorisierung\nDelegations-Cockpit mit Anti-Mikromanagement", 'feat_link' => ['url' => '/tools/focusmatrix']],
                ['feat_name' => 'VisionFlow', 'feat_tagline' => 'Value-to-Mission Operating System', 'feat_desc' => 'Enterprise-Plattform für die Co-Creation von Unternehmenswerten.', 'feat_features' => "Values Workshop mit anonymer Abstimmung\nPrinciples Builder mit Konsens-Tracking\nStrategic Goals Canvas mit Traceability", 'feat_link' => ['url' => '/tools/visionflow']],
                ['feat_name' => 'Innovation Hub', 'feat_tagline' => 'Innovationen systematisch managen', 'feat_desc' => 'Dual-Interface-Plattform für die Verwaltung interner Innovations-Workflows.', 'feat_features' => "Global Team Browser mit Join/Leave\nIdeen-Pipeline mit Team-Zuordnung\nRollenbasierte Bearbeitungsrechte", 'feat_link' => ['url' => '/tools/innovation-hub']],
            ],
            'title_field' => '{{{ feat_name }}}',
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
        ?>
        <div class="allocore-tools-teaser">
            <!-- Header -->
            <div class="allocore-tools-teaser__header">
                <div class="allocore-tools-teaser__badge" style="background: <?php echo esc_attr($secondary); ?>15; color: <?php echo esc_attr($secondary); ?>;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                    <?php echo esc_html($s['badge_text']); ?>
                </div>
                <?php
                $words = explode(' ', $s['title']);
                $last = array_pop($words);
                ?>
                <h2><?php echo esc_html(implode(' ', $words)); ?> <span style="color: <?php echo esc_attr($primary); ?>;"><?php echo esc_html($last); ?></span></h2>
                <p><?php echo esc_html($s['subtitle']); ?></p>
            </div>

            <!-- Category Cards -->
            <div class="allocore-teaser-categories">
                <?php foreach ($s['categories'] as $cat) :
                    $tools = array_filter(array_map('trim', explode(',', $cat['cat_tools'])));
                    $shown = array_slice($tools, 0, 3);
                    $more = count($tools) - count($shown);
                ?>
                <div class="allocore-teaser-category-card">
                    <div class="allocore-teaser-category-card__count" style="color: <?php echo esc_attr($primary); ?>;"><?php echo intval($cat['cat_count']); ?></div>
                    <h4><?php echo esc_html($cat['cat_name']); ?></h4>
                    <p><?php echo esc_html($cat['cat_desc']); ?></p>
                    <div class="allocore-teaser-category-card__tools">
                        <?php foreach ($shown as $t) : ?>
                            <span class="allocore-teaser-tool-pill" style="color: <?php echo esc_attr($secondary); ?>;">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="12" height="12"><circle cx="12" cy="12" r="4"/></svg>
                                <?php echo esc_html($t); ?>
                            </span>
                        <?php endforeach; ?>
                        <?php if ($more > 0) : ?>
                            <span class="allocore-teaser-tool-more">+<?php echo $more; ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Featured Tools -->
            <?php if (!empty($s['featured_tools'])) : ?>
            <div class="allocore-teaser-featured">
                <?php foreach ($s['featured_tools'] as $feat) :
                    $features = array_filter(explode("\n", $feat['feat_features']));
                ?>
                <a href="<?php echo esc_url($feat['feat_link']['url'] ?? '#'); ?>" class="allocore-teaser-featured-card" style="--accent: <?php echo esc_attr($primary); ?>;">
                    <div class="allocore-teaser-featured-card__header">
                        <div class="allocore-teaser-featured-card__icon">
                            <?php \Elementor\Icons_Manager::render_icon($feat['feat_icon'], ['aria-hidden' => 'true']); ?>
                        </div>
                        <div>
                            <h4><?php echo esc_html($feat['feat_name']); ?></h4>
                            <span style="color: <?php echo esc_attr($primary); ?>; font-size: 0.8rem;"><?php echo esc_html($feat['feat_tagline']); ?></span>
                        </div>
                    </div>
                    <p><?php echo esc_html($feat['feat_desc']); ?></p>
                    <ul>
                        <?php foreach (array_slice($features, 0, 3) as $f) : ?>
                            <li>
                                <svg viewBox="0 0 24 24" fill="none" stroke="<?php echo esc_attr($secondary); ?>" stroke-width="2" width="14" height="14"><path d="M5 13l4 4L19 7"/></svg>
                                <?php echo esc_html(trim($f)); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </a>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <!-- CTAs -->
            <div class="allocore-tools-teaser__ctas">
                <a href="<?php echo esc_url($s['tools_link']['url'] ?? '/tools'); ?>" class="allocore-btn allocore-btn--primary" style="background-color: <?php echo esc_attr($primary); ?>;">Alle 14 Tools entdecken →</a>
                <a href="<?php echo esc_url($s['pricing_link']['url'] ?? '/pricing'); ?>" class="allocore-btn allocore-btn--outline">Bundles & Preise</a>
            </div>
        </div>
        <?php
    }
}
