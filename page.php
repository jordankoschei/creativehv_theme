<?php get_header(); ?>

<?php the_post(); ?>

<div class="simple">
  <?php if (has_post_thumbnail()) : ?>
    <div class="simple-hero">
      <?php the_post_thumbnail(); ?>
    </div>
  <?php endif; ?>

  <div class="inner inner--narrow">
    <h1 class="simple-title"><?php the_title(); ?></h1>
    <?php the_content(); ?>
    <hr>
  </div>
</div>

<?php get_template_part('includes/subscribe'); ?>

<div class="inner inner--narrow posts">
  <div class="cards">
    <?php
      $args = array(
        'posts_per_page' => 3,
        'orderby' => 'rand'
      );
      $query = new WP_Query( $args );

      while ( $query->have_posts() ) {
        $query->the_post();
        get_template_part('includes/post-card');
      }
    ?>
  </div>
</div>

<?php get_footer(); ?>
