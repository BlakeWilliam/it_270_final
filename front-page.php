<?php get_header(); 

/*
Template Name: Front Page
*/
?>

<div id="content wrapper" class="row justify-content-center">	
    <div id="slider">
        <?php dynamic_sidebar( 'slider' ); ?>
    </div>
    <?php the_content() ; ?>



</div>

<div class="footer-seperation">
<?php get_footer(); ?>