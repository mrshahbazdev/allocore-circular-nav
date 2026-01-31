<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Team_Member_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_team_member';
    }

    public function get_title() {
        return esc_html__('Allocore Team Member', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-person';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section('content_section', ['label' => 'Content', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT]);

        $this->add_control('name', ['label' => 'Name', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Max Mustermann']);
        $this->add_control('role', ['label' => 'Role', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Consultant']);
        $this->add_control('bio', ['label' => 'Bio', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Short bio here.']);
        $this->add_control('image', ['label' => 'Photo', 'type' => \Elementor\Controls_Manager::MEDIA]);
        $this->add_control('color', ['label' => 'Color', 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#FF8C00']);

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $img_url = $settings['image']['url'] ?: 'https://via.placeholder.com/150';
        ?>
        <div class="bg-card rounded-2xl overflow-hidden border border-border group hover:border-[<?php echo esc_attr($settings['color']); ?>] transition-all duration-300">
            <div class="h-64 overflow-hidden relative">
                <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($settings['name']); ?>" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                <div class="absolute bottom-0 left-0 w-full h-1/2 bg-gradient-to-t from-black/80 to-transparent"></div>
            </div>
            <div class="p-6 relative">
                <div class="absolute -top-6 left-6 px-3 py-1 bg-background rounded-md text-xs font-bold uppercase tracking-wide border border-border shadow-sm">
                    <?php echo esc_html($settings['role']); ?>
                </div>
                <h3 class="text-xl font-bold mb-2 pt-2" style="font-family: 'Rajdhani', sans-serif;"><?php echo esc_html($settings['name']); ?></h3>
                <p class="text-muted-foreground text-sm"><?php echo esc_html($settings['bio']); ?></p>
            </div>
        </div>
        <?php
    }
}
