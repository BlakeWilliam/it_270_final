<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Noto_Simple
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'noto-simple' ); ?></a>

	<header id="masthead" class="site-header">
        <div class="container">

			<div class="header-image">
                <a href="http://blakewagrade.com/it_270/final"><img id="logo" src="<?php echo get_template_directory_uri(); ?>/images/htlogotransp.png" alt="logo"></a>
			</div><!-- .header-image -->

            <nav id="site-navigation" class="main-navigation">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <i class="material-icons open">menu</i>
					<i class="material-icons close">close</i>
				</button>
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                    ) );
                ?>
            </nav><!-- #site-navigation -->
        </div><!-- .container -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
        <div class="container">
