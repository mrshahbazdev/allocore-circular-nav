import Header from "@/components/Header";
import AnimatedSection from "@/components/AnimatedSection";
import { Button } from "@/components/ui/button";
import {
  ArrowRight,
  Check,
  Sparkles,
  Crown,
  Zap,
  Building2,
} from "lucide-react";
import { Link } from "wouter";
import { bundles, tools } from "@/lib/tools-data";

const bundleIcons = {
  starter: Zap,
  professional: Crown,
  enterprise: Building2,
};

export default function Pricing() {
  return (
    <div className="min-h-screen flex flex-col bg-background">
      <Header />

      {/* Hero */}
      <section className="relative pt-28 pb-16 overflow-hidden">
        <div className="absolute inset-0 bg-gradient-to-br from-[#FF8C00]/5 via-transparent to-[#0D9BA6]/5" />
        <div
          className="absolute inset-0"
          style={{
            backgroundImage: `radial-gradient(circle at 2px 2px, rgba(13, 155, 166, 0.05) 1px, transparent 0)`,
            backgroundSize: "48px 48px",
          }}
        />
        <div className="container relative z-10">
          <div className="max-w-4xl mx-auto text-center">
            <div className="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#FF8C00]/10 border border-[#FF8C00]/20 mb-8">
              <Sparkles className="w-4 h-4 text-[#FF8C00]" />
              <span
                className="text-sm font-semibold text-[#FF8C00]"
                style={{ fontFamily: "Rajdhani, sans-serif" }}
              >
                Transparente Preise
              </span>
            </div>
            <h1
              className="text-5xl md:text-7xl font-bold mb-6 leading-[1.1] tracking-tight"
              style={{ fontFamily: "Rajdhani, sans-serif" }}
            >
              Wählen Sie Ihr{" "}
              <span className="relative inline-block">
                <span className="relative z-10 text-[#FF8C00]">Bundle</span>
                <div className="absolute bottom-2 left-0 right-0 h-4 bg-[#FF8C00]/20 -rotate-1" />
              </span>
            </h1>
            <p
              className="text-xl text-muted-foreground mb-4 max-w-2xl mx-auto leading-relaxed"
              style={{ fontFamily: "Work Sans, sans-serif" }}
            >
              Alle allocore Tools in einem Paket — sparen Sie bis zu 60%
              gegenüber Einzellizenzen
            </p>
          </div>
        </div>
      </section>

      {/* Pricing Cards */}
      <section className="py-16">
        <div className="container">
          <div className="grid md:grid-cols-3 gap-8 max-w-7xl mx-auto items-stretch">
            {bundles.map((bundle, index) => {
              const Icon =
                bundleIcons[bundle.id as keyof typeof bundleIcons] || Zap;
              const bundleTools = bundle.toolIds
                .map(id => tools.find(t => t.id === id))
                .filter(Boolean);

              return (
                <AnimatedSection
                  key={bundle.id}
                  delay={index * 150}
                  animation="fade-up"
                >
                  <div
                    className={`relative h-full bg-card rounded-3xl border-2 transition-all duration-300 hover:shadow-2xl flex flex-col ${
                      bundle.highlighted
                        ? "border-[#FF8C00] shadow-xl scale-[1.02]"
                        : "border-border hover:border-[#FF8C00]"
                    }`}
                  >
                    {bundle.highlighted && (
                      <div
                        className="absolute -top-4 left-1/2 -translate-x-1/2 px-6 py-1.5 bg-[#FF8C00] text-white text-sm font-bold rounded-full shadow-lg"
                        style={{ fontFamily: "Rajdhani, sans-serif" }}
                      >
                        Meistverkauft
                      </div>
                    )}

                    <div className="p-10 flex flex-col flex-1">
                      {/* Header */}
                      <div className="mb-8">
                        <div
                          className="w-14 h-14 rounded-xl flex items-center justify-center mb-4"
                          style={{ backgroundColor: `${bundle.color}20` }}
                        >
                          <Icon
                            className="w-7 h-7"
                            style={{ color: bundle.color }}
                          />
                        </div>
                        <h3
                          className="text-3xl font-bold mb-1"
                          style={{ fontFamily: "Rajdhani, sans-serif" }}
                        >
                          {bundle.name}
                        </h3>
                        <p
                          className="text-sm font-semibold mb-4"
                          style={{
                            color: bundle.color,
                            fontFamily: "Rajdhani, sans-serif",
                          }}
                        >
                          {bundle.tagline}
                        </p>
                        <p
                          className="text-muted-foreground text-sm leading-relaxed"
                          style={{ fontFamily: "Work Sans, sans-serif" }}
                        >
                          {bundle.description}
                        </p>
                      </div>

                      {/* Price */}
                      <div className="mb-8 pb-8 border-b border-border">
                        <div className="flex items-baseline gap-1">
                          <span
                            className="text-5xl font-bold"
                            style={{
                              color: bundle.color,
                              fontFamily: "Rajdhani, sans-serif",
                            }}
                          >
                            €{bundle.price}
                          </span>
                        </div>
                        <p
                          className="text-sm text-muted-foreground mt-1"
                          style={{ fontFamily: "Work Sans, sans-serif" }}
                        >
                          {bundle.priceNote}
                        </p>
                      </div>

                      {/* Tools included */}
                      <div className="mb-8 flex-1">
                        <p
                          className="text-sm font-bold uppercase tracking-wider mb-4"
                          style={{
                            color: bundle.color,
                            fontFamily: "Rajdhani, sans-serif",
                          }}
                        >
                          {bundleTools.length} Tools inklusive
                        </p>
                        <div className="space-y-2.5">
                          {bundleTools.map(tool => {
                            if (!tool) return null;
                            const ToolIcon = tool.icon;
                            return (
                              <div
                                key={tool.id}
                                className="flex items-center gap-3"
                              >
                                <ToolIcon
                                  className="w-4 h-4 flex-shrink-0"
                                  style={{ color: tool.color }}
                                />
                                <span
                                  className="text-sm"
                                  style={{
                                    fontFamily: "Work Sans, sans-serif",
                                  }}
                                >
                                  {tool.name}
                                </span>
                              </div>
                            );
                          })}
                        </div>
                      </div>

                      {/* Extras */}
                      <div className="mb-8">
                        <p
                          className="text-sm font-bold uppercase tracking-wider mb-4 text-muted-foreground"
                          style={{ fontFamily: "Rajdhani, sans-serif" }}
                        >
                          Zusätzlich
                        </p>
                        <div className="space-y-2">
                          {bundle.extras.map((extra, i) => (
                            <div key={i} className="flex items-center gap-2">
                              <Check
                                className="w-4 h-4 flex-shrink-0"
                                style={{ color: bundle.color }}
                              />
                              <span
                                className="text-sm text-muted-foreground"
                                style={{
                                  fontFamily: "Work Sans, sans-serif",
                                }}
                              >
                                {extra}
                              </span>
                            </div>
                          ))}
                        </div>
                      </div>

                      {/* CTA */}
                      <Button
                        className={`w-full font-bold text-lg py-6 transition-all duration-300 hover:scale-[1.02] ${
                          bundle.highlighted
                            ? "bg-[#FF8C00] hover:bg-[#FF8C00]/90 text-white shadow-xl"
                            : "bg-card border-2 border-border hover:border-[#FF8C00] text-foreground hover:text-[#FF8C00]"
                        }`}
                        style={{ fontFamily: "Rajdhani, sans-serif" }}
                      >
                        {bundle.highlighted ? "Jetzt starten" : "Bundle wählen"}
                        <ArrowRight className="ml-2 w-5 h-5" />
                      </Button>
                    </div>
                  </div>
                </AnimatedSection>
              );
            })}
          </div>
        </div>
      </section>

      {/* Comparison Table */}
      <section className="py-16 bg-gradient-to-b from-background to-muted/20">
        <div className="container">
          <AnimatedSection animation="fade-up">
            <div className="text-center mb-12">
              <h2
                className="text-4xl md:text-5xl font-bold mb-4"
                style={{ fontFamily: "Rajdhani, sans-serif" }}
              >
                Bundle-<span className="text-[#FF8C00]">Vergleich</span>
              </h2>
              <p
                className="text-lg text-muted-foreground"
                style={{ fontFamily: "Work Sans, sans-serif" }}
              >
                Welche Tools sind in welchem Bundle enthalten?
              </p>
            </div>
          </AnimatedSection>

          <AnimatedSection delay={200} animation="fade-up">
            <div className="max-w-5xl mx-auto overflow-x-auto">
              <table className="w-full border-collapse">
                <thead>
                  <tr>
                    <th
                      className="text-left p-4 border-b-2 border-border"
                      style={{ fontFamily: "Rajdhani, sans-serif" }}
                    >
                      Tool
                    </th>
                    {bundles.map(b => (
                      <th
                        key={b.id}
                        className="text-center p-4 border-b-2 border-border"
                        style={{ fontFamily: "Rajdhani, sans-serif" }}
                      >
                        <span
                          className="font-bold text-lg"
                          style={{ color: b.color }}
                        >
                          {b.name}
                        </span>
                      </th>
                    ))}
                  </tr>
                </thead>
                <tbody>
                  {tools.map(tool => {
                    const ToolIcon = tool.icon;
                    return (
                      <tr
                        key={tool.id}
                        className="border-b border-border hover:bg-muted/30 transition-colors"
                      >
                        <td className="p-4">
                          <div className="flex items-center gap-3">
                            <ToolIcon
                              className="w-4 h-4"
                              style={{ color: tool.color }}
                            />
                            <span
                              className="font-semibold text-sm"
                              style={{
                                fontFamily: "Work Sans, sans-serif",
                              }}
                            >
                              {tool.name}
                            </span>
                          </div>
                        </td>
                        {bundles.map(b => (
                          <td key={b.id} className="text-center p-4">
                            {b.toolIds.includes(tool.id) ? (
                              <Check className="w-5 h-5 text-emerald-500 mx-auto" />
                            ) : (
                              <span className="text-muted-foreground/30">
                                —
                              </span>
                            )}
                          </td>
                        ))}
                      </tr>
                    );
                  })}
                </tbody>
              </table>
            </div>
          </AnimatedSection>
        </div>
      </section>

      {/* FAQ */}
      <section className="py-16">
        <div className="container">
          <AnimatedSection animation="fade-up">
            <div className="max-w-3xl mx-auto">
              <div className="text-center mb-12">
                <h2
                  className="text-4xl md:text-5xl font-bold mb-4"
                  style={{ fontFamily: "Rajdhani, sans-serif" }}
                >
                  Häufige{" "}
                  <span className="text-muted-foreground/60">Fragen</span>
                </h2>
              </div>

              <div className="space-y-6">
                {[
                  {
                    q: "Kann ich das Bundle jederzeit wechseln?",
                    a: "Ja, Sie können jederzeit auf ein höheres Bundle upgraden. Die Differenz wird anteilig berechnet. Ein Downgrade ist zum Ende der Laufzeit möglich.",
                  },
                  {
                    q: "Gibt es eine kostenlose Testphase?",
                    a: "Ja, jedes Bundle kann 14 Tage lang kostenlos und unverbindlich getestet werden. Keine Kreditkarte erforderlich.",
                  },
                  {
                    q: "Wie funktioniert die Nutzer-Verwaltung?",
                    a: "Jedes Bundle enthält eine bestimmte Anzahl an Nutzern. Zusätzliche Nutzer können jederzeit hinzugebucht werden.",
                  },
                  {
                    q: "Sind Updates inklusive?",
                    a: "Ja, alle Updates und neue Features sind in jedem Bundle inklusive. Enterprise-Kunden erhalten zusätzlich früheren Zugang zu neuen Tools.",
                  },
                ].map((faq, i) => (
                  <div
                    key={i}
                    className="bg-card p-8 rounded-2xl border-2 border-border hover:border-[#FF8C00] transition-colors"
                  >
                    <h3
                      className="text-xl font-bold mb-3"
                      style={{ fontFamily: "Rajdhani, sans-serif" }}
                    >
                      {faq.q}
                    </h3>
                    <p
                      className="text-muted-foreground leading-relaxed"
                      style={{ fontFamily: "Work Sans, sans-serif" }}
                    >
                      {faq.a}
                    </p>
                  </div>
                ))}
              </div>
            </div>
          </AnimatedSection>
        </div>
      </section>

      {/* CTA */}
      <section className="py-20 bg-gradient-to-b from-background to-muted/30">
        <div className="container">
          <div className="max-w-3xl mx-auto text-center">
            <AnimatedSection animation="fade-up">
              <h2
                className="text-4xl md:text-5xl font-bold mb-6"
                style={{ fontFamily: "Rajdhani, sans-serif" }}
              >
                Bereit zu <span className="text-[#FF8C00]">starten?</span>
              </h2>
              <p
                className="text-xl text-muted-foreground mb-10"
                style={{ fontFamily: "Work Sans, sans-serif" }}
              >
                14 Tage kostenlos testen — keine Kreditkarte nötig
              </p>
              <div className="flex flex-col sm:flex-row gap-4 justify-center">
                <Link href="/tools">
                  <Button
                    size="lg"
                    variant="outline"
                    className="font-bold text-lg px-10 py-7 border-2 hover:bg-muted/50 transition-all duration-300"
                    style={{ fontFamily: "Rajdhani, sans-serif" }}
                  >
                    Alle Tools ansehen
                  </Button>
                </Link>
                <Link href="/">
                  <Button
                    size="lg"
                    className="bg-[#FF8C00] hover:bg-[#FF8C00]/90 text-white font-bold text-lg px-10 py-7 shadow-xl transition-all duration-300 hover:scale-105"
                    style={{ fontFamily: "Rajdhani, sans-serif" }}
                  >
                    Beratung buchen
                    <ArrowRight className="ml-2 w-5 h-5" />
                  </Button>
                </Link>
              </div>
            </AnimatedSection>
          </div>
        </div>
      </section>

      {/* Footer */}
      <footer className="bg-[#0E1B2A] text-white py-10">
        <div className="container">
          <div
            className="border-t border-white/10 pt-8 text-center text-sm opacity-50"
            style={{ fontFamily: "Work Sans, sans-serif" }}
          >
            <p>&copy; 2026 allocore. Alle Rechte vorbehalten.</p>
          </div>
        </div>
      </footer>
    </div>
  );
}
