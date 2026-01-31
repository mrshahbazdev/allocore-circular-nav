<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Off_Canvas_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_off_canvas';
    }

    public function get_title() {
        return esc_html__('Allocore Off Canvas', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-sidebar';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'trigger_section',
            [
                'label' => esc_html__('Trigger Button', 'allocore-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Open Sidebar',
            ]
        );

        $this->add_control(
            'button_icon',
            [
                'label' => esc_html__('Button Icon', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::ICONS,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Panel Content', 'allocore-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'panel_content',
            [
                'label' => esc_html__('Content', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => '<p>This is the off-canvas content.</p>',
            ]
        );

        $this->add_control(
            'position',
            [
                'label' => esc_html__('Position', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'right',
                'options' => [
                    'left' => 'Left',
                    'right' => 'Right',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $id = $this->get_id();
        $position_class = ($settings['position'] === 'left') ? 'left-0 -translate-x-full' : 'right-0 translate-x-full';

        ?>
        <!-- Trigger Button -->
        <button class="allocore-off-canvas-trigger inline-flex items-center justify-center gap-2 px-6 py-3 bg-primary text-primary-foreground font-medium rounded-lg hover:bg-primary/90 transition-colors" data-target="#off-canvas-<?php echo esc_attr($id); ?>">
            <?php \Elementor\Icons_Manager::render_icon($settings['button_icon'], ['aria-hidden' => 'true']); ?>
            <span><?php echo esc_html($settings['button_text']); ?></span>
        </button>

        <!-- Off Canvas Panel -->
        <div id="off-canvas-<?php echo esc_attr($id); ?>" class="allocore-off-canvas fixed inset-0 z-[9999] invisible opacity-0 transition-all duration-300">
            <!-- Overlay -->
            <div class="allocore-off-canvas-overlay absolute inset-0 bg-black/50 backdrop-blur-sm transition-opacity duration-300"></div>

            <!-- Content -->
            <div class="allocore-off-canvas-content absolute top-0 bottom-0 w-full max-w-md bg-background shadow-2xl p-8 overflow-y-auto transition-transform duration-300 <?php echo $position_class; ?>" data-position="<?php echo esc_attr($settings['position']); ?>">
                <button class="allocore-off-canvas-close absolute top-4 right-4 text-muted-foreground hover:text-foreground">
                    <i class="fas fa-times text-xl"></i>
                </button>

                <div class="mt-8 prose dark:prose-invert">
                    <?php echo $settings['panel_content']; ?>
                </div>
            </div>
        </div>
        <?php
    }
}
