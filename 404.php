<?php get_header(); ?>

<!-- Hero -->
<?php
$title = get_field('404_title', 'options');
$description = get_field('404_description', 'options');
$button_label = get_field('404_button_label', 'options');
?>
<section id="not-found-hero">
    <div class="container container-sm">
        <?php if ($title) : ?>
            <h1><?php echo $title; ?></h1>
        <?php endif; ?>
        <?php if ($description) : ?>
            <p class="description"><?php echo $description; ?></p>
        <?php endif; ?>
        <?php if ($button_label) : ?>
            <div class="btn-wrapper">
                <a href="<?php echo get_home_url(); ?>" class="btn btn-lg btn-primary"><?php echo $button_label; ?></a>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>