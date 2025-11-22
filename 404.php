<?php
/**
 * Template pentru pagina 404 – Pagina negăsită.
 *
 * @package montaremocheta
 */

get_header(); ?>

<div class="mm-page container">
    <header class="mm-page-header">
        <h1><?php esc_html_e( 'Pagina nu a fost găsită', 'montaremocheta' ); ?></h1>
    </header>

    <div class="mm-page-content">
        <p><?php esc_html_e( 'Link-ul poate fi greșit sau pagina nu mai există.', 'montaremocheta' ); ?></p>
        <p>
            <a class="mm-btn mm-btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <?php esc_html_e( 'Înapoi la pagina principală', 'montaremocheta' ); ?>
            </a>
        </p>
    </div>
</div>

<?php
get_footer();
