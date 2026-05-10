import {
  Focus,
  Compass,
  Lightbulb,
  Rocket,
  Users,
  Search,
  Globe,
  BarChart3,
  FileText,
  Shield,
  ClipboardCheck,
  BookMarked,
  Target,
  TrendingUp,
  type LucideIcon,
} from "lucide-react";

export interface ToolModule {
  name: string;
  description: string;
}

export interface Tool {
  id: string;
  name: string;
  tagline: string;
  description: string;
  longDescription: string;
  features: string[];
  modules: ToolModule[];
  howItWorks: string[];
  useCases: string[];
  highlights: string[];
  techStack: string[];
  category: ToolCategory;
  icon: LucideIcon;
  color: string;
  repo: string;
  status: "live" | "beta" | "coming-soon";
}

export type ToolCategory =
  | "business-strategy"
  | "sales-marketing"
  | "finance-compliance"
  | "productivity";

export interface CategoryInfo {
  id: ToolCategory;
  label: string;
  description: string;
  color: string;
}

export const categories: CategoryInfo[] = [
  {
    id: "business-strategy",
    label: "Business & Strategie",
    description:
      "Strategische Tools für Unternehmensführung, Vision und Innovation",
    color: "#FF8C00",
  },
  {
    id: "sales-marketing",
    label: "Sales & Marketing",
    description:
      "Lead-Generierung, SEO-Optimierung und Content-Marketing Tools",
    color: "#0D9BA6",
  },
  {
    id: "finance-compliance",
    label: "Finanzen & Compliance",
    description:
      "Finanzsteuerung, Rechnungsstellung und Compliance-Management",
    color: "#FF8C00",
  },
  {
    id: "productivity",
    label: "Produktivität",
    description: "Wissensmanagement und Analyse-Tools für mehr Effizienz",
    color: "#0D9BA6",
  },
];

