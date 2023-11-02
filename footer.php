</main>

<!-- Footer -->
<?php $locations = get_nav_menu_locations();
$button = get_field('footer_button', 'option'); ?>
<footer id="footer">
    <div id="main-footer">
        <div class="container">
            <?php
            if (function_exists('the_custom_logo')) {
                the_custom_logo();
            }
            ?>
            <div class="menu menu-sub-footer">
                <h3 class="h5-size"><?php echo wp_get_nav_menu_object($locations['sub-footer-menu-1'])->name; ?></h3>
                <?php wp_nav_menu(array('theme_location' => 'sub-footer-menu-1', 'container' => false, 'depth' => 1)); ?>
            </div>
            <div class="menu menu-sub-footer">
                <h3 class="h5-size"><?php echo wp_get_nav_menu_object($locations['sub-footer-menu-2'])->name; ?></h3>
                <?php wp_nav_menu(array('theme_location' => 'sub-footer-menu-2', 'container' => false, 'depth' => 1)); ?>
            </div>
            <div class="menu menu-sub-footer">
                <h3 class="h5-size"><?php echo wp_get_nav_menu_object($locations['sub-footer-menu-3'])->name; ?></h3>
                <?php wp_nav_menu(array('theme_location' => 'sub-footer-menu-3', 'container' => false, 'depth' => 1)); ?>
            </div>
            <?php if ($button) :
                $button_url = $button['url'];
                $button_title = $button['title'];
                $button_target = $button['target'] ? $button['target'] : '_self';
            ?>
                <a href="<?php echo $button_url; ?>" target="<?php echo $button_target; ?>" class="btn btn-primary"><?php echo $button_title; ?></a>
            <?php endif; ?>
        </div>
    </div>
    <div id="sub-footer">
        <div class="container">
            <!-- OpenDyslexic Toggle -->
            <div class="dyslexic-toggle">
                <input type="checkbox" id="open-dyslexic" name="open-dyslexic" class="screen-reader-only" />
                <label for="open-dyslexic"><?php echo __('Enable OpenDyslexic', 'pyc'); ?></label>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>