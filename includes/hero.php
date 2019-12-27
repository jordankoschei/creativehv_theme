<?php
  $location = array_pop(get_the_terms(get_the_ID(), 'location'));
  $county = ($location->parent == 0) ? $location : get_term($location->parent, 'location');
?>

<div class="inner">
  <article class="hero">
    <a href="<?php the_permalink(); ?>">
      <?php the_post_thumbnail(); ?>

      <div class="hero-content <?php the_field('hero_content_position'); ?>">
        <h1><?php the_title(); ?> — <?php the_field('one-liner'); ?></h1>
        <p><?php the_field('description'); ?></p>
        <div class="hero-meta">
          <?php if ($location && $county) : ?>
            <span class="icon icon-location"><?php echo $location->name; ?> (<?php echo $county->name; ?>)</span>
          <?php endif; ?>
          <?php interview_categories(); ?>
        </div>
      </div>
    </a>
  </article>
</div>
