<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Comparison_Table_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_comparison_table';
    }

    public function get_title() {
        return esc_html__('Allocore Comparison Table', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-table';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'headers_section',
            [
                'label' => esc_html__('Table Headers', 'allocore-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'col_1_header',
            [
                'label' => esc_html__('Column 1 Header (Feature)', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Features',
            ]
        );

        $this->add_control(
            'col_2_header',
            [
                'label' => esc_html__('Column 2 Header', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Basic',
            ]
        );

        $this->add_control(
            'col_3_header',
            [
                'label' => esc_html__('Column 3 Header', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Pro',
            ]
        );

        $this->add_control(
            'col_4_header',
            [
                'label' => esc_html__('Column 4 Header', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Enterprise',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'rows_section',
            [
                'label' => esc_html__('Table Rows', 'allocore-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'feature_name',
            [
                'label' => esc_html__('Feature Name', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Feature',
            ]
        );

        $repeater->add_control(
            'col_2_val',
            [
                'label' => esc_html__('Col 2 Value (Check/Cross/Text)', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'check',
                'description' => 'Type "check", "cross", or any text.',
            ]
        );

        $repeater->add_control(
            'col_3_val',
            [
                'label' => esc_html__('Col 3 Value', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'check',
            ]
        );

        $repeater->add_control(
            'col_4_val',
            [
                'label' => esc_html__('Col 4 Value', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'check',
            ]
        );

        $this->add_control(
            'rows',
            [
                'label' => esc_html__('Rows', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'feature_name' => 'Users',
                        'col_2_val' => '1',
                        'col_3_val' => '5',
                        'col_4_val' => 'Unlimited',
                    ],
                    [
                        'feature_name' => 'Support',
                        'col_2_val' => 'Email',
                        'col_3_val' => 'Priority',
                        'col_4_val' => '24/7 Dedicated',
                    ],
                    [
                        'feature_name' => 'Analytics',
                        'col_2_val' => 'cross',
                        'col_3_val' => 'check',
                        'col_4_val' => 'check',
                    ],
                ],
                'title_field' => '{{{ feature_name }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $render_cell = function($val) {
            if ($val === 'check') {
                return '<i class="fas fa-check text-green-500"></i>';
            } elseif ($val === 'cross') {
                return '<i class="fas fa-times text-red-500"></i>';
            } else {
                return esc_html($val);
            }
        };

        ?>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-muted/20 border-b border-border">
                        <th class="p-4 font-bold text-foreground"><?php echo esc_html($settings['col_1_header']); ?></th>
                        <th class="p-4 font-bold text-center text-foreground"><?php echo esc_html($settings['col_2_header']); ?></th>
                        <th class="p-4 font-bold text-center text-foreground"><?php echo esc_html($settings['col_3_header']); ?></th>
                        <th class="p-4 font-bold text-center text-foreground"><?php echo esc_html($settings['col_4_header']); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($settings['rows'] as $index => $row) :
                        $bg_class = ($index % 2 === 0) ? 'bg-background' : 'bg-muted/10';
                    ?>
                        <tr class="<?php echo $bg_class; ?> border-b border-border hover:bg-muted/20 transition-colors">
                            <td class="p-4 font-medium"><?php echo esc_html($row['feature_name']); ?></td>
                            <td class="p-4 text-center text-muted-foreground"><?php echo $render_cell($row['col_2_val']); ?></td>
                            <td class="p-4 text-center text-muted-foreground"><?php echo $render_cell($row['col_3_val']); ?></td>
                            <td class="p-4 text-center text-muted-foreground"><?php echo $render_cell($row['col_4_val']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php
    }
}
