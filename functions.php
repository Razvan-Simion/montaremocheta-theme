<?php

function mm_theme_setup() {
    // Suport pentru <title> din WordPress
    add_theme_support('title-tag');

    // Suport pentru imagini reprezentative (featured images)
    add_theme_support('post-thumbnails');

    // Activează HTML5 pentru formulare, galerii etc.
    add_theme_support('html5', ['search-form', 'gallery', 'caption']);

    // Meniuri
    register_nav_menus([
        'primary' => __('Meniu Principal', 'montaremocheta'),
        'footer'  => __('Meniu Footer', 'montaremocheta'),
    ]);
}
add_action('after_setup_theme', 'mm_theme_setup');


// Încărcarea stilurilor CSS
function mm_enqueue_assets() {
    wp_enqueue_style('mm-style', get_stylesheet_uri(), [], '1.0');
}
add_action('wp_enqueue_scripts', 'mm_enqueue_assets');
