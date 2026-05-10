import { useState } from "react";
import Header from "@/components/Header";
import AnimatedSection from "@/components/AnimatedSection";
import { Button } from "@/components/ui/button";
import { Badge } from "@/components/ui/badge";
import {
  ArrowRight,
  Sparkles,
  Check,
  ExternalLink,
  Layers,
} from "lucide-react";
import { Link } from "wouter";
import {
  tools,
  categories,
  type ToolCategory,
  type Tool,
} from "@/lib/tools-data";

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
    <Badge variant="outline" className={c.className}>
      {c.label}
    </Badge>
  );
}

function ToolCard({ tool, index }: { tool: Tool; index: number }) {
  const Icon = tool.icon;
  return (
    <AnimatedSection delay={index * 80} animation="fade-up">
      <div className="group bg-card h-full p-8 rounded-2xl border-2 border-border hover:border-[#FF8C00] transition-all duration-300 hover:shadow-2xl relative overflow-hidden flex flex-col">
        <div
          className="absolute top-0 right-0 w-32 h-32 rounded-bl-full opacity-50"
          style={{
            background: `linear-gradient(135deg, ${tool.color}10, transparent)`,
          }}
        />

        <div className="flex items-start justify-between mb-6 relative z-10">
          <div
            className="w-14 h-14 rounded-xl flex items-center justify-center shadow-md group-hover:scale-110 transition-transform duration-300"
            style={{ backgroundColor: `${tool.color}20` }}
          >
            <Icon className="w-7 h-7" style={{ color: tool.color }} />
          </div>
          <StatusBadge status={tool.status} />
        </div>

        <h3
          className="text-2xl font-bold mb-2 leading-tight"
          style={{ fontFamily: "Rajdhani, sans-serif" }}
        >
          {tool.name}
        </h3>
        <p
          className="text-sm font-semibold mb-4"
          style={{ color: tool.color, fontFamily: "Rajdhani, sans-serif" }}
        >
          {tool.tagline}
        </p>
        <p
          className="text-muted-foreground mb-6 leading-relaxed text-sm"
          style={{ fontFamily: "Work Sans, sans-serif" }}
        >
          {tool.description}
        </p>

        <div className="space-y-2 mb-6 flex-1">
          {tool.features.map((feature, i) => (
            <div key={i} className="flex items-start gap-2">
              <Check
                className="w-4 h-4 mt-0.5 flex-shrink-0"
                style={{ color: tool.color }}
              />
              <span
                className="text-sm text-muted-foreground"
                style={{ fontFamily: "Work Sans, sans-serif" }}
              >
                {feature}
              </span>
            </div>
          ))}
        </div>

        <div className="pt-4 border-t border-border">
          <div className="flex flex-wrap gap-1.5">
            {tool.techStack.map((tech, i) => (
              <span
                key={i}
                className="text-xs px-2 py-1 rounded-md bg-muted text-muted-foreground"
                style={{ fontFamily: "Work Sans, sans-serif" }}
              >
                {tech}
              </span>
            ))}
          </div>
        </div>
      </div>
    </AnimatedSection>
  );
}

