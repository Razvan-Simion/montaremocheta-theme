<?php
/**
 * Funcțiile principale ale temei Montare Mocheta
 *
 * Aici configurăm:
 * - suportul de theme (title-tag, thumbnails, HTML5, custom-logo)
 * - meniurile
 * - stilurile și scripturile (enqueue)
 * - zonele de widget-uri (footer 3 coloane)
 * - cleanup pentru head (SEO & performanță)
 * - breadcrumb simplu
 * - schema.org LocalBusiness
 * - Customizer pentru HERO, servicii și cardul „De ce ELOGY DESIGN”
 */

// Securitate basic – nu permite acces direct la fișier.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Dacă există design system în inc/customizer-design.php, îl încărcăm.
$mm_design_file = get_template_directory() . '/inc/customizer-design.php';
if ( file_exists( $mm_design_file ) ) {
    require_once $mm_design_file;
}

/* ============================================================
 *  1. THEME SUPPORTS & MENIURI
 * ============================================================ */

function montaremocheta_theme_setup() {

    // Lasă WordPress să gestioneze <title>.
    add_theme_support( 'title-tag' );

    // Thumbnail-uri pentru postări și pagini.
    add_theme_support( 'post-thumbnails' );

    // Suport HTML5 pentru diverse elemente.
    add_theme_support(
        'html5',
        [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ]
    );

    // Logo custom – de folosit pentru sigla MontareMocheta.
    add_theme_support(
        'custom-logo',
        [
            'height'      => 80,
            'width'       => 240,
            'flex-width'  => true,
            'flex-height' => true,
        ]
    );

    // Meniuri.
    register_nav_menus(
        [
            'primary' => __( 'Meniu principal', 'montaremocheta' ),
        ]
    );
}
add_action( 'after_setup_theme', 'montaremocheta_theme_setup' );

/* ============================================================
 *  2. ENQUEUE STILURI & SCRIPTURI
 * ============================================================ */

function montaremocheta_enqueue_assets() {

    // Google Fonts – Montserrat + Inter.
    wp_enqueue_style(
        'montaremocheta-google-fonts',
        'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Inter:wght@300;400;500&display=swap',
        [],
        null
    );

    // Stilul principal al temei – assets/css/main.css.
    wp_enqueue_style(
        'montaremocheta-main',
        get_template_directory_uri() . '/assets/css/main.css',
        [],
        '1.0.0'
    );

    // JS simplu (meniul mobil etc.) – assets/js/main.js.
    wp_enqueue_script(
        'montaremocheta-main-js',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        '1.0.0',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'montaremocheta_enqueue_assets' );

/* ============================================================
 *  3. WIDGET-URI (FOOTER 3 COLOANE)
 * ============================================================ */

function montaremocheta_register_sidebars() {

    register_sidebar(
        [
            'name'          => __( 'Footer – Coloana 1', 'montaremocheta' ),
            'id'            => 'footer_col_1',
            'description'   => __( 'Prima coloană din footer. Poți adăuga text, imagini, shortcode etc.', 'montaremocheta' ),
            'before_widget' => '<div class="mm-footer-widget">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>',
        ]
    );

    register_sidebar(
        [
            'name'          => __( 'Footer – Coloana 2', 'montaremocheta' ),
            'id'            => 'footer_col_2',
            'description'   => __( 'A doua coloană din footer.', 'montaremocheta' ),
            'before_widget' => '<div class="mm-footer-widget">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>',
        ]
    );

    register_sidebar(
        [
            'name'          => __( 'Footer – Coloana 3', 'montaremocheta' ),
            'id'            => 'footer_col_3',
            'description'   => __( 'A treia coloană din footer.', 'montaremocheta' ),
            'before_widget' => '<div class="mm-footer-widget">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>',
        ]
    );
}
add_action( 'widgets_init', 'montaremocheta_register_sidebars' );

/* ============================================================
 *  4. CLEANUP <HEAD> PENTRU SEO & PERFORMANȚĂ
 * ============================================================ */

// Elimină diverse tag-uri inutile din <head>.
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rest_output_link_wp_head' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

// Elimină feed-urile (dacă vrei să le păstrezi, comentează liniile).
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'feed_links_extra', 3 );

/* ============================================================
 *  5. BREADCRUMB SIMPLU
 * ============================================================ */

