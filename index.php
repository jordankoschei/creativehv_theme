<?php get_header(); ?>

<?php
$sticky = get_option( 'sticky_posts' );
if ( ! $sticky) {
  $sticky = get_posts("numberposts=1&fields=ids");
}
$query = new WP_Query( 'p=' . $sticky[0] );
?>

<?php if (! is_paged()) : ?>
  <?php
  while ( $query->have_posts() ) {
    $query->the_post();
    get_template_part('includes/hero');
  }
  ?>
<?php endif; ?>

<div class="inner inner--narrow posts">
  <?php get_template_part('includes/posts-nav'); ?>

  <div class="cards">
    <?php
      $paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
      $args = array(
        'post__not_in' => array($sticky[0]),
        'paged' => $paged
      );
      $query = new WP_Query( $args );

      while ( $query->have_posts() ) {
        $query->the_post();
        get_template_part('includes/post-card');
      }

      if ( $query->found_posts % 3 == 2 ) {
        echo '<div class="card-placeholder"></div>';
      }
      if ( $query->found_posts % 3 == 1 ) {
        echo '<div class="card-placeholder"></div><div class="card-placeholder"></div>';
      }
    ?>
  </div>
  <div class="pagination">
    <?php posts_nav_link('/', '← Newer', 'Older →'); ?>
  </div>
</div>

<?php get_footer(); ?>
