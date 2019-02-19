<?php

namespace App;

use Sober\Controller\Controller;

class FabricsArchive extends Controller
{
    public static function fabricMaterials()
    {
        $terms = get_terms('un_fabric_material', array(
            'hide_empty' => true,
            'parent' => 0
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
