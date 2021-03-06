<?php

namespace App;

/**
 * Add <body> classes
 */
add_filter('body_class', function (array $classes) {
    /** Add page slug if it doesn't exist */
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }

    /** Add class if sidebar is active */
    if (display_sidebar()) {
        $classes[] = 'sidebar-primary';
    }

    /** Clean up class names for custom templates */
    $classes = array_map(function ($class) {
        return preg_replace(['/-blade(-php)?$/', '/^page-template-views/'], '', $class);
    }, $classes);

    return array_filter($classes);
});

/**
 * Add "… Continued" to the excerpt
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
});

/**
 * Template Hierarchy should search for .blade.php files
 */
collect([
    'index', '404', 'archive', 'author', 'category', 'tag', 'taxonomy', 'date', 'home',
    'frontpage', 'page', 'paged', 'search', 'single', 'singular', 'attachment'
])->map(function ($type) {
    add_filter("{$type}_template_hierarchy", __NAMESPACE__.'\\filter_templates');
});

/**
 * Render page using Blade
 */
add_filter('template_include', function ($template) {
    $data = collect(get_body_class())->reduce(function ($data, $class) use ($template) {
        return apply_filters("sage/template/{$class}/data", $data, $template);
    }, []);
    if ($template) {
        echo template($template, $data);
        return get_stylesheet_directory().'/index.php';
    }
    return $template;
}, PHP_INT_MAX);

/**
 * Tell WordPress how to find the compiled path of comments.blade.php
 */
add_filter('comments_template', function ($comments_template) {
    $comments_template = str_replace(
        [get_stylesheet_directory(), get_template_directory()],
        '',
        $comments_template
);
    return template_path(locate_template(["views/{$comments_template}", $comments_template]) ?: $comments_template);
}, 100);


add_filter('get_search_form', function () {
    $form = '';
    echo template(realpath(get_template_directory() . '/views/partials/searchform.blade.php'), []);
    return $form;
});


add_filter('embed_oembed_html', function ($html, $url, $args) {
    $provider = '';
    if (preg_match("#https?://youtu\.be/.*#i", $url) || preg_match("#https?://(www\.)?youtube\.com/watch.*#i", $url)) {
        $provider = 'youtube';
    } elseif (preg_match("/vimeo.com\/([^&]+)/i", $url)) {
        $provider = 'vimeo';
    }
    elseif (preg_match("/twitch\/([^&]+)/i", $url)) {
        $provider = 'twitch';
    }
    if (!empty($provider)) {
        $html = "<div class='embed ".$provider."' >". $html . "</div>";
    }
    return $html;
}, 10, 3);

add_filter('wp_video_shortcode', function ($output) {
    $output = str_replace('controls="controls"', '', $output);
    return $output;
});

add_filter('wp_video_shortcode', function ($output) {
    $output = str_replace('<video', '<video muted playsinline', $output);
    return $output;
});


add_filter('acf/settings/save_json', function ($path) {

    // Set Sage9 friendly path at /theme-directory/resources/assets/acf-json

    if (is_dir(get_stylesheet_directory() . '/assets/acf-json')) {
        // This is Sage 9
        $path = get_stylesheet_directory() . '/assets/acf-json';
    }

    // If the directory doesn't exist, create it.
    if (!is_dir($path)) {
        mkdir($path);
    }

    // Always return
    return $path;
});


/**
 * Set local json load path
 * @param  string $path unmodified local path for acf-json
 * @return string       our modified local path for acf-json
 */
add_filter('acf/settings/load_json', function ($paths) {

    if (is_dir(get_stylesheet_directory() . '/assets/acf-json')) {
        $path = get_stylesheet_directory() . '/assets/acf-json';
        $paths[] = $path;
    }


    // return
    return $paths;
});
