<article class="hero inner">
  <div class="hero-hover">
    <a href="<?php the_permalink(); ?>" class="hero-img-link">
      <?php the_post_thumbnail(); ?>
    </a>

    <a href="<?php the_permalink(); ?>" class="hero-text">
      <h1><?php the_title(); ?></h1>
      <div>
        <div class="hero-text-description">
          <div>
            <p><?php the_field('description'); ?></p>
          </div>
        </div>
        <div class="hero-cta">
          <span>Read the interview</span>
        </div>
      </div>
    </a>
  </div>
</article>
