<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <title><?php wp_title(); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

  <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/assets/img/apple-touch-icon-57x57.png" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/assets/img/apple-touch-icon-114x114.png" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/assets/img/apple-touch-icon-72x72.png" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/assets/img/apple-touch-icon-144x144.png" />
  <link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/assets/img/apple-touch-icon-60x60.png" />
  <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/assets/img/apple-touch-icon-120x120.png" />
  <link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/assets/img/apple-touch-icon-76x76.png" />
  <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/assets/img/apple-touch-icon-152x152.png" />
  <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon-196x196.png" sizes="196x196" />
  <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon-96x96.png" sizes="96x96" />
  <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon-32x32.png" sizes="32x32" />
  <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon-16x16.png" sizes="16x16" />
  <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon-128.png" sizes="128x128" />
  <meta name="application-name" content="Creative Hudson Valley"/>
  <meta name="msapplication-TileColor" content="#0091FF" />
  <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/assets/img/mstile-144x144.png" />
  <meta name="msapplication-square70x70logo" content="<?php echo get_template_directory_uri(); ?>/assets/img/mstile-70x70.png" />
  <meta name="msapplication-square150x150logo" content="<?php echo get_template_directory_uri(); ?>/assets/img/mstile-150x150.png" />
  <meta name="msapplication-wide310x150logo" content="<?php echo get_template_directory_uri(); ?>/assets/img/mstile-310x150.png" />
  <meta name="msapplication-square310x310logo" content="<?php echo get_template_directory_uri(); ?>/assets/img/mstile-310x310.png" />

  <meta name="p:domain_verify" content="abf60f20b81ec1e72dbfa1bc627ccfae"/>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>

  <link rel="alternate" type="application/rss+xml" title="Creative Hudson Valley" href="<?php bloginfo('url'); ?>/?feed=rss2" />

  <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/b97eb89f66cada5855bb7d5b5/f6825dc428d38062c3056a37d.js");</script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-143769687-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-143769687-1');
  </script>

</head>
<body <?php body_class(); ?>>

<header class="header">
  <div class="inner flex">
    <a href="<?php echo site_url(); ?>" class="logo">
      <?php if (is_front_page()) : ?>
        <h1>Creative <strong>Hudson Valley</strong></h1>
      <?php else : ?>
        Creative <strong>Hudson Valley</strong>
      <?php endif; ?>
    </a>

    <nav class="menu-header-menu-container">
      <?php wp_nav_menu(array('menu' => 'Header Menu', 'container' => '')); ?>
      <ul class="socials">
        <li><a href="https://twitter.com/creativehv" title="Creative Hudson Valley on Twitter" target="_blank" class="social social-twitter"><svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="M30.7 6.6c-1.2.5-2.4.9-3.7 1 1.3-.8 2.3-2 2.8-3.5a13 13 0 0 1-4 1.5 6.3 6.3 0 0 0-10.7 5.7c-5.3-.2-9.9-2.7-13-6.5-.5 1-.9 2-.9 3.2 0 2.2 1.2 4.1 2.8 5.2-1 0-2-.3-2.8-.8v.1c0 3 2.2 5.6 5 6.2a6.4 6.4 0 0 1-2.8.1 6.3 6.3 0 0 0 6 4.4A12.6 12.6 0 0 1 0 25.8a18 18 0 0 0 9.7 2.8c11.6 0 17.9-9.6 17.9-17.9V10c1.2-.9 2.3-2 3.1-3.3z" /></svg></a></li>
        <li><a href="https://instagram.com/creativehv" title="Creative Hudson Valley on Instagram" target="_blank" class="social social-instagram"><svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="M16 0c-4.35 0-4.89.02-6.6.1-1.7.08-2.86.34-3.88.74-1.05.4-1.95.96-2.83 1.85A7.8 7.8 0 0 0 .84 5.52C.44 6.54.17 7.7.1 9.4.02 11.11 0 11.65 0 16s.02 4.89.1 6.6c.08 1.7.34 2.86.74 3.88.4 1.05.96 1.95 1.85 2.83a7.82 7.82 0 0 0 2.83 1.85c1.02.4 2.18.67 3.88.74 1.71.08 2.25.1 6.6.1s4.89-.02 6.6-.1c1.7-.08 2.86-.35 3.88-.74a7.86 7.86 0 0 0 2.83-1.85 7.81 7.81 0 0 0 1.85-2.83c.4-1.02.67-2.18.74-3.88.08-1.71.1-2.25.1-6.6s-.02-4.89-.1-6.6c-.08-1.7-.35-2.86-.74-3.88a7.85 7.85 0 0 0-1.85-2.83A7.8 7.8 0 0 0 26.48.84C25.46.44 24.3.17 22.6.1 20.89.02 20.35 0 16 0zm0 2.88c4.27 0 4.78.02 6.47.1 1.56.07 2.4.33 2.97.55.75.29 1.28.63 1.84 1.2.56.55.9 1.08 1.2 1.83.21.57.47 1.41.54 2.97.08 1.7.1 2.2.1 6.47s-.02 4.78-.1 6.47a9 9 0 0 1-.56 2.97c-.3.75-.64 1.28-1.2 1.84a5 5 0 0 1-1.84 1.2 8.9 8.9 0 0 1-2.98.54c-1.7.08-2.2.1-6.48.1s-4.78-.02-6.48-.1a9.07 9.07 0 0 1-2.98-.56 4.95 4.95 0 0 1-1.84-1.2 4.86 4.86 0 0 1-1.2-1.84 9.08 9.08 0 0 1-.56-2.98c-.06-1.68-.08-2.2-.08-6.46s.02-4.78.08-6.48c.08-1.56.34-2.42.56-2.98.28-.76.64-1.28 1.2-1.84a4.73 4.73 0 0 1 1.84-1.2c.56-.22 1.4-.48 2.96-.56 1.7-.06 2.2-.08 6.48-.08l.06.04zm0 4.9a8.22 8.22 0 1 0 0 16.43 8.22 8.22 0 0 0 0-16.43zm0 13.55a5.33 5.33 0 1 1 0-10.66 5.33 5.33 0 0 1 0 10.66zM26.46 7.46a1.92 1.92 0 1 1-3.84 0 1.92 1.92 0 0 1 3.84 0z" /></svg></a></li>
        <!-- <li><a href="https://www.facebook.com/creativehv" title="Creative Hudson Valley on Facebook" target="_blank" class="social social-facebook"><svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="M32,16 C32,7.1634375 24.8365625,0 16,0 C7.1634375,0 0,7.1634375 0,16 C0,23.9860625 5.85096875,30.6053125 13.5,31.805625 L13.5,20.625 L9.4375,20.625 L9.4375,16 L13.5,16 L13.5,12.475 C13.5,8.465 15.8886875,6.25 19.5434375,6.25 C21.2939688,6.25 23.125,6.5625 23.125,6.5625 L23.125,10.5 L21.1074375,10.5 C19.1198438,10.5 18.5,11.7333437 18.5,12.9986562 L18.5,16 L22.9375,16 L22.228125,20.625 L18.5,20.625 L18.5,31.805625 C26.1490313,30.6053125 32,23.9860625 32,16"></path></svg></a></li> -->
      </ul>
    </nav>

  </div>
</header>
