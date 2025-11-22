<?php
/**
 * Customizer: Design system (culori & fundal)
 *
 * Panel „Design & Identitate vizuală” pentru culori de brand și fundaluri.
 *
 * @package MontareMocheta
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Înregistrăm opțiunile de design în Customizer.
 *
 * @param WP_Customize_Manager $wp_customize
 */
function montaremocheta_customize_register_design( $wp_customize ) {

    // Panel general pentru identitate vizuală.
    $wp_customize->add_panel(
        'mm_design_panel',
        [
            'title'       => __( 'Design & Identitate vizuală', 'montaremocheta' ),
            'description' => __( 'Setează culorile de brand și fundalurile principale ale site-ului.', 'montaremocheta' ),
            'priority'    => 25,
        ]
    );

    // ============================
    //  Secțiune: Paletă de culori
    // ============================
    $wp_customize->add_section(
        'mm_design_colors',
        [
            'title'    => __( 'Paletă de culori', 'montaremocheta' ),
            'priority' => 10,
            'panel'    => 'mm_design_panel',
        ]
    );

    // Culoare primară.
    $wp_customize->add_setting(
        'mm_color_primary',
        [
            'default'           => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'refresh',
        ]
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'mm_color_primary',
            [
                'label'   => __( 'Culoare primară', 'montaremocheta' ),
                'section' => 'mm_design_colors',
            ]
        )
    );

    // Culoare secundară.
    $wp_customize->add_setting(
        'mm_color_secondary',
        [
            'default'           => '#cc0000',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'refresh',
        ]
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'mm_color_secondary',
            [
                'label'   => __( 'Culoare secundară', 'montaremocheta' ),
                'section' => 'mm_design_colors',
            ]
        )
    );

    // Culoare text principal.
    $wp_customize->add_setting(
        'mm_color_text_main',
        [
            'default'           => '#2d2d2d',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'refresh',
        ]
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'mm_color_text_main',
            [
                'label'   => __( 'Culoare text principal', 'montaremocheta' ),
                'section' => 'mm_design_colors',
            ]
        )
    );

    // Culoare background site (fundal general).
    $wp_customize->add_setting(
        'mm_color_background_site',
        [
            'default'           => '#f7f7f7',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'refresh',
        ]
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'mm_color_background_site',
            [
                'label'       => __( 'Culoare background site', 'montaremocheta' ),
                'description' => __( 'Fundalul general al paginilor (body).', 'montaremocheta' ),
                'section'     => 'mm_design_colors',
            ]
        )
    );

    // Culoare background header (opțional).
    $wp_customize->add_setting(
        'mm_color_header_background',
        [
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'refresh',
        ]
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'mm_color_header_background',
            [
                'label'       => __( 'Culoare background header', 'montaremocheta' ),
                'description' => __( 'Dacă nu setezi nimic, se folosește culoarea de suprafață implicită.', 'montaremocheta' ),
                'section'     => 'mm_design_colors',
            ]
        )
    );

    // Culoare background footer (opțional).
    $wp_customize->add_setting(
        'mm_color_footer_background',
        [
            'default'           => '#111111',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'refresh',
        ]
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'mm_color_footer_background',
            [
                'label'       => __( 'Culoare background footer', 'montaremocheta' ),
                'description' => __( 'Dacă nu setezi nimic, se folosește #111 (negru din designul original).', 'montaremocheta' ),
                'section'     => 'mm_design_colors',
            ]
        )
    );

    // ====================================
    //  Secțiune: Fundal & overlay HERO
    // ====================================
    $wp_customize->add_section(
        'mm_design_hero_background',
        [
            'title'    => __( 'Fundal & overlay HERO', 'montaremocheta' ),
            'priority' => 20,
            'panel'    => 'mm_design_panel',
        ]
    );

    // Culoare overlay HERO.
    $wp_customize->add_setting(
        'mm_hero_overlay_color',
        [
            'default'           => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'refresh',
        ]
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'mm_hero_overlay_color',
            [
                'label'       => __( 'Culoare overlay HERO', 'montaremocheta' ),
                'description' => __( 'Culoarea principală a overlay-ului peste imaginea HERO.', 'montaremocheta' ),
                'section'     => 'mm_design_hero_background',
            ]
        )
    );

    // Opacitate overlay HERO (0–1).
    $wp_customize->add_setting(
        'mm_hero_overlay_opacity',
        [
            'default'           => 0.65,
            'sanitize_callback' => 'montaremocheta_sanitize_opacity',
            'transport'         => 'refresh',
        ]
    );

    $wp_customize->add_control(
        'mm_hero_overlay_opacity',
        [
            'label'       => __( 'Opacitate overlay HERO', 'montaremocheta' ),
            'description' => __( 'Valoare între 0 (transparent) și 1 (complet opac). Recomandat 0.5–0.8.', 'montaremocheta' ),
            'section'     => 'mm_design_hero_background',
            'type'        => 'number',
            'input_attrs' => [
                'min'  => 0,
                'max'  => 1,
                'step' => 0.05,
            ],
        ]
    );

    // Unghi gradient overlay HERO.
    $wp_customize->add_setting(
        'mm_hero_overlay_gradient_angle',
        [
            'default'           => 90,
            'sanitize_callback' => 'absint',
            'transport'         => 'refresh',
        ]
    );

    $wp_customize->add_control(
        'mm_hero_overlay_gradient_angle',
        [
            'label'       => __( 'Unghi gradient overlay (grade)', 'montaremocheta' ),
            'description' => __( 'De ex. 90 pentru stânga→dreapta, 135 pentru diagonală.', 'montaremocheta' ),
            'section'     => 'mm_design_hero_background',
            'type'        => 'number',
            'input_attrs' => [
                'min'  => 0,
                'max'  => 360,
                'step' => 5,
            ],
        ]
    );
}
add_action( 'customize_register', 'montaremocheta_customize_register_design', 20 );

