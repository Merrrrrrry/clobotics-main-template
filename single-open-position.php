<?php
/*
Template Name: single-open-position
*/
?>


<?php get_header(); ?>

<main>
    <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class(); ?>>
            <h2><?php the_title(); ?></h2>
            <p><strong>Location:</strong> <?php the_field('job_location'); ?></p>
            <p><strong>Job Type:</strong> <?php the_field('job_type'); ?></p>
            <p><strong>Deadline:</strong> <?php the_field('deadline'); ?></p>
            <p><strong>In this role, you will:</strong></p>
            <p><?php the_field('headline_1'); ?></p>
            <p><?php the_field('paragraph_1'); ?></p>
            <p><strong>We are looking for:</strong></p>
            <p><?php the_field('headline_2'); ?></p>
            <p><?php the_field('paragraph_2'); ?></p>
            <p><strong>We offer:</strong></p>
            <p><?php the_field('headline_3'); ?></p>
            <p><?php the_field('paragraph_3'); ?></p>
            <p><strong>About Us:</strong></p>
            <p><?php the_field('headline_4'); ?></p>
            <p><?php the_field('paragraph_4'); ?></p>
        </article>
    <?php endwhile; ?>

</main>

<?php get_footer(); ?>



