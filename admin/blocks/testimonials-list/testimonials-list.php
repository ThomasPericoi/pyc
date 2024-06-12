<?php

/**
 * Testimonials List Block Template.
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

$classes = array('testimonials-list-block');
$classes  = implode(' ', $classes);
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}

$styles = array("background: var(--" . $background . ")");
$style  = implode('; ', $styles);
?>

<!-- Block - Testimonials list -->
<section class="<?php echo esc_attr($classes); ?>" style="<?php echo esc_attr($style); ?>">
    <div class="container container-sm">
        <?php if ($title) : ?>
            <h2><?php echo $title; ?></h2>
        <?php endif; ?>
        <?php if ($subtitle) : ?>
            <p class="subtitle"><?php echo $subtitle; ?></p>
        <?php endif; ?>
        <div class="testimonials">
            <?php if (have_rows('testimonials_elements')) : ?>
                <?php while (have_rows('testimonials_elements')) : the_row();
                    $content = get_sub_field('content');
                    $person = get_sub_field('person');
                    $logo = get_sub_field('logo'); ?>
                    <?php if ($content) : ?>
                        <div class="testimonial">
                            <?php echo $content; ?>
                            <div class="person">
                                <?php if ($person) : ?>
                                    <div class="id h4-size">
                                        <?php echo $person; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ($logo) : ?>
                                    <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endwhile ?>
            <?php endif; ?>
        </div>
    </div>
</section>