<?php
function chez_load_stylesheets() {
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.css' . '?v' . time() );
    wp_enqueue_style('bootstrap-icons', get_template_directory_uri() . '/node_modules/bootstrap-icons/font/bootstrap-icons.css' . '?v' . time() );
    wp_enqueue_style('style', get_stylesheet_uri() . '?v' . time() );
     wp_enqueue_style('google-fonts','https://fonts.googleapis.com/css2?family=IBM+Plex+Serif:wght@500;600;700&amp;display=swap&amp;family=Rubik+Vinyl&amp;display=swap',false);
    wp_enqueue_script('bootstrapJs',get_template_directory_uri() . '/bootstrap/js/bootstrap.bundle.js');
   
}

add_action('wp_enqueue_scripts', 'chez_load_stylesheets');

function chez_api_cred() {
        global $myglobals;
        // We define it as an array so you can store multiple values. If only needed one value you can directly set it 
        $myglobals = array();
        $myglobals['api'] = 'https://api.openweathermap.org/data/2.5/group?id=2332459,2988507,2759794,4887398,2158177,108410,1809858,3451190,5913490,293397&APPID=e9253cce04e65d05f8632fd04c8a74ea&units=metric';
        $myglobals['api_body'] = json_decode(wp_remote_retrieve_body( wp_remote_get($myglobals['api'])),true);
}
add_action( 'after_setup_theme', 'chez_api_cred' );