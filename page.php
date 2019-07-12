<?php get_header(); ?>

<?php the_post(); ?>

<div class="simple">
  <div class="inner">
    <h1 class="simple-title"><?php the_title(); ?></h1>
    <?php the_content(); ?>
  </div>
</div>

<?php get_template_part('includes/subscribe'); ?>

<div class="inner posts">
  <?php
    $args = array( 'post__not_in' => array(get_the_ID()) );
    $query = new WP_Query( $args );

    while ( $query->have_posts() ) {
      $query->the_post();
      get_template_part('includes/post-card');
    }
    ?>
</div>

<?php get_footer(); ?>
