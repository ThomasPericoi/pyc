<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- Header -->
    <?php $button_1 = get_field('header_button_1', 'option');
    $button_2 = get_field('header_button_2', 'option'); ?>
    <header id="header" class="header">
        <div class="container">
            <div class="inner-header">
                <?php
                if (function_exists('the_custom_logo')) {
                    the_custom_logo();
                }
                ?>
                <?php wp_nav_menu(array('theme_location' => 'header-menu', 'menu_class' => 'menu menu-header', 'container' => false)); ?>
                <?php if ($button_1 || $button_2) : ?>
                    <div class="btn-wrapper">
                        <?php if ($button_1) :
                            $button_1_url = $button_1['url'];
                            $button_1_title = $button_1['title'];
                            $button_1_target = $button_1['target'] ? $button_1['target'] : '_self';
                        ?>
                            <a href="<?php echo $button_1_url; ?>" target="<?php echo $button_1_target; ?>" class="btn btn-outline-dark"><?php echo $button_1_title; ?></a>
                        <?php endif; ?>
                        <?php if ($button_2) :
                            $button_2_url = $button_2['url'];
                            $button_2_title = $button_2['title'];
                            $button_2_target = $button_2['target'] ? $button_2['target'] : '_self';
                        ?>
                            <a href="<?php echo $button_2_url; ?>" target="<?php echo $button_2_target; ?>" class="btn btn-primary"><?php echo $button_2_title; ?></a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <div class="menu-toggle-col">
                    <div class="menu-toggle-wrapper">
                        <input id="menu-toggle" class="menu-toggle" type="checkbox" role="button" tabindex="0" aria-label="Ouvrir le menu" />
                        <div class="menu-toggle-open" aria-hidden="true">
                            <span aria-hidden="true"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>