<?php
/*
Template Name: Contact Us Page
*/

get_header(); // Include header.php
?>

<!-- Service Section Start -- -->
<?php
    if( have_posts() ):
        while( have_posts() ): the_post();
            get_template_part( 'template-parts/content', 'page' );
        endwhile;
    endif;
?>


<?php get_footer(); // Include footer.php ?>