function montaremocheta_breadcrumb() {
    if ( is_front_page() ) {
        return;
    }

    echo '<nav class="mm-breadcrumb" aria-label="breadcrumb">';
    echo '<a href="' . esc_url( home_url( '/' ) ) . '">Acasă</a>';

    if ( is_singular( 'post' ) ) {
        $cat = get_the_category();
        if ( ! empty( $cat ) ) {
            echo ' / <a href="' . esc_url( get_category_link( $cat[0]->term_id ) ) . '">' . esc_html( $cat[0]->name ) . '</a>';
        }
        echo ' / ' . get_the_title();
    } elseif ( is_page() ) {
        echo ' / ' . get_the_title();
    } elseif ( is_category() ) {
        echo ' / ' . single_cat_title( '', false );
    } elseif ( is_search() ) {
        echo ' / ' . sprintf( __( 'Rezultatele căutării pentru: %s', 'montaremocheta' ), get_search_query() );
    } elseif ( is_404() ) {
        echo ' / ' . __( 'Pagina nu a fost găsită', 'montaremocheta' );
    }

    echo '</nav>';
}

/* ============================================================
 *  6. SCHEMA.ORG - LocalBusiness (SEO local)
 * ============================================================ *
 * Inserăm JSON-LD doar pe homepage.
 */

function montaremocheta_localbusiness_schema() {
    if ( ! is_front_page() ) {
        return;
    }

    $schema = [
        '@context' => 'https://schema.org',
        '@type'    => 'LocalBusiness',
        'name'     => 'Montare Mocheta',
        'image'    => get_template_directory_uri() . '/assets/img/logo.png',
        'url'      => home_url( '/' ),
        'telephone'=> '+40 721 437 550',
        'address'  => [
            '@type'           => 'PostalAddress',
            'streetAddress'   => 'Prelungirea Ghencea 65B Bloc C1',
            'addressLocality' => 'București',
            'addressRegion'   => 'Sector 6',
            'postalCode'      => '061702',
            'addressCountry'  => 'RO',
        ],
        'geo'      => [
            '@type'     => 'GeoCoordinates',
            'latitude'  => 44.421082,
            'longitude' => 26.018558,
        ],
        'openingHoursSpecification' => [
            '@type'   => 'OpeningHoursSpecification',
            'dayOfWeek' => [
                'Monday',
                'Tuesday',
                'Wednesday',
                'Thursday',
                'Friday',
            ],
            'opens'  => '09:00',
            'closes' => '18:00',
        ],
    ];

    echo '<script type="application/ld+json">' . wp_json_encode( $schema ) . '</script>';
}
add_action( 'wp_head', 'montaremocheta_localbusiness_schema', 20 );

/* ============================================================
 *  7. CUSTOMIZER – Setări pentru HERO, Servicii, Highlight
 * ============================================================ */

/**
 * Sanitize helper pentru checkbox din Customizer.
 */
function montaremocheta_sanitize_checkbox( $checked ) {
    return ( isset( $checked ) && (bool) $checked );
}

