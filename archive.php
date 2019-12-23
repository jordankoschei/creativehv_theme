<?php get_header(); ?>

<?php if (get_field('notice_active', 'option')) : ?>
<div class="inner">
  <div class="notice">
    <?php the_field('notice_text', 'option'); ?> <a href="<?php the_field('notice_cta_url', 'option'); ?>" class="notice-cta"><?php the_field('notice_cta_text', 'option'); ?></a>
  </div>
</div>
<?php endif; ?>

<?php
$title = '';

if (is_category()) {
  $title = single_term_title('', false) . ' Interviews';
}

if (is_tax('location')) {
  $title = single_term_title('Interviews in ', false);

  $location = get_queried_object();
  if ($location->parent !== 0) {
    $county = get_term($location->parent, 'location');
    $title .= ' (<a href="' . get_term_link($county->term_id, 'location') . '">' . $county->name . '</a>)';
  }
}

if (is_paged()) {
  $title .= ' — Page ' . get_query_var('paged');
}
?>

<div class="inner posts">
  <h2><?php echo $title; ?></h2>
  <div class="cards">
    <?php
      if (have_posts() ) {
        while ( have_posts() ) {
          the_post();
          get_template_part('includes/post-card');
        }
      }
    ?>
  </div>
  <div class="pagination">
    <?php posts_nav_link('/', '← Newer', 'Older →'); ?>
  </div>
</div>

<?php get_template_part('includes/subscribe'); ?>

<?php get_footer(); ?>
