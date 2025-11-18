<?php
/**
 * Footer-ul temei
 * Închide <main>, afișează footer-ul și încarcă scripturile WordPress
 */
?>

    </main> <!-- Închidem containerul principal început în header.php -->

    <!-- ======= FOOTER SITE ======= -->
    <footer class="site-footer">
        <div class="container">

            <!-- Drepturi de autor -->
            <p>&copy; <?php echo date('Y'); ?> Montare Mocheta / ELOGY DESIGN. Toate drepturile rezervate.</p>

            <!-- Meniul de footer (definit în functions.php ca 'footer') -->
            <nav class="footer-nav">
                <?php
                    wp_nav_menu([
                        'theme_location' => 'footer',
                        'container'      => false
                    ]);
                ?>
            </nav>

        </div>
    </footer>
    <!-- ===== END FOOTER ===== -->

    <!-- wp_footer() încarcă scripturile și funcțiile WordPress înainte de închiderea body -->
    <?php wp_footer(); ?>

</body>
</html>
