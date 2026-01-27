/**
 * CircularNav Component - Kinetic Constructivism Design
 * 
 * Design Philosophy:
 * - Dynamic Geometry: Arrow shapes that suggest clockwise motion
 * - Mechanical Precision: Smooth, weighted rotation with cubic-bezier easing
 * - Energy Through Contrast: Bold orange and teal color blocking
 * - Functional Motion: Rotation reinforces the circular workflow concept
 */

import { useState } from "react";

interface Section {
  id: string;
  label: string;
  shortLabel: string; // For display in circle (may contain \n for line breaks)
  color: "orange" | "teal";
  angle: number; // Starting angle in degrees
  title: string;
  description: string;
  benefits: string[];
}

const sections: Section[] = [
  {
    id: "networking",
    label: "Networking",
    shortLabel: "Networking",
    color: "orange",
    angle: 0,
    title: "Networking",
    description: "Bauen Sie strategische Beziehungen auf und erweitern Sie Ihr professionelles Netzwerk. Networking ist der Schlüssel zu neuen Geschäftsmöglichkeiten und langfristigem Erfolg.",
    benefits: [
      "Zugang zu neuen Geschäftspartnern und Kunden",
      "Erweiterung Ihrer Branchenkenntnisse",
      "Stärkung Ihrer Marktposition",
      "Aufbau vertrauensvoller Geschäftsbeziehungen",
    ],
  },
  {
    id: "kerngeschaeft",
    label: "Kerngeschaeft",
    shortLabel: "Kern-\ngeschaeft",
    color: "orange",
    angle: 72,
    title: "Kerngeschäft",
    description: "Fokussieren Sie sich auf Ihre Kernkompetenzen und optimieren Sie Ihre Hauptgeschäftsprozesse. Ein starkes Kerngeschäft bildet das Fundament für nachhaltiges Wachstum.",
    benefits: [
      "Klare Fokussierung auf Ihre Stärken",
      "Effiziente Ressourcennutzung",
      "Höhere Wettbewerbsfähigkeit",
      "Verbesserte Produktqualität und Kundenzufriedenheit",
    ],
  },
  {
    id: "finanzsteuerung",
    label: "Finanzsteuerung",
    shortLabel: "Finanz-\nsteuerung",
    color: "teal",
    angle: 144,
    title: "Finanzsteuerung",
    description: "Behalten Sie Ihre Finanzen im Griff durch professionelles Controlling und strategische Planung. Transparente Finanzsteuerung sichert Ihre Liquidität und Rentabilität.",
    benefits: [
      "Vollständige Transparenz über Ihre Finanzen",
      "Frühzeitige Erkennung von Risiken",
      "Optimierte Liquiditätsplanung",
      "Fundierte Entscheidungsgrundlagen",
    ],
  },
  {
    id: "vereinfachtes",
    label: "Vereinfachtes Angebot",
    shortLabel: "Vereinf.\nAngebot",
    color: "orange",
    angle: 216,
    title: "Vereinfachtes Angebot",
    description: "Reduzieren Sie Komplexität und schaffen Sie klare, verständliche Angebote für Ihre Kunden. Einfachheit schafft Vertrauen und beschleunigt Kaufentscheidungen.",
    benefits: [
      "Schnellere Kundenentscheidungen",
      "Reduzierte Verkaufszyklen",
      "Höhere Conversion-Raten",
      "Verbesserte Kundenkommunikation",
    ],
  },
  {
    id: "website",
    label: "Website/SEO",
    shortLabel: "Website/\nSEO",
    color: "teal",
    angle: 288,
    title: "Website/SEO",
    description: "Erhöhen Sie Ihre Online-Sichtbarkeit und gewinnen Sie mehr Kunden über digitale Kanäle. Eine optimierte Website ist Ihr wichtigstes Marketing-Instrument.",
    benefits: [
      "Bessere Auffindbarkeit in Suchmaschinen",
      "Professioneller Online-Auftritt",
      "Mehr qualifizierte Leads",
      "24/7 Kundenerreichbarkeit",
    ],
  },
];

