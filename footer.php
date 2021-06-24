<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package coelix
 */

?>

<footer class="footer">
  <div class="container">
    <div class="footer__row">
      <a href='<?= home_url(); ?>' class="footer__logo-box">
        <img src="<?= get_field( 'logo', 'option' ); ?>" alt="" class="footer__logo-img">
      </a>

      <nav class="footer__nav">
        <?php 
        wp_nav_menu([
          'menu' => 'Footer menu',
          'container' => '',
          'items_wrap' => '<ul class="menu menu_footer">%3$s</ul>'
        ])
      ?>
      </nav>

      <?php if( have_rows('socials', 'option') ): ?>
      <div class="footer__soc-box">
        <?php 
        while( have_rows('socials', 'option') ) : the_row();
        $link = get_sub_field( 'soc_link', 'option' );
        $icon = get_sub_field( 'soc_image', 'option' );
        ?>
        <?php if( $link ) { ?>
        <a href='<?= $link; ?>' target='_blank' class="footer__soc-item">
          <?= file_get_contents( get_attached_file( $icon ) ); ?>
        </a>
        <?php } ?>
        <?php endwhile; ?>
      </div>
      <?php endif; ?>
    </div>
  </div>
</footer>

<div class="toTop">
  <?= file_get_contents( get_attached_file( get_field( 'toTop', 'option' ) ) ); ?>
</div>

<?php wp_footer(); ?>

</body>

</html>