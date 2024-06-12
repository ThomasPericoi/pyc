<?php

/**
 * Posts Grid Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

$title = get_field('title');
$subtitle = get_field('subtitle');

$background = get_field('background');

$classes = array('posts-grid-block');
$classes  = implode(' ', $classes);
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}

$styles = array("background: var(--" . $background . ")");
$style  = implode('; ', $styles);
?>

<!-- Block - Posts grid -->
<section class="<?php echo esc_attr($classes); ?>" style="<?php echo esc_attr($style); ?>">
    <div class="container">
        <?php if ($title) : ?>
            <h2><?php echo $title; ?></h2>
        <?php endif; ?>
        <?php if ($subtitle) : ?>
            <p class="subtitle"><?php echo $subtitle; ?></p>
        <?php endif; ?>
        <?php global $post;
        $blog_posts = get_field('posts_elements');
        if ($blog_posts) : ?>
            <div class="post-grid grid-3 posts">
                <?php foreach ($blog_posts as $post) :
                    setup_postdata($post); ?>
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
                <?php endforeach; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
</section>