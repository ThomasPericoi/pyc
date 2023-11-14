<?php get_header(); ?>

<?php get_template_part(
    'template-parts/hero',
    'full',
    array(
        'id' => "single-feature-hero",
    )
); ?>

<?php the_content(); ?>

<?php get_footer(); ?>