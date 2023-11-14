<?php
$labels = [
    'name' => __('Features', 'pyc'),
    'singular_name' => __('Feature', 'pyc'),
    'add_new' => __('Add', 'pyc'),
    'add_new_item' => __('Add a feature', 'pyc'),
    'edit_item' => __('Edit the feature', 'pyc'),
    'new_item' => __('New feature', 'pyc'),
    'view_item' => __('View the feature', 'pyc'),
    'search_items' => __('Search a feature', 'pyc'),
    'not_found' =>  __('No feature found.', 'pyc'),
    'all_items' => __('All feature', 'pyc'),
    'not_found_in_trash' => __('No feature found in the trash.', 'pyc'),
    'parent_item_colon' => __('', 'pyc'),
];

$args = [
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_rest' => true,
    'query_var' => true,
    'hierarchical' => true,
    'capability_type' => 'page',
    'supports' => [
        'title',
        'editor',
        'thumbnail',
        'excerpt',
        'custom-fields',
    ],
    'taxonomies' => [],
    'has_archive' => false,
    'rewrite' => ['slug' => 'features', 'with_front' => false],
    'menu_position' => 6,
    'menu_icon' => 'dashicons-editor-ol',
];

register_post_type('feature', $args);
