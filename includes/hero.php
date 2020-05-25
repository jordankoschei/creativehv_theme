<?php
  $location = array_pop(get_the_terms(get_the_ID(), 'location'));
  $county = ($location->parent == 0) ? $location : get_term($location->parent, 'location');
?>

<div class="inner">
  <article class="hero <?php the_field('hero_x_position'); ?> <?php the_field('hero_y_position'); ?>">
    <a href="<?php the_permalink(); ?>">
      <?php the_post_thumbnail(); ?>

      <div class="hero-content <?php the_field('hero_content_position'); ?>">
        <h1><?php the_title(); ?> — <?php final_arrow(get_field('one-liner')); ?></h1>
        <p><?php the_field('description'); ?></p>
        <div class="hero-meta">
          <?php if ($location && $county) : ?>
            <span class="icon icon-location"><?php echo $location->name; ?> (<?php echo $county->name; ?>)</span>
          <?php endif; ?>
          <?php interview_categories(); ?>
        </div>

        <?php if (get_field('series') == 'accel7'): ?>
          <span class="hero-sponsor accel7">Part of a series on <strong>Hudson Valley entrepreneurs</strong> sponsored by <span>local startup accelerator <img src="<?php echo get_template_directory_uri(); ?>/assets/img/accel7.png" alt="Accel7" /></span></span>
        <?php endif; ?>
      </div>
    </a>
  </article>
</div>
