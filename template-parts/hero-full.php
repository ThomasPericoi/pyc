<!-- Hero -->
<section id="<?php echo $args['id']; ?>">
    <div class="container container-sm">
        <h1><?php echo $args['title']; ?></h1>
        <?php if ($args['description']) : ?>
            <p class="description"><?php echo $args['description']; ?></p>
        <?php endif; ?>
        <?php if ($args['button_1'] || $args['button_2']) : ?>
            <div class="btn-wrapper">
                <?php if ($args['button_1']) :
                    $button_1_url = $args['button_1']['url'];
                    $button_1_title = $args['button_1']['title'];
                    $button_1_target = $args['button_1']['target'] ? $args['button_1']['target'] : '_self';
                ?>
                    <a href="<?php echo $button_1_url; ?>" target="<?php echo $button_1_target; ?>" class="btn btn-lg btn-outline-light"><?php echo $button_1_title; ?></a>
                <?php endif; ?>
                <?php if ($args['button_2']) :
                    $button_2_url = $args['button_2']['url'];
                    $button_2_title = $args['button_2']['title'];
                    $button_2_target = $args['button_2']['target'] ? $args['button_2']['target'] : '_self';
                ?>
                    <a href="<?php echo $button_2_url; ?>" target="<?php echo $button_2_target; ?>" class="btn btn-lg btn-primary"><?php echo $button_2_title; ?></a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <?php if (have_rows('home_certifications')) : ?>
            <div class="certifications">
                <?php while (have_rows('home_certifications')) : the_row();
                    $link = get_sub_field('landing_page');
                    $image = get_sub_field('badge_url'); ?>
                    <a href="<?php echo $link; ?>" target="_blank" class="certification"> <img src="<?php echo $image; ?>" /> </a>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        <?php if (($args['cover_image'] || $args['cover_video'])) : ?>
            <?php if (($args['cover'] == "image") && !empty($args['cover_image'])) : ?>
                <img src="<?php echo esc_url($args['cover_image']['url']); ?>" alt="<?php echo esc_attr($args['cover_image']['alt']); ?>" class="cover" />
            <?php elseif (($args['cover'] == "video") && $args['cover_video']) : ?>
                <div class="video-wrapper cover">
                    <video src="<?php echo $args['cover_video']["url"]; ?>" playsinline tabindex="0" <?php if ($args['cover_video_poster']) : ?>poster="<?php echo $args['cover_video_poster']['url']; ?>" <?php endif; ?>>
                    </video>
                    <div class="play"></div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</section>
