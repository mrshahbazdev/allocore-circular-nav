<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Search_Form_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_search_form';
    }

    public function get_title() {
        return esc_html__('Allocore Search Form', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-search';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section('style_section', ['label' => 'Style', 'tab' => \Elementor\Controls_Manager::TAB_STYLE]);
        $this->add_control('placeholder', ['label' => 'Placeholder', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Search...']);
        $this->add_control('color', ['label' => 'Button Color', 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#FF8C00']);
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <form role="search" method="get" class="flex w-full max-w-sm items-center space-x-2" action="<?php echo esc_url(home_url('/')); ?>">
            <input type="search" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" placeholder="<?php echo esc_attr($settings['placeholder']); ?>" value="<?php echo get_search_query(); ?>" name="s" />
            <button type="submit" class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10 px-4 py-2 text-white" style="background-color: <?php echo esc_attr($settings['color']); ?>;">
                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
            </button>
        </form>
        <?php
    }
}
