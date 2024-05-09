<?php
/*
Template Name: Career
*/
?>

<?php get_header(); ?>

<main>

    <h2>Open Positions</h2>

     <!-- Search bar -->
    <div class="search-bar">
        <form method="get" action="">
            <input type="text" name="search_query" id="search-input" placeholder="Search...">
            <button type="submit">Search</button>
        </form>
    </div>

    <!-- Filters -->
    <div class="filters">
        <form method="get" action="">
            <label for="sector">Sector:</label>
            <select name="sector" id="sector">
                <option value="">All</option>
                <option value="wind">Wind</option>
                <option value="retail">Retail</option>
            </select>
            <label for="region">Region:</label>
            <select name="region" id="region">
                <option value="">All</option>
                <option value="americas">Americas</option>
                <option value="europe">Europe</option>
                <option value="asia">Asia</option>
                <option value="africa">Africa</option>
                <option value="middle_east">Middle East</option>
            </select>
            <label for="job_type">Job Type:</label>
            <select name="job_type" id="job_type">
                <option value="">All</option>
                <option value="full_time">Full-time</option>
                <option value="part_time">Part-time</option>
            </select>
            <button type="submit">Apply Filters</button>
        </form>
    </div>

    <!-- Job Positions -->
    <?php
   // Retrieve search query from URL parameter
$search_query = isset($_GET['search_query']) ? sanitize_text_field($_GET['search_query']) : '';

// Retrieve filter values from URL parameters
$sector = isset($_GET['sector']) ? sanitize_text_field($_GET['sector']) : '';
$region = isset($_GET['region']) ? sanitize_text_field($_GET['region']) : '';
$job_type = isset($_GET['job_type']) ? sanitize_text_field($_GET['job_type']) : '';

// Query job positions based on search query and filters
$args = array(
    'post_type' => 'open-position',
    'posts_per_page' => -1, 
    's' => $search_query, // Search query
    'meta_query' => array(
        'relation' => 'AND', // Combine multiple meta queries with AND
        array(
            'key' => 'sector_career',
            'value' => $sector,
            'compare' => '='
        ),
        array(
            'key' => 'region_career',
            'value' => $region,
            'compare' => '='
        ),
        array(
            'key' => 'job_type',
            'value' => $job_type,
            'compare' => '='
        )
    )
);

$related_positions = new WP_Query($args);


    if ($related_positions->have_posts()) :
        ?>
        <ul class="position-list">
            <?php while ($related_positions->have_posts()) : $related_positions->the_post(); ?>
                <li class="position-item">
                    <h3><?php the_field('job_title'); ?></h3>
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
        wp_reset_postdata();
    else :
        // Display all positions if no filters are applied
        if (empty($search_query) && empty($sector) && empty($region) && empty($job_type)) {
            $all_positions = new WP_Query(array(
                'post_type' => 'open-position',
                'posts_per_page' => -1,
            ));
            if ($all_positions->have_posts()) :
                ?>
                <ul class="position-list">
                    <?php while ($all_positions->have_posts()) : $all_positions->the_post(); ?>
                        <li class="position-item">
                            <h3><?php the_field('job_title'); ?></h3>
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
                wp_reset_postdata();
            else :
                echo '<p>No open positions found.</p>';
            endif;
        } else {
            echo '<p>No open positions found for the selected criteria.</p>';
        }
    endif;
    ?>

</main>

<?php get_footer(); ?>
