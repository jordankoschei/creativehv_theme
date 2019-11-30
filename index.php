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
?>

<?php if (! is_paged()) : ?>
  <?php
  while ( $query->have_posts() ) {
    $query->the_post();
    get_template_part('includes/hero');
  }
  ?>

  <div class="subscribe top-subscribe">
    <div class="inner">
      <p>
        <strong>Creative Hudson Valley</strong> is a celebration of the Hudson Valley's incredible
        <span>creative energy and the people who choose to live and work here.</span>
      </p>
    </div>
  </div>
<?php endif; ?>

<div class="inner posts">
  <?php if (is_paged()) : ?>
    <h2>Page <?php echo get_query_var('paged'); ?></h2>
  <?php endif; ?>
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
    ?>
  </div>
  <div class="pagination">
    <?php posts_nav_link('/', '← Newer', 'Older →'); ?>
  </div>
</div>



<?php get_template_part('includes/subscribe'); ?>

<?php get_footer(); ?>
