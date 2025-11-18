<?php
/**
 * Template pentru Paginile statice (ex: Contact, Servicii, Showroom)
 * WordPress îl folosește automat pentru tipul de conținut "page".
 */

get_header(); // încarcă header.php
?>

<main class="page-content container">

    <?php
    // Verificăm dacă există conținut
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
    ?>

        <!-- Titlul paginii -->
        <h1 class="page-title"><?php the_title(); ?></h1>

        <!-- Conținutul paginii (editabil din WordPress) -->
        <div class="page-text">
            <?php the_content(); ?>
        </div>

    <?php
        endwhile;
    else :
        echo '<p>Nu există conținut disponibil.</p>';
    endif;
    ?>

</main>

<?php get_footer(); // încarcă footer.php ?>
