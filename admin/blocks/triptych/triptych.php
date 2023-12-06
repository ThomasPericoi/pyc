<?php

/**
 * Triptych Block Template.
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

$classes = array('triptych-block');
$classes  = implode(' ', $classes);
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}

$styles = array("background: var(--" . $background . ")");
$style  = implode('; ', $styles);
?>

<!-- Block - Logos grid -->
<section class="<?php echo esc_attr($classes); ?>" style="<?php echo esc_attr($style); ?>">
    <div class="container">
        <?php if ($title) : ?>
            <h2><?php echo $title; ?></h2>
        <?php endif; ?>
        <?php if ($subtitle) : ?>
            <p class="subtitle"><?php echo $subtitle; ?></p>
        <?php endif; ?>
        <?php
        if (have_rows('elements')) : ?>
            <div class="grid">
                <?php while (have_rows('elements')) : the_row();
                    $title = get_sub_field('title');
                    $text = get_sub_field('text');
                    $image = get_sub_field('image'); ?>
                    <div class="element">
                        <?php if ($title) : ?>
                            <h3><?php echo $title; ?></h3>
                        <?php endif; ?>
                        <?php if ($text) : ?>
                            <p><?php echo $text; ?></p>
                        <?php endif; ?>
                        <?php if ($image) : ?>
                            <div class="media">
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>