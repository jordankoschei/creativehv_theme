<article class="post-card">
  <a href="<?php the_permalink(); ?>">
    <div class="post-card-img" style="background-image: url(<?php the_post_thumbnail_url() ?>)">
    </div>
    
    <div class="post-card-content">
      <h1 class="post-card-title"><?php the_title(); ?></h1>
      <p><?php the_field('description'); ?></p>
    </div>
    
    <span class="post-card-cta">Read the interview</span>
  </a>
</article>
