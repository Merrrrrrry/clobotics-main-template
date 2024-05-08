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

<!-- Hero Video (referenced from busters world) -->

<div class="hero-section-background">
<video autoplay muted loop class="video-background"> 
    <source src="<?php echo get_template_directory_uri(); ?>/video/video-top.mp4" type="video/mp4">
</video>

<!-- Hero Section with navbar -->

<div class="hero-section"   style="background-image: <?php $image = get_field('hero_video'); ?> url('<?php echo esc_url($image["url"]); ?>'); background-size: cover; background-position: center; height: 100vh;">
        <div class="navbar">
            <a class="home" href="<?php echo get_permalink(get_page_by_path('home')) ?>" style="order: -1;">Home</a>
            <a href="<?php echo get_permalink(get_page_by_path('contact')) ?>">Contacts</a>
            <a href="<?php echo get_permalink(get_page_by_path('faq')) ?>">FAQ</a>
            <a href="<?php echo get_permalink(get_page_by_path('services')) ?>">Services</a>
        </div>

    </div>
    <div class="hero-content">
        <h1 class="hero-text"><?php the_field('hero_text'); ?></h1>
        <p class="hero-slogan"><?php the_field('hero_slogan'); ?></p>
    </div>
</div>


<!-- Article Section -->

<div class="article_main">
        <h2>Article title</h2>
        <p>dolor sit amet, consectetur. adipiscing elit. Sed tincidunt velit nec mauriscursus, id venenatis justo convallis. Fusce vusto nec felis efficitur laoreet. Quisque velest id elit varius eleifend. Sed ac justo id nisi elementum fermentum. Praesent nec ultrices ex, vel bibendum justo. Curabitur tinciduntLorem ipsum dolor sit amet, consecteturadipiscing elit. Sed tincidunt velit nec mauriscursus, id venenatis justo convallis. Fusce velusto nec felis efficitur laoreet. Quisque veest id elit varius eleifend. Sed ac justo id nisielementum fermentum. Praesent nec ultricesex, vel bibendum justo. 
        </p>
        <a href="<?php echo get_permalink( get_page_by_path( 'services' ) ) ?>" class="button_yellow">Our products and servides</a>
        <img src="....." alt=""> 
    </div>






 


</body>
    <?php endwhile; ?>

</main>
<?php get_footer(); ?>
