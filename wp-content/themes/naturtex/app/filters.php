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
});


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

add_filter('the_posts', function ($posts, $q) {
    $taxonomy_sort_by = 'un_fabric_material';

    if (!is_admin() && $q->is_main_query() // Target only the main query
         && $q->is_post_type_archive('un_fabric') // Only target the product-range taxonomy term pages
    ) {
        /**
         * There is a bug in usort that will most probably never get fixed. In some instances
         * the following PHP warning is displayed

         * usort(): Array was modified by the user comparison function
         * @see https://bugs.php.net/bug.php?id=50688

         * The only workaround is to suppress the error reporting
         * by using the @ sign before usort
         */
        @usort($posts, function ($a, $b) use ($taxonomy_sort_by) {
            // Use term name for sorting
            $array_a = get_the_terms($a->ID, $taxonomy_sort_by);
            $array_b = get_the_terms($b->ID, $taxonomy_sort_by);

            // Add protection if posts don't have any terms, add them last in queue
            if (empty($array_a) || is_wp_error($array_a)) {
                $array_a = 'zzz'; // Make sure to add posts without terms last
            } else {
                $array_a = $array_a[0]->name;
            }

            // Add protection if posts don't have any terms, add them last in queue
            if (empty($array_b) || is_wp_error($array_b)) {
                $array_b = 'zzz'; // Make sure to add posts without terms last
            } else {
                $array_b = $array_b[0]->name;
            }

            /**
             * Sort by term name, if term name is the same sort by post date
             * You can adjust this to sort by post title or any other WP_Post property_exists
             */
            if ($array_a != $array_b) {
                // Choose the one sorting order that fits your needs
                return strcasecmp($array_a, $array_b); // Sort term alphabetical ASC
                //return strcasecmp($array_b, $array_a); // Sort term alphabetical DESC
            } else {
                return $a->post_date < $b->post_date; // Not sure about the comparitor, also try >
            }
        });
    }
    return $posts;
}, 10, 2);
