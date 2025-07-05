<?php
// add_image_size( 'hero-desktop', 1920, 500 , true );
// add_image_size( 'hero-mobile', 900, 300 , true );


function steadyfooted_set_default_image_size() {
    update_option('image_default_size', 'full');
}
add_action('after_setup_theme', 'steadyfooted_set_default_image_size');
?>