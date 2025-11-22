<?php
/**
 * Template pentru pagina de start (Homepage)
 * - HERO controlat din Customizer
 * - Secțiuni servicii / highlight
 * - Secțiune SEO care folosește the_content()
 */

get_header();

// Obținem valorile din Customizer (cu fallback-uri sensibile)
$hero_title            = get_theme_mod( 'mm_hero_title', 'Mocheta și montaj profesional pentru spațiile tale' );
$hero_subtitle         = get_theme_mod( 'mm_hero_subtitle', 'Mocheta premium, montată corect, pentru birouri, hoteluri și locuințe. Perdele și draperii integrate prin ELOGY DESIGN.' );
$hero_primary_label    = get_theme_mod( 'mm_hero_primary_label', 'Vezi modelele de mocheta' );
$hero_primary_url      = get_theme_mod( 'mm_hero_primary_url', '/modele-mocheta/' );
$hero_secondary_label  = get_theme_mod( 'mm_hero_secondary_label', 'Cere o ofertă' );
$hero_secondary_url    = get_theme_mod( 'mm_hero_secondary_url', '/contact/' );
$hero_bg_image         = get_theme_mod( 'mm_hero_bg_image' );

// Bullet-uri HERO (coloana dreaptă)
$hero_bullet_1 = get_theme_mod( 'mm_hero_bullet_1', 'Montaj mocheta la cheie, inclusiv pregătirea suportului' );
$hero_bullet_2 = get_theme_mod( 'mm_hero_bullet_2', 'Soluții pentru hoteluri, birouri, spații comerciale și locuințe' );
$hero_bullet_3 = get_theme_mod( 'mm_hero_bullet_3', 'Gamă completă de mochete, plinte, profile și accesorii' );
$hero_bullet_4 = get_theme_mod( 'mm_hero_bullet_4', 'Lucrăm în București, Ilfov și în țară pentru proiecte medii și mari' );

// Afișare/ascundere coloană dreaptă HERO
$hero_show_side_column = get_theme_mod( 'mm_hero_show_side_column', true );

// Servicii principale – carduri (secțiunea de servicii de pe homepage)
$services_section_title = get_theme_mod( 'mm_services_section_title', 'Servicii montaj mocheta & soluții complete' );

$service_1_title = get_theme_mod( 'mm_service_1_title', 'Montaj mocheta profesional' );
$service_1_text  = get_theme_mod( 'mm_service_1_text', 'Montăm mochetă buclată, cu fir tăiat, modulată (carpet tiles) sau în rolă, pentru hoteluri, birouri, showroom-uri și locuințe. Respectăm pașii tehnici de pregătire a suportului pentru o durată de viață cât mai mare.' );

$service_2_title = get_theme_mod( 'mm_service_2_title', 'Furnizare mocheta și accesorii' );
$service_2_text  = get_theme_mod( 'mm_service_2_text', 'Oferim mochete de trafic intens și rezidențiale, plinte, profile, adezivi și toate accesoriile necesare unei montări corecte. Te ajutăm să alegi combinația potrivită pentru spațiul tău.' );

$service_3_title = get_theme_mod( 'mm_service_3_title', 'Măsurători & consultanță la fața locului' );
$service_3_text  = get_theme_mod( 'mm_service_3_text', 'Venim la locație, facem măsurători, analizăm traficul și propunem soluții tehnice și estetice. Astfel eviți pierderile de material și alegi mocheta optimă pentru proiectul tău.' );

// Card „De ce să lucrezi cu ELOGY DESIGN…”
$highlight_title      = get_theme_mod( 'mm_highlight_title', 'De ce să lucrezi cu ELOGY DESIGN pentru montajul mochetei' );
$highlight_intro      = get_theme_mod( 'mm_highlight_intro', 'Ne ocupăm de proiectele de mochetă de la A la Z: de la consultanță, selecția materialelor, până la montajul final și finisaje. Lucrăm atât cu companii, cât și cu persoane fizice.' );
$highlight_bullet_1   = get_theme_mod( 'mm_highlight_bullet_1', 'Experiență în proiecte de hoteluri, spații comerciale, birouri, clinici, showroom-uri și spații rezidențiale' );
$highlight_bullet_2   = get_theme_mod( 'mm_highlight_bullet_2', 'Montatori specializați, echipamente profesionale și respectarea recomandărilor producătorilor' );
$highlight_bullet_3   = get_theme_mod( 'mm_highlight_bullet_3', 'Colaborare ușoară: un singur punct de contact pentru mochetă, accesorii și montaj' );
$highlight_bullet_4   = get_theme_mod( 'mm_highlight_bullet_4', 'Ne deplasăm în București, Ilfov și în țară pentru proiecte medii și mari' );

// Fallback – dacă nu există imagine setată în Customizer,
// folosim una din temă: /assets/img/hero-fallback.jpg
if ( ! $hero_bg_image ) {
    $hero_bg_image = get_template_directory_uri() . '/assets/img/hero-fallback.jpg';
}
?>

<!-- ================================
     HERO SECTION