export const tools: Tool[] = [
  // ─── Business & Strategy ────────────────────────────
  {
    id: "focusmatrix",
    name: "FocusMatrix",
    tagline: "Entscheiden statt abarbeiten",
    description:
      "SaaS für Manager, das das Only-You-Prinzip in ein tägliches Betriebssystem verwandelt. Jede Aufgabe wird durch eine Frage gefiltert: Kann nur ich das wirklich tun?",
    longDescription:
      "FocusMatrix ist ein bilinguales (EN/DE) SaaS-System speziell für Führungskräfte. Es basiert auf dem Only-You-Prinzip: Jede eingehende Aufgabe wird durch einen strukturierten Wizard geschleust, der nur eine zentrale Frage stellt — 'Kann nur ich das wirklich tun?' Das Ergebnis: Aufgaben werden automatisch in Keep, Delegate oder Drop sortiert. Manager gewinnen Klarheit, sparen Zeit und führen fokussierter.",
    features: [
      "Triage Inbox mit Entscheidungs-Wizard",
      "Decision Matrix mit Auto-Kategorisierung",
      "Delegations-Cockpit mit Anti-Mikromanagement",
      "Wöchentlicher Self-Check mit Focus Score",
      "AI Co-Pilot für heuristische Vorschläge",
      "Organisations-Check für Team-Klarheit",
      "Guiding Principle Widget (Always-Visible)",
      "Bilingual: Deutsch & Englisch",
    ],
    modules: [
      {
        name: "Principle Dashboard",
        description:
          "Focus Score, wöchentliche Statistiken, Self-Check-Streak und Leitprinzip auf einen Blick",
      },
      {
        name: "Triage Inbox",
        description:
          "Schnelle Aufgabenerfassung mit dem 'Kann nur ich das?'-Wizard für sofortige Kategorisierung",
      },
      {
        name: "Decision Matrix",
        description:
          "Auto-Kategorisierung in die vier Only-You-Kategorien für klare Priorisierung",
      },
      {
        name: "Delegations-Cockpit",
        description:
          "Ziel, Rahmen, Deadline, Entscheidungsspielraum, Ressourcen — mit Anti-Mikromanagement-Schutz",
      },
      {
        name: "Drop/Omit Lever",
        description:
          "Aufgaben, Meetings und Reports mutig eliminieren — mit strukturierter Checkliste",
      },
      {
        name: "Weekly Self-Check",
        description:
          "Freitags-Ritual mit 4 Reflexionsfragen und Focus Score Berechnung",
      },
    ],
    howItWorks: [
      "Aufgabe in die Triage Inbox eingeben",
      "Only-You-Wizard beantwortet: 'Kann nur ich das tun?'",
      "Automatische Sortierung in Keep, Delegate oder Drop",
      "Keep-Aufgaben werden in der Decision Matrix priorisiert",
      "Delegierte Aufgaben fließen ins Delegations-Cockpit",
      "Wöchentlicher Self-Check misst Ihren Focus Score",
    ],
    useCases: [
      "Geschäftsführer, die ihre Aufgabenlast reduzieren wollen",
      "Teamleiter, die effektiver delegieren möchten",
      "Manager, die von operativer zu strategischer Arbeit wechseln",
      "Unternehmer, die sich auf Kernaufgaben fokussieren wollen",
    ],
    highlights: [
      "8 vollständige Module",
      "AI-Ready (OpenAI Drop-in)",
      "Jetstream Teams + 2FA",
      "Bilingual DE/EN",
    ],
    techStack: ["Laravel 11", "Vue 3", "Inertia.js", "Tailwind CSS", "Jetstream"],
    category: "business-strategy",
    icon: Focus,
    color: "#FF8C00",
    repo: "FocusMatrix",
    status: "live",
  },
  {
    id: "visionflow",
    name: "VisionFlow",
    tagline: "Value-to-Mission Operating System",
    description:
      "Enterprise-Plattform für die Co-Creation von Unternehmenszweck — von Werten über Prinzipien und strategische Ziele bis zur Vision und Mission.",
    longDescription:
      "VisionFlow ist ein lebendiges Betriebssystem für organisatorische Ausrichtung. Es ermöglicht Teams, gemeinsam ihren Unternehmenszweck zu erarbeiten — Schritt für Schritt von Werten über Prinzipien, strategische Ziele und Vision bis hin zu konkreten Missionen. Jedes Element ist rückverfolgbar, jede Entscheidung wird dokumentiert, und alles kann in die Unternehmenswebsite eingebettet werden.",
    features: [
      "Values Workshop mit anonymer Abstimmung",
      "Principles Builder mit Konsens-Tracking",
      "Strategic Goals Canvas mit Traceability",
      "Vision Co-Creation mit Resonanz-Voting",
      "Mission Generator mit Ownership Assignment",
      "Project Linking für Purpose-Alignment",
      "Decision Log mit Value/Mission-Referenz",
      "Embeddable Widgets für Unternehmenswebsite",
    ],
    modules: [
      {
        name: "Values Workshop",
        description:
          "Kollaboratives Erstellen, Clustern und Priorisieren von Kernwerten mit anonymem Input und mehrstufiger Abstimmung",
      },
      {
        name: "Principles Builder",
        description:
          "Genehmigte Werte in handlungsfähige Prinzipien umwandeln mit strukturierten Satzvorlagen und Konsens-Tracking",
      },
      {
        name: "Strategic Goals Canvas",
        description:
          "Langfristige Richtungsziele nach Markt, Impact und Organisation kategorisiert mit vollständiger Rückverfolgbarkeit",
      },
      {
        name: "Vision Co-Creation",
        description:
          "Kollaboratives Entwerfen, Iterieren und Genehmigen eines einheitlichen Vision Statements mit emotionalem Resonanz-Voting",
      },
      {
        name: "Mission Generator",
        description:
          "Aktive Missionen aus der genehmigten Vision ableiten mit Ownership-Zuweisung und automatisiertem Review-Rhythmus",
      },
      {
        name: "Dashboard Widgets",
        description:
          "Konfigurierbare Always-On Vision-Dashboards und öffentliche API mit iFrame/JS-Snippets für Homepage-Integration",
      },
    ],
    howItWorks: [
      "Team-Mitglieder geben anonyme Werte-Vorschläge ein",
      "Multi-Runden-Voting clustert und priorisiert die Werte",
      "Genehmigte Werte werden zu Prinzipien umgewandelt",
      "Strategische Ziele werden auf dem Canvas definiert",
      "Vision wird kollaborativ erarbeitet und abgestimmt",
      "Missionen werden aus der Vision abgeleitet und zugewiesen",
    ],
    useCases: [
      "Startups, die ihren Purpose definieren",
      "Wachsende Unternehmen, die Alignment brauchen",
      "Teams nach Restrukturierung oder Merger",
      "Organisationen, die ihre Kultur aktiv gestalten",
    ],
    highlights: [
      "5-stufige Purpose Pipeline",
      "RACI-Rollenzuweisung",
      "Bilingual DE/EN",
      "Embeddable Public Widgets",
    ],
    techStack: ["Laravel 11", "Vue 3", "Inertia.js", "Tailwind CSS"],
    category: "business-strategy",
    icon: Compass,
    color: "#0D9BA6",
    repo: "visionflow",
    status: "live",
  },
  {
    id: "innovation-hub",
    name: "Innovation Hub",
    tagline: "Innovationen systematisch managen",
    description:
      "Dual-Interface-Plattform für die Verwaltung interner Innovations-Workflows mit User-Frontend und Admin-Panel.",
    longDescription:
      "Innovation Hub kombiniert ein nutzerfreundliches Frontend (Jetstream & Livewire) mit einem leistungsstarken Admin-Panel (Filament). Nutzer können sich registrieren, globalen Teams beitreten und Ideen einreichen. Super Admins und Manager steuern über das Filament-Backend alle Nutzer, Teams, Ideen und Berechtigungen. Perfekt für Unternehmen, die Innovation strukturiert fördern wollen.",
    features: [
      "Global Team Browser mit Join/Leave",
      "Ideen-Pipeline mit Team-Zuordnung",
      "Rollenbasierte Bearbeitungsrechte",
      "Filament Admin Panel für Super Admins",
      "Jetstream Team-Rollen und Permissions",
      "User-Facing Pipeline View",
      "Active Team Submissions",
      "Spatie Permission Management",
    ],
    modules: [
      {
        name: "User Registration",
        description:
          "Öffentliche Registrierung über /register — neue Nutzer starten ohne persönliches Team",
      },
      {
        name: "Global Team Browser",
        description:
          "Dedizierte /browse-teams Seite zum Beitreten und Verlassen aller verfügbaren Teams",
      },
      {
        name: "Idea Submission",
        description:
          "Post Idea direkt zum aktuell aktiven Team mit vollständiger Ideen-Verwaltung",
      },
      {
        name: "Pipeline View",
        description:
          "Responsive Pipeline-Ansicht — Super Admins sehen alles, normale Nutzer nur Team-Ideen",
      },
      {
        name: "Admin Panel",
        description:
          "Filament-basiertes Backend für vollständige Kontrolle über Nutzer, Teams, Ideen und Berechtigungen",
      },
    ],
    howItWorks: [
      "Nutzer registrieren sich und browsen verfügbare Teams",
      "Team beitreten und Ideen einreichen",
      "Ideen werden in der Team-Pipeline sichtbar",
      "Team-Rollen bestimmen Bearbeitungsrechte",
      "Admins verwalten alles über Filament Panel",
    ],
    useCases: [
      "Mittelständische Unternehmen mit Innovationskultur",
      "Konzerne mit dezentralen Innovationsteams",
      "Agenturen, die Kundenprojekte sammeln",
      "Bildungseinrichtungen mit Projekt-Submissions",
    ],
    highlights: [
      "Dual-Interface (Frontend + Admin)",
      "Filament 3 Admin Panel",
      "Jetstream Team Management",
      "Spatie Permissions",
    ],
    techStack: ["Laravel 11", "Livewire 3", "Filament 3", "Tailwind CSS"],
    category: "business-strategy",
    icon: Lightbulb,
    color: "#FF8C00",
    repo: "innovation-hub",
    status: "live",
  },
  {
    id: "ideenpipeline",
    name: "IdeenPipeline",
    tagline: "Ideen strukturiert entwickeln",
    description:
      "Pipeline-Management für Ideen und Projekte mit strukturiertem Workflow von der Erfassung bis zur Umsetzung.",
    longDescription:
      "IdeenPipeline bietet einen strukturierten Workflow für die Erfassung, Bewertung und Umsetzung von Ideen. Von der ersten Skizze bis zum fertigen Projekt — jede Phase wird transparent verwaltet. Teams arbeiten gemeinsam an Ideen, weisen Aufgaben zu und tracken den Fortschritt in Echtzeit.",
    features: [
      "Ideen-Erfassung und -Bewertung",
      "Projekt-Pipeline mit Aufgaben",
      "Team-Kollaboration",
      "Domain-Management",
      "Status-Tracking und Fortschritt",
      "Projekt-Aufgaben Verwaltung",
      "Team-basierte Zuordnung",
    ],
    modules: [
      {
        name: "Ideen-Manager",
        description:
          "Ideen erfassen, beschreiben und mit Metadaten versehen für die spätere Bewertung",
      },
      {
        name: "Projekt-Pipeline",
        description:
          "Genehmigte Ideen werden zu Projekten mit Aufgaben, Meilensteinen und Zuweisungen",
      },
      {
        name: "Task Board",
        description:
          "Aufgaben innerhalb von Projekten erstellen, zuweisen und den Status tracken",
      },
      {
        name: "Domain Verwaltung",
        description:
          "Ideen und Projekte nach Geschäftsbereichen oder Domains organisieren",
      },
    ],
    howItWorks: [
      "Idee erfassen und beschreiben",
      "Team bewertet und priorisiert die Idee",
      "Genehmigte Ideen werden zu Projekten",
      "Aufgaben werden zugewiesen und getrackt",
      "Fortschritt wird in der Pipeline visualisiert",
    ],
    useCases: [
      "Product Teams mit Feature-Requests",
      "Innovationsabteilungen",
      "Startups im Ideation-Prozess",
      "Beratungsunternehmen mit Kundenprojekten",
    ],
    highlights: [
      "Vollständiger Ideen-Lifecycle",
      "Domain-basierte Organisation",
      "Team-Kollaboration",
      "Aufgaben-Management",
    ],
    techStack: ["Laravel 11", "Livewire 3", "Tailwind CSS"],
    category: "business-strategy",
    icon: Rocket,
    color: "#0D9BA6",
    repo: "ideenpipeline",
    status: "beta",
  },

  // ─── Sales & Marketing ──────────────────────────────
  {
    id: "leados",
    name: "LeadOS",
    tagline: "B2B Lead Generation & AI CRM",
    description:
      "Leistungsstarke B2B-Lead-Generierung mit AI-gestütztem Scoring, automatisierten E-Mail-Sequenzen und visuellem Pipeline-Management.",
    longDescription:
      "LeadOS ist eine vollständige B2B-Lead-Generierung-Engine und CRM, entwickelt für High-Performance Sales Teams. Die Plattform kombiniert AI-getriebenes Lead Scoring, automatisierte E-Mail-Sequenzen und visuelles Pipeline-Management. Mit dem integrierten Inbox Scanner werden neue Leads direkt aus dem Posteingang importiert, während die Chrome Extension LinkedIn-Leads direkt ins CRM scrapt. Vollständig lokalisiert in 10 Sprachen.",
    features: [
      "AI Lead-Analyse und ICP-Scoring",
      "Automatisierte Multi-Step Drip-Kampagnen",
      "Intelligenter Inbox-Scanner",
      "Visual Kanban Deal-Pipeline",
      "Chrome Extension für LinkedIn-Scraping",
      "Multi-Tenant Workspaces",
      "10 Sprachen unterstützt",
      "IMAP/SMTP Integration",
    ],
    modules: [
      {
        name: "AI Lead Analysis",
        description:
          "Automatisches Scoring und Bewertung von Kontakten gegen Ihr Ideal Customer Profile (ICP) mit OpenAI & Groq",
      },
      {
        name: "Automated Sequences",
        description:
          "Skalierbare Multi-Step Drip-Kampagnen über IMAP/SMTP mit personalisierten E-Mail-Templates",
      },
      {
        name: "Inbox Scanner",
        description:
          "Intelligentes E-Mail-Scanning zur automatischen Erkennung und Import neuer Leads",
      },
      {
        name: "Kanban Pipeline",
        description:
          "Deals mit Drag-and-Drop verwalten — von 'Cold' über 'Warm' und 'Hot' bis 'Won'",
      },
      {
        name: "Chrome Extension",
        description:
          "LinkedIn-Leads direkt aus dem Browser ins CRM importieren mit einem Klick",
      },
    ],
    howItWorks: [
      "Leads importieren via Inbox Scanner oder Chrome Extension",
      "AI analysiert und scored jeden Lead gegen Ihr ICP",
      "Leads werden automatisch in die Kanban Pipeline einsortiert",
      "Automatisierte E-Mail-Sequenzen starten basierend auf Lead-Status",
      "Pipeline-Tracking von Cold bis Won mit Deal-Management",
    ],
    useCases: [
      "B2B Sales Teams mit hohem Outreach-Volumen",
      "Agenturen mit mehreren Kunden-Pipelines",
      "Startups im aktiven Wachstumsmodus",
      "Consultants mit Lead-basiertem Business",
    ],
    highlights: [
      "AI-Powered (OpenAI + Groq)",
      "10 Sprachen inkl. Arabisch, Hindi",
      "Chrome Extension",
      "Multi-Tenant",
    ],
    techStack: ["Laravel 11", "Blade", "Tailwind CSS", "OpenAI", "Groq"],
    category: "sales-marketing",
    icon: Users,
    color: "#FF8C00",
    repo: "lead-quality",
    status: "live",
  },
  {
    id: "seostory",
    name: "SEOStory",
    tagline: "SEO-Analyse und Optimierung",
    description:
      "Umfassendes SEO-Tool mit Keyword-Research, Projekt-Management, Seobility-Integration und detaillierten Audit-Reports.",
    longDescription:
      "SEOStory ist ein vollständiges SEO-Management-Tool mit Keyword Research, projektbasiertem Management, Seobility-Integration und detaillierten Audit-Reports in drei Kategorien: Structure, Content und Technical. Teams können Projekte gemeinsam verwalten, Competitor Pages analysieren und den SEO-Fortschritt über Zeit tracken.",
    features: [
      "Keyword Research und Tracking",
      "Projekt-basiertes SEO-Management",
      "Structure, Content & Tech Reports",
      "Seobility-Integration",
      "Team-Kollaboration mit Rollen",
      "Competitor Page Analysis",
      "Project Page Tracking",
      "Detaillierte Audit-Reports",
    ],
    modules: [
      {
        name: "Keyword Research",
        description:
          "Umfassende Keyword-Recherche mit Suchvolumen, Schwierigkeit und Trend-Analyse",
      },
      {
        name: "Project Manager",
        description:
          "Projekte anlegen, Pages zuordnen und den SEO-Fortschritt über Zeit verfolgen",
      },
      {
        name: "Structure Report",
        description:
          "Technische Struktur-Analyse mit Crawl-Daten, URL-Struktur und interne Verlinkung",
      },
      {
        name: "Content Report",
        description:
          "Content-Qualität, Keyword-Abdeckung, Meta-Tags und Lesbarkeits-Analyse",
      },
      {
        name: "Tech Report",
        description:
          "Performance-Metriken, Core Web Vitals, Mobile-Optimierung und Security-Checks",
      },
    ],
    howItWorks: [
      "Projekt anlegen und Website-URL eingeben",
      "Keyword Research durchführen und Ziel-Keywords festlegen",
      "Automatische Audit-Reports generieren lassen",
      "Structure, Content und Tech Reports analysieren",
      "Maßnahmen umsetzen und Fortschritt tracken",
    ],
    useCases: [
      "SEO-Agenturen mit mehreren Kundenprojekten",
      "Marketing-Teams in Unternehmen",
      "Freelance SEO-Berater",
      "Content-Teams mit SEO-Verantwortung",
    ],
    highlights: [
      "3 Report-Typen",
      "Seobility Integration",
      "Competitor Analysis",
      "Team Collaboration",
    ],
    techStack: ["Laravel 11", "Livewire 3", "Tailwind CSS", "Chart.js"],
    category: "sales-marketing",
    icon: Search,
    color: "#0D9BA6",
    repo: "seostory",
    status: "live",
  },
  {
    id: "seo-site",
    name: "SEO Multi-Tool",
    tagline: "All-in-One SEO Platform",
    description:
      "Multi-Tool SEO-Plattform mit DataForSEO-Integration, On-Page Audits, Content Briefs und umfassender Site-Analyse.",
    longDescription:
      "SEO Multi-Tool ist eine professionelle All-in-One SEO-Plattform mit 6 integrierten DataForSEO-Services. Von On-Page Audits mit 4 verschiedenen Audit-Typen über Content Brief Generation bis hin zu umfassender Site-Analyse — alles in einem modernen React-Frontend mit Laravel-Backend. Multi-User-Authentication über Sanctum sorgt für sichere Team-Nutzung.",
    features: [
      "6 DataForSEO Services integriert",
      "OnPage Audit mit 4 Audit-Typen",
      "Content Brief Generator",
      "Site Management Dashboard",
      "Multi-User Authentication",
      "API-basierte Architektur",
      "React + Vite Frontend",
      "Real-Time Audit Status",
    ],
    modules: [
      {
        name: "Site Manager",
        description:
          "Websites hinzufügen, verwalten und den Gesamtzustand über ein zentrales Dashboard überwachen",
      },
      {
        name: "OnPage Audit",
        description:
          "4 verschiedene Audit-Typen für umfassende On-Page-Analyse mit DataForSEO",
      },
      {
        name: "Content Briefs",
        description:
          "AI-gestützte Content Briefs für optimierte Texterstellung mit SEO-Fokus",
      },
      {
        name: "Analytics Dashboard",
        description:
          "Übersichtliche Statistiken und KPIs für alle verwalteten Sites",
      },
    ],
    howItWorks: [
      "Website im Site Manager hinzufügen",
      "OnPage Audit mit gewünschtem Audit-Typ starten",
      "DataForSEO analysiert die Seite automatisch",
      "Ergebnisse im Dashboard reviewen",
      "Content Briefs für Optimierungen generieren",
    ],
    useCases: [
      "SEO-Agenturen mit Enterprise-Kunden",
      "In-House SEO-Teams",
      "Digital Marketing Manager",
      "Technical SEO Specialists",
    ],
    highlights: [
      "6 DataForSEO APIs",
      "4 Audit-Typen",
      "React + Laravel API",
      "Sanctum Auth",
    ],
    techStack: ["Laravel 12", "React", "Vite", "Tailwind CSS", "DataForSEO"],
    category: "sales-marketing",
    icon: Globe,
    color: "#FF8C00",
    repo: "seo-site",
    status: "beta",
  },
  {
    id: "clusterforge",
    name: "ClusterForge",
    tagline: "AI Keyword Cluster Generator",
    description:
      "Verwandelt ein einzelnes Keyword in ein komplettes SEO Topic Cluster mit Pillar Page, 5 Cluster Pages und 50 User-Intent Fragen.",
    longDescription:
      "ClusterForge nimmt ein einzelnes Keyword und eine Website und produziert ein vollständiges, publish-ready Content Cluster: 5 Subtopics, 10 User-Intent-Fragen pro Subtopic (50 total), AI-geschriebene Antworten für jede Frage, und 1 Pillar Page + 5 Cluster Pages in Markdown. Alles wird mit Google Gemini generiert, mit Live-Status-Updates über eine 5-Schritt-Pipeline im Background.",
    features: [
      "5 Subtopics pro Keyword automatisch",
      "10 User-Intent-Fragen pro Subtopic",
      "AI-geschriebene Antworten (Gemini)",
      "Pillar Page + 5 Cluster Pages",
      "Live-Status-Tracking im Background",
      "Markdown-Export ready to publish",
      "Redesigned Landing Page",
      "Card-based Project Dashboard",
    ],
    modules: [
      {
        name: "Topic Discovery",
        description:
          "AI identifiziert 5 Long-Tail Subtopics basierend auf dem Haupt-Keyword und der Website",
      },
      {
        name: "Question Generator",
        description:
          "10 User-Intent-Fragen pro Subtopic — 50 Fragen total, die echte Suchanfragen abbilden",
      },
      {
        name: "Answer Engine",
        description:
          "Google Gemini generiert fundierte, SEO-optimierte Antworten für jede einzelne Frage",
      },
      {
        name: "Page Builder",
        description:
          "Automatische Erstellung von 1 Pillar Page und 5 Cluster Pages in Markdown-Format",
      },
      {
        name: "Project Dashboard",
        description:
          "Card-basiertes Dashboard mit Live-Status-Pills und Download-Optionen",
      },
    ],
    howItWorks: [
      "Keyword und Website-URL eingeben",
      "AI generiert 5 relevante Subtopics",
      "50 User-Intent-Fragen werden erstellt",
      "Gemini schreibt optimierte Antworten",
      "Pillar Page + 5 Cluster Pages werden generiert",
      "Content herunterladen und publizieren",
    ],
    useCases: [
      "Content-Marketing-Teams mit hohem Output-Bedarf",
      "SEO-Agenturen für Kundenprojekte",
      "Blogger und Solopreneure",
      "Unternehmen, die Topic Authority aufbauen",
    ],
    highlights: [
      "Google Gemini AI",
      "50 Fragen automatisch",
      "6 Pages pro Cluster",
      "Background Pipeline",
    ],
    techStack: ["Laravel 11", "React", "Inertia.js", "Google Gemini"],
    category: "sales-marketing",
    icon: BarChart3,
    color: "#0D9BA6",
    repo: "keyword-cluster-tool",
    status: "live",
  },

  // ─── Finance & Compliance ───────────────────────────
  {
    id: "financial",
    name: "Financial",
    tagline: "Finanzanalyse und Controlling",
    description:
      "Professionelles Finanz-Controlling-Tool für detaillierte Analysen, Tap-Management und fundierte Entscheidungsgrundlagen.",
    longDescription:
      "Financial ist ein professionelles Controlling-Tool, das detaillierte Finanzanalysen mit Multi-Row-Analyse-Buildern und Tap-Management-System kombiniert. Es bietet übersichtliche Dashboards für Echtzeit-Einblicke, Export- und Reporting-Funktionen und ermöglicht datenbasierte Entscheidungen auf Knopfdruck.",
    features: [
      "Detaillierte Finanzanalysen",
      "Multi-Row Analysis Builder",
      "Tap Management System",
      "Übersichtliche Dashboards",
      "Export und Reporting",
      "Echtzeit-Datenvisualisierung",
      "Kategorisierte Auswertungen",
    ],
    modules: [
      {
        name: "Analysis Builder",
        description:
          "Flexible Multi-Row-Analysen erstellen mit benutzerdefinierten Zeilen und Berechnungen",
      },
      {
        name: "Tap Manager",
        description:
          "Finanzielle Taps (Zahlungsströme) verwalten und kategorisieren",
      },
      {
        name: "Dashboard",
        description:
          "Echtzeit-Übersicht über alle Finanzkennzahlen mit visuellen Charts",
      },
      {
        name: "Reports",
        description:
          "Detaillierte Reports exportieren für Buchhalter, Steuerberater und Management",
      },
    ],
    howItWorks: [
      "Finanzdaten eingeben oder importieren",
      "Analysen mit dem Multi-Row Builder erstellen",
      "Taps kategorisieren und zuordnen",
      "Dashboard für Echtzeit-Übersicht nutzen",
      "Reports exportieren und teilen",
    ],
    useCases: [
      "KMU-Geschäftsführer für Financial Controlling",
      "Berater für Mandanten-Finanzanalyse",
      "Startups für Burn-Rate Tracking",
      "Freelancer für Einnahmen-/Ausgaben-Analyse",
    ],
    highlights: [
      "Multi-Row Analysis",
      "Tap Management",
      "Echtzeit Dashboards",
      "Export & Reporting",
    ],
    techStack: ["Laravel 11", "Livewire 3", "Tailwind CSS"],
    category: "finance-compliance",
    icon: TrendingUp,
    color: "#FF8C00",
    repo: "financial",
    status: "live",
  },
  {
    id: "invoicemaker",
    name: "InvoiceMaker",
    tagline: "Professionelle Rechnungstellung",
    description:
      "Komplette Invoice-SaaS mit Multi-Step-Wizard, PDF-Generierung, Payment-Tracking und professionellen Templates.",
    longDescription:
      "InvoiceMaker ist eine production-ready Invoice SaaS-Anwendung. Der Multi-Step-Wizard führt durch die Rechnungserstellung, automatische Nummernvergabe (INV-2024-0001), Steuerberechnung und Rabatte. Professionelle PDF-Generierung mit DomPDF, vollständiger Status-Workflow von Draft über Sent und Paid bis Overdue, plus Echtzeit-Dashboard mit Statistiken.",
    features: [
      "Multi-Step Invoice Wizard",
      "Professionelle PDF-Generierung",
      "Automatische Nummernvergabe (INV-Format)",
      "Status-Workflow (Draft → Sent → Paid → Overdue)",
      "Kunden- und Produktverwaltung",
      "Steuer- und Rabattberechnung",
      "Payment Tracking",
      "Business Profile mit Logo Upload",
    ],
    modules: [
      {
        name: "Invoice Wizard",
        description:
          "Multi-Step-Prozess: Kunde wählen → Produkte hinzufügen → Steuern/Rabatte → Vorschau → Erstellen",
      },
      {
        name: "Client Manager",
        description:
          "Kunden anlegen, suchen und verwalten mit vollständigen Kontaktdaten und Historie",
      },
      {
        name: "Product Library",
        description:
          "Produkt- und Dienstleistungskatalog mit Preisen, Beschreibungen und Kategorien",
      },
      {
        name: "PDF Engine",
        description:
          "Professionelle PDF-Rechnungen mit anpassbaren Templates und automatischem Versand",
      },
      {
        name: "Dashboard",
        description:
          "Echtzeit-Statistiken: Gesamtumsatz, offene Rechnungen, überfällige Zahlungen",
      },
    ],
    howItWorks: [
      "Business-Profil mit Logo einrichten",
      "Kunden und Produkte anlegen",
      "Rechnung über den Multi-Step-Wizard erstellen",
      "PDF generieren und an Kunden senden",
      "Zahlungen tracken und Status aktualisieren",
    ],
    useCases: [
      "Freelancer und Solopreneure",
      "Kleine Unternehmen ohne Buchhaltungssoftware",
      "Agenturen mit vielen Rechnungen",
      "Berater mit projektbasierter Abrechnung",
    ],
    highlights: [
      "Auto-Invoice-Nummern",
      "DomPDF Templates",
      "4-Stufen Workflow",
      "Real-Time Dashboard",
    ],
    techStack: ["Laravel 11", "Livewire 3", "DomPDF", "Tailwind CSS"],
    category: "finance-compliance",
    icon: FileText,
    color: "#0D9BA6",
    repo: "invoice-maker",
    status: "live",
  },
  {
    id: "compliancetermine",
    name: "ComplianceTermine",
    tagline: "Compliance-Fristen im Griff",
    description:
      "Fristen- und Compliance-Management-Tool für die zuverlässige Einhaltung aller regulatorischen Anforderungen und Termine.",
    longDescription:
      "ComplianceTermine ist ein spezialisiertes Tool für das Management von Compliance-Fristen und regulatorischen Anforderungen. Es bietet automatische Erinnerungen, Domain- und Paket-Management, Team-Kollaboration und ein übersichtliches Dashboard — damit kein Termin mehr verpasst wird.",
    features: [
      "Automatische Fristen-Erinnerungen",
      "Domain- und Paket-Management",
      "Team-Kollaboration",
      "Settings und Konfiguration",
      "Übersichtliches Dashboard",
      "Termin-Kalender",
      "Benachrichtigungssystem",
    ],
    modules: [
      {
        name: "Termin-Manager",
        description:
          "Alle Compliance-Fristen zentral erfassen, kategorisieren und überwachen",
      },
      {
        name: "Domain Management",
        description:
          "Domains und Pakete verwalten — ideal für Unternehmen mit mehreren Geschäftsbereichen",
      },
      {
        name: "Reminder Engine",
        description:
          "Automatische Erinnerungen per E-Mail und Dashboard-Benachrichtigungen",
      },
      {
        name: "Team Collaboration",
        description:
          "Fristen und Verantwortlichkeiten im Team zuweisen und tracken",
      },
    ],
    howItWorks: [
      "Compliance-Fristen und Termine erfassen",
      "Verantwortliche Personen zuweisen",
      "Automatische Erinnerungen konfigurieren",
      "Dashboard für Fristenübersicht nutzen",
      "Team-Benachrichtigungen bei fälligen Terminen",
    ],
    useCases: [
      "Compliance Officers in regulierten Branchen",
      "Steuerberater mit Mandantenfristen",
      "Rechtsabteilungen mit Vertragsterminen",
      "IT-Abteilungen mit Zertifizierungsfristen",
    ],
    highlights: [
      "Auto-Erinnerungen",
      "Domain Management",
      "Team-Zuweisungen",
      "Fristen-Dashboard",
    ],
    techStack: ["Laravel 11", "Livewire 3", "Tailwind CSS"],
    category: "finance-compliance",
    icon: Shield,
    color: "#FF8C00",
    repo: "compliancetermine",
    status: "beta",
  },
  {
    id: "auditpro",
    name: "AuditPro",
    tagline: "Enterprise Business Maturity",
    description:
      "Premium-SaaS für Business-Audits mit dynamischem Template Builder, Radar-Visualisierungen und AI-gestützten Entwicklungsstrategien.",
    longDescription:
      "AuditPro ist eine skalierbare Enterprise-SaaS-Plattform für Business Consultants, Coaches und Agenturen. Führen Sie umfassende interne und externe Business-Audits durch, messen Sie Wachstum über 5 Säulen (Revenue, Profit, Order, Influence, Legacy), vergleichen Sie historische Ergebnisse mit Radar-Charts und erhalten Sie AI-getriebene Entwicklungsstrategien. Mit 10 Sprachen und Multi-Tenant-Architektur.",
    features: [
      "Dynamic Template Builder",
      "Maturity Radar Visualizations",
      "10 Sprachen unterstützt",
      "PDF Report Generation",
      "Multi-Tenant Architecture",
      "Branching Logic in Fragebögen",
      "Target Benchmark Scores",
      "Algorithmische Empfehlungen",
    ],
    modules: [
      {
        name: "Template Builder",
        description:
          "Enterprise-grade Fragebögen mit Branching Logic, Target Benchmarks, Routing und spezifischen Gewichtungen",
      },
      {
        name: "Radar Visualizations",
        description:
          "Interaktive Radar-Charts zum Vergleich von Performance vs. Branchen-Benchmarks und historischen Audits",
      },
      {
        name: "PDF Reports",
        description:
          "Professionelle PDF-Breakdowns mit algorithmischen Empfehlungen pro Abteilung für High-Ticket-Kunden",
      },
      {
        name: "Client Manager",
        description:
          "Alle Kunden, historische Audits und Organisationen in einem cleanen Multi-Tenant SaaS-Layout",
      },
      {
        name: "Localization Engine",
        description:
          "Native Support für 10 Sprachen inkl. Englisch, Deutsch, Französisch, Arabisch, Chinesisch und mehr",
      },
    ],
    howItWorks: [
      "Audit-Template mit dem Dynamic Builder erstellen",
      "Kunden einladen und Audit durchführen",
      "Ergebnisse werden automatisch in Radar-Charts visualisiert",
      "AI generiert Entwicklungsstrategien pro Bereich",
      "Professionelle PDF-Reports für Kunden generieren",
    ],
    useCases: [
      "Business Consultants mit Audit-Services",
      "Unternehmensberater für Reifegrad-Analysen",
      "Coaches mit strukturierten Assessments",
      "Agenturen für Client Onboarding",
    ],
    highlights: [
      "5 Business-Säulen",
      "10 Sprachen",
      "AI-Strategien",
      "Multi-Tenant SaaS",
    ],
    techStack: ["Laravel 11", "Livewire 3", "Chart.js", "DomPDF"],
    category: "finance-compliance",
    icon: ClipboardCheck,
    color: "#0D9BA6",
    repo: "audit",
    status: "live",
  },

  // ─── Productivity ───────────────────────────────────
  {
    id: "brainvault",
    name: "BrainVault",
    tagline: "Dein zweites Gehirn im Web",
    description:
      "Fortschrittliche Bookmark- und Notiz-Plattform mit AI-gestützter Organisation, Web-Highlighting und Knowledge Graph.",
    longDescription:
      "BrainVault ist Ihr zweites Gehirn für das Web. Die Plattform kombiniert One-Click Bookmarks mit Auto-Metadaten-Extraktion, Web-Highlighting über eine Chrome Extension, Smart Notes mit Rich Text Editor, AI-Summaries mit GPT-4, verschachtelte Collections mit Tags, Full-Text Search via Meilisearch, Team-Kollaboration und einen visuellen Knowledge Graph mit D3.js. Alles nahtlos integriert.",
    features: [
      "One-Click Bookmarks mit Auto-Metadaten",
      "Web-Highlighting mit Chrome Extension",
      "AI Summaries mit GPT-4",
      "Knowledge Graph mit D3.js",
      "Team-Kollaboration und Sharing",
      "Smart Notes mit Rich Text Editor",
      "Full-Text Search (Meilisearch)",
      "Nested Collections & Polymorphic Tags",
    ],
    modules: [
      {
        name: "Bookmark Engine",
        description:
          "Jede Webseite mit einem Klick speichern — Titel, Beschreibung, Favicon und OG-Daten werden automatisch extrahiert",
      },
      {
        name: "Web Highlighter",
        description:
          "Chrome Extension (Manifest V3) mit Popup, Sidebar und Highlighting — Text auf jeder Website markieren und speichern",
      },
      {
        name: "AI Brain",
        description:
          "GPT-4o generiert automatisch Summaries, Keywords und Kategorien für alle gespeicherten Inhalte",
      },
      {
        name: "Knowledge Graph",
        description:
          "Visuelle Topic-Verbindungen mit D3.js — sehen Sie, wie Ihre Wissensgebiete zusammenhängen",
      },
      {
        name: "Smart Notes",
        description:
          "Rich Text Editor mit Verlinkung zu Bookmarks und Highlights für kontextuelles Wissensmanagement",
      },
      {
        name: "Search Engine",
        description:
          "Meilisearch-powered Full-Text-Search über alle Bookmarks, Notes und Highlights in Millisekunden",
      },
    ],
    howItWorks: [
      "Chrome Extension installieren",
      "Webseiten mit einem Klick bookmarken oder Text highlighten",
      "AI generiert automatisch Summaries und Keywords",
      "Inhalte in Collections und Tags organisieren",
      "Knowledge Graph zeigt Zusammenhänge",
      "Team-Members einladen und Wissen teilen",
    ],
    useCases: [
      "Researcher und Wissenschaftler",
      "Content Creator mit vielen Quellen",
      "Teams, die Wissen zentral sammeln",
      "Studenten für Recherche-Projekte",
    ],
    highlights: [
      "Chrome Extension (MV3)",
      "GPT-4o AI Summaries",
      "D3.js Knowledge Graph",
      "Meilisearch Full-Text",
    ],
    techStack: [
      "Laravel 11",
      "Livewire 3",
      "PostgreSQL + pgvector",
      "Meilisearch",
      "Redis",
      "OpenAI GPT-4o",
    ],
    category: "productivity",
    icon: BookMarked,
    color: "#FF8C00",
    repo: "brainvault",
    status: "live",
  },
  {
    id: "sweetspot",
    name: "Sweet-Spot",
    tagline: "Sweet Spot Analyse",
    description:
      "Analyse-Tool zur Identifikation des optimalen Geschäftsbereichs — dem Sweet Spot zwischen Kompetenz, Markt und Leidenschaft.",
    longDescription:
      "Sweet-Spot ist ein modernes Analyse-Tool, das Unternehmen und Beratern hilft, den optimalen Geschäftsbereich zu identifizieren. Es analysiert die Schnittstelle von Kompetenz, Marktchance und Leidenschaft, um den 'Sweet Spot' zu finden — den Bereich, in dem ein Unternehmen am effektivsten und profitabelsten arbeiten kann. Mit interaktiven Visualisierungen und Team-basierten Auswertungen.",
    features: [
      "Interaktive Sweet-Spot-Analyse",
      "Visualisierung der Ergebnisse",
      "Vergleichsanalysen",
      "Export und Dokumentation",
      "Team-basierte Auswertung",
      "Kompetenz-Markt-Leidenschaft Matrix",
      "Handlungsempfehlungen",
    ],
    modules: [
      {
        name: "Analyse Wizard",
        description:
          "Geführter Prozess zur Bewertung von Kompetenz, Marktpotential und persönlicher Leidenschaft",
      },
      {
        name: "Visualisierung",
        description:
          "Interaktive Charts und Diagramme, die den Sweet Spot visuell darstellen",
      },
      {
        name: "Vergleich",
        description:
          "Verschiedene Geschäftsbereiche nebeneinander vergleichen und den besten identifizieren",
      },
      {
        name: "Team-Auswertung",
        description:
          "Team-Mitglieder bewerten gemeinsam — Ergebnisse werden aggregiert und gewichtet",
      },
    ],
    howItWorks: [
      "Geschäftsbereiche oder Ideen eingeben",
      "Bewertung nach Kompetenz, Markt und Leidenschaft",
      "Algorithmus berechnet den Sweet Spot",
      "Visualisierung zeigt Ergebnisse",
      "Handlungsempfehlungen ableiten",
    ],
    useCases: [
      "Unternehmer bei der Geschäftsfeld-Wahl",
      "Berater für Positionierungs-Workshops",
      "Teams bei der Produkt-Strategie",
      "Startups bei der Nischen-Findung",
    ],
    highlights: [
      "3-Dimensionen-Analyse",
      "Interaktive Visualisierung",
      "Team-Aggregation",
      "Livewire Volt",
    ],
    techStack: ["Laravel 12", "Livewire 4", "Alpine.js", "Tailwind CSS"],
    category: "productivity",
    icon: Target,
    color: "#0D9BA6",
    repo: "Sweet-Spot",
    status: "live",
  },
];

