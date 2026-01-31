<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Hero_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_hero';
    }

    public function get_title() {
        return esc_html__('Allocore Hero', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-banner';
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
            'tagline',
            [
                'label' => esc_html__('Tagline', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Die Methode für nachhaltiges Wachstum', 'allocore-elements'),
            ]
        );

        $this->add_control(
            'heading',
            [
                'label' => esc_html__('Heading', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Profitabilität durch Effizienz', 'allocore-elements'),
            ]
        );

        $this->add_control(
            'subheading',
            [
                'label' => esc_html__('Subheading', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Effizienz durch Fokus', 'allocore-elements'),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Wir helfen KMUs und Beratern, Ressourcen optimal auf ihr Kerngeschäft auszurichten und nachhaltig profitabel zu wachsen', 'allocore-elements'),
            ]
        );

        $this->add_control(
            'button_1_text',
            [
                'label' => esc_html__('Button 1 Text', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Erstberatung buchen', 'allocore-elements'),
            ]
        );

        $this->add_control(
            'button_1_link',
            [
                'label' => esc_html__('Button 1 Link', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'allocore-elements'),
                'default' => [
                    'url' => '#kontakt',
                ],
            ]
        );

        $this->add_control(
            'button_2_text',
            [
                'label' => esc_html__('Button 2 Text', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Methode entdecken', 'allocore-elements'),
            ]
        );

        $this->add_control(
            'button_2_link',
            [
                'label' => esc_html__('Button 2 Link', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'allocore-elements'),
                'default' => [
                    'url' => '#methode',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="relative pt-20 pb-12 overflow-hidden bg-background">
            <!-- Subtle background pattern -->
            <div class="absolute inset-0 bg-gradient-to-br from-[#FF8C00]/5 via-transparent to-[#0D9BA6]/5"></div>
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, rgba(13, 155, 166, 0.05) 1px, transparent 0); background-size: 48px 48px;"></div>

            <div class="container relative z-10 mx-auto px-4">
                <div class="max-w-5xl mx-auto text-center">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#FF8C00]/10 border border-[#FF8C00]/20 mb-8">
                        <!-- Sparkles Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-[#FF8C00]"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
                        <span class="text-sm font-semibold text-[#FF8C00]" style="font-family: 'Rajdhani', sans-serif;">
                            <?php echo esc_html($settings['tagline']); ?>
                        </span>
                    </div>

                    <h1 class="text-6xl md:text-8xl font-bold mb-8 leading-[1.1] tracking-tight" style="font-family: 'Rajdhani', sans-serif;">
                        <?php echo $settings['heading']; ?>
                        <!-- Note: The react component has span formatting inside H1. We are simplifying for now or we would need a rich text control.
                             Ideally we would split this or use HTML allowed in text.
                             For exact match of "Profitabilität durch Effizienz" where Effizienz has styling:
                        -->
                    </h1>

                    <p class="text-3xl md:text-4xl text-muted-foreground/80 mb-6 font-light tracking-wide" style="font-family: 'Work Sans', sans-serif;">
                       <?php echo wp_kses_post($settings['subheading']); ?>
                    </p>

                    <p class="text-xl text-muted-foreground mb-12 max-w-3xl mx-auto leading-relaxed" style="font-family: 'Work Sans', sans-serif;">
                        <?php echo esc_html($settings['description']); ?>
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                        <?php
                        if ( ! empty( $settings['button_1_text'] ) ) :
                            $this->add_link_attributes( 'button_1_link', $settings['button_1_link'] );
                        ?>
                        <a <?php echo $this->get_render_attribute_string( 'button_1_link' ); ?> class="bg-[#FF8C00] hover:bg-[#FF8C00]/90 text-white font-bold text-lg px-10 py-7 shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-105 inline-flex items-center rounded-md hover:no-underline" style="font-family: 'Rajdhani', sans-serif;">
                            <?php echo esc_html($settings['button_1_text']); ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2 w-5 h-5"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                        <?php endif; ?>

                        <?php
                        if ( ! empty( $settings['button_2_text'] ) ) :
                            $this->add_link_attributes( 'button_2_link', $settings['button_2_link'] );
                        ?>
                        <a <?php echo $this->get_render_attribute_string( 'button_2_link' ); ?> class="font-bold text-lg px-10 py-7 border-2 hover:bg-muted/50 transition-all duration-300 inline-flex items-center justify-center rounded-md hover:no-underline text-foreground border-input" style="font-family: 'Rajdhani', sans-serif;">
                            <?php echo esc_html($settings['button_2_text']); ?>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}
