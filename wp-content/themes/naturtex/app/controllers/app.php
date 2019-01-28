<?php

namespace App;

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

    public function languageSwitcher()
    {
        if (!function_exists('icl_get_languages')) {
            return false;
        }

        $languages = icl_get_languages('skip_missing=0');
        if (!empty($languages)) {
            $selector = '';
            $selector .= '<ul id="lang-switcher">';
            foreach ($languages as $l) {
                $selector .= '<li><a href="'.$l['url'].'" ' . ($l['active'] ? 'class="active" ' : '') . '>';
                $selector .= $l['language_code'];
                $selector .= '</a></li>';
            }
            $selector .= '</ul>';
        }
        return $selector;
    }
}
