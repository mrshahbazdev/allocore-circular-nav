<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class('bg-background min-h-screen flex flex-col'); ?>>
<?php wp_body_open(); ?>

<?php if ( ! is_page_template( 'page-templates/canvas.php' ) ) :
    $header_layout = get_theme_mod('allocore_header_style', 'default');

    // Layout Classes
    $nav_container_class = 'flex items-center justify-between h-16 md:h-20';
    $nav_menu_class = 'hidden md:flex items-center gap-8';
    $logo_class = 'flex-shrink-0';

    if ($header_layout === 'centered') {
        $nav_container_class = 'flex flex-col items-center justify-center py-4 space-y-4';
        $nav_menu_class = 'hidden md:flex items-center gap-8 justify-center w-full';
    } elseif ($header_layout === 'split') {
        // Complex logic for split menu (Logo in center) usually requires two menu locations or JS splitting.
        // Simplified approach: Logo Center, Menu Left/Right via absolute positioning or grid.
        $nav_container_class = 'grid grid-cols-3 items-center h-16 md:h-20';
        $logo_class = 'justify-self-center';
        $nav_menu_class = 'hidden md:flex items-center gap-8 justify-self-start'; // Only one side for now
    } elseif ($header_layout === 'minimal') {
        $nav_menu_class = 'hidden'; // Always hidden, rely on mobile menu overlay
    }
?>
<header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 border-b border-border" style="/* Dynamic BG applied via Customizer CSS */">
    <div class="container mx-auto px-4">
        <div class="<?php echo esc_attr($nav_container_class); ?>">

            <!-- Logo -->
            <div class="<?php echo esc_attr($logo_class); ?>">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-2 decoration-0 hover:no-underline">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-primary to-secondary flex items-center justify-center">
                            <span class="text-white font-bold text-xl" style="font-family: var(--font-heading);">A</span>
                        </div>
                        <span class="text-xl md:text-2xl font-bold text-foreground" style="font-family: var(--font-heading);">
                            <?php bloginfo('name'); ?>
                        </span>
                    </a>
                    <?php
                }
                ?>
            </div>

            <!-- Navigation -->
            <?php if ($header_layout !== 'minimal') : ?>
            <nav class="<?php echo esc_attr($nav_menu_class); ?>">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container'      => false,
                        'menu_class'     => 'flex items-center gap-8',
                        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'item_class'     => 'text-sm font-medium text-muted-foreground hover:text-primary transition-colors hover:no-underline',
                    ));
                }
                ?>
            </nav>
            <?php endif; ?>

            <!-- CTA / Mobile Toggle -->
            <div class="flex items-center gap-4 <?php echo ($header_layout === 'split') ? 'justify-self-end' : ''; ?>">
                <?php
                $cta_text = get_theme_mod('header_cta_text', 'Beratung anfragen');
                $cta_link = get_theme_mod('header_cta_link', '#kontakt');

                if ($cta_text && $header_layout !== 'minimal') :
                ?>
                <a href="<?php echo esc_url($cta_link); ?>" class="hidden md:inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10 px-4 py-2 bg-primary hover:opacity-90 text-white font-semibold hover:no-underline" style="font-family: var(--font-heading);">
                    <?php echo esc_html($cta_text); ?>
                </a>
                <?php endif; ?>

                <!-- Mobile Menu Toggle -->
                <button class="md:hidden p-2 text-foreground" id="allocore-mobile-menu-toggle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" x2="21" y1="6" y2="6"/><line x1="3" x2="21" y1="12" y2="12"/><line x1="3" x2="21" y1="18" y2="18"/></svg>
                </button>
            </div>
        </div>
    </div>
</header>

<!-- Mobile Menu Overlay -->
<div id="allocore-mobile-menu" class="fixed inset-0 z-[60] bg-background/95 backdrop-blur-md transform translate-x-full transition-transform duration-300 md:hidden flex flex-col justify-center items-center">
    <button class="absolute top-6 right-6 p-2 text-foreground" id="allocore-mobile-menu-close">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" x2="6" y1="6" y2="18"/><line x1="6" x2="18" y1="6" y2="18"/></svg>
    </button>
    <nav class="text-center space-y-6">
        <?php
        if (has_nav_menu('primary')) {
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'flex flex-col items-center gap-6',
                'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'item_class'     => 'text-2xl font-bold text-foreground hover:text-primary transition-colors',
            ));
        }
        ?>
    </nav>
</div>

<script>
    document.getElementById('allocore-mobile-menu-toggle')?.addEventListener('click', function() {
        document.getElementById('allocore-mobile-menu').classList.remove('translate-x-full');
    });
    document.getElementById('allocore-mobile-menu-close')?.addEventListener('click', function() {
        document.getElementById('allocore-mobile-menu').classList.add('translate-x-full');
    });
</script>

<?php endif; ?>

<main class="flex-grow <?php echo is_page_template('page-templates/canvas.php') ? '' : (is_page_template('page-templates/transparent-header.php') ? '' : ($header_layout === 'centered' ? 'pt-32 md:pt-40' : 'pt-16 md:pt-20')); ?>">
