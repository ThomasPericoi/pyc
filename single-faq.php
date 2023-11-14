<?php get_header(); ?>

<!-- Hero -->
<?php
$title = get_the_title();
$description = get_the_excerpt();
?>
<section id="single-faq-hero">
    <div class="container container-sm">
        <h1><?php echo $title; ?></h1>
        <?php if ($description) : ?>
            <p class="description"><?php echo $description; ?></p>
        <?php endif; ?>
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail("full", array('class' => 'cover')); ?>
        <?php endif; ?>
    </div>
</section>

<!-- Content -->
<section id="content">
    <div class="container container-sm formatted">
        <?php the_content(); ?>
    </div>
</section>

<!-- Related -->
<?php $related = get_posts(array(
    'numberposts' => 3,
    'post_type' => 'faq',
    'post__not_in' => array($post->ID)
)); ?>

<?php if ($related) : ?>
    <section id="related">
        <div class="container">
            <h2><?php echo __("Latest Frequently Asked Questions", "pyc"); ?></h2>
            <div class="post-grid grid-3 faq">
                <?php foreach ($related as $post) :
                    setup_postdata($post); ?>
                    <a href="<?php esc_url(the_permalink()); ?>" class="grid-element faq">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="image">
                                <?php the_post_thumbnail(); ?>
                            </div>
                        <?php endif; ?>
                        <div class="content">
                            <h2 class="h4-size"><?php echo get_the_title(); ?></h2>
                            <?php if (has_excerpt()) : ?>
                                <p><?php echo get_the_excerpt(); ?></p>
                            <?php endif; ?>
                            <div class="label"><?php echo __("Learn", "pyc"); ?></div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>