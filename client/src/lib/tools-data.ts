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

export interface Tool {
  id: string;
  name: string;
  tagline: string;
  description: string;
  features: string[];
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
    description: "Finanzsteuerung, Rechnungsstellung und Compliance-Management",
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
  // Business & Strategy
  {
    id: "focusmatrix",
    name: "FocusMatrix",
    tagline: "Entscheiden statt abarbeiten",
    description:
      "SaaS für Manager, das das Only-You-Prinzip in ein tägliches Betriebssystem verwandelt. Jede Aufgabe wird durch eine Frage gefiltert: Kann nur ich das wirklich tun?",
    features: [
      "Triage Inbox mit Entscheidungs-Wizard",
      "Decision Matrix mit Auto-Kategorisierung",
      "Delegations-Cockpit mit Anti-Mikromanagement",
      "Wöchentlicher Self-Check mit Focus Score",
      "AI Co-Pilot für heuristische Vorschläge",
    ],
    techStack: ["Laravel 11", "Vue 3", "Inertia.js", "Tailwind CSS"],
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
    features: [
      "Values Workshop mit anonymer Abstimmung",
      "Principles Builder mit Konsens-Tracking",
      "Strategic Goals Canvas mit Traceability",
      "Vision Co-Creation mit Resonanz-Voting",
      "Mission Generator mit Ownership Assignment",
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
    features: [
      "Global Team Browser mit Join/Leave",
      "Ideen-Pipeline mit Team-Zuordnung",
      "Rollenbasierte Bearbeitungsrechte",
      "Filament Admin Panel für Super Admins",
      "Jetstream Team-Rollen und Permissions",
    ],
    techStack: ["Laravel 11", "Livewire 3", "Filament", "Tailwind CSS"],
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
    features: [
      "Ideen-Erfassung und -Bewertung",
      "Projekt-Pipeline mit Aufgaben",
      "Team-Kollaboration",
      "Domain-Management",
      "Status-Tracking und Fortschritt",
    ],
    techStack: ["Laravel 11", "Livewire 3", "Tailwind CSS"],
    category: "business-strategy",
    icon: Rocket,
    color: "#0D9BA6",
    repo: "ideenpipeline",
    status: "beta",
  },

  // Sales & Marketing
  {
    id: "leados",
    name: "LeadOS",
    tagline: "B2B Lead Generation & AI CRM",
    description:
      "Leistungsstarke B2B-Lead-Generierung mit AI-gestütztem Scoring, automatisierten E-Mail-Sequenzen und visuellem Pipeline-Management.",
    features: [
      "AI Lead-Analyse und ICP-Scoring",
      "Automatisierte Multi-Step Drip-Kampagnen",
      "Intelligenter Inbox-Scanner",
      "Visual Kanban Deal-Pipeline",
      "Chrome Extension für LinkedIn-Scraping",
    ],
    techStack: ["Laravel 11", "Blade", "Tailwind CSS", "OpenAI/Groq"],
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
    features: [
      "Keyword Research und Tracking",
      "Projekt-basiertes SEO-Management",
      "Structure, Content & Tech Reports",
      "Seobility-Integration",
      "Team-Kollaboration mit Rollen",
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
    features: [
      "6 DataForSEO Services integriert",
      "OnPage Audit mit 4 Audit-Typen",
      "Content Brief Generator",
      "Site Management Dashboard",
      "Multi-User Authentication",
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
    features: [
      "5 Subtopics pro Keyword automatisch",
      "10 User-Intent-Fragen pro Subtopic",
      "AI-geschriebene Antworten (Gemini)",
      "Pillar Page + 5 Cluster Pages",
      "Live-Status-Tracking im Background",
    ],
    techStack: ["Laravel 11", "React", "Inertia.js", "Google Gemini"],
    category: "sales-marketing",
    icon: BarChart3,
    color: "#0D9BA6",
    repo: "keyword-cluster-tool",
    status: "live",
  },

  // Finance & Compliance
  {
    id: "financial",
    name: "Financial",
    tagline: "Finanzanalyse und Controlling",
    description:
      "Professionelles Finanz-Controlling-Tool für detaillierte Analysen, Tap-Management und fundierte Entscheidungsgrundlagen.",
    features: [
      "Detaillierte Finanzanalysen",
      "Multi-Row Analysis Builder",
      "Tap Management System",
      "Übersichtliche Dashboards",
      "Export und Reporting",
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
    features: [
      "Multi-Step Invoice Wizard",
      "Professionelle PDF-Generierung",
      "Automatische Nummernvergabe",
      "Status-Workflow (Draft → Paid)",
      "Kunden- und Produktverwaltung",
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
    features: [
      "Automatische Fristen-Erinnerungen",
      "Domain- und Paket-Management",
      "Team-Kollaboration",
      "Settings und Konfiguration",
      "Übersichtliches Dashboard",
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
    features: [
      "Dynamic Template Builder",
      "Maturity Radar Visualizations",
      "10 Sprachen unterstützt",
      "PDF Report Generation",
      "Multi-tenant Architecture",
    ],
    techStack: ["Laravel 11", "Livewire 3", "Chart.js", "DomPDF"],
    category: "finance-compliance",
    icon: ClipboardCheck,
    color: "#0D9BA6",
    repo: "audit",
    status: "live",
  },

  // Productivity
  {
    id: "brainvault",
    name: "BrainVault",
    tagline: "Dein zweites Gehirn im Web",
    description:
      "Fortschrittliche Bookmark- und Notiz-Plattform mit AI-gestützter Organisation, Web-Highlighting und Knowledge Graph.",
    features: [
      "One-Click Bookmarks mit Auto-Metadaten",
      "Web-Highlighting mit Chrome Extension",
      "AI Summaries mit GPT-4",
      "Knowledge Graph mit D3.js",
      "Team-Kollaboration und Sharing",
    ],
    techStack: [
      "Laravel 11",
      "Livewire 3",
      "PostgreSQL",
      "Meilisearch",
      "OpenAI",
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
    features: [
      "Interaktive Sweet-Spot-Analyse",
      "Visualisierung der Ergebnisse",
      "Vergleichsanalysen",
      "Export und Dokumentation",
      "Team-basierte Auswertung",
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
    toolIds: tools.map(t => t.id),
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
