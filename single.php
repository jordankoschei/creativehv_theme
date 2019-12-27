<?php get_header(); ?>

<?php the_post(); ?>

<article class="post">
  <div class="inner inner--narrow">
    <div class="post-hero">
      <?php
        if (has_post_thumbnail()) { the_post_thumbnail(); }
        else {
      ?>
        <img src="<?php bloginfo('template_directory'); ?>/assets/img/hero.jpg" alt="The Hudson Valley">
      <?php } ?>
    </div>

    <header class="post-header">
      <h1 class="post-title"><?php the_title(); ?></h1>
      <div class="post-meta">
        <?php
          $location = array_pop(get_the_terms(get_the_ID(), 'location'));
          $county = ($location->parent == 0) ? $location : get_term($location->parent, 'location');
        ?>
        <?php if ($location && $county) : ?>
          <span class="icon icon-location"><a href="<?php echo get_term_link($location->term_id, 'location'); ?>"><?php echo $location->name; ?></a> (<a href="<?php echo get_term_link($county->term_id, 'location'); ?>"><?php echo $county->name; ?></a>)</span>
        <?php endif; ?>
        <?php interview_categories(true); ?>
      </div>
      <p class="post-subtitle" aria-hidden="true"><?php the_field('description'); ?></p>
    </header>

    <div class="post-container">
      <?php if ( have_rows('links') ) : ?>
        <div class="post-links">
          <h2>Links</h2>
          <ul>
            <?php while ( have_rows('links') ) : the_row(); ?>
              <li><a href="<?php the_sub_field('url'); ?>" class="link-<?php the_sub_field('type'); ?>" target="_blank"><?php the_sub_field('name'); ?></a></li>
            <?php endwhile; ?>
          </ul>
        </div>
      <?php endif; ?>

      <div class="post-content">
        <p class="post-content-first-p"><?php the_field('description'); ?></p>
        <?php the_content(); ?>
        <?php if (get_field('edited')) : ?>
          <span class="post-edited">This interview has been edited for length and clarity.</span>
        <?php endif; ?>
        <span class="post-date icon icon-date">Published on <?php the_date(); ?></span>
      </div>
    </div>
  </div>
</article>

<?php get_template_part('includes/subscribe'); ?>

<div class="inner inner--narrow posts">
  <h2>Related interviews:</h2>
  <div class="cards">
    <?php
      $args = array(
        'posts_per_page' => 3,
        'post__not_in' => array(get_the_ID()),
        'category__in' => wp_get_post_categories(get_the_ID(), 'ids')
      );
      $related = new WP_Query( $args );

      while ( $related->have_posts() ) {
        $related->the_post();
        get_template_part('includes/post-card');
      }

      if ($related->post_count < 3) {
        $args = array(
          'posts_per_page' => 3 - $related->post_count,
          'post__not_in' => array(
            array_merge([get_the_ID()], wp_list_pluck($related->posts, 'ID'))
          )
        );
        $related2 = new WP_Query( $args );

        while ( $related2->have_posts() ) {
          $related2->the_post();
          get_template_part('includes/post-card');
        }
      }
    ?>
  </div>
  <a href="<?php echo get_home_url(); ?>" class="button">See all interviews &rarr;</a>
</div>

<?php get_footer(); ?>
