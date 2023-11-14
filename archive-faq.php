<?php get_header(); ?>

<?php
$title = get_field('archive_faq_title', 'option') ?: __("FAQ", "pyc");
$description = get_field('archive_faq_description', 'option');
?>

<?php get_template_part(
    'template-parts/hero',
    'full',
    array(
        'id' => "archive-faq-hero",
        'title' => $title,
        'description' => $description,
        'button_1' => false,
        'button_2' => false,
        'cover' => false,
        'cover_image' => false,
        'cover_video' => false,
    )
); ?>

<!-- Content -->
<section>
    <div class="container">
        <?php if (have_posts()) : ?>

            <div class="post-grid grid-3 faq">
                <?php
                while (have_posts()) : the_post(); ?>
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
                            <div class="btn btn-outline-dark"><?php echo __("Learn", "pyc"); ?></div>
                        </div>
                    </a>
                <?php endwhile; ?>
            </div>
            <?php the_posts_pagination(); ?>
        <?php else : echo __('No FAQ were found.', 'rhever');
        endif; ?>
    </div>
</section>

<?php get_footer(); ?>