<?php get_header(); ?>

<?php get_template_part(
    'template-parts/hero',
    'full',
    array(
        'id' => "index-hero",
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