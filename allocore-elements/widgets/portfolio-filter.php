<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Portfolio_Filter_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_portfolio_filter';
    }

    public function get_title() {
        return esc_html__('Allocore Portfolio Filter', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-gallery-grid';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Portfolio Items', 'allocore-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Project Title',
            ]
        );

        $repeater->add_control(
            'category',
            [
                'label' => esc_html__('Category', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Design',
                'description' => 'Used for filtering. Case sensitive.',
            ]
        );

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__('Image', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'items',
            [
                'label' => esc_html__('Items', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    ['title' => 'Project 1', 'category' => 'Design', 'image' => ['url' => \Elementor\Utils::get_placeholder_image_src()]],
                    ['title' => 'Project 2', 'category' => 'Code', 'image' => ['url' => \Elementor\Utils::get_placeholder_image_src()]],
                    ['title' => 'Project 3', 'category' => 'Marketing', 'image' => ['url' => \Elementor\Utils::get_placeholder_image_src()]],
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // Extract unique categories
        $categories = ['All'];
        foreach ($settings['items'] as $item) {
            if (!empty($item['category']) && !in_array($item['category'], $categories)) {
                $categories[] = $item['category'];
            }
        }

        $id = $this->get_id();

        ?>
        <div class="allocore-portfolio-filter" id="portfolio-<?php echo esc_attr($id); ?>">
            <!-- Filter Buttons -->
            <div class="flex flex-wrap gap-4 justify-center mb-10">
                <?php foreach ($categories as $cat) : ?>
                    <button class="filter-btn px-6 py-2 rounded-full border border-border bg-background text-foreground hover:bg-primary hover:text-primary-foreground hover:border-primary transition-all duration-300 <?php echo $cat === 'All' ? 'active bg-primary text-primary-foreground border-primary' : ''; ?>"
                            data-filter="<?php echo esc_attr($cat); ?>">
                        <?php echo esc_html($cat); ?>
                    </button>
                <?php endforeach; ?>
            </div>

            <!-- Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($settings['items'] as $item) : ?>
                    <div class="portfolio-item group relative aspect-[4/3] rounded-xl overflow-hidden cursor-pointer"
                         data-category="<?php echo esc_attr($item['category']); ?>">

                        <img src="<?php echo esc_url($item['image']['url']); ?>" alt="<?php echo esc_attr($item['title']); ?>" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">

                        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center p-6 text-center">
                            <div>
                                <h3 class="text-xl font-bold text-white mb-2 translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                    <?php echo esc_html($item['title']); ?>
                                </h3>
                                <span class="text-sm text-gray-300 uppercase tracking-wider translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-75">
                                    <?php echo esc_html($item['category']); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <script>
            (function() {
                const container = document.getElementById('portfolio-<?php echo esc_attr($id); ?>');
                if (!container) return;

                const buttons = container.querySelectorAll('.filter-btn');
                const items = container.querySelectorAll('.portfolio-item');

                buttons.forEach(btn => {
                    btn.addEventListener('click', () => {
                        // Remove active class from all
                        buttons.forEach(b => {
                            b.classList.remove('bg-primary', 'text-primary-foreground', 'border-primary');
                            b.classList.add('bg-background', 'text-foreground');
                        });
                        // Add active class to clicked
                        btn.classList.remove('bg-background', 'text-foreground');
                        btn.classList.add('bg-primary', 'text-primary-foreground', 'border-primary');

                        const filter = btn.getAttribute('data-filter');

                        items.forEach(item => {
                            if (filter === 'All' || item.getAttribute('data-category') === filter) {
                                item.style.display = 'block';
                                setTimeout(() => item.style.opacity = '1', 50);
                            } else {
                                item.style.opacity = '0';
                                setTimeout(() => item.style.display = 'none', 300);
                            }
                        });
                    });
                });
            })();
        </script>
        <?php
    }
}
