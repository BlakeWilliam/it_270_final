<?php get_header(); 

/*
Template Name: About Page
*/
?>

<div id="content wrapper">

<div id="about-left">


    <?php the_content() ; ?>
    

</div>
<div id="about-right">
    <?php dynamic_sidebar( 'sidebar-about' ); ?>
</div>
</div>




<div class="footer-seperation">
<?php get_footer(); ?>