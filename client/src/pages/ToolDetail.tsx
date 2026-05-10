import { useParams } from "wouter";
import Header from "@/components/Header";
import AnimatedSection from "@/components/AnimatedSection";
import { Button } from "@/components/ui/button";
import { Badge } from "@/components/ui/badge";
import {
  ArrowRight,
  ArrowLeft,
  Check,
  Sparkles,
  Boxes,
  Workflow,
  Users2,
  Cpu,
  Zap,
} from "lucide-react";
import { Link } from "wouter";
import { tools, categories, type Tool } from "@/lib/tools-data";

function StatusBadge({ status }: { status: Tool["status"] }) {
  const config = {
    live: {
      label: "Live",
      className: "bg-emerald-500/10 text-emerald-600 border-emerald-500/20",
    },
    beta: {
      label: "Beta",
      className: "bg-amber-500/10 text-amber-600 border-amber-500/20",
    },
    "coming-soon": {
      label: "Coming Soon",
      className: "bg-slate-500/10 text-slate-500 border-slate-500/20",
    },
  };
  const c = config[status];
  return (
    <Badge variant="outline" className={`text-sm px-3 py-1 ${c.className}`}>
      {c.label}
    </Badge>
  );
}

export default function ToolDetail() {
  const params = useParams<{ id: string }>();
  const tool = tools.find((t) => t.id === params.id);

  if (!tool) {
    return (
      <div className="min-h-screen flex flex-col bg-background">
        <Header />
        <div className="flex-1 flex items-center justify-center pt-20">
          <div className="text-center">
            <h1
              className="text-4xl font-bold mb-4"
              style={{ fontFamily: "Rajdhani, sans-serif" }}
            >
              Tool nicht gefunden
            </h1>
            <Link href="/tools">
              <Button
                variant="outline"
                className="mt-4"
                style={{ fontFamily: "Rajdhani, sans-serif" }}
              >
                <ArrowLeft className="mr-2 w-4 h-4" />
                Zurück zu allen Tools
              </Button>
            </Link>
          </div>
        </div>
      </div>
    );
  }

  const Icon = tool.icon;
  const category = categories.find((c) => c.id === tool.category);
  const relatedTools = tools
    .filter((t) => t.category === tool.category && t.id !== tool.id)
    .slice(0, 3);

  return (
    <div className="min-h-screen flex flex-col bg-background">
      <Header />

      {/* Hero */}
      <section className="relative pt-28 pb-16 overflow-hidden">
        <div className="absolute inset-0 bg-gradient-to-br from-[#FF8C00]/5 via-transparent to-[#0D9BA6]/5" />
        <div
          className="absolute inset-0"
          style={{
            backgroundImage: `radial-gradient(circle at 2px 2px, ${tool.color}08 1px, transparent 0)`,
            backgroundSize: "48px 48px",
          }}
        />
        <div className="container relative z-10">
          {/* Breadcrumb */}
          <div className="mb-8">
            <Link href="/tools">
              <span
                className="text-sm text-muted-foreground hover:text-[#FF8C00] transition-colors flex items-center gap-1"
                style={{ fontFamily: "Work Sans, sans-serif" }}
              >
                <ArrowLeft className="w-4 h-4" />
                Alle Tools
              </span>
            </Link>
          </div>

          <div className="max-w-5xl">
            <div className="flex items-center gap-4 mb-6">
              <div
                className="w-16 h-16 rounded-2xl flex items-center justify-center shadow-lg"
                style={{ backgroundColor: `${tool.color}20` }}
              >
                <Icon className="w-8 h-8" style={{ color: tool.color }} />
              </div>
              <div>
                <div className="flex items-center gap-3 mb-1">
                  <h1
                    className="text-4xl md:text-6xl font-bold"
                    style={{ fontFamily: "Rajdhani, sans-serif" }}
                  >
                    {tool.name}
                  </h1>
                  <StatusBadge status={tool.status} />
                </div>
                <p
                  className="text-lg font-semibold"
                  style={{
                    color: tool.color,
                    fontFamily: "Rajdhani, sans-serif",
                  }}
                >
                  {tool.tagline}
                </p>
              </div>
            </div>

            <p
              className="text-xl text-muted-foreground mb-8 max-w-3xl leading-relaxed"
              style={{ fontFamily: "Work Sans, sans-serif" }}
            >
              {tool.longDescription}
            </p>

            {/* Highlights pills */}
            <div className="flex flex-wrap gap-3 mb-8">
              {tool.highlights.map((h, i) => (
                <div
                  key={i}
                  className="flex items-center gap-2 px-4 py-2 rounded-full border"
                  style={{
                    borderColor: `${tool.color}30`,
                    backgroundColor: `${tool.color}08`,
                  }}
                >
                  <Zap className="w-3.5 h-3.5" style={{ color: tool.color }} />
                  <span
                    className="text-sm font-semibold"
                    style={{ fontFamily: "Rajdhani, sans-serif" }}
                  >
                    {h}
                  </span>
                </div>
              ))}
            </div>

            <div className="flex gap-4">
              <Link href="/pricing">
                <Button
                  size="lg"
                  className="font-bold text-lg px-8 py-6 shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-105"
                  style={{
                    backgroundColor: tool.color,
                    fontFamily: "Rajdhani, sans-serif",
                  }}
                >
                  Im Bundle kaufen
                  <ArrowRight className="ml-2 w-5 h-5" />
                </Button>
              </Link>
            </div>
          </div>
        </div>
      </section>

      {/* Features Grid */}
      <section className="py-16 bg-gradient-to-b from-background to-muted/20">
        <div className="container">
          <AnimatedSection animation="fade-up">
            <div className="text-center mb-12">
              <p
                className="text-sm font-bold uppercase tracking-wider mb-3"
                style={{
                  color: tool.color,
                  fontFamily: "Rajdhani, sans-serif",
                }}
              >
                Features
              </p>
              <h2
                className="text-4xl md:text-5xl font-bold"
                style={{ fontFamily: "Rajdhani, sans-serif" }}
              >
                Was {tool.name}{" "}
                <span className="text-muted-foreground/60">kann</span>
              </h2>
            </div>
          </AnimatedSection>

          <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-4 max-w-6xl mx-auto">
            {tool.features.map((feature, i) => (
              <AnimatedSection key={i} delay={i * 60} animation="fade-up">
                <div className="flex items-start gap-3 p-5 bg-card rounded-xl border border-border hover:border-[#FF8C00] transition-all duration-300 hover:shadow-lg h-full">
                  <Check
                    className="w-5 h-5 mt-0.5 flex-shrink-0"
                    style={{ color: tool.color }}
                  />
                  <span
                    className="text-sm font-medium"
                    style={{ fontFamily: "Work Sans, sans-serif" }}
                  >
                    {feature}
                  </span>
                </div>
              </AnimatedSection>
            ))}
          </div>
        </div>
      </section>

      {/* Modules */}
      <section className="py-16">
        <div className="container">
          <AnimatedSection animation="fade-up">
            <div className="text-center mb-12">
              <div className="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#0D9BA6]/10 border border-[#0D9BA6]/20 mb-4">
                <Boxes className="w-4 h-4 text-[#0D9BA6]" />
                <span
                  className="text-sm font-semibold text-[#0D9BA6]"
                  style={{ fontFamily: "Rajdhani, sans-serif" }}
                >
                  {tool.modules.length} Module
                </span>
              </div>
              <h2
                className="text-4xl md:text-5xl font-bold"
                style={{ fontFamily: "Rajdhani, sans-serif" }}
              >
                Module &{" "}
                <span className="text-muted-foreground/60">Komponenten</span>
              </h2>
            </div>
          </AnimatedSection>

          <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl mx-auto">
            {tool.modules.map((mod, i) => (
              <AnimatedSection key={i} delay={i * 80} animation="fade-up">
                <div className="group bg-card p-8 rounded-2xl border-2 border-border hover:border-[#FF8C00] transition-all duration-300 hover:shadow-xl h-full">
                  <div
                    className="w-10 h-10 rounded-lg flex items-center justify-center mb-4 group-hover:scale-110 transition-transform"
                    style={{ backgroundColor: `${tool.color}15` }}
                  >
                    <span
                      className="text-lg font-bold"
                      style={{
                        color: tool.color,
                        fontFamily: "Rajdhani, sans-serif",
                      }}
                    >
                      {String(i + 1).padStart(2, "0")}
                    </span>
                  </div>
                  <h3
                    className="text-xl font-bold mb-3"
                    style={{ fontFamily: "Rajdhani, sans-serif" }}
                  >
                    {mod.name}
                  </h3>
                  <p
                    className="text-muted-foreground text-sm leading-relaxed"
                    style={{ fontFamily: "Work Sans, sans-serif" }}
                  >
                    {mod.description}
                  </p>
                </div>
              </AnimatedSection>
            ))}
          </div>
        </div>
      </section>

      {/* How It Works */}
      <section className="py-16 bg-gradient-to-b from-background to-muted/20">
        <div className="container">
          <AnimatedSection animation="fade-up">
            <div className="text-center mb-12">
              <div className="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#FF8C00]/10 border border-[#FF8C00]/20 mb-4">
                <Workflow className="w-4 h-4 text-[#FF8C00]" />
                <span
                  className="text-sm font-semibold text-[#FF8C00]"
                  style={{ fontFamily: "Rajdhani, sans-serif" }}
                >
                  Workflow
                </span>
              </div>
              <h2
                className="text-4xl md:text-5xl font-bold"
                style={{ fontFamily: "Rajdhani, sans-serif" }}
              >
                So funktioniert&apos;s
              </h2>
            </div>
          </AnimatedSection>

          <div className="max-w-4xl mx-auto">
            {tool.howItWorks.map((step, i) => (
              <AnimatedSection key={i} delay={i * 100} animation="fade-up">
                <div className="flex items-start gap-6 mb-6 last:mb-0">
                  <div className="flex-shrink-0">
                    <div
                      className="w-12 h-12 rounded-xl flex items-center justify-center font-bold text-lg text-white shadow-lg"
                      style={{
                        backgroundColor: tool.color,
                        fontFamily: "Rajdhani, sans-serif",
                      }}
                    >
                      {i + 1}
                    </div>
                  </div>
                  <div className="flex-1 pt-2">
                    <p
                      className="text-lg font-medium"
                      style={{ fontFamily: "Work Sans, sans-serif" }}
                    >
                      {step}
                    </p>
                    {i < tool.howItWorks.length - 1 && (
                      <div
                        className="w-0.5 h-6 ml-0 mt-3 rounded-full"
                        style={{ backgroundColor: `${tool.color}20` }}
                      />
                    )}
                  </div>
                </div>
              </AnimatedSection>
            ))}
          </div>
        </div>
      </section>

      {/* Use Cases */}
      <section className="py-16">
        <div className="container">
          <AnimatedSection animation="fade-up">
            <div className="text-center mb-12">
              <div className="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#0D9BA6]/10 border border-[#0D9BA6]/20 mb-4">
                <Users2 className="w-4 h-4 text-[#0D9BA6]" />
                <span
                  className="text-sm font-semibold text-[#0D9BA6]"
                  style={{ fontFamily: "Rajdhani, sans-serif" }}
                >
                  Anwendungsfälle
                </span>
              </div>
              <h2
                className="text-4xl md:text-5xl font-bold"
                style={{ fontFamily: "Rajdhani, sans-serif" }}
              >
                Perfekt für
              </h2>
            </div>
          </AnimatedSection>

          <div className="grid md:grid-cols-2 gap-6 max-w-4xl mx-auto">
            {tool.useCases.map((uc, i) => (
              <AnimatedSection key={i} delay={i * 80} animation="fade-up">
                <div className="flex items-center gap-4 p-6 bg-card rounded-xl border border-border hover:border-[#FF8C00] transition-all duration-300">
                  <div
                    className="w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0"
                    style={{ backgroundColor: `${tool.color}15` }}
                  >
                    <Check
                      className="w-5 h-5"
                      style={{ color: tool.color }}
                    />
                  </div>
                  <span
                    className="font-medium"
                    style={{ fontFamily: "Work Sans, sans-serif" }}
                  >
                    {uc}
                  </span>
                </div>
              </AnimatedSection>
            ))}
          </div>
        </div>
      </section>

      {/* Tech Stack */}
      <section className="py-16 bg-gradient-to-b from-background to-muted/20">
        <div className="container">
          <AnimatedSection animation="fade-up">
            <div className="text-center mb-12">
              <div className="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#FF8C00]/10 border border-[#FF8C00]/20 mb-4">
                <Cpu className="w-4 h-4 text-[#FF8C00]" />
                <span
                  className="text-sm font-semibold text-[#FF8C00]"
                  style={{ fontFamily: "Rajdhani, sans-serif" }}
                >
                  Technologie
                </span>
              </div>
              <h2
                className="text-4xl md:text-5xl font-bold"
                style={{ fontFamily: "Rajdhani, sans-serif" }}
              >
                Tech Stack
              </h2>
            </div>
          </AnimatedSection>

          <div className="flex flex-wrap justify-center gap-4 max-w-3xl mx-auto">
            {tool.techStack.map((tech, i) => (
              <AnimatedSection key={i} delay={i * 60} animation="fade-up">
                <div className="px-6 py-3 bg-card rounded-xl border-2 border-border hover:border-[#FF8C00] transition-all duration-300 hover:shadow-lg">
                  <span
                    className="font-bold text-lg"
                    style={{ fontFamily: "Rajdhani, sans-serif" }}
                  >
                    {tech}
                  </span>
                </div>
              </AnimatedSection>
            ))}
          </div>
        </div>
      </section>

      {/* Related Tools */}
      {relatedTools.length > 0 && (
        <section className="py-16">
          <div className="container">
            <AnimatedSection animation="fade-up">
              <div className="text-center mb-12">
                <p
                  className="text-sm font-bold uppercase tracking-wider mb-3"
                  style={{
                    color: category?.color,
                    fontFamily: "Rajdhani, sans-serif",
                  }}
                >
                  {category?.label}
                </p>
                <h2
                  className="text-4xl md:text-5xl font-bold"
                  style={{ fontFamily: "Rajdhani, sans-serif" }}
                >
                  Weitere Tools
                </h2>
              </div>
            </AnimatedSection>

            <div className="grid md:grid-cols-3 gap-6 max-w-5xl mx-auto">
              {relatedTools.map((rt, i) => {
                const RtIcon = rt.icon;
                return (
                  <AnimatedSection key={rt.id} delay={i * 100} animation="fade-up">
                    <Link href={`/tools/${rt.id}`}>
                      <div className="group bg-card p-6 rounded-2xl border-2 border-border hover:border-[#FF8C00] transition-all duration-300 hover:shadow-xl cursor-pointer">
                        <div className="flex items-center gap-3 mb-4">
                          <div
                            className="w-10 h-10 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform"
                            style={{ backgroundColor: `${rt.color}20` }}
                          >
                            <RtIcon
                              className="w-5 h-5"
                              style={{ color: rt.color }}
                            />
                          </div>
                          <div>
                            <h4
                              className="font-bold"
                              style={{ fontFamily: "Rajdhani, sans-serif" }}
                            >
                              {rt.name}
                            </h4>
                            <p
                              className="text-xs"
                              style={{
                                color: rt.color,
                                fontFamily: "Rajdhani, sans-serif",
                              }}
                            >
                              {rt.tagline}
                            </p>
                          </div>
                        </div>
                        <p
                          className="text-sm text-muted-foreground leading-relaxed"
                          style={{ fontFamily: "Work Sans, sans-serif" }}
                        >
                          {rt.description.slice(0, 100)}...
                        </p>
                      </div>
                    </Link>
                  </AnimatedSection>
                );
              })}
            </div>
          </div>
        </section>
      )}

      {/* CTA */}
      <section className="py-20 bg-gradient-to-b from-muted/20 to-background">
        <div className="container">
          <div className="max-w-3xl mx-auto text-center">
            <AnimatedSection animation="fade-up">
              <h2
                className="text-4xl md:text-5xl font-bold mb-6"
                style={{ fontFamily: "Rajdhani, sans-serif" }}
              >
                {tool.name}{" "}
                <span style={{ color: tool.color }}>jetzt nutzen</span>
              </h2>
              <p
                className="text-xl text-muted-foreground mb-10"
                style={{ fontFamily: "Work Sans, sans-serif" }}
              >
                Verfügbar in unseren Bundles — 14 Tage kostenlos testen
              </p>
              <div className="flex flex-col sm:flex-row gap-4 justify-center">
                <Link href="/pricing">
                  <Button
                    size="lg"
                    className="font-bold text-lg px-10 py-7 shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-105 text-white"
                    style={{
                      backgroundColor: tool.color,
                      fontFamily: "Rajdhani, sans-serif",
                    }}
                  >
                    Bundles ansehen
                    <ArrowRight className="ml-2 w-5 h-5" />
                  </Button>
                </Link>
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
