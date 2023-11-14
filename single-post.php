<?php get_header(); ?>

<!-- Hero -->
<?php
$title = get_the_title();
$description = get_the_excerpt();
$cover_image = get_field("page_image");
?>
<section id="single-post-hero">
    <div class="container container-sm">
        <?php
        $cat = get_the_category();
        $cat_name = $cat[0]->cat_name;
        $cat_link = get_category_link($cat[0]->cat_ID);
        ?>
        <?php if ($cat) : ?>
            <a href="<?php echo $cat_link; ?>" class="category"><?php echo $cat_name; ?></a>
        <?php endif; ?>
        <h1><?php echo $title; ?></h1>
        <?php if ($description) : ?>
            <p class="description"><?php echo $description; ?></p>
        <?php endif; ?>
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail("full", array('class' => 'cover')); ?>
        <?php endif; ?>
    </div>
</section>

<section id="content">
    <div class="container container-sm formatted">
        <?php the_content(); ?>
    </div>
</section>

<?php $related = get_posts(array(
    'numberposts' => 3,
    'post__not_in' => array($post->ID)
)); ?>

<section id="related">
    <div class="container">
        <div class="post-grid grid-3 posts">
            <?php foreach ($related as $post) :
                setup_postdata($post); ?>
                <?php
                $categories = get_the_category();
                $category_name = $categories[0]->cat_name;
                ?>
                <a href="<?php esc_url(the_permalink()); ?>" class="grid-element post">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="image">
                            <?php the_post_thumbnail(); ?>
                        </div>
                    <?php endif; ?>
                    <div class="content">
                        <h2 class="h4-size"><?php echo get_the_title(); ?></h2>
                        <?php if ($categories) : ?>
                            <span class="category"><?php echo __("Posted in ", "pyc"); ?><?php echo $category_name; ?></span>
                        <?php endif; ?>
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
<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>