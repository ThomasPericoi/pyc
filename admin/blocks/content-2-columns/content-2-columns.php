<?php

/**
 * Content (2 columns) Template.
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
$content_title = get_field('content_title');
$content = get_field('content');
$image = get_field("image");

$background = get_field('background');
$order = get_field('order');

$classes = array('content-2-columns-block', $order);
$classes  = implode(' ', $classes);
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}

$styles = array("background: var(--" . $background . ")");
$style  = implode('; ', $styles);
?>

<!-- Block - Logos grid -->
<section class="<?php echo esc_attr($classes); ?>" style="<?php echo esc_attr($style); ?>">
    <div class="container container-sm">
        <?php if ($title) : ?>
            <h2><?php echo $title; ?></h2>
        <?php endif; ?>
        <?php if ($subtitle) : ?>
            <p class="subtitle"><?php echo $subtitle; ?></p>
        <?php endif; ?>
        <div class="col-wrapper">
            <div class="content formatted">
                <?php if ($content_title) : ?>
                    <h3><?php echo $content_title; ?></h3>
                <?php endif; ?>
                <?php echo $content; ?>
            </div>
            <div class="media">
                <?php if ($image) : ?>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>