<?php get_header(); 

/*
Template Name: Trails Page
*/
?>

<div id="content wrapper">

<div id="about-left">


    <?php the_content() ; ?>
    

</div>
<div id="about-right">
    <?php dynamic_sidebar( 'sidebar-trails' ); ?>
</div>
</div>




<div class="footer-seperation">
<?php get_footer(); ?>