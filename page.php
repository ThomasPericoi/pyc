<?php get_header(); ?>

<?php get_template_part(
    'template-parts/hero',
    'full',
    array(
        'id' => "page-hero",
    )
); ?>

<?php the_content(); ?>

<?php get_footer(); ?>