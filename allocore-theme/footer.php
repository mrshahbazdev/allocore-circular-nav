</main>

<?php if ( ! is_page_template( 'page-templates/canvas.php' ) ) :
    $footer_layout = get_theme_mod('allocore_footer_style', '4-col');

    // Grid Class Logic
    $grid_class = 'grid md:grid-cols-4 gap-12 mb-12';
    if ($footer_layout === '3-col') {
        $grid_class = 'grid md:grid-cols-3 gap-12 mb-12';
    } elseif ($footer_layout === '2-col') {
        $grid_class = 'grid md:grid-cols-2 gap-12 mb-12';
    } elseif ($footer_layout === 'centered') {
        $grid_class = 'flex flex-col items-center text-center gap-8 mb-12';
    }
?>
<footer class="bg-[#0E1B2A] text-white py-10" style="/* Dynamic colors via Customizer CSS */">
    <div class="container mx-auto px-4">

        <?php if ($footer_layout !== 'minimal') : ?>
            <?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) : ?>
            <div class="<?php echo esc_attr($grid_class); ?>">
                <!-- Widget Areas -->
                <?php
                // Render widget areas based on layout count
                // Note: If user selects 2-col but populates 4 widgets, they will stack or break grid depending on CSS.
                // We render as many as the layout suggests usually, or all if we rely on grid auto-flow.
                // Here we render available sidebars within the grid.
                ?>

                <div class="w-full">
                    <?php if ( is_active_sidebar( 'footer-1' ) ) : dynamic_sidebar( 'footer-1' ); else : ?>
                        <!-- Default Branding -->
                        <div class="<?php echo ($footer_layout === 'centered') ? 'flex flex-col items-center' : 'flex items-center'; ?> gap-3 mb-6">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-primary to-secondary flex items-center justify-center shadow-lg">
                                <span class="text-white font-bold text-2xl" style="font-family: var(--font-heading);">A</span>
                            </div>
                            <span class="text-2xl font-bold" style="font-family: var(--font-heading);">allocore</span>
                        </div>
                        <p class="text-sm opacity-70 leading-relaxed" style="font-family: var(--font-body);">
                            Profitabilität durch Effizienz<br />Effizienz durch Fokus
                        </p>
                    <?php endif; ?>
                </div>

                <?php if ($footer_layout !== 'centered' || is_active_sidebar('footer-2')) : ?>
                <div class="w-full">
                    <?php if ( is_active_sidebar( 'footer-2' ) ) : dynamic_sidebar( 'footer-2' ); else : ?>
                        <h4 class="font-bold text-lg mb-6" style="font-family: var(--font-heading);">Tools</h4>
                        <ul class="space-y-3" style="list-style: none; padding: 0; margin: 0;">
                            <li><a href="/tools" class="text-sm opacity-70 hover:opacity-100 transition-opacity hover:no-underline" style="font-family: var(--font-body);">Alle Tools</a></li>
                            <li><a href="/tools/focusmatrix" class="text-sm opacity-70 hover:opacity-100 transition-opacity hover:no-underline" style="font-family: var(--font-body);">FocusMatrix</a></li>
                            <li><a href="/tools/leados" class="text-sm opacity-70 hover:opacity-100 transition-opacity hover:no-underline" style="font-family: var(--font-body);">LeadOS</a></li>
                            <li><a href="/tools/visionflow" class="text-sm opacity-70 hover:opacity-100 transition-opacity hover:no-underline" style="font-family: var(--font-body);">VisionFlow</a></li>
                            <li><a href="/tools/seostory" class="text-sm opacity-70 hover:opacity-100 transition-opacity hover:no-underline" style="font-family: var(--font-body);">SEOStory</a></li>
                        </ul>
                    <?php endif; ?>
                </div>
                <?php endif; ?>

                <?php if (in_array($footer_layout, ['3-col', '4-col', 'centered'])) : ?>
                <div class="w-full">
                    <?php if ( is_active_sidebar( 'footer-3' ) ) : dynamic_sidebar( 'footer-3' ); else : ?>
                        <h4 class="font-bold text-lg mb-6" style="font-family: var(--font-heading);">Bundles</h4>
                        <ul class="space-y-3" style="list-style: none; padding: 0; margin: 0;">
                            <li><a href="/pricing" class="text-sm opacity-70 hover:opacity-100 transition-opacity hover:no-underline" style="font-family: var(--font-body);">Preise & Bundles</a></li>
                            <li><a href="/pricing#starter" class="text-sm opacity-70 hover:opacity-100 transition-opacity hover:no-underline" style="font-family: var(--font-body);">Starter — €499</a></li>
                            <li><a href="/pricing#professional" class="text-sm opacity-70 hover:opacity-100 transition-opacity hover:no-underline" style="font-family: var(--font-body);">Professional — €999</a></li>
                            <li><a href="/pricing#enterprise" class="text-sm opacity-70 hover:opacity-100 transition-opacity hover:no-underline" style="font-family: var(--font-body);">Enterprise — €2.499</a></li>
                        </ul>
                    <?php endif; ?>
                </div>
                <?php endif; ?>

                <?php if ($footer_layout === '4-col' || $footer_layout === 'centered') : ?>
                <div class="w-full">
                    <?php if ( is_active_sidebar( 'footer-4' ) ) : dynamic_sidebar( 'footer-4' ); else : ?>
                        <h4 class="font-bold text-lg mb-6" style="font-family: var(--font-heading);">Kontakt</h4>
                        <ul class="space-y-3" style="list-style: none; padding: 0; margin: 0;">
                            <li><a href="#kontakt" class="text-sm opacity-70 hover:opacity-100 transition-opacity hover:no-underline" style="font-family: var(--font-body);">Kontakt aufnehmen</a></li>
                            <li><a href="#ueber-uns" class="text-sm opacity-70 hover:opacity-100 transition-opacity hover:no-underline" style="font-family: var(--font-body);">Über uns</a></li>
                            <li><a href="#methode" class="text-sm opacity-70 hover:opacity-100 transition-opacity hover:no-underline" style="font-family: var(--font-body);">Methode</a></li>
                        </ul>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        <?php endif; ?>

        <div class="border-t border-white/10 pt-8 text-center text-sm opacity-50" style="font-family: var(--font-body);">
            <p><?php echo esc_html(get_theme_mod('footer_copyright_text', '© ' . date('Y') . ' allocore. Alle Rechte vorbehalten.')); ?></p>
        </div>
    </div>
</footer>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
