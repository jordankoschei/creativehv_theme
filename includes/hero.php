<div class="inner hero-inner">
  <article class="hero">
    <a href="<?php the_permalink(); ?>">
      <div class="hero-img" style="background-image: url(<?php the_post_thumbnail_url() ?>)"></div>

      <div class="hero-content">
        <h1 class="hero-title"><?php the_title(); ?></h1>
        <h2 class="hero-subtitle"><?php the_field('one-liner'); ?></h2>
        <div class="hero-content-frame">
          <p class="hero-description"><?php the_field('description'); ?></p>
          <div class="hero-categories">
            <?php foreach (get_the_category() as $cat) : ?>
              <span class="icon icon-<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></span>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </a>
  </article>
</div>
