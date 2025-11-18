<?php
/**
 * Template pentru paginile de arhivă:
 * - categorii
 * - etichete (tags)
 * - autor
 * - lună / an
 * - pagina de blog
 */

get_header(); // încarcă header.php
?>

<main class="archive-page container">

    <!-- Titlul arhivei (ex: "Categorie: Mocheta", "Arhiva lunii Mai") -->
    <h1 class="archive-title">
        <?php the_archive_title(); ?>
    </h1>

    <!-- Descriere arhivă (dacă există) -->
    <div class="archive-description">
        <?php the_archive_description('<div class="taxonomy-description">', '</div>'); ?>
    </div>

    <div class="archive-posts">

        <?php if ( have_posts() ) : ?>

            <?php while ( have_posts() ) : the_post(); ?>

                <!-- Fiecare articol din arhivă -->
                <article class="archive-item">
                    <h2 class="archive-item-title">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>

                    <div class="archive-item-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                </article>

            <?php endwhile; ?>

        <?php else : ?>

            <p>Nu a fost găsit niciun articol în această arhivă.</p>

        <?php endif; ?>

    </div>

    <!-- Navigare arhivă (paginație) -->
    <div class="archive-navigation">
        <?php
            the_posts_pagination([
                'mid_size' => 2,
                'prev_text' => '&laquo; Precedent',
                'next_text' => 'Următor &raquo;',
            ]);
        ?>
    </div>

</main>

<?php get_footer(); // încarcă footer.php ?>
