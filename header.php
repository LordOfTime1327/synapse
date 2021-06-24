<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package coelix
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="profile" href="https://gmpg.org/xfn/11">

  <?php wp_head(); ?>

  <!-- Clicky -->
  <script>
  var clicky_site_ids = clicky_site_ids || [];
  clicky_site_ids.push(101311795);
  </script>
  <script async src="//static.getclicky.com/js"></script>
  <!-- End Clicky -->

  <!-- Google Analytics -->
  <meta name="google-site-verification" content="72pUgOQeCcg2ta37slADUScAH6uEcpNX-QqtvAObIkg" />
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-194840259-1"></script>
  <script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());

  gtag('config', 'UA-194840259-1');
  </script>
  <!-- Google Tag Manager -->
  <script>
  (function(w, d, s, l, i) {
    w[l] = w[l] || [];
    w[l].push({
      'gtm.start': new Date().getTime(),
      event: 'gtm.js'
    });
    var f = d.getElementsByTagName(s)[0],
      j = d.createElement(s),
      dl = l != 'dataLayer' ? '&l=' + l : '';
    j.async = true;
    j.src =
      'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
    f.parentNode.insertBefore(j, f);
  })(window, document, 'script', 'dataLayer', 'GTM-W8PD7GQ');
  </script>
  <!-- End Google Tag Manager -->
  <!-- End Google Analytics -->

  <!-- FB Pixel -->
  <script>
  ! function(f, b, e, v, n, t, s) {
    if (f.fbq) return;
    n = f.fbq = function() {
      n.callMethod ?
        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
    };
    if (!f._fbq) f._fbq = n;
    n.push = n;
    n.loaded = !0;
    n.version = '2.0';
    n.queue = [];
    t = b.createElement(e);
    t.async = !0;
    t.src = v;
    s = b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t, s)
  }(window, document, 'script',
    'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '528513515223873');
  fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=528513515223873&ev=PageView&noscript=1" /></noscript>
  <!-- End FB Pixel -->
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>


  <header class="header">
    <div class="container">
      <div class="header__row">
        <div class="header__burger">
          <div class="header__burger-line header__burger-line_first"></div>
          <div class="header__burger-line header__burger-line_middle"></div>
          <div class="header__burger-line header__burger-line_last"></div>
        </div>

        <a href="<?= home_url(); ?>" class="header__logo">
          <img src="<?= get_field( 'logo', 'option' ); ?>" alt="" class='header__logo-img'>
        </a>

        <nav class='header__nav'>
          <?php 
            wp_nav_menu([
              'menu' => 'Header menu',
              'container' => '',
              'items_wrap' => '<ul class="menu menu_header">%3$s</ul>'
            ])
          ?>
        </nav>

        <div class="header__contact-box">
          <a href="<?= home_url( '/contact-us' ); ?>" class='header__contacts header__contacts_mob'>
            <?= file_get_contents( get_attached_file( get_field( 'header_image', 'option' ) ) ); ?>
          </a>
          <a href="<?= home_url( '/contact-us' ); ?>" class='btn header__contacts header__contacts_desk'>Learn More</a>
        </div>
      </div>
    </div>
  </header>