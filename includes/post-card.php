<a href="<?php the_permalink(); ?>" class="post-card">
  <div class="post-card-img">
    <?php
      $location = array_pop(get_the_terms(get_the_ID(), 'location'));
    ?>
    <?php if ($location) : ?>
      <span class="post-card-location"><?php echo $location->name; ?></span>
    <?php endif; ?>

    <?php the_post_thumbnail(); ?>
  </div>
  <div class="post-card-content">
    <h1 class="post-card-title"><?php the_title(); ?></h1>
    <p class="post-card-subtitle"><?php the_field('one-liner'); ?></p>
  </div>
  <div class="post-card-categories">
    <?php interview_categories(); ?>
  </div>
</a>
