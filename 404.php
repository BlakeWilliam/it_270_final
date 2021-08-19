<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Noto_Simple
 */

get_header(); ?>


<div id="content wrapper" class="error-404 not-found">

	<h1 class="page-title"><?php esc_html_e( 'That page can&rsquo;t be found.', 'healing-trails' ); ?></h1>
	<div id="search-error">
		<img src="<?php echo get_template_directory_uri(); ?>/../../uploads/lost404.jpg" alt="lost 404">
	</div>

	<p><?php esc_html_e( 'It looks we do not have that file here at Healing Trails.', 'healing-trails' ); ?></p>
	<p>
		<a href="<?php echo esc_url(home_url()); ?>"><?php esc_html_e('Back to home page', 'healing-trails'); ?></a>
	</p>

	<?php
		get_search_form();
	?>


</div><!-- #content #wrapper-->
	</div>
<div class="footer-seperation">
<?php
get_footer();
