---
name: testing-allocore
description: Test the allocore platform end-to-end. Use when verifying UI changes to tools showcase, tool detail pages, pricing bundles, or home page sections.
---

# Testing allocore Platform

## Dev Server Setup

1. Install dependencies: `npm install --legacy-peer-deps` (required due to peer dependency conflicts)
2. Start dev server: `npm run dev` — runs Vite on port 3000 (`http://localhost:3000/`)
3. Port might change if 3000 is busy (`strictPort: false` in vite.config.ts)

## Key Routes

| Route | Description |
|---|---|
| `/` | Home page with hero, services, tool ecosystem teaser, FAQ, contact |
| `/tools` | Tools showcase — 14 tools across 4 categories with filter tabs |
| `/tools/:id` | Individual tool detail page (e.g. `/tools/focusmatrix`, `/tools/leados`) |
| `/pricing` | 3-tier bundle pricing with comparison table |

## Tool IDs for Detail Pages

`focusmatrix`, `visionflow`, `innovation-hub`, `ideenpipeline`, `leados`, `seostory`, `seo-site`, `clusterforge`, `financial`, `invoicemaker`, `compliancetermine`, `auditpro`, `brainvault`, `sweetspot`

## Categories (4)

- Business & Strategie (4 tools)
- Sales & Marketing (4 tools)
- Finanzen & Compliance (4 tools)
- Produktivität (2 tools)

## Key Test Assertions

### Header Navigation
- "Tools" and "Preise" links exist in header
- Links route to `/tools` and `/pricing` respectively
- Active link is highlighted (teal for Tools, orange for Preise)

### Tools Showcase (`/tools`)
- "Alle (14)" filter tab is active by default (highlighted orange)
- 5 filter tabs total: Alle, Business & Strategie, Sales & Marketing, Finanzen & Compliance, Produktivität
- Clicking a category filter shows only tools in that category
- Each tool card shows: icon, name, tagline, description, features (max 5 shown), tech stack, status badge, "Details" link
- Tool cards are clickable and navigate to `/tools/:id`

### Tool Detail Page (`/tools/:id`)
- Hero section: icon, name, status badge (Live/Beta), tagline, long description, highlight pills
- "← Alle Tools" breadcrumb link back to `/tools`
- Features section: 8+ feature items
- Modules section: 4-6 numbered module cards
- "So funktioniert's" section: numbered workflow steps with visual connectors
- "Perfekt für" section: 4 use cases with check icons
- Tech Stack section: pills for each technology
- "Weitere Tools" section: 3 related tools from same category
- CTA section: "Bundles ansehen" and "Alle Tools ansehen" buttons
- Invalid tool ID (e.g. `/tools/nonexistent`) shows "Tool nicht gefunden" with back link

### Pricing Page (`/pricing`)
- 3 pricing cards: Starter (€499), Professional (€999), Enterprise (€2.499)
- Professional card has "Meistverkauft" badge and orange border highlight
- Tool counts: Starter 5, Professional 10, Enterprise 14
- "Bundle-Vergleich" comparison table with 14 rows (one per tool) and checkmarks
- FAQ section with expandable questions

### Home Page Tool Teaser
- "14 Premium SaaS Tools" badge
- "Das allocore Tool-Ökosystem" heading
- 4 category cards with tool counts and tool name previews
- 3 featured tool preview cards with features
- "Alle 14 Tools entdecken" CTA → navigates to `/tools`
- "Bundles & Preise" CTA → navigates to `/pricing`

## Testing Tips

- The Tool-Ökosystem teaser is located roughly 2/3 down the home page — use Ctrl+F to search for "Tool-Ökosystem" to find it quickly
- Tool data is centralized in `client/src/lib/tools-data.ts` — check here if tool content seems wrong
- All tool detail pages use the same `ToolDetail.tsx` component, so testing 2-3 tools from different categories provides good coverage
- The app uses wouter for routing (not react-router)
- Design system: Rajdhani font for headings, Work Sans for body, orange (#FF8C00) + teal (#0D9BA6) color scheme

## Devin Secrets Needed

No secrets required — this is a static frontend app with no backend API or authentication.
