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

    $wp_customize->add_section('ungrynerd_social', array(
        'title' => __('Enlaces sociales', 'ungrynerd')
    ));

    $wp_customize->add_setting('ungrynerd_social_facebook');
    $wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'ungrynerd_social_facebook', array(
        'type' => 'text',
        'label' => __('Facebook URL', 'ungrynerd'),
        'section' => 'ungrynerd_social',
        'settings' => 'ungrynerd_social_facebook'
    )));

    $wp_customize->add_setting('ungrynerd_social_linkedin');
    $wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'ungrynerd_social_linkedin', array(
        'type' => 'text',
        'label' => __('LinkedIn URL', 'ungrynerd'),
        'section' => 'ungrynerd_social',
        'settings' => 'ungrynerd_social_linkedin'
    )));

    $wp_customize->add_setting('ungrynerd_social_pinterest');
    $wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'ungrynerd_social_pinterest', array(
        'type' => 'text',
        'label' => __('Pinterest URL', 'ungrynerd'),
        'section' => 'ungrynerd_social',
        'settings' => 'ungrynerd_social_pinterest'
    )));

    $wp_customize->add_setting('ungrynerd_social_instagram');
    $wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'ungrynerd_social_instagram', array(
        'type' => 'text',
        'label' => __('Instagram URL', 'ungrynerd'),
        'section' => 'ungrynerd_social',
        'settings' => 'ungrynerd_social_instagram'
    )));
});

/**
 * Customizer JS
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('sage/customizer.js', asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
});
