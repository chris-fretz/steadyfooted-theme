<?php
/*********************************************************
* Function to add timestamp version to stylesheets on save
*********************************************************/
/**
 * Appends a cache-busting version query to a file URL based on its last modified time.
 *
 * If the file exists in the current theme (or child theme), it adds a `?ver=timestamp` 
 * query string to help with cache control. If the file doesn't exist, it returns the base URL.
 *
 * @param string $filePath The relative path to the file from the theme root (e.g. '/assets/css/style.css').
 * @return string The file URL, optionally appended with a `?ver=` query string.
 */
function steadyfooted_get_file_last_version($filePath)
{
    $fullFilePath = get_stylesheet_directory() . $filePath;
    $fileUrl = get_stylesheet_directory_uri() . $filePath;

    if (!file_exists($fullFilePath)) {
        return $fileUrl;
    }

    return $fileUrl . '?ver=' . filemtime($fullFilePath);
}

/**********************************
 * Enqueue javascript
 **********************************/
function steadyfooted_theme_scripts() {
    wp_enqueue_script('scripts', steadyfooted_get_file_last_version('/assets/dist/main.min.js'), array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'steadyfooted_theme_scripts');
?>