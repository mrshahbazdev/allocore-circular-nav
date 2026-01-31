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

    protected function render() {
        $sections = [
            [
                'id' => 'networking',
                'label' => 'Networking',
                'shortLabel' => "Networking",
                'color' => 'orange',
                'angle' => 0,
                'title' => 'Networking',
                'description' => 'Bauen Sie strategische Beziehungen auf und erweitern Sie Ihr professionelles Netzwerk. Networking ist der Schlüssel zu neuen Geschäftsmöglichkeiten und langfristigem Erfolg.',
                'benefits' => [
                    'Zugang zu neuen Geschäftspartnern und Kunden',
                    'Erweiterung Ihrer Branchenkenntnisse',
                    'Stärkung Ihrer Marktposition',
                    'Aufbau vertrauensvoller Geschäftsbeziehungen',
                ],
            ],
            [
                'id' => 'kerngeschaeft',
                'label' => 'Kerngeschaeft',
                'shortLabel' => "Kern-\ngeschaeft",
                'color' => 'orange',
                'angle' => 72,
                'title' => 'Kerngeschäft',
                'description' => 'Fokussieren Sie sich auf Ihre Kernkompetenzen und optimieren Sie Ihre Hauptgeschäftsprozesse. Ein starkes Kerngeschäft bildet das Fundament für nachhaltiges Wachstum.',
                'benefits' => [
                    'Klare Fokussierung auf Ihre Stärken',
                    'Effiziente Ressourcennutzung',
                    'Höhere Wettbewerbsfähigkeit',
                    'Verbesserte Produktqualität und Kundenzufriedenheit',
                ],
            ],
            [
                'id' => 'finanzsteuerung',
                'label' => 'Finanzsteuerung',
                'shortLabel' => "Finanz-\nsteuerung",
                'color' => 'teal',
                'angle' => 144,
                'title' => 'Finanzsteuerung',
                'description' => 'Behalten Sie Ihre Finanzen im Griff durch professionelles Controlling und strategische Planung. Transparente Finanzsteuerung sichert Ihre Liquidität und Rentabilität.',
                'benefits' => [
                    'Vollständige Transparenz über Ihre Finanzen',
                    'Frühzeitige Erkennung von Risiken',
                    'Optimierte Liquiditätsplanung',
                    'Fundierte Entscheidungsgrundlagen',
                ],
            ],
            [
                'id' => 'vereinfachtes',
                'label' => 'Vereinfachtes Angebot',
                'shortLabel' => "Vereinf.\nAngebot",
                'color' => 'orange',
                'angle' => 216,
                'title' => 'Vereinfachtes Angebot',
                'description' => 'Reduzieren Sie Komplexität und schaffen Sie klare, verständliche Angebote für Ihre Kunden. Einfachheit schafft Vertrauen und beschleunigt Kaufentscheidungen.',
                'benefits' => [
                    'Schnellere Kundenentscheidungen',
                    'Reduzierte Verkaufszyklen',
                    'Höhere Conversion-Raten',
                    'Verbesserte Kundenkommunikation',
                ],
            ],
            [
                'id' => 'website',
                'label' => 'Website/SEO',
                'shortLabel' => "Website/\nSEO",
                'color' => 'teal',
                'angle' => 288,
                'title' => 'Website/SEO',
                'description' => 'Erhöhen Sie Ihre Online-Sichtbarkeit und gewinnen Sie mehr Kunden über digitale Kanäle. Eine optimierte Website ist Ihr wichtigstes Marketing-Instrument.',
                'benefits' => [
                    'Bessere Auffindbarkeit in Suchmaschinen',
                    'Professioneller Online-Auftritt',
                    'Mehr qualifizierte Leads',
                    '24/7 Kundenerreichbarkeit',
                ],
            ],
        ];

        ?>
        <div class="allocore-circular-nav-wrapper min-h-screen bg-background py-8 md:py-12">
            <div class="container mx-auto px-4">
                <div class="flex flex-col lg:flex-row items-center justify-center gap-8 lg:gap-16">
                    <!-- Circle Container -->
                    <div class="relative w-full max-w-[350px] sm:max-w-[450px] md:max-w-[500px] lg:max-w-[600px] aspect-square flex-shrink-0">
                        <svg viewBox="0 0 600 600" class="allocore-circular-svg w-full h-full transition-transform duration-700 ease-[cubic-bezier(0.65,0,0.35,1)]">
                            <?php foreach ($sections as $section) :
                                $startAngle = $section['angle'] - 90;
                                $endAngle = $startAngle + 72;
                                $outerRadius = 280;
                                $innerRadius = 160;
                                $arrowDepth = 35;
                                $arrowWidth = 0.4;

                                $startAngleRad = deg2rad($startAngle);
                                $endAngleRad = deg2rad($endAngle);
                                $midAngleRad = deg2rad($startAngle + 36);

                                $arrowStartAngleRad = deg2rad($startAngle + 36 - 36 * $arrowWidth);
                                $arrowEndAngleRad = deg2rad($startAngle + 36 + 36 * $arrowWidth);

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
                                $labelAngle = $section['angle'] + 36;
                                $labelAngleRad = deg2rad($labelAngle - 90);
                                $labelRadius = 205;
                                $labelX = 300 + $labelRadius * cos($labelAngleRad);
                                $labelY = 300 + $labelRadius * sin($labelAngleRad);
                            ?>
                            <g class="allocore-nav-segment cursor-pointer group"
                               data-id="<?php echo esc_attr($section['id']); ?>"
                               data-angle="<?php echo esc_attr($section['angle']); ?>"
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
                                    $lines = explode("\n", $section['shortLabel']);
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
                                allocore-Methode
                            </h1>
                            <p class="text-[10px] sm:text-xs md:text-sm text-muted-foreground leading-tight" style="font-family: 'Work Sans', sans-serif;">
                                Start an jeder Stelle Ziel: Profit & Effektivitaet
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
                                    Die allocore-Methode
                                </h2>
                            </div>
                            <p class="text-sm md:text-base text-muted-foreground mb-6 leading-relaxed">
                                Ein ganzheitliches System für nachhaltiges Wachstum. Klicken Sie auf einen Bereich im Kreis, um mehr über die einzelnen Komponenten zu erfahren.
                            </p>
                            <div>
                                <h3 class="text-lg md:text-xl font-semibold mb-3">Die 5 Säulen:</h3>
                                <ul class="space-y-2">
                                    <li class="flex items-start gap-3 text-sm md:text-base">
                                        <div class="w-1.5 h-1.5 rounded-full mt-2 flex-shrink-0 bg-[#FF8C00]"></div>
                                        <span class="text-foreground">5 integrierte Bereiche für maximale Effizienz</span>
                                    </li>
                                    <li class="flex items-start gap-3 text-sm md:text-base">
                                        <div class="w-1.5 h-1.5 rounded-full mt-2 flex-shrink-0 bg-[#FF8C00]"></div>
                                        <span class="text-foreground">Start an jeder Stelle möglich</span>
                                    </li>
                                    <li class="flex items-start gap-3 text-sm md:text-base">
                                        <div class="w-1.5 h-1.5 rounded-full mt-2 flex-shrink-0 bg-[#FF8C00]"></div>
                                        <span class="text-foreground">Ziel: Mehr Profit und Effektivität</span>
                                    </li>
                                    <li class="flex items-start gap-3 text-sm md:text-base">
                                        <div class="w-1.5 h-1.5 rounded-full mt-2 flex-shrink-0 bg-[#FF8C00]"></div>
                                        <span class="text-foreground">Messbare Ergebnisse in allen Bereichen</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Dynamic Content Sections -->
                        <?php foreach ($sections as $section) :
                            $borderColor = $section['color'] === 'orange' ? '#FF8C00' : '#0D9BA6';
                            $bulletColor = $section['color'] === 'orange' ? '#FF8C00' : '#0D9BA6';
                        ?>
                        <div class="allocore-content-item hidden bg-card rounded-lg shadow-xl p-6 md:p-8 border-2 animate-in fade-in slide-in-from-bottom-8 lg:slide-in-from-right-8 duration-500"
                             data-id="<?php echo esc_attr($section['id']); ?>"
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
                                    <?php foreach ($section['benefits'] as $benefit) : ?>
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
