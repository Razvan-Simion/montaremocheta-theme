<?php
/**
 * Template pentru rezultatele căutării
 */

get_header();
?>

<div class="mm-page container">
    <header class="mm-page-header">
        <h1>Rezultate pentru: <?php echo esc_html( get_search_query() ); ?></h1>
    </header>

    <div class="mm-page-content">
        
        <?php if ( have_posts() ) : ?>

            <div class="mm-archive-grid">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article <?php post_class('mm-archive-card'); ?>>
                        <a href="<?php the_permalink(); ?>" class="mm-archive-card-title">
                            <?php the_title(); ?>
                        </a>
                        <div class="mm-archive-card-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <div class="mm-archive-pagination">
                <?php
                the_posts_pagination([
                    'mid_size' => 2,
                    'prev_text' => '&laquo; Înapoi',
                    'next_text' => 'Înainte &raquo;',
                ]);
                ?>
            </div>

        <?php else : ?>

            <p>Nu am găsit rezultate pentru această căutare.</p>

        <?php endif; ?>

    </div>
</div>

<?php get_footer(); ?>
