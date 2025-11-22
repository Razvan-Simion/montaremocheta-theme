<?php
/**
 * Header-ul principal al temei
 * Conține: <html>, <head>, începutul <body>, logo, meniu, CTA
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="mm-header">
    <div class="mm-header-inner">

        <!-- LOGO / TITLU SITE -->
        <div class="mm-logo">
            <?php
            if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
                the_custom_logo();
            } else { ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="mm-site-title">
                    <?php bloginfo( 'name' ); ?>
                </a>
            <?php } ?>
        </div>

        <!-- MENIU PRINCIPAL -->
        <nav class="mm-main-nav" aria-label="<?php esc_attr_e( 'Meniu principal', 'montaremocheta' ); ?>">
            <?php
            wp_nav_menu( [
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'mm-menu',
                'fallback_cb'    => false,
            ] );
            ?>
        </nav>

        

        <!-- CTA DESKTOP: Cere ofertă (merge la /contact/) -->
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"
           class="mm-cta-button mm-cta-desktop">
            Cere ofertă
        </a>

        <!-- CTA MOBIL: Sună acum (tel) -->
        <a href="tel:0721437550"
           class="mm-cta-button mm-cta-mobile">
            Sună
        </a>

        <!-- ICONIȚE HEADER: lupă (căutare) + pin (hartă) -->
        <div class="mm-header-icons">
            <!-- Lupă – scroll la formularul de căutare din footer (coloana cu id="mm-footer-search") -->
            <a href="#mm-footer-search"
               class="mm-header-icon mm-header-icon-search"
               aria-label="<?php esc_attr_e( 'Căutare', 'montaremocheta' ); ?>">
                <svg class="mm-icon" viewBox="0 0 24 24" aria-hidden="true">
                    <circle cx="11" cy="11" r="6"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2" />
                    <line x1="16" y1="16" x2="20" y2="20"
                          stroke="currentColor"
                          stroke-width="2"
                          stroke-linecap="round" />
                </svg>
            </a>

            <!-- Pin – duce la secțiunea hartă din pagina de contact (#mm-map) -->
            <a href="<?php echo esc_url( home_url( '/contact/#mm-map' ) ); ?>"
               class="mm-header-icon mm-header-icon-location"
               aria-label="<?php esc_attr_e( 'Vezi locația pe hartă', 'montaremocheta' ); ?>">
                <svg class="mm-icon" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M12 3.5c-2.9 0-5.25 2.3-5.25 5.3 0 3.7 3.4 7.4 4.8 8.9.25.27.65.27.9 0 1.4-1.5 4.8-5.2 4.8-8.9 0-3-2.35-5.3-5.25-5.3z"
                          fill="none"
                          stroke="currentColor"
                          stroke-width="2"
                          stroke-linejoin="round" />
                    <circle cx="12" cy="9" r="2.25"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2" />
                </svg>
            </a>
        </div>

        <!-- BURGER MENU (mobil) -->
        <button class="mm-burger" aria-label="<?php esc_attr_e( 'Deschide meniul', 'montaremocheta' ); ?>">
            <span></span>
            <span></span>
            <span></span>
        </button>

    </div>
</header>

<main class="mm-main">
