<?php /* Template Name: Simple page (no block) */
get_header(); ?>

<?php get_template_part(
    'template-parts/hero',
    'full',
    array(
        'id' => "page-hero",
    )
); ?>

<section id="content">
    <div class="container formatted">
        <?php the_content(); ?>
    </div>
</section>

<?php get_footer(); ?>