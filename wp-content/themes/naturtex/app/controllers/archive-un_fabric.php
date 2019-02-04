<?php

namespace App;

use Sober\Controller\Controller;

class FabricsArchive extends Controller
{
    public function fabricMaterials()
    {
        $terms = get_terms('un_fabric_material', array(
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