<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }

    public static function languageSwitcher()
    {
        if (!function_exists('icl_get_languages')) {
            return false;
        }

        $languages = icl_get_languages('skip_missing=0');
        $selector = "";
        if (!empty($languages)) {
            $selector .= '<ul class="lang-switcher">';
            foreach ($languages as $l) {
                $selector .= '<li><a href="'.$l['url'].'" ' . ($l['active'] ? 'class="is-active" ' : '') . '>';
                $selector .= $l['language_code'];
                $selector .= '</a></li>';
            }
            $selector .= '</ul>';
        }
        return $selector;
    }

    public static function isCurrentURL($url, $force = false) {
        global $wp;
        $current_url = parse_url(home_url($wp->request), PHP_URL_PATH);
        $position = strpos($current_url, '/page');
        $url = parse_url($url, PHP_URL_PATH);
        $nopaging_url = ($position) ? substr($current_url, 0, $position) : $current_url;
        return (trailingslashit($nopaging_url) == trailingslashit($url) || $force) ? "is-current" : "";
    }

    public static function isCurrentParam($param, $value) {
        return (isset($_GET[$param]) && $_GET[$param] == $value) ? 'is-current' : '';
    }

    public static function pagination($query = false)
    {
        global $wp_query;
        $query = $query ? $query : $wp_query;
        $big = 999999999;
        $args = array();
        $pag = "";
        $paginate = paginate_links(
            array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big, false))),
                'type' => 'array',
                'total' => $query->max_num_pages,
                'format' => '?paged=%#%',
                'mid_size' => 2,
                'end_size' => 1,
                'current' => max(1, get_query_var('paged')),
                'prev_text' => esc_html__('Anterior', 'naturtex'),
                'next_text' => esc_html__('Siguiente', 'naturtex'),
                'add_args' => array($args)
            )
        );

        if ($query->max_num_pages > 1) {
            $pag = '<ul class="pagination">';
            foreach ($paginate as $page) {
                $pag .= '<li>' . $page . '</li>';
            }
            $pag .= '</ul>';
        }

        return $pag;
    }


    public static function inlineSVG($svg) {
        if (empty($svg)) {
            return;
        }
        return file_get_contents(\App\asset_path($svg));
    }
}
