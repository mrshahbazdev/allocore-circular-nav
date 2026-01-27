/**
 * Design Philosophy: Kinetic Constructivism
 * - Mechanical precision with bold geometric forms
 * - Strong color contrast (orange/teal)
 * - Clean, functional navigation
 */

import { Button } from "@/components/ui/button";

export default function Header() {
  const scrollToSection = (sectionId: string) => {
    const element = document.getElementById(sectionId);
    if (element) {
      element.scrollIntoView({ behavior: "smooth" });
    }
  };

  return (
    <header className="fixed top-0 left-0 right-0 z-50 bg-background/95 backdrop-blur-sm border-b border-border">
      <div className="container mx-auto px-4">
        <div className="flex items-center justify-between h-16 md:h-20">
          {/* Logo */}
          <div className="flex items-center gap-2">
            <div className="w-10 h-10 rounded-full bg-gradient-to-br from-[#FF8C00] to-[#0D9BA6] flex items-center justify-center">
              <span className="text-white font-bold text-xl" style={{ fontFamily: "Rajdhani, sans-serif" }}>A</span>
            </div>
            <span className="text-xl md:text-2xl font-bold text-foreground" style={{ fontFamily: "Rajdhani, sans-serif" }}>
              allocore
            </span>
          </div>

          {/* Navigation */}
          <nav className="hidden md:flex items-center gap-8">
            <button
              onClick={() => scrollToSection("methode")}
              className="text-sm font-medium text-muted-foreground hover:text-[#FF8C00] transition-colors"
              style={{ fontFamily: "Work Sans, sans-serif" }}
            >
              Methode
            </button>
            <button
              onClick={() => scrollToSection("leistungen")}
              className="text-sm font-medium text-muted-foreground hover:text-[#FF8C00] transition-colors"
              style={{ fontFamily: "Work Sans, sans-serif" }}
            >
              Leistungen
            </button>
            <button
              onClick={() => scrollToSection("ueber-uns")}
              className="text-sm font-medium text-muted-foreground hover:text-[#FF8C00] transition-colors"
              style={{ fontFamily: "Work Sans, sans-serif" }}
            >
              Über uns
            </button>
            <button
              onClick={() => scrollToSection("kontakt")}
              className="text-sm font-medium text-muted-foreground hover:text-[#FF8C00] transition-colors"
              style={{ fontFamily: "Work Sans, sans-serif" }}
            >
              Kontakt
            </button>
          </nav>

          {/* CTA Button */}
          <Button
            onClick={() => scrollToSection("kontakt")}
            className="bg-[#FF8C00] hover:bg-[#FF8C00]/90 text-white font-semibold"
            style={{ fontFamily: "Rajdhani, sans-serif" }}
          >
            Beratung anfragen
          </Button>
        </div>
      </div>
    </header>
  );
}