function montaremocheta_customize_register( $wp_customize ) {

    /*
     * ---------------------------
     * Secțiune: Homepage – Hero
     * ---------------------------
     */
    $wp_customize->add_section(
        'mm_home_hero',
        [
            'title'       => __( 'Homepage – Hero', 'montaremocheta' ),
            'description' => __( 'Setează imaginea, titlul și textele din secțiunea de sus (hero).', 'montaremocheta' ),
            'priority'    => 30,
        ]
    );

    // Titlu HERO
    $wp_customize->add_setting(
        'mm_hero_title',
        [
            'default'           => 'Mocheta și montaj profesional pentru spațiile tale',
            'sanitize_callback' => 'sanitize_text_field',
        ]
    );

    $wp_customize->add_control(
        'mm_hero_title',
        [
            'label'   => __( 'Titlu HERO', 'montaremocheta' ),
            'section' => 'mm_home_hero',
            'type'    => 'text',
        ]
    );

    // Subtitlu HERO
    $wp_customize->add_setting(
        'mm_hero_subtitle',
        [
            'default'           => 'Mocheta premium, montată corect, pentru birouri, hoteluri și locuințe. Perdele și draperii integrate prin ELOGY DESIGN.',
            'sanitize_callback' => 'wp_kses_post',
        ]
    );

    $wp_customize->add_control(
        'mm_hero_subtitle',
        [
            'label'   => __( 'Subtitlu HERO', 'montaremocheta' ),
            'section' => 'mm_home_hero',
            'type'    => 'textarea',
        ]
    );

    // Buton principal (text + link)
    $wp_customize->add_setting(
        'mm_hero_primary_label',
        [
            'default'           => 'Vezi modelele de mocheta',
            'sanitize_callback' => 'sanitize_text_field',
        ]
    );

    $wp_customize->add_control(
        'mm_hero_primary_label',
        [
            'label'   => __( 'Buton principal – text', 'montaremocheta' ),
            'section' => 'mm_home_hero',
            'type'    => 'text',
        ]
    );

    $wp_customize->add_setting(
        'mm_hero_primary_url',
        [
            'default'           => '/modele-mocheta/',
            'sanitize_callback' => 'esc_url_raw',
        ]
    );

    $wp_customize->add_control(
        'mm_hero_primary_url',
        [
            'label'   => __( 'Buton principal – link', 'montaremocheta' ),
            'section' => 'mm_home_hero',
            'type'    => 'text',
        ]
    );

    // Buton secundar (text + link)
    $wp_customize->add_setting(
        'mm_hero_secondary_label',
        [
            'default'           => 'Cere o ofertă',
            'sanitize_callback' => 'sanitize_text_field',
        ]
    );

    $wp_customize->add_control(
        'mm_hero_secondary_label',
        [
            'label'   => __( 'Buton secundar – text', 'montaremocheta' ),
            'section' => 'mm_home_hero',
            'type'    => 'text',
        ]
    );

    $wp_customize->add_setting(
        'mm_hero_secondary_url',
        [
            'default'           => '/contact/',
            'sanitize_callback' => 'esc_url_raw',
        ]
    );

    $wp_customize->add_control(
        'mm_hero_secondary_url',
        [
            'label'   => __( 'Buton secundar – link', 'montaremocheta' ),
            'section' => 'mm_home_hero',
            'type'    => 'text',
        ]
    );

    // Bullet-uri coloana dreaptă HERO
    $wp_customize->add_setting(
        'mm_hero_bullet_1',
        [
            'default'           => 'Montaj mocheta la cheie, inclusiv pregătirea suportului',
            'sanitize_callback' => 'sanitize_text_field',
        ]
    );
    $wp_customize->add_control(
        'mm_hero_bullet_1',
        [
            'label'   => __( 'Bullet 1 (coloană dreaptă HERO)', 'montaremocheta' ),
            'section' => 'mm_home_hero',
            'type'    => 'text',
        ]
    );

    $wp_customize->add_setting(
        'mm_hero_bullet_2',
        [
            'default'           => 'Soluții pentru hoteluri, birouri, spații comerciale și locuințe',
            'sanitize_callback' => 'sanitize_text_field',
        ]
    );
    $wp_customize->add_control(
        'mm_hero_bullet_2',
        [
            'label'   => __( 'Bullet 2 (coloană dreaptă HERO)', 'montaremocheta' ),
            'section' => 'mm_home_hero',
            'type'    => 'text',
        ]
    );

    $wp_customize->add_setting(
        'mm_hero_bullet_3',
        [
            'default'           => 'Gamă completă de mochete, plinte, profile și accesorii',
            'sanitize_callback' => 'sanitize_text_field',
        ]
    );
    $wp_customize->add_control(
        'mm_hero_bullet_3',
        [
            'label'   => __( 'Bullet 3 (coloană dreaptă HERO)', 'montaremocheta' ),
            'section' => 'mm_home_hero',
            'type'    => 'text',
        ]
    );

    $wp_customize->add_setting(
        'mm_hero_bullet_4',
        [
            'default'           => 'Lucrăm în București, Ilfov și în țară pentru proiecte medii și mari',
            'sanitize_callback' => 'sanitize_text_field',
        ]
    );
    $wp_customize->add_control(
        'mm_hero_bullet_4',
        [
            'label'   => __( 'Bullet 4 (coloană dreaptă HERO)', 'montaremocheta' ),
            'section' => 'mm_home_hero',
            'type'    => 'text',
        ]
    );

    // Afișare / ascundere coloană dreaptă HERO
    $wp_customize->add_setting(
        'mm_hero_show_side_column',
        [
            'default'           => true,
            'sanitize_callback' => 'montaremocheta_sanitize_checkbox',
        ]
    );
    $wp_customize->add_control(
        'mm_hero_show_side_column',
        [
            'label'       => __( 'Afișează coloana dreaptă cu bullet-uri', 'montaremocheta' ),
            'section'     => 'mm_home_hero',
            'type'        => 'checkbox',
            'description' => __( 'Debifează dacă vrei un HERO cu o singură coloană (doar textul principal).', 'montaremocheta' ),
        ]
    );

    // Imagine de fundal HERO
    $wp_customize->add_setting(
        'mm_hero_bg_image',
        [
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ]
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'mm_hero_bg_image',
            [
                'label'       => __( 'Imagine fundal HERO', 'montaremocheta' ),
                'section'     => 'mm_home_hero',
                'settings'    => 'mm_hero_bg_image',
                'description' => __( 'Imagine cu mocheta premium, montată corect, plus perdele/draperii. Dacă nu setezi nimic, se folosește hero-fallback.jpg din tema ta.', 'montaremocheta' ),
            ]
        )
    );

    /*
     * ---------------------------
     * Secțiune: Homepage – Servicii
     * ---------------------------
     */
    $wp_customize->add_section(
        'mm_home_services',
        [
            'title'       => __( 'Homepage – Servicii principale', 'montaremocheta' ),
            'description' => __( 'Configurează cardurile de servicii din prima secțiune de pe homepage.', 'montaremocheta' ),
            'priority'    => 40,
        ]
    );

    // Titlu secțiune servicii
    $wp_customize->add_setting(
        'mm_services_section_title',
        [
            'default'           => 'Servicii montaj mocheta & soluții complete',
            'sanitize_callback' => 'sanitize_text_field',
        ]
    );
    $wp_customize->add_control(
        'mm_services_section_title',
        [
            'label'   => __( 'Titlu secțiune servicii', 'montaremocheta' ),
            'section' => 'mm_home_services',
            'type'    => 'text',
        ]
    );

    // Card 1
    $wp_customize->add_setting(
        'mm_service_1_title',
        [
            'default'           => 'Montaj mocheta profesional',
            'sanitize_callback' => 'sanitize_text_field',
        ]
    );
    $wp_customize->add_control(
        'mm_service_1_title',
        [
            'label'   => __( 'Card 1 – titlu', 'montaremocheta' ),
            'section' => 'mm_home_services',
            'type'    => 'text',
        ]
    );

    $wp_customize->add_setting(
        'mm_service_1_text',
        [
            'default'           => 'Montăm mochetă buclată, cu fir tăiat, modulată (carpet tiles) sau în rolă, pentru hoteluri, birouri, showroom-uri și locuințe. Respectăm pașii tehnici de pregătire a suportului pentru o durată de viață cât mai mare.',
            'sanitize_callback' => 'wp_kses_post',
        ]
    );
    $wp_customize->add_control(
        'mm_service_1_text',
        [
            'label'   => __( 'Card 1 – text', 'montaremocheta' ),
            'section' => 'mm_home_services',
            'type'    => 'textarea',
        ]
    );

    // Card 2
    $wp_customize->add_setting(
        'mm_service_2_title',
        [
            'default'           => 'Furnizare mocheta și accesorii',
            'sanitize_callback' => 'sanitize_text_field',
        ]
    );
    $wp_customize->add_control(
        'mm_service_2_title',
        [
            'label'   => __( 'Card 2 – titlu', 'montaremocheta' ),
            'section' => 'mm_home_services',
            'type'    => 'text',
        ]
    );

    $wp_customize->add_setting(
        'mm_service_2_text',
        [
            'default'           => 'Oferim mochete de trafic intens și rezidențiale, plinte, profile, adezivi și toate accesoriile necesare unei montări corecte. Te ajutăm să alegi combinația potrivită pentru spațiul tău.',
            'sanitize_callback' => 'wp_kses_post',
        ]
    );
    $wp_customize->add_control(
        'mm_service_2_text',
        [
            'label'   => __( 'Card 2 – text', 'montaremocheta' ),
            'section' => 'mm_home_services',
            'type'    => 'textarea',
        ]
    );

    // Card 3
    $wp_customize->add_setting(
        'mm_service_3_title',
        [
            'default'           => 'Măsurători & consultanță la fața locului',
            'sanitize_callback' => 'sanitize_text_field',
        ]
    );
    $wp_customize->add_control(
        'mm_service_3_title',
        [
            'label'   => __( 'Card 3 – titlu', 'montaremocheta' ),
            'section' => 'mm_home_services',
            'type'    => 'text',
        ]
    );

    $wp_customize->add_setting(
        'mm_service_3_text',
        [
            'default'           => 'Venim la locație, facem măsurători, analizăm traficul și propunem soluții tehnice și estetice. Astfel eviți pierderile de material și alegi mocheta optimă pentru proiectul tău.',
            'sanitize_callback' => 'wp_kses_post',
        ]
    );
    $wp_customize->add_control(
        'mm_service_3_text',
        [
            'label'   => __( 'Card 3 – text', 'montaremocheta' ),
            'section' => 'mm_home_services',
            'type'    => 'textarea',
        ]
    );

    /*
     * ---------------------------
     * Secțiune: Homepage – „De ce ELOGY DESIGN”
     * ---------------------------
     */
    $wp_customize->add_section(
        'mm_home_highlight',
        [
            'title'       => __( 'Homepage – De ce ELOGY DESIGN', 'montaremocheta' ),
            'description' => __( 'Cardul cu argumente „De ce să lucrezi cu ELOGY DESIGN pentru montajul mochetei”.', 'montaremocheta' ),
            'priority'    => 45,
        ]
    );

    // Titlu card
    $wp_customize->add_setting(
        'mm_highlight_title',
        [
            'default'           => 'De ce să lucrezi cu ELOGY DESIGN pentru montajul mochetei',
            'sanitize_callback' => 'sanitize_text_field',
        ]
    );
    $wp_customize->add_control(
        'mm_highlight_title',
        [
            'label'   => __( 'Titlu card', 'montaremocheta' ),
            'section' => 'mm_home_highlight',
            'type'    => 'text',
        ]
    );

    // Paragraf introductiv
    $wp_customize->add_setting(
        'mm_highlight_intro',
        [
            'default'           => 'Ne ocupăm de proiectele de mochetă de la A la Z: de la consultanță, selecția materialelor, până la montajul final și finisaje. Lucrăm atât cu companii, cât și cu persoane fizice.',
            'sanitize_callback' => 'wp_kses_post',
        ]
    );
    $wp_customize->add_control(
        'mm_highlight_intro',
        [
            'label'   => __( 'Paragraf introductiv', 'montaremocheta' ),
            'section' => 'mm_home_highlight',
            'type'    => 'textarea',
        ]
    );

    // Bullet 1
    $wp_customize->add_setting(
        'mm_highlight_bullet_1',
        [
            'default'           => 'Experiență în proiecte de hoteluri, spații comerciale, birouri, clinici, showroom-uri și spații rezidențiale',
            'sanitize_callback' => 'sanitize_text_field',
        ]
    );
    $wp_customize->add_control(
        'mm_highlight_bullet_1',
        [
            'label'   => __( 'Bullet 1', 'montaremocheta' ),
            'section' => 'mm_home_highlight',
            'type'    => 'text',
        ]
    );

    // Bullet 2
    $wp_customize->add_setting(
        'mm_highlight_bullet_2',
        [
            'default'           => 'Montatori specializați, echipamente profesionale și respectarea recomandărilor producătorilor',
            'sanitize_callback' => 'sanitize_text_field',
        ]
    );
    $wp_customize->add_control(
        'mm_highlight_bullet_2',
        [
            'label'   => __( 'Bullet 2', 'montaremocheta' ),
            'section' => 'mm_home_highlight',
            'type'    => 'text',
        ]
    );

    // Bullet 3
    $wp_customize->add_setting(
        'mm_highlight_bullet_3',
        [
            'default'           => 'Colaborare ușoară: un singur punct de contact pentru mochetă, accesorii și montaj',
            'sanitize_callback' => 'sanitize_text_field',
        ]
    );
    $wp_customize->add_control(
        'mm_highlight_bullet_3',
        [
            'label'   => __( 'Bullet 3', 'montaremocheta' ),
            'section' => 'mm_home_highlight',
            'type'    => 'text',
        ]
    );

    // Bullet 4
    $wp_customize->add_setting(
        'mm_highlight_bullet_4',
        [
            'default'           => 'Ne deplasăm în București, Ilfov și în țară pentru proiecte medii și mari',
            'sanitize_callback' => 'sanitize_text_field',
        ]
    );
    $wp_customize->add_control(
        'mm_highlight_bullet_4',
        [
            'label'   => __( 'Bullet 4', 'montaremocheta' ),
            'section' => 'mm_home_highlight',
            'type'    => 'text',
        ]
    );
}
add_action( 'customize_register', 'montaremocheta_customize_register' );
