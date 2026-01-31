<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Flip_Box_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_flip_box';
    }

    public function get_title() {
        return esc_html__('Allocore Flip Box', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-flip-box';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section('front_section', ['label' => 'Front Side', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT]);
        $this->add_control('icon', ['label' => 'Icon', 'type' => \Elementor\Controls_Manager::ICONS, 'default' => ['value' => 'fas fa-star', 'library' => 'fa-solid']]);
        $this->add_control('title_front', ['label' => 'Title', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Front Title']);
        $this->add_control('desc_front', ['label' => 'Description', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Hover me!']);
        $this->end_controls_section();

        $this->start_controls_section('back_section', ['label' => 'Back Side', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT]);
        $this->add_control('title_back', ['label' => 'Title', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Back Title']);
        $this->add_control('desc_back', ['label' => 'Description', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Here is more info.']);
        $this->add_control('button_text', ['label' => 'Button Text', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Click Me']);
        $this->add_control('link', ['label' => 'Link', 'type' => \Elementor\Controls_Manager::URL, 'default' => ['url' => '#']]);
        $this->end_controls_section();

        $this->start_controls_section('style_section', ['label' => 'Style', 'tab' => \Elementor\Controls_Manager::TAB_STYLE]);
        $this->add_control('color', ['label' => 'Color', 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#FF8C00']);
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="group h-64 w-full perspective-1000 cursor-pointer">
            <div class="relative w-full h-full transition-all duration-500 transform style-preserve-3d group-hover:rotate-y-180">
                <!-- Front -->
                <div class="absolute inset-0 w-full h-full bg-card border-2 border-border rounded-xl p-8 flex flex-col items-center justify-center backface-hidden shadow-lg">
                    <div class="mb-4 text-4xl" style="color: <?php echo esc_attr($settings['color']); ?>;">
                        <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                    </div>
                    <h3 class="text-2xl font-bold mb-2" style="font-family: 'Rajdhani', sans-serif;"><?php echo esc_html($settings['title_front']); ?></h3>
                    <p class="text-center text-muted-foreground"><?php echo esc_html($settings['desc_front']); ?></p>
                </div>

                <!-- Back -->
                <div class="absolute inset-0 w-full h-full bg-[#0E1B2A] text-white rounded-xl p-8 flex flex-col items-center justify-center backface-hidden rotate-y-180 shadow-xl">
                    <h3 class="text-2xl font-bold mb-2" style="font-family: 'Rajdhani', sans-serif;"><?php echo esc_html($settings['title_back']); ?></h3>
                    <p class="text-center mb-4 text-white/80"><?php echo esc_html($settings['desc_back']); ?></p>
                    <a href="<?php echo esc_url($settings['link']['url']); ?>" class="px-6 py-2 rounded font-bold transition-transform hover:scale-105" style="background-color: <?php echo esc_attr($settings['color']); ?>;">
                        <?php echo esc_html($settings['button_text']); ?>
                    </a>
                </div>
            </div>
        </div>
        <style>
            .perspective-1000 { perspective: 1000px; }
            .style-preserve-3d { transform-style: preserve-3d; }
            .rotate-y-180 { transform: rotateY(180deg); }
            .backface-hidden { backface-visibility: hidden; }
        </style>
        <?php
    }
}
