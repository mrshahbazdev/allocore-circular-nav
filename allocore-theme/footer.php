</main>

<?php if ( ! is_page_template( 'page-templates/canvas.php' ) ) : ?>
<footer class="bg-[#0E1B2A] text-white py-10">
    <div class="container mx-auto px-4">

        <?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) : ?>
        <div class="grid md:grid-cols-4 gap-12 mb-12">
            <div>
                <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-1' ); ?>
                <?php else : ?>
                    <!-- Default Content if no widget -->
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#FF8C00] to-[#0D9BA6] flex items-center justify-center shadow-lg">
                            <span class="text-white font-bold text-2xl" style="font-family: 'Rajdhani', sans-serif;">A</span>
                        </div>
                        <span class="text-2xl font-bold" style="font-family: 'Rajdhani', sans-serif;">allocore</span>
                    </div>
                    <p class="text-sm opacity-70 leading-relaxed" style="font-family: 'Work Sans', sans-serif;">
                        Profitabilität durch Effizienz<br />Effizienz durch Fokus
                    </p>
                <?php endif; ?>
            </div>

            <div>
                <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-2' ); ?>
                <?php else : ?>
                    <h4 class="font-bold text-lg mb-6" style="font-family: 'Rajdhani', sans-serif;">Navigation</h4>
                    <ul class="space-y-3 text-sm" style="font-family: 'Work Sans', sans-serif;">
                        <li><a href="#methode" class="opacity-70 hover:opacity-100 hover:text-[#FF8C00] transition-all hover:no-underline text-white">Methode</a></li>
                        <li><a href="#leistungen" class="opacity-70 hover:opacity-100 hover:text-[#FF8C00] transition-all hover:no-underline text-white">Leistungen</a></li>
                    </ul>
                <?php endif; ?>
            </div>

            <div>
                <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-3' ); ?>
                <?php else : ?>
                    <h4 class="font-bold text-lg mb-6" style="font-family: 'Rajdhani', sans-serif;">Kontakt</h4>
                    <ul class="space-y-3 text-sm opacity-70" style="font-family: 'Work Sans', sans-serif;">
                        <li>info@allocore.de</li>
                        <li>+49 123 456789</li>
                    </ul>
                <?php endif; ?>
            </div>

            <div>
                <?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-4' ); ?>
                <?php else : ?>
                    <h4 class="font-bold text-lg mb-6" style="font-family: 'Rajdhani', sans-serif;">Rechtliches</h4>
                    <ul class="space-y-3 text-sm" style="font-family: 'Work Sans', sans-serif;">
                        <li><a href="#" class="opacity-70 hover:opacity-100 hover:text-[#FF8C00] transition-all hover:no-underline text-white">Impressum</a></li>
                        <li><a href="#" class="opacity-70 hover:opacity-100 hover:text-[#FF8C00] transition-all hover:no-underline text-white">Datenschutz</a></li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>

        <div class="border-t border-white/10 pt-8 text-center text-sm opacity-50" style="font-family: 'Work Sans', sans-serif;">
            <p><?php echo esc_html(get_theme_mod('footer_copyright_text', '© ' . date('Y') . ' allocore. Alle Rechte vorbehalten.')); ?></p>
        </div>
    </div>
</footer>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
