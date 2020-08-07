<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class ArchiveUnProject extends Controller
{
    public static function projectsTypes()
    {
        $terms = get_terms('un_project_type', array(
            'hide_empty' => true,
        ));
        $terms_links = array();
        foreach ($terms as $term) {
            $terms_links[] = array(
                'id' => $term->term_id,
                'name' => $term->name,
                'link' => get_term_link($term),
            );
        }
        return $terms_links;
    }

}
