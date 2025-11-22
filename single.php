<?php
/**
 * Template pentru afișarea unui articol individual.
 *
 * @package montaremocheta
 */

get_header();

if ( have_posts() ) :
    while ( have_posts() ) :
        the_post();
        ?>

        <div class="mm-page container">
            <header class="mm-page-header">
                <h1><?php the_title(); ?></h1>

                <p class="mm-post-meta">
                    <?php echo esc_html( get_the_date() ); ?>
                    &middot;
                    <?php the_category( ', ' ); ?>
                </p>
            </header>

            <div class="mm-page-content">
                <?php
                the_content();

                wp_link_pages(
                    [
                        'before' => '<div class="page-links">' . esc_html__( 'Pagini:', 'montaremocheta' ),
                        'after'  => '</div>',
                    ]
                );
                ?>
            </div>
        </div>

        <?php
    endwhile;
else :
    ?>

    <div class="mm-page container">
        <div class="mm-page-content">
            <p><?php esc_html_e( 'Nu am găsit articolul.', 'montaremocheta' ); ?></p>
        </div>
    </div>

    <?php
endif;

get_footer();