================================ -->
<section class="mm-hero" style="background-image: url('<?php echo esc_url( $hero_bg_image ); ?>');">
    <div class="mm-hero-overlay"></div>

    <div class="mm-hero-inner">
        <div class="mm-hero-text">
            <h1><?php echo esc_html( $hero_title ); ?></h1>

            <?php if ( ! empty( $hero_subtitle ) ) : ?>
                <p><?php echo wp_kses_post( nl2br( $hero_subtitle ) ); ?></p>
            <?php endif; ?>

            <div class="mm-hero-actions">
                <?php if ( ! empty( $hero_primary_label ) ) : ?>
                    <a href="<?php echo esc_url( $hero_primary_url ); ?>" class="mm-btn mm-btn-primary">
                        <?php echo esc_html( $hero_primary_label ); ?>
                    </a>
                <?php endif; ?>

                <?php if ( ! empty( $hero_secondary_label ) ) : ?>
                    <a href="<?php echo esc_url( $hero_secondary_url ); ?>" class="mm-btn mm-btn-secondary">
                        <?php echo esc_html( $hero_secondary_label ); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <?php if ( $hero_show_side_column ) : ?>
        <!-- Coloană dreapta cu bullet-uri rapide (opțional) -->
        <div class="mm-hero-side">
            <ul>
                <?php if ( ! empty( $hero_bullet_1 ) ) : ?>
                    <li><?php echo esc_html( $hero_bullet_1 ); ?></li>
                <?php endif; ?>

                <?php if ( ! empty( $hero_bullet_2 ) ) : ?>
                    <li><?php echo esc_html( $hero_bullet_2 ); ?></li>
                <?php endif; ?>

                <?php if ( ! empty( $hero_bullet_3 ) ) : ?>
                    <li><?php echo esc_html( $hero_bullet_3 ); ?></li>
                <?php endif; ?>

                <?php if ( ! empty( $hero_bullet_4 ) ) : ?>
                    <li><?php echo esc_html( $hero_bullet_4 ); ?></li>
                <?php endif; ?>
            </ul>
        </div>
        <?php endif; ?>
    </div>
</section>

<?php
/**
 * De aici în jos folosim loop-ul WordPress pentru a lega secțiunea SEO
 * de conținutul paginii setate ca Homepage în admin.
 */

if ( have_posts() ) :
    while ( have_posts() ) :
        the_post();
        ?>

        <!-- ====================================
             SECȚIUNE: SERVICII PRINCIPALE
        ===================================== -->
        <section class="mm-section mm-section-services">
            <div class="mm-container">
                <h2><?php echo esc_html( $services_section_title ); ?></h2>

                <div class="mm-services-grid">
                    <!-- Card 1 -->
                    <article class="mm-service-card">
                        <h3><?php echo esc_html( $service_1_title ); ?></h3>
                        <p><?php echo wp_kses_post( nl2br( $service_1_text ) ); ?></p>
                    </article>

                    <!-- Card 2 -->
                    <article class="mm-service-card">
                        <h3><?php echo esc_html( $service_2_title ); ?></h3>
                        <p><?php echo wp_kses_post( nl2br( $service_2_text ) ); ?></p>
                    </article>

                    <!-- Card 3 -->
                    <article class="mm-service-card">
                        <h3><?php echo esc_html( $service_3_title ); ?></h3>
                        <p><?php echo wp_kses_post( nl2br( $service_3_text ) ); ?></p>
                    </article>
                </div>
            </div>
        </section>

        <!-- ====================================
             SECȚIUNE: DE CE ELOGY DESIGN
        ===================================== -->
        <section class="mm-section mm-section-highlight">
            <div class="mm-container">
                <div class="mm-highlight-inner">
                    <?php if ( ! empty( $highlight_title ) ) : ?>
                        <h2><?php echo esc_html( $highlight_title ); ?></h2>
                    <?php endif; ?>

                    <?php if ( ! empty( $highlight_intro ) ) : ?>
                        <p><?php echo wp_kses_post( nl2br( $highlight_intro ) ); ?></p>
                    <?php endif; ?>

                    <ul>
                        <?php if ( ! empty( $highlight_bullet_1 ) ) : ?>
                            <li><?php echo esc_html( $highlight_bullet_1 ); ?></li>
                        <?php endif; ?>

                        <?php if ( ! empty( $highlight_bullet_2 ) ) : ?>
                            <li><?php echo esc_html( $highlight_bullet_2 ); ?></li>
                        <?php endif; ?>

                        <?php if ( ! empty( $highlight_bullet_3 ) ) : ?>
                            <li><?php echo esc_html( $highlight_bullet_3 ); ?></li>
                        <?php endif; ?>

                        <?php if ( ! empty( $highlight_bullet_4 ) ) : ?>
                            <li><?php echo esc_html( $highlight_bullet_4 ); ?></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </section>

        <!-- ====================================
             SECȚIUNE SEO – TEXT VITAL PENTRU INDEXARE
             AICI VINE CONȚINUTUL DIN EDITORUL PAGINII "ACASĂ"
        ===================================== -->
        <section class="mm-section mm-section-content">
            <div class="mm-container">
                <div class="mm-content">
                    <?php the_content(); ?>
                </div>
            </div>
        </section>

        <!-- (opțional) alte secțiuni mai jos: testimoniale, logo-uri clienți etc. -->

        <?php
    endwhile;
endif;

get_footer();
