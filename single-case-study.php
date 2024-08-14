<?php get_header(); ?>

<!-- Hero -->
<?php
$title = get_the_title();
$description = has_excerpt() ? get_the_excerpt() : false;
$hero_style = get_field("case-study_hero_style");
?>
<section id="single-post-hero" class="hero-<?php echo $hero_style; ?>" <?php if (has_post_thumbnail() && ($hero_style === "full")) : ?>style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');" <?php endif; ?>>
    <div class="container container-sm">
        <a href="<?php echo get_post_type_archive_link(get_post_type()); ?>" class="category"><?php echo get_post_type_object(get_post_type())->labels->singular_name; ?></a>
        <h1><?php echo $title; ?></h1>
        <?php if ($description) : ?>
            <p class="description"><?php echo $description; ?></p>
        <?php endif; ?>
        <?php if (has_post_thumbnail() && ($hero_style === "normal")) : ?>
            <?php the_post_thumbnail("full", array('class' => 'cover')); ?>
        <?php endif; ?>
    </div>
</section>

<!-- Content -->
<section id="content">
    <div class="container">
        <?php if (get_field("case_study_introduction")) : ?>
            <div class="introduction">
                <?php if (get_field("case_study_settings_elements")) : ?>
                    <div class="campaign-settings">
                        <h2 class="h3-size"><?php echo __("Campaign settings", "pyc"); ?></h2>
                        <?php while (have_rows('case_study_settings_elements')) : the_row();
                            $icon = get_sub_field('icon');
                            $label = get_sub_field('label'); ?>
                            <div class="element">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/<?php echo $icon; ?>.svg" alt="<?php echo $icon; ?>">
                                <div><?php echo $label; ?></div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
                <div class="formatted">
                    <?php echo get_field("case_study_introduction"); ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="content">
            <?php if (get_field("case_study_results_elements")) : ?>
                <div class="campaign-results">
                    <h2 class="h3-size"><?php echo __("Campaign results", "pyc"); ?></h2>
                    <?php while (have_rows('case_study_results_elements')) : the_row();
                        $kpi = get_sub_field('kpi');
                        $label = get_sub_field('kpi_label'); ?>
                        <div class="element">
                            <div><strong><?php echo $kpi; ?></strong></div>
                            <div><?php echo $label; ?></div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
            <div class="formatted">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>

<!-- Related -->
<?php $related = get_posts(array(
    'numberposts' => 3,
    'post_type' => 'case-study',
    'post__not_in' => array($post->ID)
)); ?>

<?php if ($related) : ?>
    <section id="related">
        <div class="container">
            <h2><?php echo __("Check out our other case studies", "pyc"); ?></h2>
            <div class="post-grid grid-3 posts">
                <?php foreach ($related as $post) :
                    setup_postdata($post); ?>
                    <a href="<?php esc_url(the_permalink()); ?>" class="grid-element post">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="image">
                                <?php the_post_thumbnail(); ?>
                            </div>
                        <?php endif; ?>
                        <div class="content">
                            <h2 class="h4-size"><?php echo get_the_title(); ?></h2>
                            <span class="category"><?php echo __("Posted in ", "pyc"); ?><?php echo get_post_type_object(get_post_type())->labels->singular_name; ?></span>
                            <?php if (has_excerpt()) : ?>
                                <p><?php echo get_the_excerpt(); ?></p>
                            <?php endif; ?>
                            <div class="label"><?php echo __("Read more", "pyc"); ?></div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>