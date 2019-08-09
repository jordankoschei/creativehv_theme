<?php get_header(); ?>

<?php the_post(); ?>

<div class="simple">
  <?php if (has_post_thumbnail()) : ?>
    <div class="simple-hero">
      <?php the_post_thumbnail(); ?>
    </div>
  <?php endif; ?>

  <div class="inner">
    <h1 class="simple-title"><?php the_title(); ?></h1>
    <?php the_content(); ?>
    <hr>
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

  <?php if ($query->found_posts % 3 != 0) : ?>
    <div class="post-card post-card--blank">
      <div>
        More interviews are coming soon.<br />
        <a href="<?php echo site_url(); ?>/suggest-an-interview/" class="post-card--blank__link">Suggest an interview</a>
      </div>
    </div>
  <?php endif; ?>
</div>

<?php get_footer(); ?>
