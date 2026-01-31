<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Circular_Nav_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_circular_nav';
    }

    public function get_title() {
        return esc_html__('Allocore Circular Nav', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-navigator';
    }

    public function get_categories() {
        return ['allocore'];
    }

    public function get_script_depends() {
        return ['allocore-circular-nav'];
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
            'main_title',
            [
                'label' => esc_html__('Center Title', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('allocore-Methode', 'allocore-elements'),
            ]
        );

        $this->add_control(
            'main_subtitle',
            [
                'label' => esc_html__('Center Subtitle', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Start an jeder Stelle Ziel: Profit & Effektivitaet', 'allocore-elements'),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'label',
            [
                'label' => esc_html__('Label', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Section Name',
            ]
        );

        $repeater->add_control(
            'short_label',
            [
                'label' => esc_html__('Short Label (Circle)', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'description' => 'Use newline for line breaks',
                'default' => 'Section',
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__('Content Title', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Section Title',
            ]
        );

        $repeater->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Description text goes here.',
            ]
        );

        $repeater->add_control(
            'benefits',
            [
                'label' => esc_html__('Benefits (One per line)', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => "Benefit 1\nBenefit 2\nBenefit 3",
            ]
        );

        $repeater->add_control(
            'color',
            [
                'label' => esc_html__('Color Scheme', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'orange',
                'options' => [
                    'orange' => 'Orange',
                    'teal' => 'Teal',
                ],
            ]
        );

        $this->add_control(
            'sections',
            [
                'label' => esc_html__('Sections', 'allocore-elements'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'label' => 'Networking',
                        'short_label' => "Networking",
                        'color' => 'orange',
                        'title' => 'Networking',
                        'description' => 'Bauen Sie strategische Beziehungen auf und erweitern Sie Ihr professionelles Netzwerk.',
                        'benefits' => "Zugang zu neuen Geschäftspartnern\nErweiterung Ihrer Branchenkenntnisse\nStärkung Ihrer Marktposition",
                    ],
                    [
                        'label' => 'Kerngeschäft',
                        'short_label' => "Kern-\ngeschaeft",
                        'color' => 'orange',
                        'title' => 'Kerngeschäft',
                        'description' => 'Fokussieren Sie sich auf Ihre Kernkompetenzen.',
                        'benefits' => "Klare Fokussierung\nEffiziente Ressourcennutzung\nHöhere Wettbewerbsfähigkeit",
                    ],
                    [
                        'label' => 'Finanzsteuerung',
                        'short_label' => "Finanz-\nsteuerung",
                        'color' => 'teal',
                        'title' => 'Finanzsteuerung',
                        'description' => 'Behalten Sie Ihre Finanzen im Griff.',
                        'benefits' => "Transparenz über Finanzen\nFrühzeitige Erkennung von Risiken\nOptimierte Liquiditätsplanung",
                    ],
                    [
                        'label' => 'Vereinfachtes Angebot',
                        'short_label' => "Vereinf.\nAngebot",
                        'color' => 'orange',
                        'title' => 'Vereinfachtes Angebot',
                        'description' => 'Reduzieren Sie Komplexität.',
                        'benefits' => "Schnellere Kundenentscheidungen\nReduzierte Verkaufszyklen\nHöhere Conversion-Raten",
                    ],
                    [
                        'label' => 'Website/SEO',
                        'short_label' => "Website/\nSEO",
                        'color' => 'teal',
                        'title' => 'Website/SEO',
                        'description' => 'Erhöhen Sie Ihre Online-Sichtbarkeit.',
                        'benefits' => "Bessere Auffindbarkeit\nProfessioneller Online-Auftritt\nMehr qualifizierte Leads",
                    ],
                ],
                'title_field' => '{{{ label }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $sections = $settings['sections'];
        $section_count = count($sections);

        if ($section_count === 0) return;

        // Calculate angles automatically
        $angle_step = 360 / $section_count;

        ?>
        <div class="allocore-circular-nav-wrapper min-h-screen bg-background py-8 md:py-12">
            <div class="container mx-auto px-4">
                <div class="flex flex-col lg:flex-row items-center justify-center gap-8 lg:gap-16">
                    <!-- Circle Container -->
                    <div class="relative w-full max-w-[350px] sm:max-w-[450px] md:max-w-[500px] lg:max-w-[600px] aspect-square flex-shrink-0">
                        <svg viewBox="0 0 600 600" class="allocore-circular-svg w-full h-full transition-transform duration-700 ease-[cubic-bezier(0.65,0,0.35,1)]">
                            <?php
                            foreach ($sections as $index => $section) :
                                $angle = $index * $angle_step;
                                $startAngle = $angle - 90;
                                $endAngle = $startAngle + $angle_step;
                                $outerRadius = 280;
                                $innerRadius = 160;
                                $arrowDepth = 35;
                                $arrowWidth = 0.4; // Slightly adjustable if needed

                                $startAngleRad = deg2rad($startAngle);
                                $endAngleRad = deg2rad($endAngle);
                                $midAngleRad = deg2rad($startAngle + ($angle_step / 2));

                                $arrowStartAngleRad = deg2rad($startAngle + ($angle_step / 2) - ($angle_step / 2) * $arrowWidth);
                                $arrowEndAngleRad = deg2rad($startAngle + ($angle_step / 2) + ($angle_step / 2) * $arrowWidth);

                                $outerStart = [
                                    'x' => 300 + $outerRadius * cos($startAngleRad),
                                    'y' => 300 + $outerRadius * sin($startAngleRad),
                                ];
                                $outerEnd = [
                                    'x' => 300 + $outerRadius * cos($endAngleRad),
                                    'y' => 300 + $outerRadius * sin($endAngleRad),
                                ];
                                $innerStart = [
                                    'x' => 300 + $innerRadius * cos($startAngleRad),
                                    'y' => 300 + $innerRadius * sin($startAngleRad),
                                ];
                                $innerEnd = [
                                    'x' => 300 + $innerRadius * cos($endAngleRad),
                                    'y' => 300 + $innerRadius * sin($endAngleRad),
                                ];
                                $arrowLeftBase = [
                                    'x' => 300 + $innerRadius * cos($arrowStartAngleRad),
                                    'y' => 300 + $innerRadius * sin($arrowStartAngleRad),
                                ];
                                $arrowRightBase = [
                                    'x' => 300 + $innerRadius * cos($arrowEndAngleRad),
                                    'y' => 300 + $innerRadius * sin($arrowEndAngleRad),
                                ];
                                $arrowPoint = [
                                    'x' => 300 + ($innerRadius - $arrowDepth) * cos($midAngleRad),
                                    'y' => 300 + ($innerRadius - $arrowDepth) * sin($midAngleRad),
                                ];

                                $pathData = "
                                    M {$outerStart['x']} {$outerStart['y']}
                                    A {$outerRadius} {$outerRadius} 0 0 1 {$outerEnd['x']} {$outerEnd['y']}
                                    L {$innerEnd['x']} {$innerEnd['y']}
                                    L {$arrowRightBase['x']} {$arrowRightBase['y']}
                                    L {$arrowPoint['x']} {$arrowPoint['y']}
                                    L {$arrowLeftBase['x']} {$arrowLeftBase['y']}
                                    L {$innerStart['x']} {$innerStart['y']}
                                    Z
                                ";

                                $fillColor = $section['color'] === 'orange' ? '#FF8C00' : '#0D9BA6';

                                // Label position
                                $labelAngle = $angle + ($angle_step / 2);
                                $labelAngleRad = deg2rad($labelAngle - 90);
                                $labelRadius = 205;
                                $labelX = 300 + $labelRadius * cos($labelAngleRad);
                                $labelY = 300 + $labelRadius * sin($labelAngleRad);

                                $id = $section['_id']; // Elementor repeater ID
                            ?>
                            <g class="allocore-nav-segment cursor-pointer group"
                               data-id="<?php echo esc_attr($id); ?>"
                               data-angle="<?php echo esc_attr($angle); ?>"
                               data-color="<?php echo esc_attr($section['color']); ?>">
                                <path d="<?php echo $pathData; ?>"
                                      fill="<?php echo $fillColor; ?>"
                                      stroke="white"
                                      stroke-width="3"
                                      class="transition-all duration-200 hover:brightness-110 allocore-segment-path"
                                      style="filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));"
                                      ></path>
                                <text x="<?php echo $labelX; ?>" y="<?php echo $labelY; ?>"
                                      text-anchor="middle"
                                      dominant-baseline="middle"
                                      class="pointer-events-none select-none font-medium uppercase tracking-wide allocore-segment-label"
                                      style="font-size: 13px; fill: #1A1A1A; font-family: 'Work Sans', sans-serif; font-weight: 600; transform-origin: <?php echo $labelX; ?>px <?php echo $labelY; ?>px;"
                                      >
                                    <?php
                                    $lines = explode("\n", $section['short_label']);
                                    if (count($lines) === 1) {
                                        echo esc_html($lines[0]);
                                    } else {
                                        foreach ($lines as $idx => $line) {
                                            $dy = $idx === 0 ? "-0.4em" : "1.1em";
                                            echo '<tspan x="' . $labelX . '" dy="' . $dy . '">' . esc_html($line) . '</tspan>';
                                        }
                                    }
                                    ?>
                                </text>
                            </g>
                            <?php endforeach; ?>
                        </svg>

                        <!-- Center Circle -->
                        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[45%] h-[45%] rounded-full bg-white shadow-lg flex flex-col items-center justify-center text-center p-4 md:p-6 lg:p-8" style="box-shadow: 0 8px 24px rgba(0,0,0,0.12);">
                            <h1 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-foreground mb-1 md:mb-2" style="font-family: 'Rajdhani', sans-serif;">
                                <?php echo esc_html($settings['main_title']); ?>
                            </h1>
                            <p class="text-[10px] sm:text-xs md:text-sm text-muted-foreground leading-tight" style="font-family: 'Work Sans', sans-serif;">
                                <?php echo esc_html($settings['main_subtitle']); ?>
                            </p>
                        </div>
                    </div>

                    <!-- Content Section -->
                    <div class="w-full max-w-2xl lg:max-w-xl mt-8 lg:mt-0 allocore-content-container">
                        <!-- Default Content -->
                        <div class="allocore-content-item bg-card rounded-lg shadow-xl p-6 md:p-8 border-2 border-[#FF8C00]" data-id="default">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-2 h-12 rounded-full bg-[#FF8C00]"></div>
                                <h2 class="text-2xl md:text-3xl font-bold" style="font-family: 'Rajdhani', sans-serif;">
                                    <?php echo esc_html($settings['main_title']); ?>
                                </h2>
                            </div>
                            <p class="text-sm md:text-base text-muted-foreground mb-6 leading-relaxed">
                                <?php echo esc_html($settings['main_subtitle']); ?>
                            </p>
                            <div>
                                <h3 class="text-lg md:text-xl font-semibold mb-3">Sections:</h3>
                                <ul class="space-y-2">
                                    <?php foreach ($sections as $section) :
                                         $bulletColor = $section['color'] === 'orange' ? '#FF8C00' : '#0D9BA6';
                                    ?>
                                    <li class="flex items-start gap-3 text-sm md:text-base">
                                        <div class="w-1.5 h-1.5 rounded-full mt-2 flex-shrink-0" style="background-color: <?php echo $bulletColor; ?>"></div>
                                        <span class="text-foreground"><?php echo esc_html($section['label']); ?></span>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>

                        <!-- Dynamic Content Sections -->
                        <?php foreach ($sections as $section) :
                            $borderColor = $section['color'] === 'orange' ? '#FF8C00' : '#0D9BA6';
                            $bulletColor = $section['color'] === 'orange' ? '#FF8C00' : '#0D9BA6';
                            $benefits = explode("\n", $section['benefits']);
                            $id = $section['_id'];
                        ?>
                        <div class="allocore-content-item hidden bg-card rounded-lg shadow-xl p-6 md:p-8 border-2 animate-in fade-in slide-in-from-bottom-8 lg:slide-in-from-right-8 duration-500"
                             data-id="<?php echo esc_attr($id); ?>"
                             style="border-color: <?php echo $borderColor; ?>;">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-2 h-12 rounded-full" style="background-color: <?php echo $borderColor; ?>;"></div>
                                <h2 class="text-2xl md:text-3xl font-bold" style="font-family: 'Rajdhani', sans-serif;">
                                    <?php echo esc_html($section['title']); ?>
                                </h2>
                            </div>
                            <p class="text-sm md:text-base text-muted-foreground mb-6 leading-relaxed">
                                <?php echo esc_html($section['description']); ?>
                            </p>
                            <div>
                                <h3 class="text-lg md:text-xl font-semibold mb-3">Ihre Vorteile:</h3>
                                <ul class="space-y-2">
                                    <?php foreach ($benefits as $benefit) :
                                        if (trim($benefit) === '') continue;
                                    ?>
                                    <li class="flex items-start gap-3 text-sm md:text-base">
                                        <div class="w-1.5 h-1.5 rounded-full mt-2 flex-shrink-0" style="background-color: <?php echo $bulletColor; ?>;"></div>
                                        <span class="text-foreground"><?php echo esc_html($benefit); ?></span>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
