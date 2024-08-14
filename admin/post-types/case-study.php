<?php
$labels = [
    'name' => __('Case Studies', 'pyc'),
    'singular_name' => __('Case Study', 'pyc'),
    'add_new' => __('Add', 'pyc'),
    'add_new_item' => __('Add a case study', 'pyc'),
    'edit_item' => __('Edit the case study', 'pyc'),
    'new_item' => __('New case study', 'pyc'),
    'view_item' => __('View the case study', 'pyc'),
    'search_items' => __('Search a case study', 'pyc'),
    'not_found' =>  __('No case study found.', 'pyc'),
    'all_items' => __('All case studies', 'pyc'),
    'not_found_in_trash' => __('No case study found in the trash.', 'pyc'),
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
    'rewrite' => ['slug' => 'case-study', 'with_front' => false],
    'menu_position' => 6,
    'menu_icon' => 'dashicons-search',
];

register_post_type('case-study', $args);
