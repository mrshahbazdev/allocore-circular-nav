/**
 * Design Philosophy: Kinetic Constructivism - Enhanced Professional Edition
 * Premium landing page with refined spacing, sophisticated typography, and polished visual hierarchy
 * Clear customer journey: Hero → Problem → Solution → Social Proof → CTA
 */

import Header from "@/components/Header";
import CircularNav from "@/components/CircularNav";
import AnimatedSection from "@/components/AnimatedSection";
import { Button } from "@/components/ui/button";
import {
  Accordion,
  AccordionContent,
  AccordionItem,
  AccordionTrigger,
} from "@/components/ui/accordion";
import { AlertCircle, CheckCircle2, Target, TrendingUp, Users, Zap, ArrowRight, Sparkles, Focus, DollarSign, Package, Search, Network, Globe, Clock, Zap as ZapIcon, MessageSquare } from "lucide-react";

export default function Home() {
  const scrollToSection = (sectionId: string) => {
    const element = document.getElementById(sectionId);
    if (element) {
      element.scrollIntoView({ behavior: "smooth" });
    }
  };

  return (
    <div className="min-h-screen flex flex-col bg-background">
      <Header />
      
      {/* Hero Section - Enhanced */}
      <section className="relative pt-20 pb-12 overflow-hidden">
        {/* Subtle background pattern */}
        <div className="absolute inset-0 bg-gradient-to-br from-[#FF8C00]/5 via-transparent to-[#0D9BA6]/5" />
        <div className="absolute inset-0" style={{
          backgroundImage: `radial-gradient(circle at 2px 2px, rgba(13, 155, 166, 0.05) 1px, transparent 0)`,
          backgroundSize: '48px 48px'
        }} />
        
        <div className="container relative z-10">
          <div className="max-w-5xl mx-auto text-center">
            <div className="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#FF8C00]/10 border border-[#FF8C00]/20 mb-8">
              <Sparkles className="w-4 h-4 text-[#FF8C00]" />
              <span className="text-sm font-semibold text-[#FF8C00]" style={{ fontFamily: "Rajdhani, sans-serif" }}>
                Die Methode für nachhaltiges Wachstum
              </span>
            </div>
            
            <h1 className="text-6xl md:text-8xl font-bold mb-8 leading-[1.1] tracking-tight" style={{ fontFamily: "Rajdhani, sans-serif" }}>
              Profitabilität durch{" "}
              <span className="relative inline-block">
                <span className="relative z-10 text-[#FF8C00]">Effizienz</span>
                <div className="absolute bottom-2 left-0 right-0 h-4 bg-[#FF8C00]/20 -rotate-1" />
              </span>
            </h1>
            
            <p className="text-3xl md:text-4xl text-muted-foreground/80 mb-6 font-light tracking-wide" style={{ fontFamily: "Work Sans, sans-serif" }}>
              Effizienz durch <span className="font-semibold text-foreground">Fokus</span>
            </p>
            
            <p className="text-xl text-muted-foreground mb-12 max-w-3xl mx-auto leading-relaxed" style={{ fontFamily: "Work Sans, sans-serif" }}>
              Wir helfen KMUs und Beratern, Ressourcen optimal auf ihr Kerngeschäft auszurichten und nachhaltig profitabel zu wachsen
            </p>
            
            <div className="flex flex-col sm:flex-row gap-4 justify-center items-center">
              <Button
                onClick={() => scrollToSection("kontakt")}
                size="lg"
                className="bg-[#FF8C00] hover:bg-[#FF8C00]/90 text-white font-bold text-lg px-10 py-7 shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-105"
                style={{ fontFamily: "Rajdhani, sans-serif" }}
              >
                Erstberatung buchen
                <ArrowRight className="ml-2 w-5 h-5" />
              </Button>
              <Button
                onClick={() => scrollToSection("methode")}
                size="lg"
                variant="outline"
                className="font-bold text-lg px-10 py-7 border-2 hover:bg-muted/50 transition-all duration-300"
                style={{ fontFamily: "Rajdhani, sans-serif" }}
              >
                Methode entdecken
              </Button>
            </div>
          </div>
        </div>
      </section>

      {/* Problem Section - Enhanced */}
      <section className="py-10 bg-gradient-to-b from-background to-muted/30">
        <div className="container">
          <div className="max-w-5xl mx-auto">
            <AnimatedSection animation="fade-up">
            <div className="text-center mb-8">
              <p className="text-sm font-bold text-[#FF8C00] uppercase tracking-wider mb-4" style={{ fontFamily: "Rajdhani, sans-serif" }}>
                Die Herausforderung
              </p>
              <h2 className="text-5xl md:text-6xl font-bold mb-6 leading-tight" style={{ fontFamily: "Rajdhani, sans-serif" }}>
                Kennen Sie diese{" "}
                <span className="text-muted-foreground/60">Herausforderungen?</span>
              </h2>
              <p className="text-xl text-muted-foreground max-w-2xl mx-auto" style={{ fontFamily: "Work Sans, sans-serif" }}>
                Viele erfolgreiche Unternehmen kämpfen mit den gleichen strukturellen Problemen
              </p>
            </div>
            </AnimatedSection>

            <div className="grid md:grid-cols-3 gap-8">
              {[
                {
                  title: "Verstreute Ressourcen",
                  description: "Zeit und Geld fließen in zu viele Richtungen ohne klaren Fokus auf das Wesentliche",
                  icon: Clock
                },
                {
                  title: "Ineffiziente Prozesse",
                  description: "Komplexe Abläufe bremsen das Wachstum und kosten unnötig Energie und Kapital",
                  icon: ZapIcon
                },
                {
                  title: "Unklare Positionierung",
                  description: "Zu breites Angebot verwässert die Botschaft und erschwert die Kundengewinnung erheblich",
                  icon: MessageSquare
                }
              ].map((problem, index) => (
                <AnimatedSection key={index} delay={index * 100} animation="fade-up">
                <div
                  className="group bg-card p-8 rounded-2xl border-2 border-destructive/10 hover:border-destructive/30 transition-all duration-300 hover:shadow-xl"
                >
                  <div className="w-14 h-14 rounded-xl bg-destructive/10 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <problem.icon className="w-7 h-7 text-destructive" />
                  </div>
                  <h3 className="text-2xl font-bold mb-4 leading-tight" style={{ fontFamily: "Rajdhani, sans-serif" }}>
                    {problem.title}
                  </h3>
                  <p className="text-muted-foreground leading-relaxed" style={{ fontFamily: "Work Sans, sans-serif" }}>
                    {problem.description}
                  </p>
                </div>
                </AnimatedSection>
              ))}
            </div>
          </div>
        </div>
      </section>

      {/* Solution Section - allocore Method - Enhanced */}
      <section id="methode" className="py-10 relative overflow-hidden">
        <div className="absolute inset-0 bg-gradient-to-b from-muted/30 to-background" />
        <div className="container relative z-10">
          <AnimatedSection animation="fade-up">
          <div className="text-center mb-12">
            <p className="text-sm font-bold text-[#0D9BA6] uppercase tracking-wider mb-4" style={{ fontFamily: "Rajdhani, sans-serif" }}>
              Die Lösung
            </p>
            <h2 className="text-5xl md:text-7xl font-bold mb-6 leading-tight" style={{ fontFamily: "Rajdhani, sans-serif" }}>
              Die <span className="text-[#FF8C00]">allocore-Methode</span>
            </h2>
            <p className="text-2xl text-muted-foreground max-w-3xl mx-auto leading-relaxed" style={{ fontFamily: "Work Sans, sans-serif" }}>
              5 Schritte zu mehr Profit, Klarheit und weniger Komplexität
            </p>
          </div>
          </AnimatedSection>

          <AnimatedSection delay={200} animation="fade-in">
          <CircularNav />
          </AnimatedSection>
        </div>
      </section>

      {/* Results/Benefits Section - Enhanced */}
      <section className="py-10 bg-gradient-to-b from-background to-muted/20">
        <div className="container">
          <AnimatedSection animation="fade-up">
          <div className="text-center mb-20">
            <p className="text-sm font-bold text-[#FF8C00] uppercase tracking-wider mb-4" style={{ fontFamily: "Rajdhani, sans-serif" }}>
              Das Ergebnis
            </p>
            <h2 className="text-5xl md:text-6xl font-bold mb-6 leading-tight" style={{ fontFamily: "Rajdhani, sans-serif" }}>
              Messbare <span className="text-muted-foreground/60">Verbesserungen</span>
            </h2>
            <p className="text-xl text-muted-foreground max-w-2xl mx-auto" style={{ fontFamily: "Work Sans, sans-serif" }}>
              In allen Bereichen Ihres Unternehmens
            </p>
          </div>
          </AnimatedSection>

          <div className="grid md:grid-cols-3 gap-10 max-w-6xl mx-auto">
            {[
              {
                icon: TrendingUp,
                title: "Mehr Profit",
                description: "Durch optimale Ressourcenallokation steigt die Profitabilität nachhaltig und planbar",
                color: "#FF8C00",
                stat: "+150%",
                statLabel: "Durchschn. Umsatzsteigerung"
              },
              {
                icon: Target,
                title: "Mehr Klarheit",
                description: "Fokus auf das Kerngeschäft schafft Orientierung für alle strategischen Entscheidungen",
                color: "#0D9BA6",
                stat: "100%",
                statLabel: "Strategische Ausrichtung"
              },
              {
                icon: Zap,
                title: "Weniger Komplexität",
                description: "Vereinfachte Prozesse und Angebote machen das Unternehmen agiler und effizienter",
                color: "#FF8C00",
                stat: "-40%",
                statLabel: "Prozesskosten"
              }
            ].map((benefit, index) => (
              <AnimatedSection key={index} delay={index * 150} animation="fade-up">
              <div
                className="group bg-card p-10 rounded-2xl border-2 border-border hover:border-[#FF8C00] transition-all duration-300 hover:shadow-2xl text-center relative overflow-hidden"
              >
                <div className="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-[#FF8C00]/5 to-transparent rounded-bl-full" />
                
                <div
                  className="w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-8 group-hover:scale-110 transition-transform duration-300 shadow-lg"
                  style={{ backgroundColor: `${benefit.color}20` }}
                >
                  <benefit.icon className="w-10 h-10" style={{ color: benefit.color }} />
                </div>
                
                <div className="mb-6">
                  <div className="text-4xl font-bold mb-2" style={{ color: benefit.color, fontFamily: "Rajdhani, sans-serif" }}>
                    {benefit.stat}
                  </div>
                  <div className="text-xs text-muted-foreground uppercase tracking-wide">
                    {benefit.statLabel}
                  </div>
                </div>
                
                <h3 className="text-3xl font-bold mb-5 leading-tight" style={{ fontFamily: "Rajdhani, sans-serif" }}>
                  {benefit.title}
                </h3>
                <p className="text-muted-foreground leading-relaxed" style={{ fontFamily: "Work Sans, sans-serif" }}>
                  {benefit.description}
                </p>
              </div>
              </AnimatedSection>
            ))}
          </div>
        </div>
      </section>

      {/* Services Overview - Enhanced */}
      <section id="leistungen" className="py-10 relative overflow-hidden">
        <div className="absolute inset-0 bg-gradient-to-b from-muted/20 to-background" />
        <div className="container relative z-10">
          <AnimatedSection animation="fade-up">
          <div className="text-center mb-20">
            <p className="text-sm font-bold text-[#0D9BA6] uppercase tracking-wider mb-4" style={{ fontFamily: "Rajdhani, sans-serif" }}>
              Unsere Leistungen
            </p>
            <h2 className="text-5xl md:text-6xl font-bold mb-6 leading-tight" style={{ fontFamily: "Rajdhani, sans-serif" }}>
              Ganzheitliche <span className="text-muted-foreground/60">Beratung</span>
            </h2>
            <p className="text-xl text-muted-foreground max-w-2xl mx-auto" style={{ fontFamily: "Work Sans, sans-serif" }}>
              Für nachhaltigen Erfolg in allen Unternehmensbereichen
            </p>
          </div>
          </AnimatedSection>

          <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
            {[
              {
                title: "Kerngeschäft-Fokus",
                description: "Identifikation und Konzentration auf Ihr profitabelstes Geschäftsfeld mit datenbasierter Analyse",
                cta: "Focus-Audit buchen",
                number: "01",
                icon: Focus
              },
              {
                title: "Finanzallokation",
                description: "Optimale Verteilung von Ressourcen nach dem bewährten Profit-First-Prinzip",
                cta: "Mehr erfahren",
                number: "02",
                icon: DollarSign
              },
              {
                title: "Angebots-Vereinfachung",
                description: "StoryBrand-basierte Positionierung für klare und überzeugende Kundenansprache",
                cta: "Angebot prüfen lassen",
                number: "03",
                icon: Package
              },
              {
                title: "SEO-Optimierung",
                description: "Suchmaschinenoptimierung als effizientestes und nachhaltigstes Akquisesystem für organische Sichtbarkeit",
                cta: "SEO-Audit anfragen",
                number: "04",
                icon: Search
              },
              {
                title: "Website-Entwicklung",
                description: "Intent-basierte Website-Struktur für maximale Conversion und optimale Nutzerführung",
                cta: "Website analysieren",
                number: "05",
                icon: Globe
              },
              {
                title: "Networking-System",
                description: "Strukturiertes 2/2/2-System für systematische und effiziente Kundengewinnung",
                cta: "System starten",
                number: "06",
                icon: Network
              }
            ].map((service, index) => (
              <div
                key={index}
                className="group bg-card p-8 rounded-2xl border-2 border-border hover:shadow-2xl transition-all duration-300 hover:border-[#FF8C00] relative overflow-hidden"
              >
                <div className="absolute top-4 right-4 text-6xl font-bold opacity-5" style={{ fontFamily: "Rajdhani, sans-serif" }}>
                  {service.number}
                </div>
                
                <div
                  className="w-14 h-14 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-md"
                  style={{ backgroundColor: index % 2 === 0 ? "#FF8C0020" : "#0D9BA620" }}
                >
                  <service.icon
                    className="w-7 h-7"
                    style={{ color: index % 2 === 0 ? "#FF8C00" : "#0D9BA6" }}
                  />
                </div>
                
                <h3 className="text-2xl font-bold mb-4 leading-tight" style={{ fontFamily: "Rajdhani, sans-serif" }}>
                  {service.title}
                </h3>
                <p className="text-muted-foreground mb-6 leading-relaxed" style={{ fontFamily: "Work Sans, sans-serif" }}>
                  {service.description}
                </p>
                <button
                  onClick={() => scrollToSection("kontakt")}
                  className="text-sm font-bold text-[#FF8C00] group-hover:underline flex items-center group-hover:translate-x-1 transition-transform duration-300"
                  style={{ fontFamily: "Rajdhani, sans-serif" }}
                >
                  {service.cta}
                  <ArrowRight className="ml-2 w-4 h-4" />
                </button>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Social Proof / Success Stories - Enhanced */}
      <section className="py-10 bg-gradient-to-b from-background to-muted/30">
        <div className="container">
          <AnimatedSection animation="fade-up">
          <div className="text-center mb-20">
            <p className="text-sm font-bold text-[#FF8C00] uppercase tracking-wider mb-4" style={{ fontFamily: "Rajdhani, sans-serif" }}>
              Erfolgsgeschichten
            </p>
            <h2 className="text-5xl md:text-6xl font-bold mb-6 leading-tight" style={{ fontFamily: "Rajdhani, sans-serif" }}>
              Unternehmen, die mit <span className="text-[#FF8C00]">allocore</span> gewachsen sind
            </h2>
            <p className="text-xl text-muted-foreground max-w-2xl mx-auto" style={{ fontFamily: "Work Sans, sans-serif" }}>
              Echte Ergebnisse von echten Kunden
            </p>
          </div>
          </AnimatedSection>

          <div className="grid md:grid-cols-3 gap-8 max-w-7xl mx-auto">
            {[
              {
                company: "TechStart GmbH",
                result: "+150%",
                resultLabel: "Umsatzsteigerung",
                testimonial: "Die allocore-Methode hat uns geholfen, unsere Prozesse zu optimieren und nachhaltig zu wachsen. Der Fokus auf unser Kerngeschäft war der Wendepunkt.",
                name: "Michael Schmidt",
                position: "Geschäftsführer",
                metric: "in 12 Monaten",
                color: "#FF8C00"
              },
              {
                company: "Handwerk Plus",
                result: "40%",
                resultLabel: "Kostenreduktion",
                testimonial: "Durch die strukturierte Herangehensweise konnten wir unsere Finanzen in den Griff bekommen und endlich profitabel arbeiten.",
                name: "Sarah Weber",
                position: "Inhaberin",
                metric: "im ersten Quartal",
                color: "#0D9BA6"
              },
              {
                company: "Digital Solutions AG",
                result: "3x",
                resultLabel: "mehr Leads",
                testimonial: "Das Networking-System und die Website-Optimierung haben unsere Sichtbarkeit enorm gesteigert. Wir müssen nicht mehr aktiv akquirieren.",
                name: "Thomas Müller",
                position: "CEO",
                metric: "durch SEO-Optimierung",
                color: "#FF8C00"
              }
            ].map((story, index) => (
              <AnimatedSection key={index} delay={index * 150} animation="fade-up">
              <div
                className="group bg-card p-10 rounded-2xl border-2 border-border hover:shadow-2xl transition-all duration-300 hover:border-[#FF8C00] relative overflow-hidden"
              >
                <div className="absolute top-0 left-0 w-1 h-full" style={{ backgroundColor: story.color }} />
                
                <div className="mb-8">
                  <div
                    className="inline-flex items-baseline gap-2 mb-3"
                  >
                    <div className="text-5xl font-bold" style={{ color: story.color, fontFamily: "Rajdhani, sans-serif" }}>
                      {story.result}
                    </div>
                    <div className="text-lg font-semibold text-muted-foreground" style={{ fontFamily: "Rajdhani, sans-serif" }}>
                      {story.resultLabel}
                    </div>
                  </div>
                  <p className="text-sm text-muted-foreground mb-6">{story.metric}</p>
                  <h3 className="text-2xl font-bold mb-2" style={{ fontFamily: "Rajdhani, sans-serif" }}>
                    {story.company}
                  </h3>
                </div>
                
                <p className="text-muted-foreground mb-8 italic leading-relaxed text-lg" style={{ fontFamily: "Work Sans, sans-serif" }}>
                  "{story.testimonial}"
                </p>
                
                <div className="border-t-2 border-border pt-6">
                  <p className="font-bold text-lg mb-1" style={{ fontFamily: "Rajdhani, sans-serif" }}>{story.name}</p>
                  <p className="text-sm text-muted-foreground">{story.position}</p>
                </div>
              </div>
              </AnimatedSection>
            ))}
          </div>
        </div>
      </section>

      {/* About Us Section - Enhanced */}
      <section id="ueber-uns" className="py-10 relative overflow-hidden">
        <div className="absolute inset-0 bg-gradient-to-b from-muted/30 to-background" />
        <div className="container relative z-10">
          <div className="max-w-5xl mx-auto">
            <div className="text-center mb-16">
              <p className="text-sm font-bold text-[#0D9BA6] uppercase tracking-wider mb-4" style={{ fontFamily: "Rajdhani, sans-serif" }}>
                Über allocore
              </p>
              <h2 className="text-5xl md:text-6xl font-bold mb-8 leading-tight" style={{ fontFamily: "Rajdhani, sans-serif" }}>
                Unsere <span className="text-muted-foreground/60">Philosophie</span>
              </h2>
              <div className="max-w-3xl mx-auto mb-10">
                <p className="text-3xl md:text-4xl text-[#FF8C00] font-semibold mb-8 italic leading-relaxed" style={{ fontFamily: "Work Sans, sans-serif" }}>
                  "Mache die Dinge so einfach wie möglich — aber nicht einfacher."
                </p>
                <p className="text-xl text-muted-foreground leading-relaxed" style={{ fontFamily: "Work Sans, sans-serif" }}>
                  Wir sind spezialisiert auf KMUs und Berater, weil wir genau wissen: In diesen Unternehmen 
                  zählt jede Ressource. Unsere Methode kombiniert bewährte Prinzipien aus Betriebswirtschaft, 
                  SaaS-Skalierung und praxiserprobte Effizienzstrategien zu einem ganzheitlichen System.
                </p>
              </div>
            </div>

            <div className="grid md:grid-cols-3 gap-8">
              {[
                { title: "Betriebswirtschaft", icon: TrendingUp, description: "Fundierte BWL-Expertise" },
                { title: "SaaS-Expertise", icon: Zap, description: "Digitale Skalierung" },
                { title: "Praxiserfahrung", icon: Users, description: "Bewährte Methoden" }
              ].map((area, index) => (
                <div
                  key={index}
                  className="bg-card p-8 rounded-2xl border-2 border-border text-center hover:shadow-xl transition-all duration-300 hover:border-[#FF8C00]"
                >
                  <div className="w-16 h-16 rounded-xl bg-[#FF8C00]/10 flex items-center justify-center mx-auto mb-6">
                    <area.icon className="w-8 h-8 text-[#FF8C00]" />
                  </div>
                  <h3 className="text-xl font-bold mb-2" style={{ fontFamily: "Rajdhani, sans-serif" }}>
                    {area.title}
                  </h3>
                  <p className="text-sm text-muted-foreground">{area.description}</p>
                </div>
              ))}
            </div>
          </div>
        </div>
      </section>

      {/* FAQ Section */}
      <section className="py-10 relative overflow-hidden">
        <div className="absolute inset-0 bg-gradient-to-b from-muted/20 to-background" />
        <div className="container relative z-10">
          <AnimatedSection animation="fade-up">
          <div className="text-center mb-16">
            <p className="text-sm font-bold text-[#0D9BA6] uppercase tracking-wider mb-4" style={{ fontFamily: "Rajdhani, sans-serif" }}>
              Häufige Fragen
            </p>
            <h2 className="text-5xl md:text-6xl font-bold mb-6 leading-tight" style={{ fontFamily: "Rajdhani, sans-serif" }}>
              Haben Sie <span className="text-muted-foreground/60">Fragen?</span>
            </h2>
            <p className="text-xl text-muted-foreground max-w-2xl mx-auto" style={{ fontFamily: "Work Sans, sans-serif" }}>
              Die wichtigsten Antworten auf einen Blick
            </p>
          </div>
          </AnimatedSection>

          <AnimatedSection delay={200} animation="fade-up">
          <div className="max-w-4xl mx-auto">
            <Accordion type="single" collapsible className="space-y-4">
              <AccordionItem value="item-1" className="bg-card border-2 border-border rounded-2xl px-8 hover:border-[#FF8C00] transition-colors">
                <AccordionTrigger className="text-left py-6 hover:no-underline">
                  <span className="text-xl font-bold" style={{ fontFamily: "Rajdhani, sans-serif" }}>
                    Für wen ist die allocore-Methode geeignet?
                  </span>
                </AccordionTrigger>
                <AccordionContent className="text-muted-foreground text-lg leading-relaxed pb-6" style={{ fontFamily: "Work Sans, sans-serif" }}>
                  Die allocore-Methode wurde speziell für KMUs und Berater entwickelt, die nachhaltiges Wachstum anstreben. 
                  Besonders profitieren Unternehmen mit 5-50 Mitarbeitern, die ihre Ressourcen optimieren und sich auf ihr 
                  profitabelstes Kerngeschäft konzentrieren möchten.
                </AccordionContent>
              </AccordionItem>

              <AccordionItem value="item-2" className="bg-card border-2 border-border rounded-2xl px-8 hover:border-[#FF8C00] transition-colors">
                <AccordionTrigger className="text-left py-6 hover:no-underline">
                  <span className="text-xl font-bold" style={{ fontFamily: "Rajdhani, sans-serif" }}>
                    Wie lange dauert die Implementierung?
                  </span>
                </AccordionTrigger>
                <AccordionContent className="text-muted-foreground text-lg leading-relaxed pb-6" style={{ fontFamily: "Work Sans, sans-serif" }}>
                  Die Implementierung erfolgt schrittweise und kann an jeder Stelle beginnen. Erste messbare Ergebnisse 
                  sehen die meisten Kunden bereits nach 4-6 Wochen. Die vollständige Integration aller 5 Säulen dauert 
                  typischerweise 3-6 Monate, abhängig von Ihrer Ausgangssituation und Zielsetzung.
                </AccordionContent>
              </AccordionItem>

              <AccordionItem value="item-3" className="bg-card border-2 border-border rounded-2xl px-8 hover:border-[#FF8C00] transition-colors">
                <AccordionTrigger className="text-left py-6 hover:no-underline">
                  <span className="text-xl font-bold" style={{ fontFamily: "Rajdhani, sans-serif" }}>
                    Was kostet die Beratung?
                  </span>
                </AccordionTrigger>
                <AccordionContent className="text-muted-foreground text-lg leading-relaxed pb-6" style={{ fontFamily: "Work Sans, sans-serif" }}>
                  Die Investition richtet sich nach dem Umfang der Zusammenarbeit und Ihren individuellen Zielen. 
                  In der kostenlosen Erstberatung analysieren wir Ihre Situation und erstellen ein maßgeschneidertes 
                  Angebot. Viele Kunden refinanzieren die Beratungskosten bereits durch die ersten Optimierungen.
                </AccordionContent>
              </AccordionItem>

              <AccordionItem value="item-4" className="bg-card border-2 border-border rounded-2xl px-8 hover:border-[#FF8C00] transition-colors">
                <AccordionTrigger className="text-left py-6 hover:no-underline">
                  <span className="text-xl font-bold" style={{ fontFamily: "Rajdhani, sans-serif" }}>
                    Muss ich alle 5 Bereiche gleichzeitig umsetzen?
                  </span>
                </AccordionTrigger>
                <AccordionContent className="text-muted-foreground text-lg leading-relaxed pb-6" style={{ fontFamily: "Work Sans, sans-serif" }}>
                  Nein, das ist das Besondere an der allocore-Methode: Sie können an jeder beliebigen Stelle beginnen. 
                  Wir empfehlen, mit dem Bereich zu starten, der für Sie den größten Hebel verspricht. Die anderen 
                  Säulen werden dann schrittweise integriert, wenn Sie bereit sind.
                </AccordionContent>
              </AccordionItem>

              <AccordionItem value="item-5" className="bg-card border-2 border-border rounded-2xl px-8 hover:border-[#FF8C00] transition-colors">
                <AccordionTrigger className="text-left py-6 hover:no-underline">
                  <span className="text-xl font-bold" style={{ fontFamily: "Rajdhani, sans-serif" }}>
                    Wie unterscheidet sich allocore von klassischer Unternehmensberatung?
                  </span>
                </AccordionTrigger>
                <AccordionContent className="text-muted-foreground text-lg leading-relaxed pb-6" style={{ fontFamily: "Work Sans, sans-serif" }}>
                  Wir kombinieren bewährte betriebswirtschaftliche Prinzipien mit modernen SaaS-Skalierungsstrategien 
                  und praxiserprobten Effizienztools. Statt theoretischer Konzepte liefern wir konkrete, sofort umsetzbare 
                  Maßnahmen mit messbaren Ergebnissen. Unsere Methode ist speziell auf die Bedürfnisse von KMUs zugeschnitten.
                </AccordionContent>
              </AccordionItem>

              <AccordionItem value="item-6" className="bg-card border-2 border-border rounded-2xl px-8 hover:border-[#FF8C00] transition-colors">
                <AccordionTrigger className="text-left py-6 hover:no-underline">
                  <span className="text-xl font-bold" style={{ fontFamily: "Rajdhani, sans-serif" }}>
                    Was passiert in der kostenlosen Erstberatung?
                  </span>
                </AccordionTrigger>
                <AccordionContent className="text-muted-foreground text-lg leading-relaxed pb-6" style={{ fontFamily: "Work Sans, sans-serif" }}>
                  In einem 45-60 minütigen Gespräch analysieren wir Ihre aktuelle Situation, identifizieren die größten 
                  Hebel für Ihr Wachstum und zeigen konkrete erste Schritte auf. Sie erhalten bereits in diesem Gespräch 
                  wertvolle Impulse, die Sie sofort umsetzen können – völlig unverbindlich und kostenfrei.
                </AccordionContent>
              </AccordionItem>
            </Accordion>
          </div>
          </AnimatedSection>
        </div>
      </section>

      {/* Contact Section - Enhanced */}
      <section id="kontakt" className="py-10 bg-gradient-to-b from-background to-muted/20">
        <div className="container">
          <div className="max-w-3xl mx-auto">
            <div className="text-center mb-16">
              <p className="text-sm font-bold text-[#FF8C00] uppercase tracking-wider mb-4" style={{ fontFamily: "Rajdhani, sans-serif" }}>
                Kontakt
              </p>
              <h2 className="text-5xl md:text-6xl font-bold mb-6 leading-tight" style={{ fontFamily: "Rajdhani, sans-serif" }}>
                Starten Sie <span className="text-[#FF8C00]">jetzt</span>
              </h2>
              <p className="text-2xl text-muted-foreground" style={{ fontFamily: "Work Sans, sans-serif" }}>
                Buchen Sie Ihre kostenlose Erstberatung
              </p>
            </div>

            <div className="bg-card p-12 md:p-16 rounded-3xl border-2 border-[#FF8C00] shadow-2xl relative overflow-hidden">
              
              <form className="space-y-8 relative z-10">
                <div className="grid md:grid-cols-2 gap-6">
                  <div>
                    <label className="block text-sm font-bold mb-3 text-foreground" style={{ fontFamily: "Rajdhani, sans-serif" }}>
                      Name *
                    </label>
                    <input
                      type="text"
                      className="w-full px-5 py-4 rounded-xl border-2 border-border focus:border-[#FF8C00] focus:outline-none transition-colors bg-background text-lg"
                      placeholder="Ihr Name"
                      style={{ fontFamily: "Work Sans, sans-serif" }}
                    />
                  </div>
                  <div>
                    <label className="block text-sm font-bold mb-3 text-foreground" style={{ fontFamily: "Rajdhani, sans-serif" }}>
                      E-Mail *
                    </label>
                    <input
                      type="email"
                      className="w-full px-5 py-4 rounded-xl border-2 border-border focus:border-[#FF8C00] focus:outline-none transition-colors bg-background text-lg"
                      placeholder="ihre@email.de"
                      style={{ fontFamily: "Work Sans, sans-serif" }}
                    />
                  </div>
                </div>
                <div>
                  <label className="block text-sm font-bold mb-3 text-foreground" style={{ fontFamily: "Rajdhani, sans-serif" }}>
                    Telefon
                  </label>
                  <input
                    type="tel"
                    className="w-full px-5 py-4 rounded-xl border-2 border-border focus:border-[#FF8C00] focus:outline-none transition-colors bg-background text-lg"
                    placeholder="+49 123 456789"
                    style={{ fontFamily: "Work Sans, sans-serif" }}
                  />
                </div>
                <div>
                  <label className="block text-sm font-bold mb-3 text-foreground" style={{ fontFamily: "Rajdhani, sans-serif" }}>
                    Nachricht *
                  </label>
                  <textarea
                    rows={6}
                    className="w-full px-5 py-4 rounded-xl border-2 border-border focus:border-[#FF8C00] focus:outline-none transition-colors resize-none bg-background text-lg"
                    placeholder="Erzählen Sie uns von Ihrem Unternehmen und Ihren Zielen..."
                    style={{ fontFamily: "Work Sans, sans-serif" }}
                  />
                </div>
                <Button
                  type="submit"
                  className="w-full bg-[#FF8C00] hover:bg-[#FF8C00]/90 text-white font-bold text-xl py-7 shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-[1.02]"
                  style={{ fontFamily: "Rajdhani, sans-serif" }}
                >
                  Kostenlose Erstberatung anfragen
                  <ArrowRight className="ml-2 w-6 h-6" />
                </Button>
              </form>

              <div className="mt-10 pt-10 border-t-2 border-border">
                <div className="flex flex-wrap items-center justify-center gap-8 text-sm">
                  {[
                    { icon: CheckCircle2, text: "DSGVO-konform" },
                    { icon: CheckCircle2, text: "Unverbindlich" },
                    { icon: CheckCircle2, text: "Kostenlos" }
                  ].map((item, index) => (
                    <div key={index} className="flex items-center gap-3">
                      <item.icon className="w-5 h-5 text-[#0D9BA6]" />
                      <span className="font-semibold" style={{ fontFamily: "Rajdhani, sans-serif" }}>{item.text}</span>
                    </div>
                  ))}
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Footer - Enhanced */}
      <footer className="bg-[#0E1B2A] text-white py-10">
        <div className="container">
          <div className="grid md:grid-cols-4 gap-12 mb-12">
            <div>
              <div className="flex items-center gap-3 mb-6">
                <div className="w-12 h-12 rounded-xl bg-gradient-to-br from-[#FF8C00] to-[#0D9BA6] flex items-center justify-center shadow-lg">
                  <span className="text-white font-bold text-2xl" style={{ fontFamily: "Rajdhani, sans-serif" }}>A</span>
                </div>
                <span className="text-2xl font-bold" style={{ fontFamily: "Rajdhani, sans-serif" }}>allocore</span>
              </div>
              <p className="text-sm opacity-70 leading-relaxed" style={{ fontFamily: "Work Sans, sans-serif" }}>
                Profitabilität durch Effizienz<br />Effizienz durch Fokus
              </p>
            </div>
            <div>
              <h4 className="font-bold text-lg mb-6" style={{ fontFamily: "Rajdhani, sans-serif" }}>Navigation</h4>
              <ul className="space-y-3 text-sm" style={{ fontFamily: "Work Sans, sans-serif" }}>
                <li><a href="#methode" className="opacity-70 hover:opacity-100 hover:text-[#FF8C00] transition-all">Methode</a></li>
                <li><a href="#leistungen" className="opacity-70 hover:opacity-100 hover:text-[#FF8C00] transition-all">Leistungen</a></li>
                <li><a href="#ueber-uns" className="opacity-70 hover:opacity-100 hover:text-[#FF8C00] transition-all">Über uns</a></li>
                <li><a href="#kontakt" className="opacity-70 hover:opacity-100 hover:text-[#FF8C00] transition-all">Kontakt</a></li>
              </ul>
            </div>
            <div>
              <h4 className="font-bold text-lg mb-6" style={{ fontFamily: "Rajdhani, sans-serif" }}>Kontakt</h4>
              <ul className="space-y-3 text-sm opacity-70" style={{ fontFamily: "Work Sans, sans-serif" }}>
                <li>info@allocore.de</li>
                <li>+49 123 456789</li>
                <li>Musterstraße 123<br />12345 Musterstadt</li>
              </ul>
            </div>
            <div>
              <h4 className="font-bold text-lg mb-6" style={{ fontFamily: "Rajdhani, sans-serif" }}>Rechtliches</h4>
              <ul className="space-y-3 text-sm" style={{ fontFamily: "Work Sans, sans-serif" }}>
                <li><a href="#" className="opacity-70 hover:opacity-100 hover:text-[#FF8C00] transition-all">Impressum</a></li>
                <li><a href="#" className="opacity-70 hover:opacity-100 hover:text-[#FF8C00] transition-all">Datenschutz</a></li>
                <li><a href="#" className="opacity-70 hover:opacity-100 hover:text-[#FF8C00] transition-all">AGB</a></li>
              </ul>
            </div>
          </div>
          <div className="border-t border-white/10 pt-8 text-center text-sm opacity-50" style={{ fontFamily: "Work Sans, sans-serif" }}>
            <p>© 2026 allocore. Alle Rechte vorbehalten.</p>
          </div>
        </div>
      </footer>
    </div>
  );
}
