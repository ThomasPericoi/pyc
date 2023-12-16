<?php get_header(); ?>

<?php get_template_part('template-parts/hero', 'full', array(
    'id' => "home-hero",
    'title' => get_field('home_title') ?: get_bloginfo("name"),
    'description' => get_field('home_description') ?: get_bloginfo("description"),
    'button_1' => get_field('home_button_1'),
    'button_2' => get_field('home_button_2'),
    'cover' => get_field("home_cover"),
    'cover_image' => get_field("home_image"),
    'cover_video' => get_field("home_video"),
    'cover_video_poster' => get_field("home_video_poster"),
)); ?>

<?php the_content(); ?>

<?php get_footer(); ?>