<?php
/*
Template Name: Scenic Hudson Passport
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title(); ?></title>
<?php wp_head(); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="alternate" type="application/rss+xml" title="Creative Hudson Valley" href="<?php bloginfo('url'); ?>/?feed=rss2" />

<?php if (get_home_url() == 'http://creativehv.test') : ?>
<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/img/dev-favicon.png" sizes="16x16" />
<?php endif; ?>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-143769687-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-143769687-1');
</script>
</head>

<div class="passport">



</div>

<?php get_footer(); ?>
