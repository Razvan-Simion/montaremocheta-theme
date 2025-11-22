<?php
/**
 * Footer-ul temei Montare Mocheta
 *
 * Structură:
 * - închide <main> (deschis în header.php)
 * - afișează footer-ul format din 3 coloane (widget-uri)
 * - afișează bara de copyright
 * - încarcă wp_footer()
 */
?>

    </main> <!-- Închidem conținutul principal -->

    <!-- ================================
         START FOOTER
         ================================ -->
    <footer class="mm-footer">

        <div class="mm-footer-inner">

            <!-- ======================================
                 COLOANA 1 – Widget (editabil în WP)
                 ====================================== -->
            <div class="mm-footer-col">
                <?php if ( is_active_sidebar( 'footer_col_1' ) ) : ?>
                    <?php dynamic_sidebar( 'footer_col_1' ); ?>
                <?php else : ?>
                    <!-- Fallback dacă nu e widget -->
                    <h4>Montare Mocheta</h4>
                    <p>Servicii profesionale de montaj, vânzare mochetă și accesorii.</p>
                <?php endif; ?>
            </div>

            <!-- ======================================
                 COLOANA 2 – Widget
                 ====================================== -->
            <div class="mm-footer-col">
                <?php if ( is_active_sidebar( 'footer_col_2' ) ) : ?>
                    <?php dynamic_sidebar( 'footer_col_2' ); ?>
                <?php else : ?>
                    <h4>Servicii</h4>
                    <ul>
                        <li>Montaj mochetă</li>
                        <li>Vânzare mochetă</li>
                        <li>Adezivi & accesorii</li>
                    </ul>
                <?php endif; ?>
            </div>

            <!-- ======================================
                 COLOANA 3 – Widget
                 ====================================== -->
            <div class="mm-footer-col" id="mm-footer-search">
                <?php if ( is_active_sidebar( 'footer_col_3' ) ) : ?>
                    <?php dynamic_sidebar( 'footer_col_3' ); ?>
                <?php else : ?>
                    <h4>Contact</h4>
                    <p>Telefon: <strong>0721 437 550</strong></p>
                    <p>București & Ilfov</p>
                <?php endif; ?>
            </div>

        </div><!-- .mm-footer-inner -->

        <!-- ================================
             BARA DE COPYRIGHT
             ================================ -->
        <div class="mm-footer-bottom">
            © <?php echo date('Y'); ?> Montare Mocheta / ELOGY DESIGN. Toate drepturile rezervate.
        </div>

    </footer>
    <!-- ================================ -->
    <!-- END FOOTER -->
    <!-- ================================ -->

    <!-- IMPORTANT: Încarcă scripturile WordPress -->
    <?php wp_footer(); ?>

</body>
</html>
