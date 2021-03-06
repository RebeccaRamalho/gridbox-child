<?php
    add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
    
    function my_theme_enqueue_styles() {
        wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
        wp_enqueue_style( 'child-style', 
             get_stylesheet_directory_uri() . '/style.css',
             array( 'parent-style' ),
             wp_get_theme()->get('Version')
        );
     };



  add_action( 'customize_register', 'gridbox_child_stuff_to_customizer' );
  
function gridbox_child_stuff_to_customizer( $wp_customize ) {

$wp_customize->add_section(
    'gridbox_child_custom_section', /* section id */
    array(
      'title'       => 'Réglages Brioche et Canelle',
      'description' => 'Les options ajoutés via mon thème enfant',
    )
  );

  $wp_customize->add_setting(
    'gridbox_child_custom_setting',
    array(
      'default'           => '',
      'sanitize_callback' => 'wp_kses_post', /* ceci dépend du type de données */
    )
  );
  $wp_customize->add_control(
    'gridbox_child_custom_setting',
    array(
      'type'        => 'textarea', /* différents types sont disponible */
      'section'     => 'gridbox_child_custom_section', // Required, core or custom.
      'label'       => 'Info du sponsor du site',
      'description' => 'Ici vous choissisez le texte à afficher sur toutes les pages',
    )
  );

};

