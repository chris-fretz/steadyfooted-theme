<?php
/**********************************
 * Enqueue front-end fonts and stylesheets 
 **********************************/
function steadyfooted_theme_stylesheets() {
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap', array(), null, 'all' );
    
    wp_enqueue_style( 'main-stylesheet', steadyfooted_get_file_last_version ('/assets/dist/css/style.min.css'), array(), '1.0.0');
}
// Adding 9999 as the priority ensures that theme stylesheets get enqueued at the bottom of the head tag
add_action('wp_enqueue_scripts', 'steadyfooted_theme_stylesheets', 9999);

/*******************************************
* Enqueue MCE Editor and Block Editor Styles
*******************************************/
function steadyfooted_editor_styles() {
	add_theme_support( 'editor-styles' );
	add_editor_style([
        'assets/dist/css/mce-style.min.css',
        'assets/dist/css/editor-style.min.css'
    ]);
}
add_action( 'after_setup_theme', 'steadyfooted_editor_styles');

/**********************************
 * Enqueue javascript
 **********************************/
function steadyfooted_child_scripts() {
    wp_enqueue_script('scripts', steadyfooted_get_file_last_version('/assets/dist/child-scripts.min.js'), array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'steadyfooted_child_scripts');
?>