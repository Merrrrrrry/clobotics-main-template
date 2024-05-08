<?php
/*
Template Name: About us
*/
?>

<?php get_header(); ?>

<main>

    <?php while(have_posts()): the_post(); ?>
        <?php the_content(); ?>

<body>








</body>
    <?php endwhile; ?>

</main>
<?php get_footer(); ?>
