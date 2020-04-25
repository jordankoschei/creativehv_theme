<?php get_header(); ?>

<?php the_post(); ?>

<?php
$twitter   = 'https://twitter.com/intent/tweet?text=' . get_the_title() . ' on Creative Hudson Valley (via @creativehv) ' . get_the_permalink();
$facebook  = 'https://www.facebook.com/sharer/sharer.php?u=' . get_the_permalink();
$linkedin  = 'https://www.linkedin.com/shareArticle?mini=true&url=' . get_the_permalink() . '&summary=' . get_field('description');
$pinterest = 'https://pinterest.com/pin/create/button/?url=' . get_the_permalink() . '&media=' . get_the_post_thumbnail_url() . '&description=' . get_field('description');
$email     = 'mailto:?subject=' . get_the_title() . '%20on%20Creative%20Hudson%20Valley&body=You%20should%20read%20this%20interview%3A ' . get_the_permalink();
?>

<article class="post">
  <div class="inner">
    <?php if ( !post_password_required() ) : ?>
      <div class="post-top">
        <div class="hero <?php the_field('hero_x_position'); ?> <?php the_field('hero_y_position'); ?>">
          <?php
          if (has_post_thumbnail()) {
            the_post_thumbnail();
          } else {
            echo '<img src="'.get_bloginfo('template_directory').'/assets/img/hero.jpg" alt="The Hudson Valley">';
          }
          ?>
        </div>
        <div class="post-top-content">
          <div class="post-meta">
            <span>Interview by Jordan Koschei</span>
            <?php if (get_field('hero_photo_attribution')) : ?>
              <span><?php the_field('hero_photo_attribution'); ?></span>
            <?php endif; ?>
            <span>Published on <?php the_date(); ?></span>
          </div>

          <div>
            <h1><?php the_title(); ?></h1>
            <div class="post-categories">
              <?php
                $location = array_pop(get_the_terms(get_the_ID(), 'location'));
                $county = ($location->parent == 0) ? $location : get_term($location->parent, 'location');
              ?>
              <?php if ($location && $county) : ?>
                <div class="post-location">
                  <span class="icon icon-location"><a href="<?php echo get_term_link($location->term_id, 'location'); ?>"><?php echo $location->name; ?></a> (<a href="<?php echo get_term_link($county->term_id, 'location'); ?>"><?php echo $county->name; ?></a>)</span>
              </div>
              <?php endif; ?>
              <?php interview_categories(true); ?>
            </div>
          </div>

          <p aria-hidden="true"><?php prevent_orphans(get_field('description')); ?></p>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <div class="inner inner--narrow">
    <div class="post-container">
      <main class="post-content">
        <?php if (get_field('series') == 'accel7'): ?>
          <?php get_template_part('includes/sponsor-accel7'); ?>
        <?php endif; ?>
        <p class="sr-only"><?php the_field('description'); ?></p>
        <?php the_content(); ?>
        <?php if (get_field('edited')) : ?>
          <span class="post-edited">This interview has been edited.</span>
        <?php endif; ?>

        <div class="post-share">
          <h3>Share this post:</h3>
          <ul>
            <li><a href="<?php echo $twitter; ?>" target="_blank" class="twitter" title="Twitter"><?php get_template_part('includes/icons/twitter'); ?></a></li>
            <li><a href="<?php echo $facebook; ?>" target="_blank" class="facebook" title="Facebook"><?php get_template_part('includes/icons/facebook'); ?></a></li>
            <li><a href="<?php echo $linkedin; ?>" target="_blank" class="linkedin" title="LinkedIn"><?php get_template_part('includes/icons/linkedin'); ?></a></li>
            <li><a href="<?php echo $pinterest; ?>" target="_blank" class="pinterest" title="Pinterest"><?php get_template_part('includes/icons/pinterest'); ?></a></li>
            <li><a href="<?php echo $email; ?>" target="_blank" class="email" title="Email"><?php get_template_part('includes/icons/email'); ?></a></li>
          </ul>
        </div>
      </main>
      <aside class="post-sidebar">
        <?php if ( !post_password_required() ) : ?>
          <ul class="post-links">
            <?php while ( have_rows('links') ) : the_row(); ?>
              <li><a href="<?php the_sub_field('url'); ?>" class="link-<?php the_sub_field('type'); ?>" target="_blank"><?php the_sub_field('name'); ?></a></li>
            <?php endwhile; ?>
          </ul>

          <?php if (get_field('series') == 'accel7'): ?>
            <?php get_template_part('includes/sponsor-accel7'); ?>
          <?php endif; ?>

          <div class="post-nav">
            <?php previous_post_link('<span>Previously: %link</span>'); ?>
            <?php next_post_link('<span>Next up: %link</span>'); ?>
          </div>

          <div class="post-share">
            <h3>Share this post:</h3>
            <ul>
              <li><a href="<?php echo $twitter; ?>" target="_blank" class="twitter" title="Twitter"><?php get_template_part('includes/icons/twitter'); ?></a></li>
              <li><a href="<?php echo $facebook; ?>" target="_blank" class="facebook" title="Facebook"><?php get_template_part('includes/icons/facebook'); ?></a></li>
              <li><a href="<?php echo $linkedin; ?>" target="_blank" class="linkedin" title="LinkedIn"><?php get_template_part('includes/icons/linkedin'); ?></a></li>
              <li><a href="<?php echo $pinterest; ?>" target="_blank" class="pinterest" title="Pinterest"><?php get_template_part('includes/icons/pinterest'); ?></a></li>
              <li><a href="<?php echo $email; ?>" target="_blank" class="email" title="Email"><?php get_template_part('includes/icons/email'); ?></a></li>
            </ul>
          </div>
        <?php endif; ?>
      </aside>
    </div>
  </div>
</article>

<div class="inner inner--narrow posts post-related">
  <div class="posts__top">
    <h2>Related interviews:</h2>
  </div>
  <div class="cards">
    <?php
      $args = array(
        'posts_per_page' => 3,
        'post__not_in' => array(get_the_ID()),
        'category__in' => wp_get_post_categories(get_the_ID(), 'ids'),
        'has_password' => false
      );
      $related = new WP_Query( $args );

      while ( $related->have_posts() ) {
        $related->the_post();
        get_template_part('includes/post-card');
      }

      if ($related->post_count < 3) {
        $args = array(
          'posts_per_page' => 3 - $related->post_count,
          'has_password' => false,
          'post__not_in' => array(
            array_merge([get_the_ID()], wp_list_pluck($related->posts, 'ID'))
          )
        );
        $related2 = new WP_Query( $args );

        while ( $related2->have_posts() ) {
          $related2->the_post();
          get_template_part('includes/post-card');
        }
      }
    ?>
  </div>
  <a href="<?php echo get_home_url(); ?>" class="button">See all interviews &rarr;</a>
</div>

<?php get_footer(); ?>
