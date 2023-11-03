<?php

/**
 * Logos Grid Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

$classes = 'logos-grid-block';
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}

$title = get_field('title');
$subtitle = get_field('subtitle');

$styles = array("");
$style  = implode('; ', $styles);
?>

<!-- Block - Logos grid -->
<div class="<?php echo esc_attr($classes); ?>" style="<?php echo esc_attr($style); ?>">
    <div class="container container-sm">
        <?php if ($title) : ?>
            <h2><?php echo $title; ?></h2>
        <?php endif; ?>
        <?php if ($subtitle) : ?>
            <p class="subtitle"><?php echo $subtitle; ?></p>
        <?php endif; ?>
        <?php
        $logos = get_field('logos');
        if ($logos) : ?>
            <div class="logos">
                <?php foreach ($logos as $logos_id) : ?>
                    <?php echo wp_get_attachment_image($logos_id, "full"); ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>