export default function Tools() {
  const [activeCategory, setActiveCategory] = useState<ToolCategory | "all">(
    "all"
  );

  const filteredTools =
    activeCategory === "all"
      ? tools
      : tools.filter(t => t.category === activeCategory);

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
              <Layers className="w-4 h-4 text-[#FF8C00]" />
              <span
                className="text-sm font-semibold text-[#FF8C00]"
                style={{ fontFamily: "Rajdhani, sans-serif" }}
              >
                14 Premium SaaS Tools
              </span>
            </div>
            <h1
              className="text-5xl md:text-7xl font-bold mb-6 leading-[1.1] tracking-tight"
              style={{ fontFamily: "Rajdhani, sans-serif" }}
            >
              Das allocore{" "}
              <span className="relative inline-block">
                <span className="relative z-10 text-[#FF8C00]">
                  Tool-Ökosystem
                </span>
                <div className="absolute bottom-2 left-0 right-0 h-4 bg-[#FF8C00]/20 -rotate-1" />
              </span>
            </h1>
            <p
              className="text-xl text-muted-foreground mb-8 max-w-2xl mx-auto leading-relaxed"
              style={{ fontFamily: "Work Sans, sans-serif" }}
            >
              Alle Tools, die Sie brauchen, um Ihr Unternehmen effizient zu
              führen — von Strategie über Marketing bis Finanzen
            </p>
            <Link href="/pricing">
              <Button
                size="lg"
                className="bg-[#FF8C00] hover:bg-[#FF8C00]/90 text-white font-bold text-lg px-10 py-7 shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-105"
                style={{ fontFamily: "Rajdhani, sans-serif" }}
              >
                Bundles ansehen
                <ArrowRight className="ml-2 w-5 h-5" />
              </Button>
            </Link>
          </div>
        </div>
      </section>

      {/* Category Filter */}
      <section className="py-6 border-b border-border sticky top-16 md:top-20 z-40 bg-background/95 backdrop-blur-sm">
        <div className="container">
          <div className="flex flex-wrap items-center justify-center gap-3">
            <button
              onClick={() => setActiveCategory("all")}
              className={`px-5 py-2.5 rounded-full text-sm font-bold transition-all duration-300 ${
                activeCategory === "all"
                  ? "bg-[#FF8C00] text-white shadow-lg"
                  : "bg-muted text-muted-foreground hover:bg-muted/80"
              }`}
              style={{ fontFamily: "Rajdhani, sans-serif" }}
            >
              Alle ({tools.length})
            </button>
            {categories.map(cat => {
              const count = tools.filter(t => t.category === cat.id).length;
              return (
                <button
                  key={cat.id}
                  onClick={() => setActiveCategory(cat.id)}
                  className={`px-5 py-2.5 rounded-full text-sm font-bold transition-all duration-300 ${
                    activeCategory === cat.id
                      ? "text-white shadow-lg"
                      : "bg-muted text-muted-foreground hover:bg-muted/80"
                  }`}
                  style={{
                    fontFamily: "Rajdhani, sans-serif",
                    ...(activeCategory === cat.id
                      ? { backgroundColor: cat.color }
                      : {}),
                  }}
                >
                  {cat.label} ({count})
                </button>
              );
            })}
          </div>
        </div>
      </section>

      {/* Tools Grid */}
      <section className="py-16">
        <div className="container">
          {activeCategory === "all" ? (
            categories.map(cat => {
              const catTools = tools.filter(t => t.category === cat.id);
              return (
                <div key={cat.id} className="mb-20 last:mb-0">
                  <AnimatedSection animation="fade-up">
                    <div className="mb-10">
                      <p
                        className="text-sm font-bold uppercase tracking-wider mb-3"
                        style={{
                          color: cat.color,
                          fontFamily: "Rajdhani, sans-serif",
                        }}
                      >
                        {cat.label}
                      </p>
                      <p
                        className="text-lg text-muted-foreground"
                        style={{ fontFamily: "Work Sans, sans-serif" }}
                      >
                        {cat.description}
                      </p>
                    </div>
                  </AnimatedSection>
                  <div className="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    {catTools.map((tool, i) => (
                      <ToolCard key={tool.id} tool={tool} index={i} />
                    ))}
                  </div>
                </div>
              );
            })
          ) : (
            <div className="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
              {filteredTools.map((tool, i) => (
                <ToolCard key={tool.id} tool={tool} index={i} />
              ))}
            </div>
          )}
        </div>
      </section>

      {/* CTA */}
      <section className="py-20 bg-gradient-to-b from-background to-muted/30">
        <div className="container">
          <div className="max-w-3xl mx-auto text-center">
            <AnimatedSection animation="fade-up">
              <div className="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#0D9BA6]/10 border border-[#0D9BA6]/20 mb-6">
                <Sparkles className="w-4 h-4 text-[#0D9BA6]" />
                <span
                  className="text-sm font-semibold text-[#0D9BA6]"
                  style={{ fontFamily: "Rajdhani, sans-serif" }}
                >
                  Sparen Sie mit unseren Bundles
                </span>
              </div>
              <h2
                className="text-4xl md:text-5xl font-bold mb-6 leading-tight"
                style={{ fontFamily: "Rajdhani, sans-serif" }}
              >
                Alle Tools. <span className="text-[#FF8C00]">Ein Preis.</span>
              </h2>
              <p
                className="text-xl text-muted-foreground mb-10"
                style={{ fontFamily: "Work Sans, sans-serif" }}
              >
                Wählen Sie das Bundle, das zu Ihrem Unternehmen passt
              </p>
              <div className="flex flex-col sm:flex-row gap-4 justify-center">
                <Link href="/pricing">
                  <Button
                    size="lg"
                    className="bg-[#FF8C00] hover:bg-[#FF8C00]/90 text-white font-bold text-lg px-10 py-7 shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-105"
                    style={{ fontFamily: "Rajdhani, sans-serif" }}
                  >
                    Preise ansehen
                    <ArrowRight className="ml-2 w-5 h-5" />
                  </Button>
                </Link>
                <Link href="/">
                  <Button
                    size="lg"
                    variant="outline"
                    className="font-bold text-lg px-10 py-7 border-2 hover:bg-muted/50 transition-all duration-300"
                    style={{ fontFamily: "Rajdhani, sans-serif" }}
                  >
                    Zur Startseite
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
