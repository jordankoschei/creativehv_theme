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

<?php get_footer(); ?>
