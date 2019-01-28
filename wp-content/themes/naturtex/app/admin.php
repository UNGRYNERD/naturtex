<?php

namespace App;

/**
 * Theme customizer
 */
add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {
    // Add postMessage support
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        }
    ]);

    $wp_customize->add_section('ungrynerd_contact', array(
        'title' => __('Datos de contacto', 'ungrynerd')
    ));

    $wp_customize->add_setting('ungrynerd_contact_data');
    $wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'ungrynerd_contact_data', array(
        'type' => 'textarea',
        'label' => __('Datos', 'ungrynerd'),
        'section' => 'ungrynerd_contact',
        'settings' => 'ungrynerd_contact_data'
    )));

    $wp_customize->add_setting('ungrynerd_contact_facebook');
    $wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'ungrynerd_contact_facebook', array(
        'type' => 'text',
        'label' => __('Facebook URL', 'ungrynerd'),
        'section' => 'ungrynerd_contact',
        'settings' => 'ungrynerd_contact_facebook'
    )));

    $wp_customize->add_setting('ungrynerd_contact_linkedin');
    $wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'ungrynerd_contact_linkedin', array(
        'type' => 'text',
        'label' => __('LinkedIn URL', 'ungrynerd'),
        'section' => 'ungrynerd_contact',
        'settings' => 'ungrynerd_contact_linkedin'
    )));

    $wp_customize->add_setting('ungrynerd_contact_pinterest');
    $wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'ungrynerd_contact_pinterest', array(
        'type' => 'text',
        'label' => __('Pinterest URL', 'ungrynerd'),
        'section' => 'ungrynerd_contact',
        'settings' => 'ungrynerd_contact_pinterest'
    )));

    $wp_customize->add_setting('ungrynerd_contact_instagram');
    $wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'ungrynerd_contact_instagram', array(
        'type' => 'text',
        'label' => __('Instagram URL', 'ungrynerd'),
        'section' => 'ungrynerd_contact',
        'settings' => 'ungrynerd_contact_instagram'
    )));
});

/**
 * Customizer JS
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('sage/customizer.js', asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
});


function un_add_file_types_to_uploads($file_types)
{
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes);
    return $file_types;
}
add_action('upload_mimes', __NAMESPACE__ . '\\un_add_file_types_to_uploads');