/**
 * Sanitize pentru opacitate (0–1).
 *
 * @param mixed $value
 *
 * @return float
 */
function montaremocheta_sanitize_opacity( $value ) {
    $value = floatval( $value );

    if ( $value < 0 ) {
        $value = 0;
    }

    if ( $value > 1 ) {
        $value = 1;
    }

    return $value;
}

/**
 * Conversie hex în rgba() pentru CSS.
 *
 * @param string $color   Culoare hex, cu sau fără #.
 * @param float  $opacity Opacitate 0–1.
 *
 * @return string
 */
function montaremocheta_hex_to_rgba( $color, $opacity = 1 ) {

    $color = trim( (string) $color );

    if ( 0 === strpos( $color, '#' ) ) {
        $color = substr( $color, 1 );
    }

    if ( 3 === strlen( $color ) ) {
        $color = $color[0] . $color[0] . $color[1] . $color[1] . $color[2] . $color[2];
    }

    if ( 6 !== strlen( $color ) ) {
        // Fallback safe.
        return sprintf( 'rgba(0,0,0,%s)', $opacity );
    }

    $r = hexdec( substr( $color, 0, 2 ) );
    $g = hexdec( substr( $color, 2, 2 ) );
    $b = hexdec( substr( $color, 4, 2 ) );

    $opacity = montaremocheta_sanitize_opacity( $opacity );

    return sprintf( 'rgba(%d,%d,%d,%s)', $r, $g, $b, $opacity );
}

/**
 * Generează CSS custom pentru variabilele de design system.
 *
 * Se atașează la stilul principal al temei (montaremocheta-main)
 * prin wp_add_inline_style().
 */
function montaremocheta_add_design_system_inline_css() {

    if ( ! wp_style_is( 'montaremocheta-main', 'enqueued' ) ) {
        return;
    }

    // Citim valorile din Customizer, cu fallback la designul actual.
    $primary       = get_theme_mod( 'mm_color_primary', '#000000' );
    $secondary     = get_theme_mod( 'mm_color_secondary', '#cc0000' );
    $text_main     = get_theme_mod( 'mm_color_text_main', '#2d2d2d' );
    $bg_site       = get_theme_mod( 'mm_color_background_site', '#f7f7f7' );
    $header_bg     = get_theme_mod( 'mm_color_header_background', '#ffffff' );
    $footer_bg     = get_theme_mod( 'mm_color_footer_background', '#111111' );
    $overlay_color = get_theme_mod( 'mm_hero_overlay_color', '#000000' );
    $overlay_op    = get_theme_mod( 'mm_hero_overlay_opacity', 0.65 );
    $overlay_angle = get_theme_mod( 'mm_hero_overlay_gradient_angle', 90 );

    $overlay_rgba  = montaremocheta_hex_to_rgba( $overlay_color, $overlay_op );
    $overlay_css   = sprintf(
        'linear-gradient(%1$ddeg, %2$s 0%%, rgba(0,0,0,0) 100%%)',
        absint( $overlay_angle ),
        $overlay_rgba
    );

    // Construim CSS-ul – variabile + mapări către designul existent.
    $css  = ':root{' . PHP_EOL;
    $css .= '  --mm-color-primary: ' . esc_html( $primary ) . ';' . PHP_EOL;
    $css .= '  --mm-color-secondary: ' . esc_html( $secondary ) . ';' . PHP_EOL;
    $css .= '  --mm-color-text-main: ' . esc_html( $text_main ) . ';' . PHP_EOL;
    $css .= '  --mm-color-background-site: ' . esc_html( $bg_site ) . ';' . PHP_EOL;
    $css .= '  --mm-color-header-background: ' . esc_html( $header_bg ) . ';' . PHP_EOL;
    $css .= '  --mm-color-footer-background: ' . esc_html( $footer_bg ) . ';' . PHP_EOL;

    // Legăm de variabilele deja folosite în main.css.
    $css .= '  --color-primary: ' . esc_html( $primary ) . ';' . PHP_EOL;
    $css .= '  --color-secondary: ' . esc_html( $secondary ) . ';' . PHP_EOL;
    $css .= '  --color-text: ' . esc_html( $text_main ) . ';' . PHP_EOL;
    $css .= '  --color-bg: ' . esc_html( $bg_site ) . ';' . PHP_EOL;
    $css .= '}' . PHP_EOL;

    // Fundal și culoare text globale.
    $css .= 'body{' . PHP_EOL;
    $css .= '  background-color: var(--mm-color-background-site);' . PHP_EOL;
    $css .= '  color: var(--mm-color-text-main);' . PHP_EOL;
    $css .= '}' . PHP_EOL;

    // Header / footer.
    $css .= '.mm-header{' . PHP_EOL;
    $css .= '  background: var(--mm-color-header-background);' . PHP_EOL;
    $css .= '}' . PHP_EOL;

    $css .= '.mm-footer{' . PHP_EOL;
    $css .= '  background: var(--mm-color-footer-background);' . PHP_EOL;
    $css .= '}' . PHP_EOL;

    // Overlay HERO.
    $css .= '.mm-hero-overlay{' . PHP_EOL;
    $css .= '  background: ' . esc_html( $overlay_css ) . ';' . PHP_EOL;
    $css .= '}' . PHP_EOL;

    wp_add_inline_style( 'montaremocheta-main', $css );
}
add_action( 'wp_enqueue_scripts', 'montaremocheta_add_design_system_inline_css', 20 );
