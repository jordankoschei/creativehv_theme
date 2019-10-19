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
      <?php foreach (get_the_category() as $cat) : ?>
        <span class="icon icon-<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></span>
      <?php endforeach; ?>
    </div>
  </a>
</article>
