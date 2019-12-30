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

<script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/b97eb89f66cada5855bb7d5b5/f6825dc428d38062c3056a37d.js");</script>
</head>

<body <?php body_class(); ?>>

<header class="header <?php if (should_show_header_line()) { echo 'has-line'; } ?>">
  <div class="inner inner--narrow flex">
    <div class="header-lockup">
      <a href="<?php echo site_url(); ?>" class="logo">
        <?php if (is_front_page()) : ?>
          <h1>Creative <strong>Hudson Valley</strong></h1>
        <?php else : ?>
          Creative <strong>Hudson Valley</strong>
        <?php endif; ?>
      </a>

      <a href="<?php echo site_url(); ?>" class="header-description no-md">
        Interviews with members of the Hudson Valley creative community
      </a>
    </div>

    <nav class="menu-header-menu-container">
      <ul class="menu">
        <?php wp_nav_menu(array(
          'menu' => 'Header Menu',
          'container' => '',
          'items_wrap' => '%3$s'
        )); ?>
        <li class="is-dropdown">
          <span>Follow</span>
          <div>
            <ul>
              <li><a href="http://eepurl.com/gwXxQP" class="newsletter" target="_blank">Newsletter</a></li>
              <li><a href="https://www.instagram.com/creativehv/" class="instagram" target="_blank">Instagram</a></li>
              <li><a href="https://twitter.com/creativehv/" class="twitter" target="_blank">Twitter</a></li>
            </ul>
            <ul>
              <li><a href="" class="facebook" target="_blank" title="Creative Hudson Valley on Facebook"><?php get_template_part('includes/icons/facebook'); ?></a></li>
              <li><a href="" class="linkedin" target="_blank" title="Creative Hudson Valley on LinkedIn"><?php get_template_part('includes/icons/linkedin'); ?></a></li>
              <li><a href="" class="pinterest" target="_blank" title="Creative Hudson Valley on Pinterest"><?php get_template_part('includes/icons/pinterest'); ?></a></li>
              <li><a href="" class="rss" target="_blank" title="RSS"><?php get_template_part('includes/icons/rss'); ?></a></li>
            </ul>
          </div>
        </li>
      </ul>
    </nav>

  </div>
</header>
