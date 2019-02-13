<?php

namespace App;

use Sober\Controller\Controller;

class ProjectsArchive extends Controller
{
    public static function projectsTypes()
    {
        $terms = get_terms('un_project_type', array(
            'hide_empty' => false,
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
