<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class('bg-background min-h-screen flex flex-col'); ?>>
<?php wp_body_open(); ?>

<header class="fixed top-0 left-0 right-0 z-50 bg-background/95 backdrop-blur-sm border-b border-border">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16 md:h-20">
            <!-- Logo -->
            <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-2 decoration-0 hover:no-underline">
                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#FF8C00] to-[#0D9BA6] flex items-center justify-center">
                    <span class="text-white font-bold text-xl" style="font-family: 'Rajdhani', sans-serif;">A</span>
                </div>
                <span class="text-xl md:text-2xl font-bold text-foreground" style="font-family: 'Rajdhani', sans-serif;">
                    allocore
                </span>
            </a>

            <!-- Navigation -->
            <nav class="hidden md:flex items-center gap-8">
                <a href="#methode" class="text-sm font-medium text-muted-foreground hover:text-[#FF8C00] transition-colors hover:no-underline" style="font-family: 'Work Sans', sans-serif;">
                    Methode
                </a>
                <a href="#leistungen" class="text-sm font-medium text-muted-foreground hover:text-[#FF8C00] transition-colors hover:no-underline" style="font-family: 'Work Sans', sans-serif;">
                    Leistungen
                </a>
                <a href="#ueber-uns" class="text-sm font-medium text-muted-foreground hover:text-[#FF8C00] transition-colors hover:no-underline" style="font-family: 'Work Sans', sans-serif;">
                    Über uns
                </a>
                <a href="#kontakt" class="text-sm font-medium text-muted-foreground hover:text-[#FF8C00] transition-colors hover:no-underline" style="font-family: 'Work Sans', sans-serif;">
                    Kontakt
                </a>
            </nav>

            <!-- CTA Button -->
            <a href="#kontakt" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10 px-4 py-2 bg-[#FF8C00] hover:bg-[#FF8C00]/90 text-white font-semibold hover:no-underline" style="font-family: 'Rajdhani', sans-serif;">
                Beratung anfragen
            </a>
        </div>
    </div>
</header>

<main class="flex-grow pt-16 md:pt-20">
