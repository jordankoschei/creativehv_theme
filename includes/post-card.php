<article class="post-card">
  <a href="<?php the_permalink(); ?>">
    <div class="post-card-img" style="background-image: url(<?php the_post_thumbnail_url() ?>)">
    </div>
    
    <div class="post-card-content">
      <h1 class="post-card-title"><?php the_title(); ?></h1>
      <h2 class="post-card-subtitle"><?php the_field('one-liner'); ?></h2>
      <p><?php the_field('description'); ?></p>
    </div>
    <div class="post-card-categories">
        <?php
          $location = array_pop(get_the_terms(get_the_ID(), 'location'));
          $county = ($location->parent == 0) ? $location : get_term($location->parent, 'location');
        ?>
        <?php if ($location && $county) : ?>
          <span class="icon icon-location"><a href="<?php echo get_term_link($location->term_id, 'location'); ?>"><?php echo $location->name; ?></a> (<a href="<?php echo get_term_link($county->term_id, 'location'); ?>"><?php echo $county->name; ?></a>)</span>
        <?php endif; ?>
      <?php interview_categories(); ?>
    </div>
  </a>
</article>
