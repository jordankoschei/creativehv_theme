<?php

// ----------------------------------------------------------------------------------------------//
// ----------------------------------------------------------------------------------------------//
// REGISTER IMPORTANT THINGS --------------------------------------------------------------------//
// ----------------------------------------------------------------------------------------------//
// ----------------------------------------------------------------------------------------------//

// Add CSS (and JS, eventually, maybe) to <head>
// Also includes the cache-busting via gulpfile
  function add_theme_scripts() {
    $cache_buster = 1574955090542;
    wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/app.min.css', false, $cache_buster, 'all');
  }
  add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

// Register counties & locations
  function cptui_register_my_taxes() {
    $labels = [
      "name" => __( "Locations", "custom-post-type-ui" ),
      "singular_name" => __( "Location", "custom-post-type-ui" ),
    ];

    $args = [
      "label" => __( "Locations", "custom-post-type-ui" ),
      "labels" => $labels,
      "public" => true,
      "publicly_queryable" => true,
      "hierarchical" => true,
      "show_ui" => true,
      "show_in_menu" => true,
      "show_in_nav_menus" => true,
      "query_var" => true,
      "rewrite" => [ 'slug' => 'location', 'with_front' => true, ],
      "show_admin_column" => false,
      "show_in_rest" => true,
      "rest_base" => "location",
      "rest_controller_class" => "WP_REST_Terms_Controller",
      "show_in_quick_edit" => false,
      ];
    register_taxonomy( "location", [ "post" ], $args );

    $labels = [
      "name" => __( "Counties", "custom-post-type-ui" ),
      "singular_name" => __( "County", "custom-post-type-ui" ),
    ];

    $args = [
      "label" => __( "Counties", "custom-post-type-ui" ),
      "labels" => $labels,
      "public" => true,
      "publicly_queryable" => true,
      "hierarchical" => true,
      "show_ui" => true,
      "show_in_menu" => true,
      "show_in_nav_menus" => true,
      "query_var" => true,
      "rewrite" => [ 'slug' => 'county', 'with_front' => true, ],
      "show_admin_column" => false,
      "show_in_rest" => true,
      "rest_base" => "county",
      "rest_controller_class" => "WP_REST_Terms_Controller",
      "show_in_quick_edit" => false,
      ];
    register_taxonomy( "county", [ "post" ], $args );
  }
  add_action( 'init', 'cptui_register_my_taxes' );

// Register menus
  add_action( 'after_setup_theme', 'register_menus' );
  function register_menus() {
    register_nav_menu( 'header', 'Header Menu' );
    register_nav_menu( 'footer', 'Footer Menu' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'responsive-embeds' );
  }

// The RSS version of each post didn't include the big intro paragraph (the "description")
// so we add it manually here
  function update_rss($content) {
    if ( is_feed() ){
      $content = '<p>' . get_field('description') . '</p>' . $content;
    }
    return $content;
  }
  add_filter('the_content', 'update_rss');

// Override the excerpt with the post description
  function update_rss_excerpt($content) {
    return get_field('description');
  }
  add_filter('the_excerpt_rss', 'update_rss_excerpt');

// Hide password-protected posts from the loop
  function wpb_password_post_filter( $where = '' ) {
    if (!is_single() && !is_admin()) {
      $where .= " AND post_password = ''";
    }
    return $where;
  }
  add_filter( 'posts_where', 'wpb_password_post_filter' );


// ----------------------------------------------------------------------------------------------//
// ----------------------------------------------------------------------------------------------//
// QUALITY OF LIFE ------------------------------------------------------------------------------//
// ----------------------------------------------------------------------------------------------//
// ----------------------------------------------------------------------------------------------//

// Remove junk from head
  remove_action( 'wp_head', 'rsd_link' );
  remove_action( 'wp_head', 'wp_generator' );
  remove_action( 'wp_head', 'feed_links', 2 );
  remove_action( 'wp_head', 'index_rel_link' );
  remove_action( 'wp_head', 'wlwmanifest_link' );
  remove_action( 'wp_head', 'feed_links_extra', 3 );
  remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
  remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
  remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
  remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
  remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

// Disable emoji replacement
  function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
    add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
  }
  add_action( 'init', 'disable_emojis' );

  function disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
      return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
      return array();
    }
  }

  function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
    if ( 'dns-prefetch' == $relation_type ) {
      $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
      $urls = array_diff( $urls, array( $emoji_svg_url ) );
    }

    return $urls;
  }

// Remove comments from media attachments
  function tweakjp_rm_comments_att( $open, $post_id ) {
    $post = get_post( $post_id );
    if( $post->post_type == 'attachment' ) {
        return false;
    }
    return $open;
  }
  add_filter( 'comments_open', 'tweakjp_rm_comments_att', 10 , 2 );

// Remove update notice for certain plugins
  add_filter( 'site_transient_update_plugins', function ($value) {
    if ( isset( $value ) && is_object( $value ) ) {
      unset( $value->response[ 'wp-migrate-db-pro/wp-migrate-db-pro.php' ] );
      unset( $value->response[ 'wp-migrate-db-pro-media-files/wp-migrate-db-pro-media-files.php' ] );
    }

    return $value;
  });

// Remove plugin cruft in admin
  add_action('admin_head', function () {
    ?>
    <style>
      .wpmdbpro-custom {
        display: none;
      }

      .wpseo_content_cell#sidebar-container,
      .yoast_premium_upsell,
      #yoast-helpscout-beacon {
        display: none;
      }
    </style>
    <?php
  });


// Disable Yoast's Hidden love letter about using the WordPress SEO plugin.
  add_action( 'template_redirect', function () {
    if ( ! class_exists( 'WPSEO_Frontend' ) ) { return; }
    $instance = WPSEO_Frontend::get_instance();
    if ( ! method_exists( $instance, 'debug_mark') ) { return; }

    remove_action( 'wpseo_head', array( $instance, 'debug_mark' ), 2 );
  }, 9999 );
