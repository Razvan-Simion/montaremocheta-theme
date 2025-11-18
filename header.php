<?php
/**
 * Header-ul principal al temei
 * Conține: <html>, <head>, începutul <body>, logo, meniu
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Setează caracter encoding -->
    <meta charset="<?php bloginfo('charset'); ?>">

    <!-- Asigură responsivitate pe mobil -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- wp_head() încarcă scripturile, stilurile și meta-urile WordPress -->
    <?php wp_head(); ?>
</head>

<!-- body_class() adaugă clase utile generate automat de WP -->
<body <?php body_class(); ?>>

<!-- ======= HEADER SITE ======= -->
<header class="site-header">
    <div class="container">

        <!-- LOGO - implicit numele site-ului; ulterior îl poți înlocui cu o imagine -->
        <div class="logo">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <?php bloginfo('name'); ?>
            </a>
        </div>

        <!-- MENIUL PRINCIPAL - definit în functions.php ca 'primary' -->
        <nav class="main-nav">
            <?php
                wp_nav_menu([
                    'theme_location' => 'primary', // meniu principal
                    'container'      => false      // fără <div> suplimentar
                ]);
            ?>
        </nav>

    </div>
</header>
<!-- ===== END HEADER ===== -->

<!-- Începem containerul principal al site-ului -->
<main class="site-content">
