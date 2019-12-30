<?php get_header(); ?>

<div class="inner inner--narrow">
  <h1>Uh-oh, we can't find that page!</h1>
  <p>It's not you, it's us. In the meantime, here are some other recent interviews you should check out:</p>
</div>

<div class="inner inner--narrow posts">
  <div class="cards">
    <?php
      $args = array(
        'posts_per_page' => 3,
        'orderby' => 'rand',
        'ignore_sticky_posts' => true
      );
      $related = new WP_Query( $args );

      while ( $related->have_posts() ) {
        $related->the_post();
        get_template_part('includes/post-card');
      }
    ?>
  </div>
  <a href="<?php echo get_home_url(); ?>" class="button">See all interviews &rarr;</a>
</div>

<?php get_footer(); ?>
