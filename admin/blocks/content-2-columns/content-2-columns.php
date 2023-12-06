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
$button = get_field('button');
$media = get_field("media");
$image = get_field("image");
$video = get_field("video");

$background = get_field('background');
$order = get_field('order');
$button_style = get_field('button_style');

$classes = array('content-2-columns-block', $order);
$classes  = implode(' ', $classes);
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}

$styles = array("background: var(--" . $background . ")");
$style  = implode('; ', $styles);
?>

<!-- Block - Content (2 columns) -->
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
                <?php if ($button) : ?>
                    <a href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>" class="btn <?php echo $button_style; ?>"><?php echo $button['title']; ?></a>
                <?php endif; ?>
            </div>
            <?php if ($image || $video) : ?>
                <div class="media">
                    <?php if (($media == "image") && $image) : ?>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                    <?php elseif (($media == "video") && $video) : ?>
                        <div class="video-wrapper cover">
                            <video src="<?php echo $video; ?>" loop playsinline tabindex="0">
                            </video>
                            <div class="play"></div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>