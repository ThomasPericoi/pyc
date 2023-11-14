<?php get_header(); ?>

<?php
if (is_category()) :
    $title = single_cat_title('', false);
    $description = category_description();
elseif (is_tag()) :
    $title = single_tag_title('', false);
    $description = tag_description();
else :
    $title = get_field('page_title') ?: get_the_title();
    $description = get_field('page_description') ?: get_the_excerpt();
endif;
?>

<?php get_template_part(
    'template-parts/hero',
    'full',
    array(
        'id' => "index-hero",
        'title' => $title,
        'description' => $description,
        'button_1' => get_field('page_button_1'),
        'button_2' => get_field('page_button_2'),
        'cover' => get_field("page_cover"),
        'cover_image' => get_field("page_image"),
        'cover_video' => get_field("page_video"),
    )
); ?>

<!-- Content -->
<section>
    <div class="container">
        <?php if (have_posts()) : ?>

            <div class="post-grid grid-3 posts">
                <?php
                while (have_posts()) : the_post(); ?>
                    <?php
                    $categories = get_the_category();
                    $category_name = $categories[0]->cat_name;
                    ?>
                    <a href="<?php esc_url(the_permalink()); ?>" class="grid-element post">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="image">
                                <?php the_post_thumbnail(); ?>
                            </div>
                        <?php endif; ?>
                        <div class="content">
                            <h2 class="h4-size"><?php echo get_the_title(); ?></h2>
                            <?php if ($categories) : ?>
                                <span class="category"><?php echo __("Posted in ", "pyc"); ?><?php echo $category_name; ?></span>
                            <?php endif; ?>
                            <?php if (has_excerpt()) : ?>
                                <p><?php echo get_the_excerpt(); ?></p>
                            <?php endif; ?>
                            <div class="label"><?php echo __("Read more", "pyc"); ?></div>
                        </div>
                    </a>
                <?php endwhile; ?>
            </div>
            <?php the_posts_pagination(); ?>
        <?php else : echo __('No post were found.', 'rhever');
        endif; ?>
    </div>
</section>

<?php get_footer(); ?>