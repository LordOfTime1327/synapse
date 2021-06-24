<?php
/**
* Template Name: Contact us
* @package WordPress
* @subpackage Coelix
* @since Coelix 1.0
*/
get_header();
?>

<main class="page-contact-us">
  <section class="contact-us">
    <div class="container">
      <div class="contact-us__row">
        <div class="contact-us__title-box">
          <h1 class='contact-us__title contact-us__title_mob'><?= get_field( 'contact_title' ); ?></h1>
          <h2 class='contact-us__subtitle contact-us__subtitle_mob'><?= get_field( 'contact_subtitle' ); ?></h2>
        </div>

        <div class="contact-us__img-box">
          <?= file_get_contents( get_attached_file( get_field( 'contact_img' ) ) ); ?>
        </div>

        <div class="contact-us__form-box">
          <div class="contact-us__title-box">
            <h1 class='contact-us__title contact-us__title_desk'><?= get_field( 'contact_title' ); ?></h1>
            <h2 class='contact-us__subtitle contact-us__subtitle_desk'><?= get_field( 'contact_subtitle' ); ?></h2>
          </div>
          <?php get_template_part( 'templates/form' ); ?>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
get_footer();