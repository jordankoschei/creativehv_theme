<?php get_header(); ?>

<?php the_post(); ?>

<article class="post">
  <div class="inner">
    <div class="post-hero">
      <?php the_post_thumbnail(); ?>
    </div>

    <header class="post-header">
      <h1 class="post-title"><?php the_title(); ?></h1>
      <div class="post-meta">
        <span class="icon icon-location"><?php echo array_pop(get_terms(array('taxonomy' => 'location')))->name; ?> (<?php echo array_pop(get_terms(array('taxonomy' => 'county')))->name; ?> County)</span>
        <?php foreach (get_the_category() as $cat) : ?>
          <span class="icon icon-<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></span>
        <?php endforeach; ?>
      </div>
      <p class="post-subtitle"><?php the_field('description'); ?></p>
    </header>

    <div class="post-container">
      <div class="post-links">
        <h2>Links</h2>
        <?php if ( have_rows('links') ) : ?>
          <ul>
            <?php while ( have_rows('links') ) : the_row(); ?>
              <li><a href="<?php the_sub_field('url'); ?>" class="link-<?php the_sub_field('type'); ?>"><?php the_sub_field('name'); ?></a></li>
            <?php endwhile; ?>
          </ul>
        <?php else : ?>
          <p>There are no links. Hm. 🤔</p>
        <?php endif; ?>
      </div>

      <div class="post-content">
        <?php the_content(); ?>
        <span class="post-date icon icon-date">Published on <?php the_date(); ?></span>
      </div>
    </div>
  </div>
</article>

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
