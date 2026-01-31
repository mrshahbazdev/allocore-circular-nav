<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Contact_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_contact';
    }

    public function get_title() {
        return esc_html__('Allocore Contact', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-form-horizontal';
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
            'heading_1',
            [
                'label' => esc_html__('Heading Start', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Starten Sie', 'allocore-elements'),
            ]
        );

        $this->add_control(
            'heading_highlight',
            [
                'label' => esc_html__('Heading Highlight', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('jetzt', 'allocore-elements'),
            ]
        );

        $this->add_control(
            'subheading',
            [
                'label' => esc_html__('Subheading', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Buchen Sie Ihre kostenlose Erstberatung', 'allocore-elements'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <section id="kontakt" class="py-10 bg-gradient-to-b from-background to-muted/20">
            <div class="container mx-auto px-4">
                <div class="max-w-3xl mx-auto">
                    <div class="text-center mb-16">
                        <p class="text-sm font-bold text-[#FF8C00] uppercase tracking-wider mb-4" style="font-family: 'Rajdhani', sans-serif;">
                            Kontakt
                        </p>
                        <h2 class="text-5xl md:text-6xl font-bold mb-6 leading-tight" style="font-family: 'Rajdhani', sans-serif;">
                            <?php echo esc_html($settings['heading_1']); ?> <span class="text-[#FF8C00]"><?php echo esc_html($settings['heading_highlight']); ?></span>
                        </h2>
                        <p class="text-2xl text-muted-foreground" style="font-family: 'Work Sans', sans-serif;">
                            <?php echo esc_html($settings['subheading']); ?>
                        </p>
                    </div>

                    <div class="bg-card p-12 md:p-16 rounded-3xl border-2 border-[#FF8C00] shadow-2xl relative overflow-hidden">

                        <form class="space-y-8 relative z-10" action="" method="POST">
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-bold mb-3 text-foreground" style="font-family: 'Rajdhani', sans-serif;">
                                        Name *
                                    </label>
                                    <input type="text" name="name" required class="w-full px-5 py-4 rounded-xl border-2 border-border focus:border-[#FF8C00] focus:outline-none transition-colors bg-background text-lg" placeholder="Ihr Name" style="font-family: 'Work Sans', sans-serif;">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold mb-3 text-foreground" style="font-family: 'Rajdhani', sans-serif;">
                                        E-Mail *
                                    </label>
                                    <input type="email" name="email" required class="w-full px-5 py-4 rounded-xl border-2 border-border focus:border-[#FF8C00] focus:outline-none transition-colors bg-background text-lg" placeholder="ihre@email.de" style="font-family: 'Work Sans', sans-serif;">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-bold mb-3 text-foreground" style="font-family: 'Rajdhani', sans-serif;">
                                    Telefon
                                </label>
                                <input type="tel" name="phone" class="w-full px-5 py-4 rounded-xl border-2 border-border focus:border-[#FF8C00] focus:outline-none transition-colors bg-background text-lg" placeholder="+49 123 456789" style="font-family: 'Work Sans', sans-serif;">
                            </div>
                            <div>
                                <label class="block text-sm font-bold mb-3 text-foreground" style="font-family: 'Rajdhani', sans-serif;">
                                    Nachricht *
                                </label>
                                <textarea name="message" rows="6" required class="w-full px-5 py-4 rounded-xl border-2 border-border focus:border-[#FF8C00] focus:outline-none transition-colors resize-none bg-background text-lg" placeholder="Erzählen Sie uns von Ihrem Unternehmen und Ihren Zielen..." style="font-family: 'Work Sans', sans-serif;"></textarea>
                            </div>
                            <button type="submit" class="w-full bg-[#FF8C00] hover:bg-[#FF8C00]/90 text-white font-bold text-xl py-7 shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-[1.02] rounded-md inline-flex items-center justify-center" style="font-family: 'Rajdhani', sans-serif;">
                                Kostenlose Erstberatung anfragen
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2 w-6 h-6"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                            </button>
                        </form>

                        <div class="mt-10 pt-10 border-t-2 border-border">
                            <div class="flex flex-wrap items-center justify-center gap-8 text-sm">
                                <div class="flex items-center gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-[#0D9BA6]"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
                                    <span class="font-semibold" style="font-family: 'Rajdhani', sans-serif;">DSGVO-konform</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-[#0D9BA6]"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
                                    <span class="font-semibold" style="font-family: 'Rajdhani', sans-serif;">Unverbindlich</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-[#0D9BA6]"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
                                    <span class="font-semibold" style="font-family: 'Rajdhani', sans-serif;">Kostenlos</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}
