<?php get_header(); ?>

<div class="inner inner--narrow posts">
  <?php get_template_part('includes/posts-nav'); ?>
  <div class="cards">
    <?php
      if (have_posts() ) {
        while ( have_posts() ) {
          the_post();
          get_template_part('includes/post-card');
        }

        if ( $wp_query->found_posts % 3 == 2 ) {
          echo '<div class="card-placeholder"></div>';
        }
        if ( $wp_query->found_posts % 3 == 1 ) {
          echo '<div class="card-placeholder"></div><div class="card-placeholder"></div>';
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
