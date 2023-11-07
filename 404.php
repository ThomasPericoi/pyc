<?php get_header(); ?>

<!-- Hero -->
<section id="not-found-hero">
    <div class="container container-sm">
        <h1><?php echo __("You seem lost...", "pyc"); ?></h1>
        <p class="description"><?php echo __("You need to find your way back!", "pyc"); ?></p>
        <div class="btn-wrapper">
            <a href="<?php echo get_home_url(); ?>" class="btn btn-lg btn-primary"><?php echo __("Go back to the homepage", "pyc"); ?></a>
        </div>
    </div>
</section>

<?php get_footer(); ?>