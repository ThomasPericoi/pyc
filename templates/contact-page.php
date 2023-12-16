<?php /* Template Name: Contact page */
get_header(); ?>

<?php get_template_part(
    'template-parts/hero',
    'full',
    array(
        'id' => "contact-hero",
        'title' => get_field('contact_title') ?: get_the_title(),
        'description' => get_field('contact_description'),
        'button_1' => get_field('contact_button_1'),
        'button_2' => get_field('contact_button_2'),
        'cover' => get_field("contact_cover"),
        'cover_image' => get_field("contact_image"),
        'cover_video' => get_field("contact_video"),
        'cover_video_poster' => get_field("contact_video_poster"),
    )
); ?>

<?php $introduction = get_field('contact_introduction');
$shortcode = get_field('contact_shortcode'); ?>

<section id="contact">
    <div class="container container-sm">
        <div class="col-wrapper">
            <div class="col">
                <?php if ($shortcode) : ?>
                    <?php echo do_shortcode($shortcode); ?>
                <?php endif; ?>
            </div>
            <div class="col col-content">
                <div class="info-cards">
                    <div class="formatted">
                        <?php if ($introduction) : ?>
                            <?php echo $introduction; ?>
                        <?php endif; ?>
                    </div>
                    <?php
                    if (have_rows('contact_cards')) : ?>
                        <?php while (have_rows('contact_cards')) : the_row();
                            $title = get_sub_field('title');
                            $info = get_sub_field('info');
                            $icon = get_sub_field('icon'); ?>
                            <div class="card">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/contact-<?php echo $icon; ?>.svg" alt="<?php echo $icon; ?>">
                                <div class="content">
                                    <?php if ($title) : ?>
                                        <div class="title"><?php echo $title; ?></div>
                                    <?php endif; ?>
                                    <?php if ($info) : ?>
                                        <p><?php echo $info; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>