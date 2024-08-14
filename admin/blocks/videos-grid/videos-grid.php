<?php

/**
 * Videos Grid Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

$background = get_field('background');

$classes = array('videos-grid-block');
$classes  = implode(' ', $classes);
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}

$styles = array("background: var(--" . $background . ")");
$style  = implode('; ', $styles);
?>

<!-- Block - Videos Grid -->
<section class="<?php echo esc_attr($classes); ?>" style="<?php echo esc_attr($style); ?>">
    <div class="container">
        <?php
        if (have_rows('videos')) : ?>
            <div class="grid videos">
                <?php while (have_rows('videos')) : the_row();
                    $video = get_sub_field('video'); ?>
                    <div class="media">
                        <div class="video-wrapper cover">
                            <video src="<?php echo $video; ?>" playsinline tabindex="0">
                            </video>
                            <div class="play"></div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>