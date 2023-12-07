<?php

/**
 * Perks Grid Block Template.
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
$button = get_field('button');

$background = get_field('background');
$button_style = get_field('button_style');

$classes = array('perks-grid-block');
$classes  = implode(' ', $classes);
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}

$styles = array("background: var(--" . $background . ")");
$style  = implode('; ', $styles);
?>

<!-- Block - Perks grid -->
<section class="<?php echo esc_attr($classes); ?>" style="<?php echo esc_attr($style); ?>">
    <div class="container container-xs">
        <?php if ($title) : ?>
            <h2><?php echo $title; ?></h2>
        <?php endif; ?>
        <?php if ($subtitle) : ?>
            <p class="subtitle"><?php echo $subtitle; ?></p>
        <?php endif; ?>
        <?php if (have_rows('elements')) : ?>
            <div class="grid perks">
                <?php while (have_rows('elements')) : the_row();
                    $icon = get_sub_field('icon');
                    $title = get_sub_field('title');
                    $text = get_sub_field('text'); ?>
                    <div class="element perk">
                        <?php if ($icon) : ?>
                            <div class="icon">
                                <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" />
                            </div>
                        <?php endif; ?>
                        <?php if ($title) : ?>
                            <p class="title"><?php echo $title; ?></p>
                        <?php endif; ?>
                        <?php if ($text) : ?>
                            <p><?php echo $text; ?></p>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        <?php if ($button) : ?>
            <a href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>" class="btn <?php echo $button_style; ?>"><?php echo $button['title']; ?></a>
        <?php endif; ?>
    </div>
</section>