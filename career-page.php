<?php
/*
Template Name: Career
*/
?>

<?php get_header(); ?>

<main>

    <h2>Open Positions</h2>

    <!-- Search Bar -->
    <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
        <input type="text" name="s" placeholder="Search for positions" value="<?php echo get_search_query(); ?>">
        <button type="submit">Search</button>
    </form>

    <?php
    // Get search query
    $search_query = sanitize_text_field($_GET['s']);

    // Perform search query
    $args = array(
        'post_type' => 'open_positions', // Replace with your custom post type
        'posts_per_page' => -1, // Display all positions
        's' => $search_query, // Search query
    );

    $search_results = new WP_Query($args);

    if ($search_results->have_posts()) : ?>
        <ul class="position-list">
            <?php while ($search_results->have_posts()) : $search_results->the_post(); ?>
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
    elseif ($search_query) : ?>
        <p>No positions found for '<?php echo $search_query; ?>'</p>
    <?php else : ?>
        <p>No open positions currently available.</p>
    <?php endif; ?>

</main>

<?php get_footer(); ?>