export default function CircularNav() {
  const [rotation, setRotation] = useState(0);
  const [activeSection, setActiveSection] = useState<string | null>('default');
  const [hoveredSection, setHoveredSection] = useState<string | null>(null);

  const handleSectionClick = (sectionAngle: number, sectionId: string) => {
    // Calculate the rotation needed to bring this section to the top (0 degrees)
    // We want the section to rotate clockwise to the top position
    const targetRotation = -sectionAngle;
    setRotation(targetRotation);
    setActiveSection(sectionId);
  };

  const activeContent = activeSection
    ? sections.find((s) => s.id === activeSection)
    : null;

  return (
    <div className="min-h-screen bg-background py-8 md:py-12">
      <div className="container mx-auto px-4">
      <div className="flex flex-col lg:flex-row items-center justify-center gap-8 lg:gap-16">
      {/* Circle Container */}
      <div className="relative w-full max-w-[350px] sm:max-w-[450px] md:max-w-[500px] lg:max-w-[600px] aspect-square flex-shrink-0">
        {/* SVG Container for Arrow Segments */}
        <svg
          viewBox="0 0 600 600"
          className="w-full h-full transition-transform duration-700 ease-[cubic-bezier(0.65,0,0.35,1)]"
          style={{ transform: `rotate(${rotation}deg)` }}
        >
          {/* Define arrow segment paths */}
          {sections.map((section, index) => {
            const startAngle = section.angle - 90; // SVG starts at 12 o'clock
            const endAngle = startAngle + 72;
            const outerRadius = 280;
            const innerRadius = 160;
            const arrowDepth = 35; // Deeper arrow protrusion for more pronounced effect
            const arrowWidth = 0.4; // Arrow occupies 40% of the segment width

            // Calculate path points for arrow segment
            const startAngleRad = (startAngle * Math.PI) / 180;
            const endAngleRad = (endAngle * Math.PI) / 180;
            const midAngleRad = ((startAngle + 36) * Math.PI) / 180;
            
            // Arrow side angles (for wider, more prominent arrows)
            const arrowStartAngleRad = ((startAngle + 36 - 36 * arrowWidth) * Math.PI) / 180;
            const arrowEndAngleRad = ((startAngle + 36 + 36 * arrowWidth) * Math.PI) / 180;

            // Outer arc points
            const outerStart = {
              x: 300 + outerRadius * Math.cos(startAngleRad),
              y: 300 + outerRadius * Math.sin(startAngleRad),
            };
            const outerEnd = {
              x: 300 + outerRadius * Math.cos(endAngleRad),
              y: 300 + outerRadius * Math.sin(endAngleRad),
            };

            // Inner arc points
            const innerStart = {
              x: 300 + innerRadius * Math.cos(startAngleRad),
              y: 300 + innerRadius * Math.sin(startAngleRad),
            };
            const innerEnd = {
              x: 300 + innerRadius * Math.cos(endAngleRad),
              y: 300 + innerRadius * Math.sin(endAngleRad),
            };
            
            // Arrow chevron points (wider base)
            const arrowLeftBase = {
              x: 300 + innerRadius * Math.cos(arrowStartAngleRad),
              y: 300 + innerRadius * Math.sin(arrowStartAngleRad),
            };
            const arrowRightBase = {
              x: 300 + innerRadius * Math.cos(arrowEndAngleRad),
              y: 300 + innerRadius * Math.sin(arrowEndAngleRad),
            };
            const arrowPoint = {
              x: 300 + (innerRadius - arrowDepth) * Math.cos(midAngleRad),
              y: 300 + (innerRadius - arrowDepth) * Math.sin(midAngleRad),
            };

            // Create path with prominent arrow chevron pointing inward (clockwise flow)
            const pathData = `
              M ${outerStart.x} ${outerStart.y}
              A ${outerRadius} ${outerRadius} 0 0 1 ${outerEnd.x} ${outerEnd.y}
              L ${innerEnd.x} ${innerEnd.y}
              L ${arrowRightBase.x} ${arrowRightBase.y}
              L ${arrowPoint.x} ${arrowPoint.y}
              L ${arrowLeftBase.x} ${arrowLeftBase.y}
              L ${innerStart.x} ${innerStart.y}
              Z
            `;

            const isActive = activeSection === section.id;
            const fillColor =
              section.color === "orange"
                ? isActive
                  ? "#FF9D33"
                  : "#FF8C00"
                : isActive
                ? "#1FB0B8"
                : "#0D9BA6";

            // Calculate label position (moved slightly inward)
            const labelAngle = section.angle + 36;
            const labelAngleRad = ((labelAngle - 90) * Math.PI) / 180;
            const labelRadius = 205; // Reduced from 220 to move text inward
            const labelX = 300 + labelRadius * Math.cos(labelAngleRad);
            const labelY = 300 + labelRadius * Math.sin(labelAngleRad);
            
            // Counter-rotate text to keep it upright (cancel out the circle's rotation)
            // This ensures text is always readable regardless of circle position
            const textRotation = -rotation;
            
            // Split label into lines if it contains \n
            const labelLines = section.shortLabel.split('\n');

            return (
              <g key={section.id}>
                {/* Arrow segment */}
                <path
                  d={pathData}
                  fill={fillColor}
                  stroke="white"
                  strokeWidth="3"
                  className="cursor-pointer transition-all duration-200 hover:brightness-110"
                  style={{
                    filter: isActive
                      ? "drop-shadow(0 4px 12px rgba(0,0,0,0.2))"
                      : "drop-shadow(0 2px 4px rgba(0,0,0,0.1))",
                  }}
                  onClick={() => handleSectionClick(section.angle, section.id)}
                />
                
                {/* Label text - multi-line support */}
                <text
                  x={labelX}
                  y={labelY}
                  textAnchor="middle"
                  dominantBaseline="middle"
                  className="pointer-events-none select-none font-medium uppercase tracking-wide"
                  style={{
                    fontSize: "13px",
                    fill: "#1A1A1A",
                    fontFamily: "Work Sans, sans-serif",
                    fontWeight: 600,
                    transform: `rotate(${textRotation}deg)`,
                    transformOrigin: `${labelX}px ${labelY}px`,
                  }}
                >
                  {labelLines.length === 1 ? (
                    section.shortLabel
                  ) : (
                    labelLines.map((line, idx) => (
                      <tspan
                        key={idx}
                        x={labelX}
                        dy={idx === 0 ? "-0.4em" : "1.1em"}
                      >
                        {line}
                      </tspan>
                    ))
                  )}
                </text>
              </g>
            );
          })}
        </svg>

        {/* Center Circle */}
        <div
          className="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[45%] h-[45%] rounded-full bg-white shadow-lg flex flex-col items-center justify-center text-center p-4 md:p-6 lg:p-8"
          style={{
            boxShadow: "0 8px 24px rgba(0,0,0,0.12)",
          }}
        >
          <h1 className="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-foreground mb-1 md:mb-2" style={{ fontFamily: "Rajdhani, sans-serif" }}>
            allocore-Methode
          </h1>
          <p className="text-[10px] sm:text-xs md:text-sm text-muted-foreground leading-tight" style={{ fontFamily: "Work Sans, sans-serif" }}>
            Start an jeder Stelle Ziel: Profit & Effektivitaet
          </p>
        </div>
      </div>

      {/* Tooltip */}
      {hoveredSection && activeSection !== 'default' && !activeSection && (
        <div className="absolute top-4 md:top-8 left-1/2 transform -translate-x-1/2 z-20 animate-in fade-in slide-in-from-top-2 duration-200">
          <div className="bg-slate-800 text-white px-4 py-2 rounded-lg shadow-lg text-sm font-medium max-w-sm">
            <div className="text-center font-semibold">
              {sections.find((s) => s.id === hoveredSection)?.label}
            </div>
            <div className="text-xs text-slate-300 mt-1 text-center">
              {sections.find((s) => s.id === hoveredSection)?.description.slice(0, 100)}...
            </div>
            {/* Arrow pointing down */}
            <div className="absolute -bottom-1 left-1/2 transform -translate-x-1/2 w-2 h-2 bg-slate-800 rotate-45"></div>
          </div>
        </div>
      )}

      {/* Content Section */}
      <div className="w-full max-w-2xl lg:max-w-xl mt-8 lg:mt-0">
        {activeSection === 'default' ? (
          <div className="bg-card rounded-lg shadow-xl p-6 md:p-8 border-2 border-[#FF8C00]">
            <div className="flex items-center gap-3 mb-4">
              <div className="w-2 h-12 rounded-full bg-[#FF8C00]" />
              <h2 className="text-2xl md:text-3xl font-bold" style={{ fontFamily: "Rajdhani, sans-serif" }}>
                Die allocore-Methode
              </h2>
            </div>
            <p className="text-sm md:text-base text-muted-foreground mb-6 leading-relaxed">
              Ein ganzheitliches System für nachhaltiges Wachstum. Klicken Sie auf einen Bereich im Kreis, um mehr über die einzelnen Komponenten zu erfahren.
            </p>
            <div>
              <h3 className="text-lg md:text-xl font-semibold mb-3">Die 5 Säulen:</h3>
              <ul className="space-y-2">
                <li className="flex items-start gap-3 text-sm md:text-base">
                  <div className="w-1.5 h-1.5 rounded-full mt-2 flex-shrink-0 bg-[#FF8C00]" />
                  <span className="text-foreground">5 integrierte Bereiche für maximale Effizienz</span>
                </li>
                <li className="flex items-start gap-3 text-sm md:text-base">
                  <div className="w-1.5 h-1.5 rounded-full mt-2 flex-shrink-0 bg-[#FF8C00]" />
                  <span className="text-foreground">Start an jeder Stelle möglich</span>
                </li>
                <li className="flex items-start gap-3 text-sm md:text-base">
                  <div className="w-1.5 h-1.5 rounded-full mt-2 flex-shrink-0 bg-[#FF8C00]" />
                  <span className="text-foreground">Ziel: Mehr Profit und Effektivität</span>
                </li>
                <li className="flex items-start gap-3 text-sm md:text-base">
                  <div className="w-1.5 h-1.5 rounded-full mt-2 flex-shrink-0 bg-[#FF8C00]" />
                  <span className="text-foreground">Messbare Ergebnisse in allen Bereichen</span>
                </li>
              </ul>
            </div>
          </div>
        ) : activeContent ? (
              <div
                className="bg-card rounded-lg shadow-xl p-6 md:p-8 border-2 animate-in fade-in slide-in-from-bottom-8 lg:slide-in-from-right-8 duration-500"
                style={{
                  borderColor:
                    activeContent.color === "orange" ? "#FF8C00" : "#0D9BA6",
                }}
              >
                <div className="flex items-center gap-3 mb-4">
                  <div
                    className="w-2 h-12 rounded-full"
                    style={{
                      backgroundColor:
                        activeContent.color === "orange" ? "#FF8C00" : "#0D9BA6",
                    }}
                  />
                  <h2
                    className="text-2xl md:text-3xl font-bold"
                    style={{ fontFamily: "Rajdhani, sans-serif" }}
                  >
                    {activeContent.title}
                  </h2>
                </div>
                <p className="text-sm md:text-base text-muted-foreground mb-6 leading-relaxed">
                  {activeContent.description}
                </p>
                <div>
                  <h3 className="text-lg md:text-xl font-semibold mb-3">Ihre Vorteile:</h3>
                  <ul className="space-y-2">
                    {activeContent.benefits.map((benefit, index) => (
                      <li key={index} className="flex items-start gap-3 text-sm md:text-base">
                        <div
                          className="w-1.5 h-1.5 rounded-full mt-2 flex-shrink-0"
                          style={{
                            backgroundColor:
                              activeContent.color === "orange"
                                ? "#FF8C00"
                                : "#0D9BA6",
                          }}
                        />
                        <span className="text-foreground">{benefit}</span>
                      </li>
                    ))}
                  </ul>
                </div>
          </div>
        ) : null}
      </div>
    </div>
    </div>
  </div>
  );
}
