<?php get_header(); ?>

<?php get_template_part(
    'template-parts/hero',
    'full',
    array(
        'id' => "page-hero",
        'title' => get_field('page_title') ?: get_the_title(),
        'description' => get_field('page_description'),
        'button_1' => get_field('page_button_1'),
        'button_2' => get_field('page_button_2'),
        'cover' => get_field("page_cover"),
        'cover_image' => get_field("page_image"),
        'cover_video' => get_field("page_video"),
    )
); ?>

<?php the_content(); ?>

<?php get_footer(); ?>