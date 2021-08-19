<?php 
get_header();

?>
<div id="content wrapper">

<div id="about-left">
    <!-- If we have posts... 
    show me the posts! 
    If not... 
    we do not have posts! -->
<?php if(have_posts()) : ?>
    <?php while(have_posts()) : the_post() ; ?>
<article class="posts">
    <h2><a href="<?php the_permalink() ;?>"><?php the_title() ;?></a></h2>
<div class="meta">
    <span><b>Posted By:</b> <?php the_author() ; ?></span>
    <span><b>Posted On:</b> <?php the_time('F j, Y g:i a') ; ?></span>
</div>
</article>
<!-- end meta div -->
<div class="thumbnail">
    <?php if(has_post_thumbnail()) : ?>
        <a href="<?php the_permalink() ; ?>">
            <?php the_post_thumbnail(); ?>
        </a>
    <?php endif; ?>
</div>
<!-- end thumbnail -->
    <?php the_excerpt() ; ?>
    <span class="block">
        <a href="<?php the_permalink(); ?>">Read More about <?php the_title(); ?></a>
    </span>
    <?php endwhile; ?>

<?php else : ?>
    <?php 
        echo '<h2>Search Results:</h2>
        <p>Sorry, we could not find anything matching your keywords</p>
        <p>Try another search using different words</p>'   
    ;?>
    <?php get_search_form(); ?>
<?php endif; ?>
</div>
</div>
<!-- END LEFT -->
<div id="about-right">
    <?php dynamic_sidebar( 'sidebar-blog' ); ?>
</div>
<!-- END RIGHT -->
<div class="footer-seperation">
<?php
get_footer();

?>