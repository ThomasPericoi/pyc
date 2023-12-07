<?php

/**
 * Tabs Block Template.
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

$classes = array('tabs-block');
$classes  = implode(' ', $classes);
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}

$styles = array("background: var(--" . $background . ")");
$style  = implode('; ', $styles);
?>

<!-- Block - Tabs -->
<section class="<?php echo esc_attr($classes); ?>" style="<?php echo esc_attr($style); ?>">
    <div class="container">
        <?php if ($title) : ?>
            <h2><?php echo $title; ?></h2>
        <?php endif; ?>
        <?php if ($subtitle) : ?>
            <p class="subtitle"><?php echo $subtitle; ?></p>
        <?php endif; ?>

        <div class="tabs">
            <nav>
                <?php while (have_rows('elements')) : the_row();
                    $title = get_sub_field('title'); ?>
                    <a tabindex="0" role="button" class="btn">
                        <?php echo $title; ?>
                    </a>
                <?php endwhile; ?>
            </nav>
            <div class="content-wrapper">
                <?php while (have_rows('elements')) : the_row();
                    $title = get_sub_field('title');
                    $text = get_sub_field('text');
                    $button = get_sub_field('button');
                    $image = get_sub_field('image');
                    $order = get_sub_field('order');
                    $button_style = get_sub_field('button_style'); ?>
                    <div class="content <?php echo $order; ?>">
                        <div class="col-wrapper">
                            <div class="formatted">
                                <?php if ($title) : ?>
                                    <h3><?php echo $title; ?></h3>
                                <?php endif; ?>
                                <?php echo $text; ?>
                                <?php if ($button) : ?>
                                    <a href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>" class="btn <?php echo $button_style; ?>"><?php echo $button['title']; ?></a>
                                <?php endif; ?>
                            </div>
                            <?php if ($image) : ?>
                                <div class="media">
                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>