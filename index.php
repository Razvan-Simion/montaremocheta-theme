<?php
/**
 * Template fallback pentru listă de articole (index).
 *
 * @package montaremocheta
 */

get_header();

if ( have_posts() ) : ?>

    <div class="mm-page container">
        <header class="mm-page-header">
            <h1><?php esc_html_e( 'Articole recente', 'montaremocheta' ); ?></h1>
        </header>

        <div class="mm-page-content">
            <div class="mm-archive-grid">
                <?php
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <article <?php post_class( 'mm-archive-card' ); ?>>
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
                the_posts_pagination(
                    [
                        'mid_size'           => 2,
                        'prev_text'          => __( '&laquo; Articole mai vechi', 'montaremocheta' ),
                        'next_text'          => __( 'Articole mai noi &raquo;', 'montaremocheta' ),
                        'screen_reader_text' => __( 'Navigare articole', 'montaremocheta' ),
                    ]
                );
                ?>
            </div>
        </div>
    </div>

<?php
else :
    ?>

    <div class="mm-page container">
        <div class="mm-page-content">
            <p><?php esc_html_e( 'Nu există încă articole publicate.', 'montaremocheta' ); ?></p>
        </div>
    </div>

<?php
endif;

get_footer();
