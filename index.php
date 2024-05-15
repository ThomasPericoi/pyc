<?php get_header(); ?>

<?php
$slug = get_page_by_path('blog');
if (is_category()) :
    $title = single_cat_title('', false);
    $description = category_description();
elseif (is_tag()) :
    $title = single_tag_title('', false);
    $description = tag_description();
else :
    $title = get_field('page_title', $slug->ID);
    $description = get_field('page_description', $slug->ID);
endif;
?>

<?php get_template_part(
    'template-parts/hero',
    'full',
    array(
        'id' => "index-hero",
        'title' => $title,
        'description' => $description,
        'button_1' => get_field('page_button_1', $slug->ID),
        'button_2' => get_field('page_button_2', $slug->ID),
        'cover' => get_field("page_cover", $slug->ID),
        'cover_image' => get_field("page_image", $slug->ID),
        'cover_video' => get_field("page_video", $slug->ID),
        'cover_video_poster' => get_field("page_video_poster", $slug->ID),
    )
); ?>

<!-- Content -->
<section>
    <div class="container">

        <div class="categories">
            <?php
            $categories = get_categories(array(
                'orderby' => 'name',
                'order'   => 'ASC'
            ));
            foreach ($categories as $category) {
                echo '<a class="btn btn-secondary" href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>';
            }
            ?>
        </div>

        <?php if (have_posts()) : ?>

            <div class="post-grid grid-3 posts">
                <?php
                while (have_posts()) : the_post(); ?>
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
                <?php endwhile; ?>
            </div>
            <?php the_posts_pagination(); ?>
        <?php else : echo __('No post were found.', 'rhever');
        endif; ?>
    </div>
</section>

<?php get_footer(); ?>