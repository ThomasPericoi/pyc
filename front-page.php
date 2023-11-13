<?php get_header(); ?>

<!-- Hero -->
<?php
$title = get_field('home_title') ?: get_bloginfo("name");
$description = get_field('home_description') ?: get_bloginfo("description");
$button_1 = get_field('home_button_1');
$button_2 = get_field('home_button_2');
$cover = get_field("home_cover");
$cover_image = get_field("home_image");
$cover_video = get_field("home_video");
?>
<section id="home-hero">
    <div class="container container-sm">
        <h1><?php echo $title; ?></h1>
        <p class="description"><?php echo $description; ?></p>
        <?php if ($button_1 || $button_2) : ?>
            <div class="btn-wrapper">
                <?php if ($button_1) :
                    $button_1_url = $button_1['url'];
                    $button_1_title = $button_1['title'];
                    $button_1_target = $button_1['target'] ? $button_1['target'] : '_self';
                ?>
                    <a href="<?php echo $button_1_url; ?>" target="<?php echo $button_1_target; ?>" class="btn btn-lg btn-outline-light"><?php echo $button_1_title; ?></a>
                <?php endif; ?>
                <?php if ($button_2) :
                    $button_2_url = $button_2['url'];
                    $button_2_title = $button_2['title'];
                    $button_2_target = $button_2['target'] ? $button_2['target'] : '_self';
                ?>
                    <a href="<?php echo $button_2_url; ?>" target="<?php echo $button_2_target; ?>" class="btn btn-lg btn-primary"><?php echo $button_2_title; ?></a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <?php
        if (have_rows('home_certifications')) : ?>
            <div class="certifications">
                <?php while (have_rows('home_certifications')) : the_row();
                    $link = get_sub_field('landing_page');
                    $image = get_sub_field('badge_url'); ?>
                    <a href="<?php echo $link; ?>" target="_blank" class="certification"> <img src="<?php echo $image; ?>" /> </a>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        <?php if (($cover_image || $cover_video)) : ?>
            <?php if (($cover == "image") && !empty($cover_image)) : ?>
                <img src="<?php echo esc_url($cover_image['url']); ?>" alt="<?php echo esc_attr($cover_image['alt']); ?>" class="cover" />
            <?php elseif (($cover == "video") && $cover_video) : ?>
                <div class="video-wrapper cover">
                    <video src="<?php echo $cover_video["url"]; ?>" loop playsinline tabindex="0">
                    </video>
                    <div class="play"></div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</section>

<?php the_content(); ?>

<?php get_footer(); ?>