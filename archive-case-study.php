<?php get_header(); ?>

<?php
$title = get_field('archive_case_study_title', 'option') ?: __("Case studies", "pyc");
$description = get_field('archive_case_study_description', 'option');
?>

<?php get_template_part(
    'template-parts/hero',
    'full',
    array(
        'id' => "archive-academy-hero",
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

            <div class="post-grid grid-3 case-study">
                <?php
                while (have_posts()) : the_post(); ?>
                    <a href="<?php esc_url(the_permalink()); ?>" class="grid-element">
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
                            <div class="label"><?php echo __("Read more", "pyc"); ?></div>
                        </div>
                    </a>
                <?php endwhile; ?>
            </div>
            <?php the_posts_pagination(); ?>
        <?php else : echo __('No case studies were found.', 'rhever');
        endif; ?>
    </div>
</section>

<?php get_footer(); ?>