<?php
/*
Template Name: Career
*/
?>

<?php get_header(); ?>

<main>

    <h2>Open Positions</h2>

    <?php
    $open_positions = new WP_Query(array(
        'post_type' => 'open_positions', 
        'posts_per_page' => -1 
    ));

    if ($open_positions->have_posts()) :
        ?>
        <ul class="position-list">
            <?php while ($open_positions->have_posts()) : $open_positions->the_post(); ?>
                <li class="position-item">
                    <h3><?php the_title(); ?></h3>
                    <p>
                        <?php
                        $job_location = get_field('job_location');
                        $job_type = get_field('job_type');
                        echo $job_location . ' | ' . $job_type;
                        ?>
                    </p>
                    <a href="<?php the_permalink(); ?>" class="learn-more">Learn more</a>
                </li>
            <?php endwhile; ?>
        </ul>

        <?php
        // Restore original post data
        wp_reset_postdata();
    else :
        ?>
        <p>No open positions currently available.</p>
    <?php endif; ?>

</main>

<?php get_footer(); ?>
