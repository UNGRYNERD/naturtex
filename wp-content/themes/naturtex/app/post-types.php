<?php
namespace App;

add_action('init', function () {
    $args = array(
        'label'                 => __('Projects', 'naturtex'),
        'supports'              => array('title', 'editor', 'thumbnail'),
        'taxonomies'            => array('un_project_type'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-camera',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'rewrite'               => array(
            'slug'                  => 'projects',
            'with_front'            => true,
            'pages'                 => true,
            'feeds'                 => false,
        ),
        'capability_type'       => 'page',
    );
    register_post_type('un_project', $args);
}, 0);

add_action('init', function () {
    $args = array(
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => false,
        'rewrite'                    => array(
            'slug'                       => 'project-type',
            'with_front'                 => true,
            'hierarchical'               => false,
        )
    );
    register_taxonomy('un_project_type', array('un_project'), $args);
});

add_action('init', function () {
    $args = array(
        'label'                 => __('Fabrics', 'naturtex'),
        'supports'              => array('title', 'editor', 'thumbnail'),
        'taxonomies'            => array('un_fabric_material'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-heart',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'rewrite'               => array(
            'slug'                  => 'fabrics',
            'with_front'            => true,
            'pages'                 => true,
            'feeds'                 => false,
        ),
        'capability_type'       => 'page',
    );
    register_post_type('un_fabric', $args);
}, 0);


add_action('init', function () {
    $args = array(
        'hierarchical'               => true,
        'public'                     => true,
        'labels'                     => array(
            'name'                   => __('Materials', 'naturtex'),
            'singular_name'          => __('Material', 'naturtex')
        ),
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => false,
        'rewrite'                    => array(
            'slug'                       => 'project-type',
            'with_front'                 => true,
            'hierarchical'               => false,
        )
    );
    register_taxonomy('un_fabric_material', array('un_fabric'), $args);
});