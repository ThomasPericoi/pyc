<?php
$labels = [
    'name' => __('FAQ', 'pyc'),
    'singular_name' => __('FAQ', 'pyc'),
    'add_new' => __('Add', 'pyc'),
    'add_new_item' => __('Add a FAQ', 'pyc'),
    'edit_item' => __('Edit the FAQ', 'pyc'),
    'new_item' => __('New FAQ', 'pyc'),
    'view_item' => __('View the FAQ', 'pyc'),
    'search_items' => __('Search a FAQ', 'pyc'),
    'not_found' =>  __('No FAQ found.', 'pyc'),
    'all_items' => __('All FAQ', 'pyc'),
    'not_found_in_trash' => __('No FAQ found in the trash.', 'pyc'),
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
    'rewrite' => ['slug' => 'faq', 'with_front' => false],
    'menu_position' => 6,
    'menu_icon' => 'dashicons-format-chat',
];

register_post_type('faq', $args);
