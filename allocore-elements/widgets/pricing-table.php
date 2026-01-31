<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Pricing_Table_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_pricing_table';
    }

    public function get_title() {
        return esc_html__('Allocore Pricing Table', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-price-table';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section('content_section', ['label' => 'Content', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT]);

        $this->add_control('plan_name', ['label' => 'Plan Name', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Basis']);
        $this->add_control('price', ['label' => 'Price', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '999€']);
        $this->add_control('period', ['label' => 'Period', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '/ monat']);
        $this->add_control('description', ['label' => 'Description', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Perfekt für den Start.']);
        $this->add_control('features', ['label' => 'Features (One per line)', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => "Feature 1\nFeature 2\nFeature 3"]);
        $this->add_control('button_text', ['label' => 'Button Text', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Auswählen']);
        $this->add_control('button_link', ['label' => 'Button Link', 'type' => \Elementor\Controls_Manager::URL, 'default' => ['url' => '#']]);
        $this->add_control('is_featured', ['label' => 'Featured?', 'type' => \Elementor\Controls_Manager::SWITCHER, 'default' => '']);
        $this->add_control('color', ['label' => 'Highlight Color', 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#FF8C00']);

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $features = explode("\n", $settings['features']);
        $borderColor = $settings['is_featured'] ? $settings['color'] : 'var(--border)';
        $borderWidth = $settings['is_featured'] ? '2px' : '1px';
        $scale = $settings['is_featured'] ? 'md:scale-105 z-10' : '';
        ?>
        <div class="bg-card p-8 rounded-2xl border flex flex-col h-full <?php echo $scale; ?> transition-all duration-300 hover:shadow-xl" style="border-color: <?php echo esc_attr($borderColor); ?>; border-width: <?php echo esc_attr($borderWidth); ?>;">
            <?php if ($settings['is_featured']) : ?>
                <div class="text-xs font-bold uppercase tracking-wider mb-2" style="color: <?php echo esc_attr($settings['color']); ?>;">Empfohlen</div>
            <?php endif; ?>

            <h3 class="text-2xl font-bold mb-2" style="font-family: 'Rajdhani', sans-serif;"><?php echo esc_html($settings['plan_name']); ?></h3>
            <div class="flex items-baseline gap-1 mb-4">
                <span class="text-4xl font-bold"><?php echo esc_html($settings['price']); ?></span>
                <span class="text-muted-foreground"><?php echo esc_html($settings['period']); ?></span>
            </div>
            <p class="text-muted-foreground mb-6 text-sm"><?php echo esc_html($settings['description']); ?></p>

            <ul class="space-y-3 mb-8 flex-grow">
                <?php foreach ($features as $feature) : ?>
                    <li class="flex items-start gap-2 text-sm">
                        <svg class="w-5 h-5 flex-shrink-0 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span><?php echo esc_html($feature); ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>

            <a href="<?php echo esc_url($settings['button_link']['url']); ?>" class="w-full py-3 rounded-md font-bold text-center transition-colors" style="background-color: <?php echo esc_attr($settings['color']); ?>; color: white;">
                <?php echo esc_html($settings['button_text']); ?>
            </a>
        </div>
        <?php
    }
}
