<?php

namespace App;

use Sober\Controller\Controller;

class RugsArchive extends Controller
{
    public function rugMaterials()
    {
        $terms = get_terms('un_rug_material', array(
            'hide_empty' => false,
        ));
        $terms_links = array();
        foreach ($terms as $term) {
            $terms_links[] = array(
                'id' => $term->term_id,
                'name' => $term->name,
                'link' => get_term_link($term),
                'slug' => $term->slug,
            );
        }
        return $terms_links;
    }

    public function rugTypes()
    {
        $terms = get_terms('un_rug_type', array(
            'hide_empty' => false,
        ));
        $terms_links = array();
        foreach ($terms as $term) {
            $terms_links[] = array(
                'id' => $term->term_id,
                'name' => $term->name,
                'link' => get_term_link($term),
                'slug' => $term->slug,
            );
        }
        return $terms_links;
    }

}
