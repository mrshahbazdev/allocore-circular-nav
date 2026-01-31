<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Accordion_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_accordion';
    }

    public function get_title() {
        return esc_html__('Allocore Accordion', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-accordion';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Items', 'allocore-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Accordion Title', 'allocore-elements'),
            ]
        );

        $repeater->add_control(
            'content',
            [
                'label' => esc_html__('Content', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__('Accordion content goes here.', 'allocore-elements'),
            ]
        );

        $this->add_control(
            'items',
            [
                'label' => esc_html__('Accordion Items', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => 'Question #1',
                        'content' => 'Answer to question #1',
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // Simple HTML/JS Accordion
        ?>
        <div class="max-w-4xl mx-auto space-y-4 allocore-accordion">
            <?php foreach ($settings['items'] as $index => $item) :
                $id = 'accordion-' . $this->get_id() . '-' . $index;
            ?>
            <div class="bg-card border-2 border-border rounded-2xl px-8 hover:border-[#FF8C00] transition-colors overflow-hidden">
                <button class="w-full text-left py-6 flex justify-between items-center focus:outline-none" onclick="document.getElementById('<?php echo $id; ?>').classList.toggle('hidden'); this.querySelector('svg').classList.toggle('rotate-180');">
                    <span class="text-xl font-bold" style="font-family: 'Rajdhani', sans-serif;">
                        <?php echo esc_html($item['title']); ?>
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 transition-transform duration-200"><path d="m6 9 6 6 6-6"/></svg>
                </button>
                <div id="<?php echo $id; ?>" class="hidden text-muted-foreground text-lg leading-relaxed pb-6" style="font-family: 'Work Sans', sans-serif;">
                    <?php echo $item['content']; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php
    }
}
