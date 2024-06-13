<?php

/**
 * Pricing Block Template.
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
$list_style = get_field('list_style');

$classes = array('pricing-block', $list_style);
$classes  = implode(' ', $classes);
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}

$styles = array("background: var(--" . $background . ")");
$style  = implode('; ', $styles);
?>

<!-- Block - Pricing -->
<section class="<?php echo esc_attr($classes); ?>" style="<?php echo esc_attr($style); ?>">
    <div class="container">
        <?php if ($title) : ?>
            <h2><?php echo $title; ?></h2>
        <?php endif; ?>
        <?php if ($subtitle) : ?>
            <p class="subtitle"><?php echo $subtitle; ?></p>
        <?php endif; ?>
        <?php if (have_rows('tables')) : ?>
            <button id="price-toggle" class="btn btn-primary" data-toggle="year" onclick="this.blur();">
                <span id="price-month-button"><?php echo __("Switch to yearly pricing") ?></span>
                <span id="price-year-button"><?php echo __("Switch to monthly pricing") ?></span>
            </button>
            <div class="grid tables">
                <?php while (have_rows('tables')) : the_row();
                    $title = get_sub_field('title');
                    $subtitle = get_sub_field('subtitle');
                    $image = get_sub_field('image');
                    $price_month = get_sub_field('price_month');
                    $price_year = get_sub_field('price_year');
                    $button = get_sub_field('button');
                ?>
                    <div class="element table">
                        <div class="header">
                            <?php if ($title) : ?>
                                <h3 class="title"><?php echo $title; ?></h3>
                            <?php endif; ?>
                            <?php if ($subtitle) : ?>
                                <p><?php echo $subtitle; ?></p>
                            <?php endif; ?>
                        </div>
                        <?php if ($image) : ?>
                            <div class="icon">
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            </div>
                        <?php endif; ?>
                        <?php if ($price_month) : ?>
                            <div id="price-month" class="price">
                                <p class="price_price"><?php echo $price_month; ?></p>
                                <p class="price_label"><?php echo __("per month", "pyc"); ?></p>
                            </div>
                        <?php endif; ?>
                        <?php if ($price_year) : ?>
                            <div id="price-year" class="price">
                                <p class="price_price"><?php echo $price_year; ?></p>
                                <p class="price_label"><?php echo __("per year", "pyc"); ?></p>
                            </div>
                        <?php endif; ?>
                        <?php if (have_rows('features')) : ?>
                            <ul class="features">
                                <?php while (have_rows('features')) : the_row();
                                    $title = get_sub_field('title'); ?>
                                    <li>
                                        <div class="inner-feature">
                                            <h4 class="h5-size"><?php echo $title; ?></h4>
                                            <?php if (have_rows('bulletpoints')) : ?>
                                                <?php while (have_rows('bulletpoints')) : the_row();
                                                    $content = get_sub_field('content');
                                                    $link = get_sub_field('link');
                                                    $display = get_sub_field('display'); ?>
                                                    <a class="bulletpoint <?php echo $display; ?>" <?php if ($link) : ?>href="<?php echo $link; ?>" <?php endif; ?>>
                                                        <?php echo $content; ?>
                                                    </a>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                        </div>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                        <?php if ($button) : ?>
                            <a href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>" class="btn btn-primary"><?php echo $button['title']; ?></a>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>