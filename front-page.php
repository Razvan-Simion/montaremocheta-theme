<?php
/**
 * Template pentru pagina principală (homepage)
 * WordPress folosește automat acest fișier dacă o pagină este setată ca "Front Page".
 */

get_header(); // încarcă header.php
?>

<!-- ======= HOMEPAGE CONTENT ======= -->
<section class="hero-section container">
    <h1 class="hero-title">Bine ai venit la Montare Mocheta</h1>
    <p class="hero-subtitle">Montaj profesional, mochete de calitate, servicii complete.</p>
</section>

<section class="services-section container">
    <h2>Serviciile Noastre</h2>
    <p>Aici vom afișa secțiunile exacte pentru montaj, mochete și accesorii.</p>
</section>

<section class="cta-section container">
    <h2>Contactează-ne pentru ofertă</h2>
    <p>Suntem gata să îți oferim consultanță gratuită.</p>
</section>
<!-- ===== END HOMEPAGE CONTENT ===== -->

<?php get_footer(); // încarcă footer.php ?>
