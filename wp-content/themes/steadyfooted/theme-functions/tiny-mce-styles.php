<?php 
/****************************************************
 * Add styles/classes to Tiny MCE "Formats" drop-down
 ***************************************************/

/**
 * Add style selector button to the beginning of the toolbar
 */ 
add_filter( 'mce_buttons_2', 'steadyfooted_tinymce_buttons' );

function steadyfooted_tinymce_buttons( $buttons ) {
    array_unshift( $buttons, 'styleselect' );

    return $buttons;
}

/**
 * Add styles/classes to the "Styles" drop-down
 */ 
add_filter( 'tiny_mce_before_init', 'steadyfooted_mce_before_init' );

function steadyfooted_mce_before_init( $settings ) {

    // Set to true to include the default settings.
    $settings['style_formats_merge'] = false;
    
    $style_formats = array(
        array(
            'title' => 'CTA Button',
            'selector' => 'a',
            'classes' => 'cta-btn'
            ),
        array(
            'title' => 'Secondary CTA Button',
            'selector' => 'a',
            'classes' => 'cta-btn cta-btn--2nd'
        ),
        array(
            'title' => 'Two Column (ul)',
            'selector' => 'ul',
            'classes' => 'two-column'
        ),
        array(
            'title' => 'Two Column (ol)',
            'selector' => 'ol',
            'classes' => 'two-column'
        ),
    );
    
    $settings['style_formats'] = json_encode( $style_formats );
    
    return $settings;

}

?>