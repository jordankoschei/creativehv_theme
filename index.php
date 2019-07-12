<?php get_header(); ?>

<?php if (get_field('notice_active', 'option')) : ?>
<div class="inner">
  <div class="notice">
    <?php the_field('notice_text', 'option'); ?> <a href="<?php the_field('notice_cta_url', 'option'); ?>" class="notice-cta"><?php the_field('notice_cta_text', 'option'); ?></a>
  </div>
</div>
<?php endif; ?>

<?php
$sticky = get_option( 'sticky_posts' );
if ( ! $sticky) {
  $sticky = get_posts("numberposts=1&fields=ids");
}
$query = new WP_Query( 'p=' . $sticky[0] );

while ( $query->have_posts() ) {
  $query->the_post();
  get_template_part('includes/hero');
}
?>

<div class="inner posts">
  <?php
    $args = array( 'post__not_in' => array($sticky[0]) );
    $query = new WP_Query( $args );

    while ( $query->have_posts() ) {
      $query->the_post();
      get_template_part('includes/post-card');
    }
    ?>
</div>

<?php get_template_part('includes/subscribe'); ?>

<?php get_footer(); ?>
