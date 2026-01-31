<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class('bg-background min-h-screen flex flex-col'); ?>>
<?php wp_body_open(); ?>

<?php if ( ! is_page_template( 'page-templates/canvas.php' ) ) : ?>
<header class="fixed top-0 left-0 right-0 z-50 bg-background/95 backdrop-blur-sm border-b border-border transition-all duration-300">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16 md:h-20">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-2 decoration-0 hover:no-underline">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#FF8C00] to-[#0D9BA6] flex items-center justify-center">
                            <span class="text-white font-bold text-xl" style="font-family: 'Rajdhani', sans-serif;">A</span>
                        </div>
                        <span class="text-xl md:text-2xl font-bold text-foreground" style="font-family: 'Rajdhani', sans-serif;">
                            <?php bloginfo('name'); ?>
                        </span>
                    </a>
                    <?php
                }
                ?>
            </div>

            <!-- Navigation -->
            <nav class="hidden md:flex items-center gap-8">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container'      => false,
                        'menu_class'     => 'flex items-center gap-8',
                        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'item_class'     => 'text-sm font-medium text-muted-foreground hover:text-[#FF8C00] transition-colors hover:no-underline',
                        'link_before'    => '<span style="font-family: \'Work Sans\', sans-serif;">',
                        'link_after'     => '</span>',
                        // Note: Custom walker might be needed for perfect class matching on <a> tags,
                        // but CSS targeting via .menu-item a works too.
                    ));
                } else {
                    // Fallback hardcoded menu if no menu assigned
                    ?>
                    <a href="#methode" class="text-sm font-medium text-muted-foreground hover:text-[#FF8C00] transition-colors hover:no-underline" style="font-family: 'Work Sans', sans-serif;">Methode</a>
                    <a href="#leistungen" class="text-sm font-medium text-muted-foreground hover:text-[#FF8C00] transition-colors hover:no-underline" style="font-family: 'Work Sans', sans-serif;">Leistungen</a>
                    <a href="#ueber-uns" class="text-sm font-medium text-muted-foreground hover:text-[#FF8C00] transition-colors hover:no-underline" style="font-family: 'Work Sans', sans-serif;">Über uns</a>
                    <a href="#kontakt" class="text-sm font-medium text-muted-foreground hover:text-[#FF8C00] transition-colors hover:no-underline" style="font-family: 'Work Sans', sans-serif;">Kontakt</a>
                    <?php
                }
                ?>
            </nav>

            <!-- CTA Button -->
            <div class="hidden md:block">
                <?php
                $cta_text = get_theme_mod('header_cta_text', 'Beratung anfragen');
                $cta_link = get_theme_mod('header_cta_link', '#kontakt');

                if ($cta_text) :
                ?>
                <a href="<?php echo esc_url($cta_link); ?>" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10 px-4 py-2 bg-[#FF8C00] hover:bg-[#FF8C00]/90 text-white font-semibold hover:no-underline" style="font-family: 'Rajdhani', sans-serif;">
                    <?php echo esc_html($cta_text); ?>
                </a>
                <?php endif; ?>
            </div>

            <!-- Mobile Menu Toggle (Simplified placeholder) -->
            <button class="md:hidden p-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" x2="21" y1="6" y2="6"/><line x1="3" x2="21" y1="12" y2="12"/><line x1="3" x2="21" y1="18" y2="18"/></svg>
            </button>
        </div>
    </div>
</header>
<?php endif; ?>

<main class="flex-grow <?php echo is_page_template('page-templates/canvas.php') ? '' : (is_page_template('page-templates/transparent-header.php') ? '' : 'pt-16 md:pt-20'); ?>">
