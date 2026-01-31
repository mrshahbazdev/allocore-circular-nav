<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Tabs_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_tabs';
    }

    public function get_title() {
        return esc_html__('Allocore Tabs', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-tabs';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section('content_section', ['label' => 'Content', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT]);

        $repeater = new \Elementor\Repeater();
        $repeater->add_control('title', ['label' => 'Tab Title', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Tab 1']);
        $repeater->add_control('content', ['label' => 'Content', 'type' => \Elementor\Controls_Manager::WYSIWYG, 'default' => 'Content here']);

        $this->add_control('tabs', [
            'label' => 'Tabs',
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [['title' => 'Tab 1', 'content' => 'Content 1'], ['title' => 'Tab 2', 'content' => 'Content 2']],
        ]);

        $this->add_control('color', ['label' => 'Active Color', 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#FF8C00']);

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $uid = $this->get_id();
        ?>
        <div class="allocore-tabs" id="tabs-<?php echo $uid; ?>">
            <div class="flex border-b border-border mb-6 overflow-x-auto">
                <?php foreach ($settings['tabs'] as $index => $tab) :
                    $activeClass = $index === 0 ? 'border-b-2' : 'text-muted-foreground border-b-2 border-transparent hover:text-foreground';
                    $style = $index === 0 ? 'border-color: ' . esc_attr($settings['color']) . '; color: ' . esc_attr($settings['color']) . ';' : '';
                ?>
                <button
                    class="px-6 py-3 font-bold transition-all whitespace-nowrap <?php echo $activeClass; ?>"
                    style="font-family: 'Rajdhani', sans-serif; <?php echo $style; ?>"
                    onclick="openTab('<?php echo $uid; ?>', <?php echo $index; ?>, this, '<?php echo esc_attr($settings['color']); ?>')"
                >
                    <?php echo esc_html($tab['title']); ?>
                </button>
                <?php endforeach; ?>
            </div>

            <?php foreach ($settings['tabs'] as $index => $tab) :
                $hiddenClass = $index === 0 ? '' : 'hidden';
            ?>
            <div class="tab-content <?php echo $hiddenClass; ?> text-muted-foreground leading-relaxed animate-in fade-in slide-in-from-bottom-2 duration-300" data-index="<?php echo $index; ?>">
                <?php echo $tab['content']; ?>
            </div>
            <?php endforeach; ?>
        </div>

        <script>
        function openTab(uid, index, btn, color) {
            const container = document.getElementById('tabs-' + uid);

            // Hide all content
            container.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));

            // Show selected content
            container.querySelector(`.tab-content[data-index="${index}"]`).classList.remove('hidden');

            // Reset buttons
            container.querySelectorAll('button').forEach(b => {
                b.style.borderColor = 'transparent';
                b.style.color = '';
                b.classList.add('text-muted-foreground');
            });

            // Activate button
            btn.classList.remove('text-muted-foreground');
            btn.style.borderColor = color;
            btn.style.color = color;
        }
        </script>
        <?php
    }
}
