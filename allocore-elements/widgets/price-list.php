<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Price_List_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_price_list';
    }

    public function get_title() {
        return esc_html__('Allocore Price List', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-price-list';
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
                'default' => 'Service Item',
            ]
        );

        $repeater->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Description of the item.',
            ]
        );

        $repeater->add_control(
            'price',
            [
                'label' => esc_html__('Price', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '$29',
            ]
        );

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__('Image (Optional)', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'items',
            [
                'label' => esc_html__('List Items', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => 'Consultation',
                        'description' => '1 hour initial consultation.',
                        'price' => '$150',
                    ],
                    [
                        'title' => 'Audit',
                        'description' => 'Full website audit.',
                        'price' => '$300',
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="allocore-price-list space-y-6">
            <?php foreach ($settings['items'] as $item) : ?>
                <div class="flex items-start justify-between border-b border-dashed border-border pb-4 last:border-0 last:pb-0 group">
                    <div class="flex items-start gap-4">
                        <?php if (!empty($item['image']['url'])) : ?>
                            <div class="w-16 h-16 rounded-lg overflow-hidden shrink-0 bg-muted">
                                <img src="<?php echo esc_url($item['image']['url']); ?>" alt="<?php echo esc_attr($item['title']); ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                            </div>
                        <?php endif; ?>
                        <div>
                            <h4 class="text-lg font-bold text-foreground mb-1 group-hover:text-primary transition-colors">
                                <?php echo esc_html($item['title']); ?>
                            </h4>
                            <p class="text-sm text-muted-foreground">
                                <?php echo esc_html($item['description']); ?>
                            </p>
                        </div>
                    </div>
                    <div class="text-xl font-bold text-primary shrink-0 ml-4">
                        <?php echo esc_html($item['price']); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
    }
}
