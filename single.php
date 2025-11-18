<?php
/**
 * Template pentru un articol individual (single post)
 * Folosit pentru tipul de conținut "post" (blog).
 */

get_header(); // încarcă header.php
?>

<main class="single-post container">

    <?php
    // Verificăm dacă există postări
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
    ?>

        <!-- Titlul articolului -->
        <h1 class="post-title"><?php the_title(); ?></h1>

        <!-- Meta informații (autor, dată) – opțional -->
        <div class="post-meta">
            <span>Publicat pe <?php echo get_the_date(); ?></span>
        </div>

        <!-- Conținutul articolului -->
        <div class="post-content">
            <?php the_content(); ?>
        </div>

        <!-- Navigare între articole (înainte / după) -->
        <div class="post-navigation">
            <?php
                previous_post_link('<div class="prev-post">%link</div>');
                next_post_link('<div class="next-post">%link</div>');
            ?>
        </div>

    <?php
        endwhile;
    else :
        echo '<p>Articolul nu a fost găsit.</p>';
    endif;
    ?>

</main>

<?php get_footer(); // încarcă footer.php ?>
