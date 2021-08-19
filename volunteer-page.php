<?php get_header(); 

/*
Template Name: Volunteers Page
*/
?>

<div id="content wrapper">

<div id="volunteer-left">
    <?php dynamic_sidebar( 'sidebar-volunteer' ); ?>
</div>

<div id="volunteer-right">
<?php the_content() ; ?>
</div>
</div>




<div class="footer-seperation">
<?php get_footer(); ?>