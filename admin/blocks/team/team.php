<?php

/**
 * Team Block Template.
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

$classes = array('team-block');
$classes  = implode(' ', $classes);
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}

$styles = array("background: var(--" . $background . ")");
$style  = implode('; ', $styles);
?>

<!-- Block - Team -->
<section class="<?php echo esc_attr($classes); ?>" style="<?php echo esc_attr($style); ?>">
    <div class="container container-sm">
        <?php if ($title) : ?>
            <h2><?php echo $title; ?></h2>
        <?php endif; ?>
        <?php if ($subtitle) : ?>
            <p class="subtitle"><?php echo $subtitle; ?></p>
        <?php endif; ?>
        <?php
        if (have_rows('members')) : ?>
            <div class="grid members">
                <?php while (have_rows('members')) : the_row();
                    $name = get_sub_field('name');
                    $position = get_sub_field('position');
                    $portrait = get_sub_field('portrait'); ?>
                    <div class="element member">
                        <?php if ($portrait) : ?>
                            <div class="portrait" style="background-image: url('<?php echo $portrait; ?>');"></div>
                        <?php endif; ?>
                        <?php if ($name) : ?>
                            <h3 class="h4-size"><?php echo $name; ?></h3>
                        <?php endif; ?>
                        <?php if ($position) : ?>
                            <p><?php echo $position; ?></p>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>