export interface Bundle {
  id: string;
  name: string;
  tagline: string;
  description: string;
  price: string;
  priceNote: string;
  color: string;
  highlighted: boolean;
  toolIds: string[];
  extras: string[];
}

export const bundles: Bundle[] = [
  {
    id: "starter",
    name: "Starter",
    tagline: "Perfekt zum Einstieg",
    description:
      "Die wichtigsten Tools für kleine Unternehmen und Solopreneure, die ihre Effizienz steigern wollen.",
    price: "499",
    priceNote: "pro Monat / bis 5 Nutzer",
    color: "#0D9BA6",
    highlighted: false,
    toolIds: [
      "focusmatrix",
      "sweetspot",
      "invoicemaker",
      "financial",
      "brainvault",
    ],
    extras: [
      "E-Mail Support",
      "Monatliche Updates",
      "Basis-Onboarding",
      "Community-Zugang",
    ],
  },
  {
    id: "professional",
    name: "Professional",
    tagline: "Meistverkauft",
    description:
      "Das komplette Paket für wachsende Unternehmen mit SEO, Leads und vollständigem Business-Management.",
    price: "999",
    priceNote: "pro Monat / bis 25 Nutzer",
    color: "#FF8C00",
    highlighted: true,
    toolIds: [
      "focusmatrix",
      "visionflow",
      "leados",
      "seostory",
      "clusterforge",
      "financial",
      "invoicemaker",
      "auditpro",
      "brainvault",
      "sweetspot",
    ],
    extras: [
      "Priority Support (24h)",
      "Wöchentliche Updates",
      "Persönliches Onboarding",
      "API-Zugang",
      "Custom Branding",
    ],
  },
  {
    id: "enterprise",
    name: "Enterprise",
    tagline: "Alles inklusive",
    description:
      "Alle 14 Tools mit Enterprise-Features, dediziertem Support und maßgeschneiderter Integration.",
    price: "2.499",
    priceNote: "pro Monat / unbegrenzte Nutzer",
    color: "#FF8C00",
    highlighted: false,
    toolIds: tools.map((t) => t.id),
    extras: [
      "Dedicated Account Manager",
      "SLA mit 4h Reaktionszeit",
      "Custom Development",
      "On-Premise Option",
      "White-Label verfügbar",
      "Schulungen vor Ort",
    ],
  },
];
