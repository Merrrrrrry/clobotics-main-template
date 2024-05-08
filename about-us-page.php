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

<!-- Hero Section WITHOUT navbar -->

<div class="hero-section">
        <!-- <div class="navbar">
            <a class="home" href="<  ?php echo get_permalink(get_page_by_path('home')) ?>" style="order: -1;">Home</a>
            <a href="<  ?php echo get_permalink(get_page_by_path('contact')) ?>">Contacts</a>
            <a href="<  ?php echo get_permalink(get_page_by_path('faq')) ?>">FAQ</a>
            <a href="<  ?php echo get_permalink(get_page_by_path('services')) ?>">Services</a>
        </div> -->


<!-- Hero Video (referenced from busters world) -->
<div class="hero-section-background">
    <video autoplay muted loop class="video-background"> 
        <source src="<?php echo get_template_directory_uri(); ?>/video/video-top.mp4" type="video/mp4">
    </video>

</div>

    <div class="hero-section-content">
        <h1 class="hero page-title"> Meet Clobotics - vision technology company with offices all around the world </h1>
        <p class="hero page-slogan"> </p>
    </div>
</div>



<!-- Article Section -->
<!-- Who we are -->

<div class="article_main who-we-are">

    <h2 class="article_title article_title_who_we_are"><?php get_field('article_title_who_we_are'); ?></h2>
    <p class="subtitle_of_article subtitle_of_article_who_we_are"><?php get_field('subtitle_of_article_who_we_are'); ?></p>
    <p class="article_text_who_we_are"><?php get_field('article_text_who_we_are'); ?></p>
        <a href="<?php echo get_permalink('  ............  ') ?>" class="button_blue">Video presentation</a>
        <img class="about-us-page who-we-are-img left" src="  ............  " alt=""> 
        <img class="about-us-page who-we-are-img right" src="  ............  " alt=""> 
</div>








 


</body>
    <?php endwhile; ?>

</main>
<?php get_footer(); ?>
