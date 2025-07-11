<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Steadyfooted
 * @since Steadyfooted 1.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content">
		<?php
		/* translators: Hidden accessibility text. */
		esc_html_e( 'Skip to content', 'steadyfooted' );
		?>
	</a>

    <header id="masthead" class="site-header">
        <?php // TO DO: Add alert bar here. ?>
        
        <div class="top-nav">
            <div class="container">
                <?php wp_nav_menu( array(
                    'menu'    			=> 'Top Menu',
                    'depth'             => 1,
                    'container'         => 'nav',
                    )
                ); ?>
			</div>
		</div>
        <div class="main-nav">
            <div class="container">
                <?php // TO DO: Add main nav here. ?>
            </div>
        </div>
    </header><!-- #masthead -->

    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">