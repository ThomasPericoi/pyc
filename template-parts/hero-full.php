<!-- Hero -->
<?php
$title = get_field('page_title') ?: get_the_title();
$description = get_field('page_description') ?: get_the_excerpt();
$button_1 = get_field('page_button_1');
$button_2 = get_field('page_button_2');
$cover = get_field("page_cover");
$cover_image = get_field("page_image");
$cover_video = get_field("page_video");
?>
<section id="<?php echo $args['id']; ?>">
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