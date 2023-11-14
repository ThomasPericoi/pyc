<?php
$labels = [
    'name' => __('Academy', 'pyc'),
    'singular_name' => __('Academy item', 'pyc'),
    'add_new' => __('Add', 'pyc'),
    'add_new_item' => __('Add an academy item', 'pyc'),
    'edit_item' => __('Edit the academy item', 'pyc'),
    'new_item' => __('New academy item', 'pyc'),
    'view_item' => __('View the academy item', 'pyc'),
    'search_items' => __('Search a academy item', 'pyc'),
    'not_found' =>  __('No academy item found.', 'pyc'),
    'all_items' => __('All academy item', 'pyc'),
    'not_found_in_trash' => __('No academy item found in the trash.', 'pyc'),
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
    'has_archive' => true,
    'rewrite' => ['slug' => 'academy', 'with_front' => false],
    'menu_position' => 6,
    'menu_icon' => 'dashicons-awards',
];

register_post_type('academy', $args);
