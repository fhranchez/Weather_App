<?php
function load_stylesheets() {
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.css' . '?v' . time() );
    wp_enqueue_style('bootstrap-icons', get_template_directory_uri() . '/node_modules/bootstrap-icons/font/bootstrap-icons.css' . '?v' . time() );
    wp_enqueue_style('style', get_stylesheet_uri() . '?v' . time() );
    wp_enqueue_script('bootstrapJs',get_template_directory_uri() . '/bootstrap/js/bootstrap.bundle.js');
}

add_action('wp_enqueue_scripts', 'load_stylesheets');