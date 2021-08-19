<?php


get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation(array(
                'prev_text' => '<i class="material-icons">navigate_before</i><span class="hidden-sm">' . __('Previous post', 'noto-simple') . '</span>',
                'next_text' => '<span class="hidden-sm">' . __('Next post', 'noto-simple') . '</span><i class="material-icons">navigate_next</i>',
            ));

			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main>
	</div>


<?php get_sidebar(); ?>
<div class="footer-seperation">
<?php get_footer(); ?>
