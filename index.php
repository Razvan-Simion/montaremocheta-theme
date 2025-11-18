<?php get_header(); ?>

<main class="site-main">
    <h1>Index template - Tema MontareMocheta</h1>
    <p>Tema funcționează. Aici va apărea conținutul implicit.</p>

    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <article>
                <h2>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>

                <?php the_excerpt(); ?>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <p>Nu există articole disponibile.</p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
