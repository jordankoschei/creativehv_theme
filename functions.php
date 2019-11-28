<?php
// Add description to RSS
function update_rss($content) {
  if ( is_feed() ){
    $content = '<p>' . get_field('description') . '</p>' . $content;
  }
  return $content;
}
add_filter('the_content', 'update_rss');

function update_rss_excerpt($content) {
  return get_field('description');
}
add_filter('the_excerpt_rss', 'update_rss_excerpt');



// Hide password-protected posts
function wpb_password_post_filter( $where = '' ) {
    if (!is_single() && !is_admin()) {
        $where .= " AND post_password = ''";
    }
    return $where;
}
add_filter( 'posts_where', 'wpb_password_post_filter' );

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

function add_theme_scripts() {
  wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/app.min.css', false, '1.17', 'all');
  wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/app.min.js', false, '1.0', false);
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

add_action( 'after_setup_theme', 'register_menus' );
function register_menus() {
  register_nav_menu( 'header', 'Header Menu' );
  register_nav_menu( 'footer', 'Footer Menu' );
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'responsive-embeds' );
}

function tweakjp_rm_comments_att( $open, $post_id ) {
    $post = get_post( $post_id );
    if( $post->post_type == 'attachment' ) {
        return false;
    }
    return $open;
}
add_filter( 'comments_open', 'tweakjp_rm_comments_att', 10 , 2 );


// remove update notice for certain plugins
add_filter( 'site_transient_update_plugins', function ($value) {
  if ( isset( $value ) && is_object( $value ) ) {
    unset( $value->response[ 'wp-migrate-db-pro/wp-migrate-db-pro.php' ] );
    unset( $value->response[ 'wp-migrate-db-pro-media-files/wp-migrate-db-pro-media-files.php' ] );
  }

  return $value;
});

add_action('admin_head', function () {
  ?>
  <style>
    .wpmdbpro-custom {
      display: none;
    }
  </style>
  <?php
});
